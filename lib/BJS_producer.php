<?php
	define("CREATE_SCENE_FILE", "./BJS_produced_code/BJS_settingTheScene_function.js");
	define("CREATE_MESHES_FILE", "./BJS_produced_code/BJS_settingElementsOfTheScene_function.js");
	define("HIERARCHY_FILE", "./BJS_produced_code/BJS_settingElementsHierarchy_function.js");
	define("STRUCTUREL_FILE", "./BJS_produced_code/BJS_settingTheStructureLayer_function.js");
	define("APPEARANCEL_FILE", "./BJS_produced_code/BJS_settingTheAppearanceLayer_function.js");
	define("MOTIONL_FILE", "./BJS_produced_code/BJS_settingTheMotionLayer_function.js");
	
	define("SKYBOX_FOLDER", getUploadDirectory() . "skybox-folder/");
	
	#objects name convention: "mesh-name" . "-" . "property-name" [ . "-" - "subproperty" ] 
	#e.g.: "box1-ambient_procedural_texture"
	#e.g.: "box1-animations-ambient_color"

	function generateWGLEditorCredits( $myfile ){
		fwrite($myfile,"//###################### CREDITS: #########################" . PHP_EOL);
		fwrite($myfile,"//########## Creator: Michele Cirillo        ##############" . PHP_EOL);
		fwrite($myfile,"//########## @: michelecirillo1993@gmail.com ##############" . PHP_EOL);
		fwrite($myfile,"//########## Project Name: WGLEditor         ##############" . PHP_EOL);
		fwrite($myfile,"//########## Date: June and July 2016        ##############" . PHP_EOL);
		fwrite($myfile,"//########## For: I. Graphics Project        ##############" . PHP_EOL);
		fwrite($myfile,"//########## Prof: Marco Schaerf             ##############" . PHP_EOL);
		fwrite($myfile,"//#########################################################" . PHP_EOL . PHP_EOL . PHP_EOL );
	}

	function createBJSMeshes( $meshes , $option ){
		$myfile = fopen(CREATE_MESHES_FILE, $option);
		generateWGLEditorCredits( $myfile );
		
		fwrite($myfile,"function settingElementsOfTheScene(elements){"  . PHP_EOL);
		
		foreach( $meshes as $name => $mesh ){
			
			if( $mesh["type"] == "plane" )
				$type = "Ground";
			else
				$type = strtoupper($mesh["type"][0]) . substr($mesh["type"], 1);
			
			#$name = $name;
			
			$create_statement = "elements." . $name . " = BABYLON.MeshBuilder.Create" . $type . "('" . $name . "', {";
			switch($mesh["type"]){
				case("box"):
					$create_statement = $create_statement . "height : " . $mesh["height"] . ", ";
					$create_statement = $create_statement . "width : " . $mesh["width"] . ", ";
					$create_statement = $create_statement . "depth : " . $mesh["depth"];
					break;
				case("plane"):
					$create_statement = $create_statement . "width : " . $mesh["width"]. ", ";
					$create_statement = $create_statement . "height : " . $mesh["height"];
					break;
				case("sphere"):
					$create_statement = $create_statement . "diameter : " . $mesh["diameter"];
					break;
				case("cylinder"):
					$create_statement = $create_statement . "height : " . $mesh["height"] . ", ";
					$create_statement = $create_statement . "diameterTop : " . $mesh["diameter_top"] . ", ";
					$create_statement = $create_statement . "diameterBottom : " . $mesh["diameter_bottom"] . ", ";
					$create_statement = $create_statement . "tessellation : " . $mesh["tessellation"];
					break;
				case("torus"):
					$create_statement = $create_statement . "diameter : " . $mesh["diameter"] . ", ";
					$create_statement = $create_statement . "thickness : " . $mesh["thickness"] . ", ";
					$create_statement = $create_statement . "tessellation : " . $mesh["tessellation"];
					break;
				case("disc"):
					$create_statement = $create_statement . "radius : " . $mesh["radius"] . ", ";
					$create_statement = $create_statement . "tessellation : " . $mesh["tessellation"];
					break;
			}
			$create_statement = $create_statement . "}, scene);".PHP_EOL;
			fwrite($myfile, $create_statement);
				
		}
		fwrite($myfile,"return elements;" . PHP_EOL);
		fwrite($myfile,"}");

		fclose($myfile);
	}
	
	function createBJSScene( $option ){
		$myfile = fopen(CREATE_SCENE_FILE, $option);
		generateWGLEditorCredits($myfile);
		
		fwrite($myfile,"function settingTheScene(basicScene, elements){" . PHP_EOL . PHP_EOL);
		
		fwrite($myfile,"basicScene['camera'] = [];" . PHP_EOL);
		fwrite($myfile,"basicScene['light_sources'] = []" . PHP_EOL . PHP_EOL);
		
		// environment
		$environment = $_SESSION["scene"]["environment"];
		fwrite($myfile,"// environment" . PHP_EOL);
		
		$rgb = preg_split("/(rgb\(|,|\))/", $environment["background-color"]);
		$backgroundColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0); 
		fwrite($myfile,"scene.clearColor = new BABYLON.Color3(" . $backgroundColor . ");" . PHP_EOL);
		
		if( $environment["has-skybox"] ){
			fwrite($myfile, "var skybox = BABYLON.Mesh.CreateBox('skyBox', 100, scene);" . PHP_EOL );
			fwrite($myfile, "skybox.material = new BABYLON.StandardMaterial('skybox_material', scene);" . PHP_EOL );
			fwrite($myfile, "skybox.material.backFaceCulling = false;" . PHP_EOL );
			fwrite($myfile, "skybox.material.disableLighting = true;" . PHP_EOL );
			fwrite($myfile, "skybox.infiniteDistance = true;" . PHP_EOL );
			fwrite($myfile, "skybox.material.reflectionTexture = new BABYLON.CubeTexture('" . SKYBOX_FOLDER . "skybox', scene);" . PHP_EOL );
			fwrite($myfile, "skybox.material.reflectionTexture.coordinatesMode = BABYLON.Texture.SKYBOX_MODE;" . PHP_EOL );
			
			fwrite($myfile,"for( var element in elements ){" . PHP_EOL);
				fwrite($myfile,"elements[element].renderingGroupId = 1;" . PHP_EOL);
			fwrite($myfile,"}" . PHP_EOL . PHP_EOL);
		}
		
		// light sources
		$light_sources = $_SESSION["scene"]["light_sources"];
		fwrite($myfile,"// light sources" . PHP_EOL);
		foreach( $light_sources as $name => $light ){
			
			if( $name != "ambient-light-color" ){
			
				switch($light["type"]){
					case "point":
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'] = new BABYLON.PointLight(
								'" . $name . "',
								new BABYLON.Vector3" . $light["position"] . ",
								scene);"  . PHP_EOL);
						
						$rgb = preg_split("/(rgb\(|,|\))/", $light["diffuse-light-color"]);
						$diffuseLightColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0);
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'].diffuse = new BABYLON.Color3(" . $diffuseLightColor . ");" . PHP_EOL);
						$rgb = preg_split("/(rgb\(|,|\))/", $light["specular-light-color"]);
						$specularLightColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0);
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'].diffuse = new BABYLON.Color3(" . $specularLightColor . ");" . PHP_EOL);
						if( $light["produce-shadows"] == "true" ){					
							fwrite($myfile,"var " . $name . "ShadowGenerator = new BABYLON.ShadowGenerator(
										1024,
										basicScene['light_sources']['" . $name . "']);" . PHP_EOL);
							fwrite($myfile, $name . "ShadowGenerator.getShadowMap().renderList = [];" . PHP_EOL);
						
							fwrite($myfile,"for( var element in elements ){" . PHP_EOL);
							fwrite($myfile, $name . "ShadowGenerator.getShadowMap().renderList.push(elements[element]);" . PHP_EOL);
							fwrite($myfile,"}" . PHP_EOL . PHP_EOL);
						}
						break;
					case "directional":
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'] = new BABYLON.DirectionalLight(
								'" . $name . "',
								new BABYLON.Vector3" . $light["direction"] . ",
								scene);"  . PHP_EOL);
						
						$rgb = preg_split("/(rgb\(|,|\))/", $light["diffuse-light-color"]);
						$diffuseLightColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0);
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'].diffuse = new BABYLON.Color3(" . $diffuseLightColor . ");" . PHP_EOL);
						$rgb = preg_split("/(rgb\(|,|\))/", $light["specular-light-color"]);
						$specularLightColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0);
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'].specular = new BABYLON.Color3(" . $specularLightColor . ");" . PHP_EOL);
						if( $light["produce-shadows"] == "true" ){					
							fwrite($myfile,"var " . $name . "ShadowGenerator = new BABYLON.ShadowGenerator(
										1024,
										basicScene['light_sources']['" . $name . "']);" . PHP_EOL);
							fwrite($myfile, $name . "ShadowGenerator.getShadowMap().renderList = [];" . PHP_EOL);
						
							fwrite($myfile,"for( var element in elements ){" . PHP_EOL);
							fwrite($myfile, $name . "ShadowGenerator.getShadowMap().renderList.push(elements[element]);" . PHP_EOL);
							fwrite($myfile,"}" . PHP_EOL . PHP_EOL);
						}
						break;
					case "spot":
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'] = new BABYLON.SpotLight(
								'" . $name . "',
								new BABYLON.Vector3" . $light["position"] . ",
								new BABYLON.Vector3" . $light["direction"] . ","
								. $light["cut-off-angle"] . "," 
								. $light["fall-off-exponent"] . ", 
								scene);"  . PHP_EOL);
						
						$rgb = preg_split("/(rgb\(|,|\))/", $light["diffuse-light-color"]);
						$diffuseLightColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0);
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'].diffuse = new BABYLON.Color3(" . $diffuseLightColor . ");" . PHP_EOL);
						$rgb = preg_split("/(rgb\(|,|\))/", $light["specular-light-color"]);
						$specularLightColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0);
						fwrite($myfile,"basicScene['light_sources']['" . $name . "'].diffuse = new BABYLON.Color3(" . $specularLightColor . ");" . PHP_EOL);
						if( $light["produce-shadows"] == "true" ){					
							fwrite($myfile,"var " . $name . "ShadowGenerator = new BABYLON.ShadowGenerator(
										1024,
										basicScene['light_sources']['" . $name . "']);" . PHP_EOL);
							fwrite($myfile, $name . "ShadowGenerator.getShadowMap().renderList = [];" . PHP_EOL);
						
							fwrite($myfile,"for( var element in elements ){" . PHP_EOL);
							fwrite($myfile, $name . "ShadowGenerator.getShadowMap().renderList.push(elements[element]);" . PHP_EOL);
							fwrite($myfile,"}" . PHP_EOL . PHP_EOL);
						}
						break;
				}
			}
		}
		$rgb = preg_split("/(rgb\(|,|\))/", $light_sources["ambient-light-color"]);
		$ambientLightColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0);
		fwrite($myfile, "scene.ambientColor = new BABYLON.Color3(" . $ambientLightColor . ");" . PHP_EOL );
		
		// camera
		$camera = $_SESSION["scene"]["camera"];
		fwrite($myfile,"// camera" . PHP_EOL);
		switch( $camera["type"] ){
			case "free":
				fwrite($myfile, "basicScene['camera'] = new BABYLON.FreeCamera(
										'freeCamera', "
										. "new BABYLON.Vector3" . $camera["free"]["eye-position"] 
										. ", scene);" . PHP_EOL);
				fwrite($myfile, "basicScene['camera'].setTarget(new BABYLON.Vector3" . $camera["free"]["look-at-point"] . ");" . PHP_EOL);
				
				if( $camera["free"]["check-collisions"] == "true" ){
					fwrite($myfile, "basicScene['camera'].ellipsoid = new BABYLON.Vector3(1, 1, 1);" . PHP_EOL);
					fwrite($myfile, "basicScene['camera'].checkCollisions = true;" . PHP_EOL);
					
					fwrite($myfile,"for( var element in elements ){" . PHP_EOL);
						fwrite($myfile,"elements[element].checkCollisions = true;" . PHP_EOL);
					fwrite($myfile,"}" . PHP_EOL . PHP_EOL);
				}
				
				if( $camera["free"]["apply-gravity"] == "true" ){
					fwrite($myfile, "basicScene['camera'].applyGravity = true;" . PHP_EOL ); 
				}
				break;
			
			case "arc rotate":
				fwrite($myfile, "basicScene['camera'] = new BABYLON.ArcRotateCamera(
										'arcRotateCamera', "
										. substr($camera["arc-rotate"]["eye-position"], 1, -1) . ", "
										. "new BABYLON.Vector3" . $camera["arc-rotate"]["look-at-point"] . ", "
										. "scene);" . PHP_EOL);
				break;
		}
		fwrite($myfile, "scene.activeCamera = basicScene['camera'];" . PHP_EOL );
		fwrite($myfile, "scene.activeCamera.attachControl(canvas);" . PHP_EOL . PHP_EOL);
		
		// physics
		fwrite($myfile,"// physics" . PHP_EOL);
		fwrite($myfile, "scene.enablePhysics(new BABYLON.Vector3(0,-9.81,0), new BABYLON.CannonJSPlugin());" . PHP_EOL . PHP_EOL);

		fwrite($myfile, "return basicScene;" . PHP_EOL);
		fwrite($myfile, "}");

		fclose($myfile);
	}

	function createBJSHierarchy( $tree ){
		$myfile = fopen(HIERARCHY_FILE, "w");
		generateWGLEditorCredits( $myfile );
		
		$nodes = getAllDescendantsWithPreOrder("Meshes", $tree);
		
		fwrite($myfile,"function settingElementsHierarchy( elements ){" . PHP_EOL);
		foreach( $nodes as $name => $node ){
			if(  $name != "Meshes" && $node->getParent()->getValue() != "Meshes" ){
				fwrite($myfile, "elements." . $name . ".parent = elements." . $node->getParent()->getValue() . ";" . PHP_EOL);
			}
		}
		fwrite($myfile,"}");
		fclose($myfile);
	}
	
	function createBJSStructureLayer( $meshes , $option ){
		$myfile = fopen(STRUCTUREL_FILE, $option );
		generateWGLEditorCredits( $myfile );
		
		fwrite($myfile,"function settingTheStructureLayer( elements ){" . PHP_EOL);
		fwrite($myfile, "//Setting linear transformations" . PHP_EOL);
		foreach( $meshes as $name => $mesh ){
			fwrite($myfile, "// ########## " . $name . " ##########" . PHP_EOL);
			
			fwrite($myfile, "elements." . $name . 
					".translate(new BABYLON.Vector3" . $mesh["translate_world"] . ", 1, BABYLON.Space.WORLD);" . PHP_EOL);
			
			fwrite($myfile, "elements." . $name . ".rotation = new BABYLON.Vector3" . $mesh["rotate_world"] . ";" . PHP_EOL);
			fwrite($myfile, "elements." . $name . 
					".locallyTranslate(new BABYLON.Vector3" . $mesh["translate_local"] . ");" . PHP_EOL);
			if( $mesh["rotate_local"] != "( 0, 0, 0 )" ) {
				fwrite($myfile, "elements." . $name . 
						".rotate(new BABYLON.Vector3" . $mesh["rotate_local"] . ", 1, BABYLON.Space.LOCAL);" . PHP_EOL);
			}
			fwrite($myfile, "elements." . $name . ".scaling = new BABYLON.Vector3" . $mesh["scale"] . ";" . PHP_EOL);
			
			fwrite($myfile, PHP_EOL . PHP_EOL . PHP_EOL );
		}
		fwrite($myfile,"}");
		fclose($myfile);
	}
	
	function createBJSAppearanceLayer( $meshes , $option ){
		$myfile = fopen(APPEARANCEL_FILE, $option );
		generateWGLEditorCredits( $myfile );
		
		fwrite($myfile,"function settingTheAppearanceLayer( elements ){" . PHP_EOL);
		foreach( $meshes as $name => $mesh ){
			fwrite($myfile, "// ########## " . $name . " ##########" . PHP_EOL);
			fwrite($myfile,"elements." . $name . ".material = new BABYLON.StandardMaterial('" . $name . "Material',scene);" . PHP_EOL);
			fwrite($myfile, PHP_EOL . PHP_EOL );
			
			// Colors
			fwrite($myfile, "//Setting Colors" . PHP_EOL);
			$rgb = preg_split("/(rgb\(|,|\))/", $mesh["ambient_color"]);
			$ambientColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0); 
			fwrite($myfile,"elements." . $name . ".material.ambientColor = new BABYLON.Color3(" . $ambientColor . ");" . PHP_EOL);
			
			$rgb = preg_split("/(rgb\(|,|\))/", $mesh["diffuse_color"]);
			$diffuseColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0); 
			fwrite($myfile,"elements." . $name . ".material.diffuseColor = new BABYLON.Color3(" . $diffuseColor . ");" . PHP_EOL);
			
			$rgb = preg_split("/(rgb\(|,|\))/", $mesh["specular_color"]);
			$specularColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0); 
			fwrite($myfile,"elements." . $name . ".material.specularColor = new BABYLON.Color3(" . $specularColor . ");" . PHP_EOL);
			
			$rgb = preg_split("/(rgb\(|,|\))/", $mesh["emissive_color"]);
			$emissiveColor = (string) ($rgb[1]/255.0) . "," . (string) ($rgb[2]/255.0) . "," . (string) ($rgb[3]/255.0); 
			fwrite($myfile,"elements." . $name . ".material.emissiveColor = new BABYLON.Color3(" . $emissiveColor . ");" . PHP_EOL);
			
			fwrite($myfile, PHP_EOL . PHP_EOL );
			
			// Textures
			fwrite($myfile, "//Setting textures" . PHP_EOL);
			if( $mesh["ambient_procedural_texture"] != "none" ){
				$proceduralType = strtoupper($mesh["ambient_procedural_texture"][0]) 
						. substr($mesh["ambient_procedural_texture"], 1);
				
				fwrite($myfile,"elements." . $name . ".material.ambientTexture = new BABYLON." 
							. $proceduralType . "ProceduralTexture('" . $name . "-" . "ambient_procedural_texture" 
							. "', 1024, scene);" . PHP_EOL);
				
			}else if( $mesh["ambient_texture"] != ""){
				fwrite($myfile,"elements." . $name . ".material.ambientTexture = new BABYLON.Texture('" 
							. getUploadDirectory() . $mesh["ambient_texture"] . "',scene);" . PHP_EOL);
							
				fwrite($myfile,"elements." . $name . ".material.ambientTexture.uOffset = " . $mesh["u_offset_ambient"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.ambientTexture.vOffset = " . $mesh["v_offset_ambient"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.ambientTexture.uScale = " . $mesh["u_scale_ambient"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.ambientTexture.vScale = " . $mesh["v_scale_ambient"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.ambientTexture.wAng = " . $mesh["w_angle_ambient"] . ";" . PHP_EOL);
			}
			
			if( $mesh["diffuse_procedural_texture"] != "none" ){
				$proceduralType = strtoupper($mesh["diffuse_procedural_texture"][0]) 
						. substr($mesh["diffuse_procedural_texture"], 1);
				
				fwrite($myfile,"elements." . $name . ".material.diffuseTexture = new BABYLON." 
							. $proceduralType . "ProceduralTexture('" . $name . "-" . "diffuse_procedural_texture" 
							. "', 1024, scene);" . PHP_EOL);
				
			}else if( $mesh["diffuse_texture"] != ""){
				fwrite($myfile,"elements." . $name . ".material.diffuseTexture = new BABYLON.Texture('" 
							. getUploadDirectory() . $mesh["diffuse_texture"] . "',scene);" . PHP_EOL);
							
				fwrite($myfile,"elements." . $name . ".material.diffuseTexture.uOffset = " . $mesh["u_offset_diffuse"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.diffuseTexture.vOffset = " . $mesh["v_offset_diffuse"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.diffuseTexture.uScale = " . $mesh["u_scale_diffuse"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.diffuseTexture.vScale = " . $mesh["v_scale_diffuse"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.diffuseTexture.wAng = " . $mesh["w_angle_diffuse"] . ";" . PHP_EOL);
			}
			
			if( $mesh["specular_procedural_texture"] != "none" ){
				$proceduralType = strtoupper($mesh["specular_procedural_texture"][0]) 
						. substr($mesh["specular_procedural_texture"], 1);
				
				fwrite($myfile,"elements." . $name . ".material.specularTexture = new BABYLON." 
							. $proceduralType . "ProceduralTexture('" . $name . "-" . "specular_procedural_texture" 
							. "', 1024, scene);" . PHP_EOL);
				
			}else if( $mesh["specular_texture"] != ""){
				fwrite($myfile,"elements." . $name . ".material.specularTexture = new BABYLON.Texture('" 
							. getUploadDirectory() . $mesh["specular_texture"] . "',scene);" . PHP_EOL);
							
				fwrite($myfile,"elements." . $name . ".material.specularTexture.uOffset = " . $mesh["u_offset_specular"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.specularTexture.vOffset = " . $mesh["v_offset_specular"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.specularTexture.uScale = " . $mesh["u_scale_specular"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.specularTexture.vScale = " . $mesh["v_scale_specular"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.specularTexture.wAng = " . $mesh["w_angle_specular"] . ";" . PHP_EOL);
			}
			
			if( $mesh["emissive_procedural_texture"] != "none" ){
				$proceduralType = strtoupper($mesh["emissive_procedural_texture"][0]) 
						. substr($mesh["emissive_procedural_texture"], 1);
				
				fwrite($myfile,"elements." . $name . ".material.emissiveTexture = new BABYLON." 
							. $proceduralType . "ProceduralTexture('" . $name . "-" . "emissive_procedural_texture" 
							. "', 1024, scene);" . PHP_EOL);
				
			}else if( $mesh["emissive_texture"] != ""){
				fwrite($myfile,"elements." . $name . ".material.emissiveTexture = new BABYLON.Texture('" 
							. getUploadDirectory() . $mesh["emissive_texture"] . "',scene);" . PHP_EOL);
							
				fwrite($myfile,"elements." . $name . ".material.emissiveTexture.uOffset = " . $mesh["u_offset_emissive"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.emissiveTexture.vOffset = " . $mesh["v_offset_emissive"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.emissiveTexture.uScale = " . $mesh["u_scale_emissive"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.emissiveTexture.vScale = " . $mesh["v_scale_emissive"] . ";" . PHP_EOL);
				fwrite($myfile,"elements." . $name . ".material.emissiveTexture.wAng = " . $mesh["w_angle_emissive"] . ";" . PHP_EOL);
			}
			
			fwrite($myfile, PHP_EOL . PHP_EOL );
			
			// Setting wireframe, receiveShadows and visibility properties
			fwrite($myfile, "//Setting wireframe, receiveShadows and visibility properties" . PHP_EOL);
			fwrite($myfile,"elements." . $name . ".receiveShadows = " 
								. ($mesh["receive_shadows"] == "t" ? "true" : "false") . ";" . PHP_EOL);
			fwrite($myfile,"elements." . $name . ".material.wireframe = "
								. ($mesh["wireframe"] == "t" ? "true" : "false") . ";" . PHP_EOL);
			fwrite($myfile,"elements." . $name . ".visibility = " . $mesh["visibility"] . ";" . PHP_EOL);
			
			fwrite($myfile, PHP_EOL . PHP_EOL . PHP_EOL );
		}
		fwrite($myfile,"}");
		fclose($myfile);
	}
	
	function createBJSMotionLayer( $meshes , $option ){
		$myfile = fopen(MOTIONL_FILE, $option );
		generateWGLEditorCredits( $myfile );
		
		fwrite($myfile,"function settingTheMotionLayer( elements ){" . PHP_EOL);
		// Setting animations
		fwrite($myfile, "//Setting animations" . PHP_EOL);
		foreach( $meshes as $name => $mesh ){
			fwrite($myfile, "// ########## " . $name . " ##########" . PHP_EOL);

			$animations = unserialize($mesh["animations"]); #if animation is void then the result is the string value ""
			if( $animations != ""){ 
				fwrite($myfile, "elements." . $name . ".animations = [];". PHP_EOL);
			
				$minArray = array();
				$maxArray = array();
				foreach( $animations as $property => $animation ){
					if( array_key_exists("keys", $animation) ){
						$propertyClass = (preg_match("/^position|rotation|scaling$/", $property ) ? "Vector3" : "Color3" );
						// step 1/4
						fwrite($myfile, 
							"var " . $name . "_animation_" . str_replace(".","_",$property) . " = new BABYLON.Animation("
								. "'" . $name . "_animation_" . str_replace(".","_",$property) . "', " 
								. "'" . $property . "', "
								. "30, "
								. "BABYLON.Animation.ANIMATIONTYPE_" . strtoupper($propertyClass) . ", "
								. "BABYLON.Animation.ANIMATIONLOOPMODE_" . $animation["loop-mode"]
								. ");" . PHP_EOL );
						// step 2/4
						fwrite($myfile, "var " . $name . "_keys_" . str_replace(".","_",$property) . " = [];" . PHP_EOL);
						foreach( $animation["keys"] as $frame => $value ){
							fwrite($myfile, $name . "_keys_" . str_replace(".","_",$property) . ".push({frame:" . $frame . ",value: new BABYLON." . $propertyClass . $value . "});" . PHP_EOL);
						}
						fwrite($myfile, $name . "_animation_" . str_replace(".","_",$property) . ".setKeys(" . $name . "_keys_" . str_replace(".","_",$property) . ");" . PHP_EOL);
				
						// step 3/4
						fwrite($myfile, "elements." . $name . ".animations.push(". $name . "_animation_" . str_replace(".","_",$property) . ");" . PHP_EOL);
						
						array_push($minArray, min(array_keys($animation["keys"])));
						array_push($maxArray, max(array_keys($animation["keys"])));
					}
				}
				// step 4/4
				if( !empty($minArray) && !empty($maxArray) )
					fwrite($myfile,"scene.beginAnimation(" . "elements." . $name . ", " . min($minArray) . ", " . max($maxArray) . ", " . "true);" . PHP_EOL );
			}				
			fwrite($myfile, PHP_EOL . PHP_EOL . PHP_EOL );
		}

		// Setting physics
		fwrite($myfile, "//Setting physics" . PHP_EOL);
		foreach( $meshes as $name => $mesh ){
			fwrite($myfile, "// ########## " . $name . " ##########" . PHP_EOL);

			$physics = unserialize($mesh["physics"]);
			if( $physics["enable-physics"] == "true"){
				
				if( preg_match("/^box|plane|torus|disc$/", $mesh["type"]) ){
					$impostorType = "Box";
				} else if( $mesh["type"] == "sphere"){
					$impostorType = "Sphere";
				} else if( $mesh["type"] == "cylinder"){
					$impostorType = "Cylinder";
				}
 
				fwrite($myfile, "elements." . $name . ".physicsImpostor = new BABYLON.PhysicsImpostor(" 
								. "elements." . $name . ", "
								. "BABYLON.PhysicsImpostor." . $impostorType . "Impostor, "
								. "{}, "
								. "scene);" . PHP_EOL);
								
				fwrite($myfile, "elements." . $name . ".physicsImpostor.setLinearVelocity( new BABYLON.Vector3" . $physics["initial-linear-velocity"] . ");" . PHP_EOL);
				fwrite($myfile, "elements." . $name . ".physicsImpostor.setAngularVelocity( new BABYLON.Vector3" . $physics["initial-angular-velocity"] . ");" . PHP_EOL);
				fwrite($myfile, "elements." . $name . ".physicsImpostor.setParam( 'mass', " . $physics["mass"] . ");" . PHP_EOL);
				fwrite($myfile, "elements." . $name . ".physicsImpostor.setParam( 'friction', " . $physics["friction-coefficient"] . ");" . PHP_EOL);
				fwrite($myfile, "elements." . $name . ".physicsImpostor.setParam( 'restitution', " . $physics["restitution-coefficient"] . ");" . PHP_EOL);
			}
		}

		fwrite($myfile,"}" . PHP_EOL);
		fclose($myfile);
	}

	function updateBJSCode( $meshes ){
		createBJSScene("w");
		createBJSMeshes( $meshes , "w");		
		createBJSHierarchy(unserialize($_SESSION["tree"]));
		createBJSStructureLayer( $meshes, "w");
		createBJSAppearanceLayer( $meshes, "w");
		createBJSMotionLayer( $meshes, "w");
	}
	
?>

