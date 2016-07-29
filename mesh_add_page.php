<?php
	session_start();	
	
	require_once("./settings.php");
	require_once("./lib/SQL_utilities.php");
	require_once("./lib/TreeUtilities.php");
	require_once("./lib/UploadFileUtilities.php");
require_once("./lib/BJS_producer.php");

	if( $_POST["animations"] != "" ){
		foreach( $_POST["animations"] as $property => $animation ){
			if( array_key_exists("keys", $_POST["animations"][$property]) )
				ksort($_POST["animations"][$property]["keys"]);
		}
	}
	$_POST["animations"] = serialize($_POST["animations"]); 
	
	$_POST["physics"] = serialize($_POST["physics"]); 

	$_POST["ambient_texture"] = is_file_uploaded($_FILES["ambient_texture"]) ? $_FILES["ambient_texture"]["name"] : "";
	$_POST["diffuse_texture"] = is_file_uploaded($_FILES["diffuse_texture"]) ? $_FILES["diffuse_texture"]["name"] : "";
	$_POST["specular_texture"] = is_file_uploaded($_FILES["specular_texture"]) ? $_FILES["specular_texture"]["name"] : "";
	$_POST["emissive_texture"] = is_file_uploaded($_FILES["emissive_texture"]) ? $_FILES["emissive_texture"]["name"] : "";

	$result = (!is_file_uploaded($_FILES["ambient_texture"]) || upload_file_operation( $_FILES["ambient_texture"] ) )
		&& (!is_file_uploaded($_FILES["diffuse_texture"]) || upload_file_operation( $_FILES["diffuse_texture"] ) )
		&& (!is_file_uploaded($_FILES["specular_texture"]) || upload_file_operation( $_FILES["specular_texture"] ) )
		&& (!is_file_uploaded($_FILES["emissive_texture"]) || upload_file_operation( $_FILES["emissive_texture"] ) )
		&& add( $_POST, "meshes" );

	if ( $result ){
		$_SESSION["notice"] = "<h2 class=\"text-success text-right\" > Ok! <small> <kbd>" . $_POST["name"] . "</kbd> added.</small></h2>";

		$_SESSION["tree"] = serialize(addNode($_POST["name"], $_POST["parent"], unserialize($_SESSION["tree"])));

		$meshes = get_elements( "meshes", array( "1" => "1" ) );
		updateBJSCode( $meshes );
	} else {
		$_SESSION["notice"] = "<h2 class=\"text-danger text-right\" > Error: <small> impossible adding <kbd>" . $_POST["name"] . "</kbd>.</small></h2>";
	}

	header("Location: " . PROJ_FOLD_URL . "index.php#canvas-id");
?>
