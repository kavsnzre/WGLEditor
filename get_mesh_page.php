<?php
	session_start();	
	
	require_once("./settings.php");
	require_once("./lib/SQL_utilities.php");
	require_once("./lib/TreeUtilities.php");

	$result = get_elements( "meshes", array("name" => $_POST["name"]) )[$_POST["name"]];

	$_SESSION["selected-node"] = serialize($result);

	$_SESSION["notice"] = "<h2 class=\"text-success text-right\" > Ok: <small> here is <kbd>" . $_POST["name"] . "</kbd>.  </small></h2>";

	$_SESSION["if-mesh-add-submit"] = ""; #false
	$_SESSION["if-mesh-update-and-remove-submits"] = "true";
	
	header("Location: " . PROJ_FOLD_URL . "index.php#notices-strip-container");
?>
