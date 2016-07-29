<?php
	require_once("./lib/SQL_utilities.php");
	
	function initScene(){ 
		$scenes = get_elements( "scenes", array( "1" => "1" ) );

		if( array_key_exists("custom_scene", $scenes) ) {
			$custom_scene = $scenes["custom_scene"];
			$custom_scene["environment"] = unserialize($custom_scene["environment"]);
			$custom_scene["light_sources"] = unserialize($custom_scene["light_sources"]);
			$custom_scene["camera"] = unserialize($custom_scene["camera"]);
			return $custom_scene;
		} else {
			$default_scene = createDefaultScene();
			
			$default_scene_for_db = $default_scene;
			$default_scene_for_db["environment"] = serialize($default_scene_for_db["environment"]);
			$default_scene_for_db["light_sources"] = serialize($default_scene_for_db["light_sources"]);
			$default_scene_for_db["camera"] = serialize($default_scene_for_db["camera"]);
			add( $default_scene_for_db , "scenes");

			return $default_scene;
		}
	}

	function createDefaultScene(){
		$scene = array();

		$scene["name"] = "custom_scene";		

		$scene += ["environment" =>  array()];
		$scene["environment"] += ["background-color" => "rgb(127, 127, 127)"];
		$scene["environment"] += ["has-skybox" => false ];
		$scene["environment"] += ["skybox-extension" => "" ];

		$scene += ["light_sources" => array()];
		$scene["light_sources"] += ["ambient-light-color" => "rgb(255, 255, 255)"];
		$scene["light_sources"] += ["default_light" => array()];
		$scene["light_sources"]["default_light"] += ["type" => "directional"];
		$scene["light_sources"]["default_light"] += ["name" => "default_directional_light"];
		$scene["light_sources"]["default_light"] += ["direction" => "( 0, -1, 0 )"];
		$scene["light_sources"]["default_light"] += ["diffuse-light-color" => "rgb(255, 255, 255)"];
		$scene["light_sources"]["default_light"] += ["specular-light-color" => "rgb(255, 255, 255)"];
		$scene["light_sources"]["default_light"] += ["produce-shadows" => "false"];
		
		$scene += ["camera" =>  array()];
		$scene["camera"] += ["type" => "free"];
		$scene["camera"] += [ "free" => array() ];
		$scene["camera"]["free"] += ["eye-position" => "( -2, 2, 10 )"];
		$scene["camera"]["free"] += ["look-at-point" => "( 0, 0, 0 )"];
		$scene["camera"]["free"] += ["check-collisions" => "false"];
		$scene["camera"]["free"] += ["apply-gravity" => "false"];
					
		return $scene;
	}
?>

