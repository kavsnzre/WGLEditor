<form role="form" method="post"  enctype="multipart/form-data" <?php	
					if($_SESSION["if-mesh-add-submit"]) { echo "action='mesh_add_page.php'"; } 
					if($_SESSION["if-mesh-update-and-remove-submits"]){  echo "action='mesh_update_remove_page.php'"; } ?>
>
	<div class="container">

		<ul class="nav nav-tabs" role="tablist">
		<li class="active"><a href="#structure-particulars" role="tab" data-toggle="tab">Structure Layer</a></li>
		<li><a href="#appearance-particulars" role="tab" data-toggle="tab">Appearance Layer</a></li>
		<li><a href="#motion-particulars" role="tab" data-toggle="tab">Motion Layer</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade active in" id="structure-particulars">
				<?php require("./GUI/mesh_structure_layer_particulars.php"); ?>
			</div>
			<div class="tab-pane fade" id="appearance-particulars">
				<?php require("./GUI/mesh_appearance_layer_particulars.php"); ?>
			</div>
			<div class="tab-pane fade" id="motion-particulars">
				<?php require("./GUI/mesh_motion_layer_particulars.php"); ?>
			</div>
		</div>
	</div>
	<hr />
	<?php	if($_SESSION["if-mesh-add-submit"]) { ?>
		<div class="form-group input-group custom-submit">
			<input 	id="mesh-add-submit" 
				type="submit" 
				value="Add" 
				class="btn-lg btn-success" 
				disabled="true">
			</input> 
		</div>
	<?php } ?>
	<?php	if($_SESSION["if-mesh-update-and-remove-submits"]) { ?>
		<div class="form-group input-group custom-submit">
			<input  id="mesh-update-submit" 
				type="submit" 
				name="option-submit-update-or-remove" 
				value="Update" 
				class="btn-lg btn-info">
			</input>&nbsp;
			<input 	id="mesh-remove-submit" 
				type="submit" 
				name="option-submit-update-or-remove" 
				value="Remove" 
				class="btn-lg btn-danger">
			</input> 
		</div>
	<?php } ?>
</form>	

