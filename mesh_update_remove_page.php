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

	$selected_node = unserialize($_SESSION["selected-node"]);
	
	$_POST["ambient_texture"] = ( is_file_uploaded($_FILES["ambient_texture"]) ? $_FILES["ambient_texture"]["name"] 
					:  ( isset($_POST["if-ambient-texture-removed"]) ? "" 
						: $selected_node["ambient_texture"] ) );
	
	if(isset($_POST["if-ambient-texture-removed"])){
		unset($_POST["if-ambient-texture-removed"]);
	}
	

	$_POST["diffuse_texture"] = ( is_file_uploaded($_FILES["diffuse_texture"]) ? $_FILES["diffuse_texture"]["name"] 
					: ( isset($_POST["if-diffuse-texture-removed"]) ? "" 
						: $selected_node["diffuse_texture"] ) );
	if(isset($_POST["if-diffuse-texture-removed"])){
		unset($_POST["if-diffuse-texture-removed"]);
	}

	$_POST["specular_texture"] = ( is_file_uploaded($_FILES["specular_texture"]) ? $_FILES["specular_texture"]["name"] 
					: ( isset($_POST["if-specular-texture-removed"]) ? "" 
						: $selected_node["specular_texture"] ) );
	if(isset($_POST["if-specular-texture-removed"])){
		unset($_POST["if-specular-texture-removed"]);
	}

	$_POST["emissive_texture"] = ( is_file_uploaded($_FILES["emissive_texture"]) ? $_FILES["emissive_texture"]["name"] 
					: ( isset($_POST["if-emissive-texture-removed"]) ? "" 
						: $selected_node["emissive_texture"] ) );
	if(isset($_POST["if-emissive-texture-removed"])){
		unset($_POST["if-emissive-texture-removed"]);
	}

	$old_name = $selected_node["name"];
	$new_name = $_POST["name"];

	$if_update_or_remove = $_POST["option-submit-update-or-remove"];
	unset($_POST["option-submit-update-or-remove"]);

	if( $if_update_or_remove == "Update" ){

		# Updating the DB

		$condition = array("name" => $old_name);

		$result = update( "meshes", $_POST , $condition ) 
			&& update( "meshes", array("parent" => $new_name) , array("parent" => $old_name) );

		# Updating the tree

		$_SESSION["tree"] = serialize(initTree());

		# Updating the uploaded files directory

		if(is_file_uploaded($_FILES["ambient_texture"])){
			upload_file_operation( $_FILES["ambient_texture"] );
		}
		if(is_file_uploaded($_FILES["diffuse_texture"])){
			upload_file_operation( $_FILES["diffuse_texture"] );
		}
		if(is_file_uploaded($_FILES["specular_texture"])){
			upload_file_operation( $_FILES["specular_texture"] );
		}
		if(is_file_uploaded($_FILES["emissive_texture"])){
			upload_file_operation( $_FILES["emissive_texture"] );
		}
		 
		# Updating the notices strip
		if($result)
			$_SESSION["notice"] = "<h2 class=\"text-success text-right\" > Ok: <small> <kbd>" . $_POST["name"] . "</kbd> has been correctly updated! </small></h2>";
		else
			$_SESSION["notice"] = "<h2 class=\"text-danger text-right\" > Error: <small> cannot update <kbd>" . $_POST["name"] . "</kbd>. </small></h2>";

	} else {
		
		# Updating the DB

		$key = array("name" => $old_name);

		$condition = array("name" => $old_name);

		$descendants = getAllDescendantsWithPostOrder($old_name, unserialize($_SESSION["tree"]));
		$result = true;		
		foreach( $descendants as $name => $value ){
			$result = $result && (boolean) remove( "meshes", array( "name" => $name ) );
		}

		# Updating the tree
		$_SESSION["tree"] = serialize(removeNode($old_name , unserialize($_SESSION["tree"])));

		# Updating the notices strip
		if($result)
			$_SESSION["notice"] = "<h2 class=\"text-success text-right\" > Ok: <small> <kbd>" . $_POST["name"] . "</kbd> has been correctly removed! </small></h2>";
		else
			$_SESSION["notice"] = "<h2 class=\"text-danger text-right\" > Error: <small> cannot remove <kbd>" . $_POST["name"] . "</kbd>. </small></h2>";

	}
	
	#Updating $_SESSION

	unset($_SESSION["selected-node"]);
	$_SESSION["if-mesh-add-submit"] = "true"; 
	$_SESSION["if-mesh-update-and-remove-submits"] = ""; #false
	
	#Updating BJS code
	$meshes = get_elements( "meshes", array( "1" => "1" ) );
	updateBJSCode( $meshes );
	
	header("Location: " . PROJ_FOLD_URL . "index.php#canvas-id");
?>
