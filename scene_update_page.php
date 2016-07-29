<?php
	session_start();
	
	require_once("./settings.php");
	require_once("./lib/SQL_utilities.php");
	require_once("./lib/scene_utilities.php");
	require_once("./lib/TreeUtilities.php");
	require_once("./lib/UploadFileUtilities.php");
	require_once("./lib/BJS_producer.php");	

	$_POST["name"] = "custom_scene";
	
	$scene = $_SESSION["scene"];
	
	// by specification of HTML5 developers, i.o.t. send the files data sheet it's needed to pass $_FILES["environment"], and not 
	// $_FILES["environment"]["skybox-folder"] (more intuitive option)
	if( is_directory_uploaded($_FILES["environment"], "skybox-folder", 6) ){
		$_POST["environment"]["has-skybox"] = true;
		$_POST["environment"]["skybox-extension"] = strchr($_FILES["environment"]["name"]["skybox-folder"][0], ".");
		
		// Renaming the skybox files: 
		//		old name: [xxx_]+(px|nx|...)\.(png|jpg|...)
		//		new name: skybox_(px|nx|...)\.(png|jpg|...)
		for($i=0; $i<6; $i++){				
			$_FILES["environment"]["name"]["skybox-folder"][$i] = "skybox" . strchr($_FILES["environment"]["name"]["skybox-folder"][$i], '_');
		}
		// by specification of HTML5 developers, i.o.t. send the files data sheet it's needed to pass $_FILES["environment"], and not 
		// $_FILES["environment"]["skybox-folder"] (more intuitive option)
		upload_directory_operation( $_FILES["environment"], "skybox-folder", 6 );
		
	} else {
		$_POST["environment"]["has-skybox"] = ( isset($_POST["environment"]["if-skybox-removed"]) ? false : $scene["environment"]["has-skybox"] );
		$_POST["environment"]["skybox-extension"] = ( isset($_POST["environment"]["if-skybox-removed"]) ? "" : $scene["environment"]["skybox-extension"] );
	}
	
	if(isset($_POST["environment"]["if-skybox-removed"])){
		unset($_POST["environment"]["if-skybox-removed"]);
	}
	
	#Updating scene
	$_SESSION["scene"] = $_POST;
	
	#Updating DB
	$_POST["environment"] = serialize($_POST["environment"]);
	$_POST["light_sources"] = serialize($_POST["light_sources"]);
	$_POST["camera"] = serialize($_POST["camera"]);
	$result = update( "scenes", $_POST, array( "name" => "custom_scene" ) );

	#Updating BJS code
	$meshes = get_elements( "meshes", array( "1" => "1" ) );
	updateBJSCode( $meshes );

	#Updating the notices strip
		if($result)
			$_SESSION["notice"] = "<h2 class=\"text-success text-right\" > Ok: <small> The scene has been correctly updated! </small></h2>";
		else
			$_SESSION["notice"] = "<h2 class=\"text-danger text-right\" > Error: <small> cannot update the scene. </small></h2>";
	
	header("Location: " . PROJ_FOLD_URL . "index.php#canvas-id");
?> 
