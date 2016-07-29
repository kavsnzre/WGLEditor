<form role="form" method="post" enctype="multipart/form-data" action="scene_update_page.php">
	<div class="container">

		<ul class="nav nav-tabs" role="tablist">
		<li class="active"><a href="#environment-particulars" role="tab" data-toggle="tab">Environment</a></li>
		<li><a href="#light-sources-particulars" role="tab" data-toggle="tab">Light sources</a></li>
		<li><a href="#camera-particulars" role="tab" data-toggle="tab">Camera</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade active in" id="environment-particulars">
				<?php require("./GUI/scene_environment_particulars.php"); ?>
			</div>
			<div class="tab-pane fade" id="light-sources-particulars">
				<?php require("./GUI/scene_light_sources_particulars.php"); ?>
			</div>
			<div class="tab-pane fade" id="camera-particulars">
				<?php require("./GUI/scene_camera_particulars.php"); ?>
			</div>
		</div>
	</div>
	<hr />
	<div class="form-group input-group custom-submit">
		<input 	id="scene-update-submit" 
			type="submit" 
			value="Update" 
			class="btn-lg btn-info" 
			disabled="true">
		</input> 
	</div>
</form>

<script>

	function initializeSceneDataSheet(){
	<?php
		if(isset($_SESSION["scene"])){

			// Setting environment
			$environment = $_SESSION["scene"]["environment"];
			
			echo "document.getElementById('scene-background-color').value = '" . $environment["background-color"] . "';" . PHP_EOL;
			
			if( $environment["has-skybox"] ){
				echo "document.getElementById('selected-skybox-px-texture').src = '" 
							. getUploadDirectory() . "skybox-folder/skybox_px" . $environment["skybox-extension"] . "';" . PHP_EOL;
				echo "document.getElementById('selected-skybox-nx-texture').src = '" 
							. getUploadDirectory() . "skybox-folder/skybox_nx" . $environment["skybox-extension"] . "';" . PHP_EOL;
				echo "document.getElementById('selected-skybox-py-texture').src = '" 
							. getUploadDirectory() . "skybox-folder/skybox_py" . $environment["skybox-extension"] . "';" . PHP_EOL;
				echo "document.getElementById('selected-skybox-ny-texture').src = '" 
							. getUploadDirectory() . "skybox-folder/skybox_ny" . $environment["skybox-extension"] . "';" . PHP_EOL;
				echo "document.getElementById('selected-skybox-pz-texture').src = '" 
							. getUploadDirectory() . "skybox-folder/skybox_pz" . $environment["skybox-extension"] . "';" . PHP_EOL;
				echo "document.getElementById('selected-skybox-nz-texture').src = '" 
							. getUploadDirectory() . "skybox-folder/skybox_nz" . $environment["skybox-extension"] . "';" . PHP_EOL;
			}
			
			// Setting light sources
			$light_sources = $_SESSION["scene"]["light_sources"];
			
			foreach( $light_sources as $name => $light ){
			
				if( $name != "ambient-light-color" ){
				
					echo "var properties = [];" . PHP_EOL;
					switch($light["type"]){
						case "point":
							echo "properties['position'] = '" . $light["position"] . "';" . PHP_EOL;
							echo "properties['diffuse-light-color'] = '" . $light["diffuse-light-color"] . "';" . PHP_EOL;
							echo "properties['specular-light-color'] = '" . $light["specular-light-color"] . "';" . PHP_EOL;
							echo "properties['produce-shadows'] = '" . $light["produce-shadows"] . "';" . PHP_EOL;
							break;
						case "directional":
							echo "properties['direction'] = '" . $light["direction"] . "';" . PHP_EOL;
							echo "properties['diffuse-light-color'] = '" . $light["diffuse-light-color"] . "';" . PHP_EOL;
							echo "properties['specular-light-color'] = '" . $light["specular-light-color"] . "';" . PHP_EOL;
							echo "properties['produce-shadows'] = '" . $light["produce-shadows"] . "';" . PHP_EOL;
							break;
						case "spot":
							echo "properties['position'] = '" . $light["position"] . "';" . PHP_EOL;
							echo "properties['direction'] = '" . $light["direction"] . "';" . PHP_EOL;
							echo "properties['cut-off-angle'] = '" . $light["cut-off-angle"] . "';" . PHP_EOL;
							echo "properties['fall-off-exponent'] = '" . $light["fall-off-exponent"] . "';" . PHP_EOL;
							echo "properties['diffuse-light-color'] = '" . $light["diffuse-light-color"] . "';" . PHP_EOL;
							echo "properties['specular-light-color'] = '" . $light["specular-light-color"] . "';" . PHP_EOL;
							echo "properties['produce-shadows'] = '" . $light["produce-shadows"] . "';" . PHP_EOL;
							break;
					}
					echo "addLightSource('" . $name . "', '" . $light["type"] . "', properties);" . PHP_EOL;
				
				}
				
				echo "document.getElementById('scene-ambient-light-color').value = '" . $light_sources["ambient-light-color"] . "';" . PHP_EOL;
			}
			
			// Setting the camera
			$camera = $_SESSION["scene"]["camera"];
			
			$type = $camera["type"];
			echo "document.getElementById('scene-camera-type').value = '" . $type . "';" . PHP_EOL;
			
			if( $type == "free" ){
				echo "document.getElementById('scene-free-camera-eye-position').value = '" . $camera["free"]["eye-position"] . "';" . PHP_EOL;
				echo "document.getElementById('scene-free-camera-look-at-point').value = '" . $camera["free"]["look-at-point"] . "';" . PHP_EOL;
				echo "document.getElementById('scene-free-camera-check-collisions').checked = " . $camera["free"]["check-collisions"] . ";" . PHP_EOL;
				echo "document.getElementById('scene-free-camera-check-collisions-hidden').value = 
										document.getElementById('scene-free-camera-check-collisions').checked;";
				echo "document.getElementById('scene-free-camera-apply-gravity').checked = " . $camera["free"]["apply-gravity"] . ";" . PHP_EOL;
				echo "document.getElementById('scene-free-camera-apply-gravity-hidden').value = 
										document.getElementById('scene-free-camera-apply-gravity').checked;";
										
				echo "document.getElementById('scene-arc-rotate-camera-eye-position').value = '';" . PHP_EOL;
				echo "document.getElementById('scene-arc-rotate-camera-look-at-point').value = '';" . PHP_EOL;
			} else if( $type == "arc rotate" ){
				echo "document.getElementById('scene-free-camera-eye-position').value = '';" . PHP_EOL;
				echo "document.getElementById('scene-free-camera-look-at-point').value = '';" . PHP_EOL;
				echo "document.getElementById('scene-free-camera-check-collisions').checked = false;" . PHP_EOL;
				echo "document.getElementById('scene-free-camera-apply-gravity').checked = false;" . PHP_EOL;
				
				echo "document.getElementById('scene-arc-rotate-camera-eye-position').value = '" . $camera["arc-rotate"]["eye-position"] . "';" . PHP_EOL;
				echo "document.getElementById('scene-arc-rotate-camera-look-at-point').value = '" . $camera["arc-rotate"]["look-at-point"] . "';" . PHP_EOL;
			}
	?>	
		$("input#scene-background-color").ColorPickerSliders({
		    placement: 'bottom',
		    swatches: false,
		    order: {
		      rgb: 1
		    }
		  });
		  
		  
		  $("input#scene-ambient-light-color").ColorPickerSliders({
		    placement: 'bottom',
		    swatches: false,
		    order: {
		      rgb: 1
		    }
		  });
		  
		  $("input#scene-diffuse-light-color").ColorPickerSliders({
		    placement: 'bottom',
		    swatches: false,
		    order: {
		      rgb: 1
		    }
		  });
		  
		  $("input#scene-specular-light-color").ColorPickerSliders({
		    placement: 'bottom',
		    swatches: false,
		    order: {
		      rgb: 1
		    }
		  });
	<?php } ?>
	}

	function lightsCheck(){
		var pointLightSourceName = document.getElementById('scene-point-light-name');
		var pointLightSourcePosition = document.getElementById('scene-point-light-position');
		var directionalLightSourceName = document.getElementById('scene-directional-light-name');
		var directionalLightSourceDirection = document.getElementById('scene-directional-light-direction');
		var spotLightSourceName = document.getElementById('scene-spot-light-name');
		var spotLightSourcePosition = document.getElementById('scene-spot-light-position');
		var spotLightSourceDirection = document.getElementById('scene-spot-light-direction');
		var spotLightSourceCutOffAngle = document.getElementById('scene-spot-light-cut-off-angle');
		var spotLightSourceFallOffExponent = document.getElementById('scene-spot-light-fall-off-exponent');
		
		var okPointLightSourceName = checkWithRegExp(
				/^[a-zA-Z][a-zA-Z0-9_]*$/, 
				pointLightSourceName, 
				'scene-point-light-name-container', 
				'scene-point-light-name-span'
				);
				
		var okPointLightSourcePosition = checkWithRegExp(
				pointLightSourcePosition.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/, 
				pointLightSourcePosition,
				'scene-point-light-position-container' ,
				'scene-point-light-position-span'
				);
				
		var okDirectionalLightSourceName = checkWithRegExp(
				/^[a-zA-Z][a-zA-Z0-9_]*$/, 
				directionalLightSourceName, 
				'scene-directional-light-name-container', 
				'scene-directional-light-name-span'
				);
				
		var okDirectionalLightSourceDirection = checkWithRegExp(
				directionalLightSourceDirection.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/, 
				directionalLightSourceDirection,
				'scene-directional-light-direction-container' ,
				'scene-directional-light-direction-span'
				);
		
		var okSpotLightSourceName = checkWithRegExp(
				/^[a-zA-Z][a-zA-Z0-9_]*$/, 
				spotLightSourceName, 
				'scene-spot-light-name-container', 
				'scene-spot-light-name-span'
				);
				
		var okSpotLightSourcePosition = checkWithRegExp(
				spotLightSourcePosition.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/, 
				spotLightSourcePosition,
				'scene-spot-light-position-container' ,
				'scene-spot-light-position-span'
				);
				
		var okSpotLightSourceDirection = checkWithRegExp(
				spotLightSourceDirection.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/, 
				spotLightSourceDirection,
				'scene-spot-light-direction-container' ,
				'scene-spot-light-direction-span'
				);
		
		var okSpotLightSourceCutOffAngle = checkWithRegExp(
				spotLightSourceCutOffAngle.disabled ? /^(Math.PI(\*|\/)?\d+(\.\d)?\d*)?$/ : /^(Math.PI(\*|\/))?\d+(\.\d)?\d*$/, 
				spotLightSourceCutOffAngle,
				'scene-spot-light-cut-off-angle-container' ,
				'scene-spot-light-cut-off-angle-span'
				);
				
		var okSpotLightSourceFallOffExponent = checkWithRegExp(
				spotLightSourceFallOffExponent.disabled ? /^(\d+(\.\d)?\d*)?$/ : /^\d+(\.\d)?\d*$/, 
				spotLightSourceFallOffExponent,
				'scene-spot-light-fall-off-exponent-container' ,
				'scene-spot-light-fall-off-exponent-span'
				);
	
	}

	function sceneCheck(){
		var update = document.getElementById('scene-update-submit');
		
		var freeCameraEyePosition = document.getElementById('scene-free-camera-eye-position');
		var freeCameraLookAtPoint = document.getElementById('scene-free-camera-look-at-point');
		var arcRotateCameraEyePosition = document.getElementById('scene-arc-rotate-camera-eye-position');
		var arcRotateCameraLookAtPoint = document.getElementById('scene-arc-rotate-camera-look-at-point');
		
	
		var okFreeCameraEyePosition = checkWithRegExp(
				( freeCameraEyePosition.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/ ), 
				freeCameraEyePosition,
				'scene-free-camera-eye-position-container' ,
				'scene-free-camera-eye-position-span'
				);
		
		var okFreeCameraLookAtPoint = checkWithRegExp(
				( freeCameraLookAtPoint.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/ ), 
				freeCameraLookAtPoint,
				'scene-free-camera-look-at-point-container' ,
				'scene-free-camera-look-at-point-span'
				);
				
		var okArcRotateCameraEyePosition = checkWithRegExp(
				(arcRotateCameraLookAtPoint.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/ ),
				arcRotateCameraEyePosition,
				'scene-arc-rotate-camera-eye-position-container' ,
				'scene-arc-rotate-camera-eye-position-span'
				);
				
		var okArcRotateCameraLookAtPoint =  checkWithRegExp(
			       (arcRotateCameraLookAtPoint.disabled ? /^(|\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \))$/ 
								: /^\( (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d*, (\+|\-)?\d+(\.\d)?\d* \)$/ ),
				arcRotateCameraLookAtPoint,
				'scene-arc-rotate-camera-look-at-point-container' ,
				'scene-arc-rotate-camera-look-at-point-span'
				);
				
		update.disabled = !( okFreeCameraEyePosition && okFreeCameraLookAtPoint
				&& okArcRotateCameraEyePosition && okArcRotateCameraLookAtPoint );
				
	}

	function refreshCameraGUIAfterTypeChanged(){
		var type = document.getElementById('scene-camera-type').value;
		
		var freeCameraParticulars = document.querySelector('div.free-camera-particulars');
		
		var arcRotateCameraParticulars = document.querySelector('div.arc-rotate-camera-particulars');
		
		freeCameraParticulars.style.visibility = (type == "free") ? "visible" : "hidden";  
		document.getElementById('scene-free-camera-eye-position').disabled = (type != "free");
		document.getElementById('scene-free-camera-look-at-point').disabled = (type != "free");
		
		arcRotateCameraParticulars.style.visibility = (type != "free") ? "visible" : "hidden";	
		document.getElementById('scene-arc-rotate-camera-eye-position').disabled = (type == "free");
		document.getElementById('scene-arc-rotate-camera-look-at-point').disabled = (type == "free");
	}
	
	function refreshLightSourcesGUIAfterTypeChanged(){
		var type = document.getElementById('scene-light-source-type-selector').value;
		
		var pointLightParticulars = document.querySelector('.point-light-particulars');
		var directionalLightParticulars = document.querySelector('.directional-light-particulars');
		var spotLightParticulars = document.querySelector('.spot-light-particulars');
		
		pointLightParticulars.disabled = (type != "point"); 
		pointLightParticulars.style.visibility = (type == "point") ? "visible" : "hidden"; 
		
		directionalLightParticulars.disabled = (type != "directional"); 
		directionalLightParticulars.style.visibility = (type == "directional") ? "visible" : "hidden";  
		
		spotLightParticulars.disabled = (type != "spot"); 
		spotLightParticulars.style.visibility = (type == "spot") ? "visible" : "hidden";  
		
	}
</script>

<script>
	// onload script:
	initializeSceneDataSheet();
	refreshCameraGUIAfterTypeChanged();
	refreshLightSourcesGUIAfterTypeChanged();
	lightsCheck();
	sceneCheck();
</script>