<script type="text/javascript">

	// (possibly) Initializing the ballot
	function initializeMeshDataSheet(){
	<?php
		if(isset($_SESSION["selected-node"])){
			$node = unserialize($_SESSION["selected-node"]);
			foreach( $node as $name => $value ){
				if(preg_match("/^.+_texture$/",$name) && !preg_match("/^.+_procedural_.+$/",$name) ){
					if($value != ""){
						echo "document.getElementById('selected-" . 
							substr($name, 0 , -strlen("_texture")) . 
							"-texture').src = '" . getUploadDirectory() . 
							$value . "';"  . PHP_EOL;
					}
				} else if( $name == "wireframe" ){
					echo "document.getElementById('appearance-wireframe').checked = " . ($value == "t" ? "true" : "false") . ";" . PHP_EOL;
					echo "document.getElementById('appearance-wireframe-hidden').value = 
										document.getElementById('appearance-wireframe').checked;" . PHP_EOL;
				} else if( $name == "receive_shadows" ){
					echo "document.getElementById('appearance-receive-shadows').checked = " . ($value == "t" ? "true" : "false") . ";" . PHP_EOL;
					echo "document.getElementById('appearance-receive-shadows-hidden').value = 
										document.getElementById('appearance-receive-shadows').checked;" . PHP_EOL;
				} else if( preg_match("/^visibility$/",$name)){
					echo "var mySlider = new $(\"input[name='" . $name . "']\").slider();" . PHP_EOL;
					echo "mySlider.slider('setValue'," . (is_numeric($value) ? $value :"'" . $value . "'") . ");" . PHP_EOL;
				} else if( preg_match("/^animations$/",$name )){
					if( unserialize($value) != ""){ 
						foreach( unserialize($value) as $property => $animation ){
							echo "addAnimationGUI('" . $property . "');" . PHP_EOL;
							echo "document.querySelector('select[name=\"animations[" . $property . "][loop-mode]\"]').value = '" . $animation["loop-mode"] . "';" . PHP_EOL;
							if( array_key_exists("keys", $animation) ){
								foreach( $animation["keys"] as $frame => $value ){
									echo "addKeyGUI('" . $property . "', " . $frame . ", '" . $value . "');" . PHP_EOL;
								}
							}
						}
					}	
				} else if( preg_match("/^physics$/",$name )){
					$physics = unserialize($value);
					echo "document.getElementById('motion-enable-physics').checked = " . $physics["enable-physics"] . ";" . PHP_EOL;
					
					if( $physics["enable-physics"] == "true" ){
						foreach( $physics as $physicalProperty => $physicalValue ){
							echo "document.querySelector('[name=\"physics[" . $physicalProperty . "]\"]').value ="  
								. (is_numeric($physicalValue) ? $physicalValue : "'" . $physicalValue . "'") . ";" . PHP_EOL;
						}
					}
				} else {
					echo "document.querySelector('[name=" . $name . "]').value ="  
						. (is_numeric($value) ? $value : "'" . $value . "'") . ";" . PHP_EOL;
				}
			}	
	?>	
		$("input#appearance-ambient-color").ColorPickerSliders({
		    placement: 'bottom',
		    swatches: false,
		    order: {
		      rgb: 1
		    }
		  });
		  
		  $("input#appearance-diffuse-color").ColorPickerSliders({
		    placement: 'bottom',
		    swatches: false,
		    order: {
		      rgb: 1
		    }
		  });
		  
		  $("input#appearance-specular-color").ColorPickerSliders({
		    placement: 'bottom',
		    swatches: false,
		    order: {
		      rgb: 1
		    }
		  });
		  
		  $("input#appearance-emissive-color").ColorPickerSliders({
		    placement: 'bottom',
		    swatches: false,
		    order: {
		      rgb: 1
		    }
		  });
	<?php } ?>
	}
	
	
	// Selecting the geometrical properties
	function selectGeometricalProperties(){
	
		// The geometrical properties objects
		var width = document.getElementById("structure-width");
		var height = document.getElementById("structure-height");
		var depth = document.getElementById("structure-depth");
		var diameterTop = document.getElementById("structure-diameter-top");
		var diameterBottom = document.getElementById("structure-diameter-bottom");
		var diameter = document.getElementById("structure-diameter");
		var radius = document.getElementById("structure-radius");
		var thickness = document.getElementById("structure-thickness");
		var tessellation = document.getElementById("structure-tessellation");

		switch(document.getElementById("structure-type").value) {
			case "box":
				width.disabled = false;
				height.disabled = false;
				depth.disabled = false;
				diameterTop.disabled = true;
				diameterBottom.disabled = true;
				diameter.disabled = true;
				radius.disabled = true;
				thickness.disabled = true;
				tessellation.disabled = true;

				diameterTop.value = "";
				diameterBottom.value = "";
				diameter.value = "";
				radius.value = "";
				thickness.value = "";
				tessellation.value = "";
				
				break;
			case "plane":
				width.disabled = false;
				height.disabled = false;
				depth.disabled = true;
				diameterTop.disabled = true;
				diameterBottom.disabled = true;
				diameter.disabled = true;
				radius.disabled = true;
				thickness.disabled = true;
				tessellation.disabled = true;
				
				depth.value = "";
				diameterTop.value = "";
				diameterBottom.value = "";
				diameter.value = "";
				radius.value = "";
				thickness.value = "";
				tessellation.value = "";
				
				break;
			case "sphere":
				width.disabled = true;
				height.disabled = true;
				depth.disabled = true;
				diameterTop.disabled = true;
				diameterBottom.disabled = true;
				diameter.disabled = false;
				radius.disabled = true;
				thickness.disabled = true;
				tessellation.disabled = true;
				
				width.value = "";
				height.value = "";
				depth.value = "";
				diameterTop.value = "";
				diameterBottom.value = "";
				radius.value = "";
				thickness.value = "";
				tessellation.value = "";
				
				break;
			case "cylinder":
				width.disabled = true;
				height.disabled = false;
				depth.disabled = true;
				diameterTop.disabled = false;
				diameterBottom.disabled = false;
				diameter.disabled = true;
				radius.disabled = true;
				thickness.disabled = true;
				tessellation.disabled = false;
				
				width.value = "";
				depth.value = "";
				diameter.value = "";
				radius.value = "";
				thickness.value = "";
				
				break;
			case "torus":
				width.disabled = true;
				height.disabled = true;
				depth.disabled = true;
				diameterTop.disabled = true;
				diameterBottom.disabled = true;
				diameter.disabled = false;
				radius.disabled = true;
				thickness.disabled = false;
				tessellation.disabled = false;
				
				width.value = "";
				height.value = "";
				depth.value = "";
				diameterTop.value = "";
				diameterBottom.value = "";
				radius.value = "";
					
				break;
			case "disc":
				width.disabled = true;
				height.disabled = true;
				depth.disabled = true;
				diameterTop.disabled = true;
				diameterBottom.disabled = true;
				diameter.disabled = true;
				radius.disabled = false;
				thickness.disabled = true;
				tessellation.disabled = false;
				
				width.value = "";
				height.value = "";
				depth.value = "";
				diameterTop.value = "";
				diameterBottom.value = "";
				diameter.value = "";
				thickness.value = ""; 
				
				break;
		}
	}

	// Initializing the geometrical properties
	function initializeGeometricalProperties(){
	
		// The geometrical properties objects
		var width = document.getElementById("structure-width");
		var height = document.getElementById("structure-height");
		var depth = document.getElementById("structure-depth");
		var diameterTop = document.getElementById("structure-diameter-top");
		var diameterBottom = document.getElementById("structure-diameter-bottom");
		var diameter = document.getElementById("structure-diameter");
		var radius = document.getElementById("structure-radius");
		var thickness = document.getElementById("structure-thickness");
		var tessellation = document.getElementById("structure-tessellation");
	
		switch(document.getElementById("structure-type").value) {
			case "box":
				width.value = 1;
				height.value = 1;
				depth.value = 1;
				break;
			case "plane":
				width.value = 1;
				height.value = 1;
				break;
			case "sphere":
				diameter.value = 1;
				break;
			case "cylinder":
				height.value = 2;
				diameterTop.value = 1;
				diameterBottom.value = 1;
				diameter.value = 1;
				tessellation.value = 24;
				break;
			case "torus":
				diameter.value = 1;
				thickness.value = 0.5;
				tessellation.value = 16;
			break;
			case "disc":
				radius.value = 0.5;
				tessellation.value = 64;
				break;
		}
	}
	
	// Checking if the ballot is correctly filled-out
	function structureLayerCheck(){
	
		// The geometrical properties objects
		var width = document.getElementById("structure-width");
		var height = document.getElementById("structure-height");
		var depth = document.getElementById("structure-depth");
		var diameterTop = document.getElementById("structure-diameter-top");
		var diameterBottom = document.getElementById("structure-diameter-bottom");
		var diameter = document.getElementById("structure-diameter");
		var radius = document.getElementById("structure-radius");
		var thickness = document.getElementById("structure-thickness");
		var tessellation = document.getElementById("structure-tessellation");
	
		// The physical properties objects
		var mass = document.getElementById('motion-mass');
		var frictionCoefficient = document.getElementById('motion-friction-coefficient');
		var restitutionCoefficient = document.getElementById('motion-restitution-coefficient');
		var initialLinearVelocity = document.getElementById('motion-initial-linear-velocity');
		var initialAngularVelocity = document.getElementById('motion-initial-angular-velocity');
	
		var add = document.getElementById("mesh-add-submit");
		var update = document.getElementById("mesh-update-submit");
		var remove = document.getElementById("mesh-remove-submit");
	
		var okName = checkWithRegExp(
				/^[a-zA-Z][a-zA-Z0-9_]*$/, 
				document.getElementById('structure-name'), 
				'structure-name-container', 
				'structure-name-span'
				);
		
		var okParent = checkWithRegExp(
				/^[a-zA-Z][a-zA-Z0-9_]*$/, 
				document.getElementById('structure-parent'),
				'structure-parent-container', 
				'structure-parent-span'
				);
				
		var okWidth = checkWithRegExp(
				width.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/, 
				width,
				'structure-width-container' ,
				'structure-width-span'
				);
		
		var okHeight = checkWithRegExp(
				height.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/, 
				height,
				'structure-height-container' ,
				'structure-height-span'
				);
				
		var okDepth = checkWithRegExp(
				depth.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/, 
				depth,
				'structure-depth-container' ,
				'structure-depth-span'
				);
		
		var okDiameterTop = checkWithRegExp(
				diameterTop.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/, 
				diameterTop,
				'structure-diameter-top-container' ,
				'structure-diameter-top-span'
				);
		
		var okDiameterBottom = checkWithRegExp(
				diameterBottom.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/, 
				diameterBottom,
				'structure-diameter-bottom-container' ,
				'structure-diameter-bottom-span'
				);
		
		var okDiameter = checkWithRegExp(
				diameter.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/,  
				diameter,
				'structure-diameter-container' ,
				'structure-diameter-span'
				);
		
		var okRadius = checkWithRegExp(
				radius.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/,  
				radius,
				'structure-radius-container' ,
				'structure-radius-span'
				);
		
		var okThickness = checkWithRegExp(
				thickness.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/, 
				thickness,
				'structure-thickness-container' ,
				'structure-thickness-span'
				);
		
		var okTessellation = checkWithRegExp(
				tessellation.disabled ? /^[1-9]*$/ : /^[1-9]+$/, 
				tessellation,
				'structure-tessellation-container' ,
				'structure-tessellation-span'
				);
		
		var okTranslateWorld = checkWithRegExp(
				/^\( (\+|\-)?\d+(\.\d)?\d?, (\+|\-)?\d+(\.\d)?\d?, (\+|\-)?\d+(\.\d)?\d? \)$/, 
				document.getElementById('structure-translate-world') ,
				'structure-translate-world-container' ,
				'structure-translate-world-span'
				);
				
		var okRotateWorld = checkWithRegExp(
				/^\( (\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d*, (\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d*, (\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d* \)$/, 
				document.getElementById('structure-rotate-world') ,
				'structure-rotate-world-container' ,
				'structure-rotate-world-span'
				);
				
		var okTranslateLocal = checkWithRegExp(
				/^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/, 
				document.getElementById('structure-translate-local') ,
				'structure-translate-local-container' ,
				'structure-translate-local-span'
				);
				
		var okRotateLocal = checkWithRegExp(
				/^\( (\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d*, (\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d*, (\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d* \)$/, 
				document.getElementById('structure-rotate-local') ,
				'structure-rotate-local-container' ,
				'structure-rotate-local-span'
				);
				
		var okScale = checkWithRegExp(
				/^\( (\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*)), (\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*)), (\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*)) \)$/, 
				document.getElementById('structure-scale') ,
				'structure-scale-container' ,
				'structure-scale-span'
				);
				
		var okUOffsetAmbient = checkWithRegExp(
				/^(\+|\-)?\d+(\.\d)?\d*$/,  
				document.getElementById('appearance-u-offset-ambient') ,
				'appearance-u-offset-ambient-container' ,
				'appearance-u-offset-ambient-span'
				);
				
		var okVOffsetAmbient = checkWithRegExp(
				/^(\+|\-)?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-v-offset-ambient') ,
				'appearance-v-offset-ambient-container' ,
				'appearance-v-offset-ambient-span'
				);
		
		var okUScaleAmbient = checkWithRegExp(
				/^(\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*))$/, 
				document.getElementById('appearance-u-scale-ambient') ,
				'appearance-u-scale-ambient-container' ,
				'appearance-u-scale-ambient-span'
				);
				
		var okVScaleAmbient = checkWithRegExp(
				/^(\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*))$/, 
				document.getElementById('appearance-v-scale-ambient') ,
				'appearance-v-scale-ambient-container' ,
				'appearance-v-scale-ambient-span'
				);
				
		var okWAngleAmbient = checkWithRegExp(
				/^(\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-w-angle-ambient') ,
				'appearance-w-angle-ambient-container' ,
				'appearance-w-angle-ambient-span'
				);
				
		var okUOffsetDiffuse = checkWithRegExp(
				/^(\+|\-)?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-u-offset-diffuse') ,
				'appearance-u-offset-diffuse-container' ,
				'appearance-u-offset-diffuse-span'
				);
				
		var okVOffsetDiffuse = checkWithRegExp(
				/^(\+|\-)?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-v-offset-diffuse') ,
				'appearance-v-offset-diffuse-container' ,
				'appearance-v-offset-diffuse-span'
				);
		
		var okUScaleDiffuse = checkWithRegExp(
				/^(\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*))$/, 
				document.getElementById('appearance-u-scale-diffuse') ,
				'appearance-u-scale-diffuse-container' ,
				'appearance-u-scale-diffuse-span'
				);
				
		var okVScaleDiffuse = checkWithRegExp(
				/^(\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*))$/, 
				document.getElementById('appearance-v-scale-diffuse') ,
				'appearance-v-scale-diffuse-container' ,
				'appearance-v-scale-diffuse-span'
				);
				
		var okWAngleDiffuse = checkWithRegExp(
				/^(\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-w-angle-diffuse') ,
				'appearance-w-angle-diffuse-container' ,
				'appearance-w-angle-diffuse-span'
				);
		
		var okUOffsetSpecular = checkWithRegExp(
				/^(\+|\-)?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-u-offset-specular') ,
				'appearance-u-offset-specular-container' ,
				'appearance-u-offset-specular-span'
				);
				
		var okVOffsetSpecular = checkWithRegExp(
				/^(\+|\-)?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-v-offset-specular') ,
				'appearance-v-offset-specular-container' ,
				'appearance-v-offset-specular-span'
				);
		
		var okUScaleSpecular = checkWithRegExp(
				/^(\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*))$/, 
				document.getElementById('appearance-u-scale-specular') ,
				'appearance-u-scale-specular-container' ,
				'appearance-u-scale-specular-span'
				);
				
		var okVScaleSpecular = checkWithRegExp(
				/^(\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*))$/, 
				document.getElementById('appearance-v-scale-specular') ,
				'appearance-v-scale-specular-container' ,
				'appearance-v-scale-specular-span'
				);
				
		var okWAngleSpecular = checkWithRegExp(
				/^(\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-w-angle-specular') ,
				'appearance-w-angle-specular-container' ,
				'appearance-w-angle-specular-span'
				);
		
		var okUOffsetEmissive = checkWithRegExp(
				/^(\+|\-)?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-u-offset-emissive') ,
				'appearance-u-offset-emissive-container' ,
				'appearance-u-offset-emissive-span'
				);
				
		var okVOffsetEmissive = checkWithRegExp(
				/^(\+|\-)?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-v-offset-emissive') ,
				'appearance-v-offset-emissive-container' ,
				'appearance-v-offset-emissive-span'
				);
		
		var okUScaleEmissive = checkWithRegExp(
				/^(\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*))$/, 
				document.getElementById('appearance-u-scale-emissive') ,
				'appearance-u-scale-emissive-container' ,
				'appearance-u-scale-emissive-span'
				);
				
		var okVScaleEmissive = checkWithRegExp(
				/^(\+|\-)?((0\.0*[1-9]+)|([1-9]+0*(\.\d)?\d*))$/, 
				document.getElementById('appearance-v-scale-emissive') ,
				'appearance-v-scale-emissive-container' ,
				'appearance-v-scale-emissive-span'
				);
				
		var okWAngleEmissive = checkWithRegExp(
				/^(\+|\-)?(Math.PI(\*|\/))?\d+(\.\d)?\d*$/, 
				document.getElementById('appearance-w-angle-emissive') ,
				'appearance-w-angle-emissive-container' ,
				'appearance-w-angle-emissive-span'
				);
		
		var okMass = checkWithRegExp(
				mass.disabled ? /^|\d+(\.\d)?\d*$/ : /^\d+(\.\d)?\d*$/, 
				mass,
				'motion-mass-container' ,
				'motion-mass-span'
				);
				
		var okFrictionCoefficient = checkWithRegExp(
				frictionCoefficient.disabled ? /^|\d+(\.\d)?\d*$/ : /^\d+(\.\d)?\d*$/, 
				frictionCoefficient,
				'motion-friction-coefficient-container' ,
				'motion-friction-coefficient-span'
				);
				
		var okRestitutionCoefficient = checkWithRegExp(
				restitutionCoefficient.disabled ? /^|\d+(\.\d)?\d*$/ : /^\d+(\.\d)?\d*$/, 
				restitutionCoefficient,
				'motion-restitution-coefficient-container' ,
				'motion-restitution-coefficient-span'
				);
				
		var okInitialLinearVelocity = checkWithRegExp(
				initialLinearVelocity.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/, 
				initialLinearVelocity,
				'motion-initial-linear-velocity-container' ,
				'motion-initial-linear-velocity-span'
				);
		
		var okInitialAngularVelocity = checkWithRegExp(
				initialAngularVelocity.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/, 
				initialAngularVelocity,
				'motion-initial-angular-velocity-container' ,
				'motion-initial-angular-velocity-span'
				);
		
		if( 
			okName && okParent 
			&& okWidth && okHeight && okDepth 
			&& okDiameterTop && okDiameterBottom && okDiameter 
			&& okRadius && okThickness && okTessellation 
			&& okTranslateWorld && okRotateWorld && okTranslateLocal && okRotateLocal && okScale 
			&& okUOffsetAmbient && okVOffsetAmbient && okUScaleAmbient && okVScaleAmbient && okWAngleAmbient 
			&& okUOffsetDiffuse && okVOffsetDiffuse && okUScaleDiffuse && okVScaleDiffuse && okWAngleDiffuse 
			&& okUOffsetSpecular && okVOffsetSpecular && okUScaleSpecular && okVScaleSpecular && okWAngleSpecular 
			&& okUOffsetEmissive && okVOffsetEmissive && okUScaleEmissive && okVScaleEmissive && okWAngleEmissive 
			&& okMass && okFrictionCoefficient && okRestitutionCoefficient && okInitialLinearVelocity && okInitialAngularVelocity 
		){
			if( add ){
				add.disabled = false;
			}
			if( update ){
				update.disabled = false;
			}
			if( remove ){
				remove.disabled = false;
			}
		}else{
			if( add ){
				add.disabled = true;
			}
			if( update ){
				update.disabled = true;
			}
			if( remove ){
				remove.disabled = true;
			}
		}
	}
	
	function refreshMeshGUIAfterTypeChanged(){
		selectGeometricalProperties();
		initializeGeometricalProperties();
		structureLayerCheck();
	}
	
	function removeUploadedTexture( textureType ){
		var img = document.getElementById('selected-' + textureType + '-texture');
		img.style.visibility='hidden'; 
		
		<?php if(isset($_SESSION["selected-node"])) { ?>
			var hidden = document.createElement('input');
			hidden.setAttribute('type','hidden');
			hidden.setAttribute('name','if-' + textureType + '-texture-removed');
			var container = document.getElementById('appearance-' + textureType + '-texture-container');
			container.appendChild(hidden);
		<?php } ?>
	}
</script>

<script>
	// onload script:
	<?php
		if(isset($_SESSION["selected-node"])){
			echo "initializeMeshDataSheet();" . PHP_EOL;
			echo "setPhysicsGUIState();" . PHP_EOL;
		} else {	
			echo "initializeGeometricalProperties();" . PHP_EOL;
		}
	?>
		selectGeometricalProperties();
		structureLayerCheck();
</script>
