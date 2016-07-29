<?php
session_start();
#session_unset();

require_once("./settings.php");
require_once("./lib/TreeUtilities.php");
require_once("./lib/SQL_utilities.php");
require_once("./lib/UploadFileUtilities.php");
require_once("./lib/BJS_producer.php");
require_once("./lib/scene_utilities.php");


if( !isset($_SESSION["if-mesh-add-submit"]) )
	$_SESSION["if-mesh-add-submit"] = "true";

if( !isset($_SESSION["if-mesh-update-and-remove-submits"]) )
	$_SESSION["if-mesh-update-and-remove-submits"] = ""; #false

if( !isset($_SESSION["first-time-done"]) ){
	$_SESSION["notice"] = "<h2 class=\"text-info text-right\" > Welcome: <small> create easly your 3D graphic! </small></h2>";
	
	$_SESSION["tree"] = serialize(initTree());

	$_SESSION["scene"] = initScene();

	$meshes = get_elements( "meshes", array( "1" => "1" ) );
	updateBJSCode( $meshes );

	$_SESSION["first-time-done"] = "true";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999" lang="en">	
	<head>
		<title>Home</title>
		<?php require("standard_page_components/standard_inclusions.php");?>
	</head>

	<body>
		<div id="menu">
			<?php require("standard_page_components/menu.php"); ?>
		</div>
		
		<div id="banner" class="container" >
			<?php	require("standard_page_components/banner.html"); ?>
		</div>	
		
		<div id="bodypage" class="container text-center">
			
			<div class="jumbotron">
					<?php require("standard_page_components/canvas.html"); ?>	
			</div>
			<div id="notices-strip-container">
				<?php require("standard_page_components/notices_strip.php"); ?>
			</div>
			<div class="jumbotron">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse-meshes-gui"> meshes GUI 
							<small>(hide/show) </small>
							</a>
						</h4>
					</div>
					<div id="collapse-meshes-gui" class="panel-collapse collapse in">
						<div class="panel-body text-left">
							<?php require("./GUI/mesh_data_sheet.php"); ?>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse-menu-navigator"> Navigator 
							<small>(hide/show) </small>
							</a>
						</h4>
					</div>
					<div id="collapse-menu-navigator" class="panel-collapse collapse">
						<div class="panel-body text-left">
							<?php require("GUI/scene_navigator.php"); ?>
						</div>
					</div>
				</div>
				<hr />
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse-camera-gui"> scene GUI 
							<small>(hide/show) </small>
							</a>
						</h4>
					</div>
					<div id="collapse-camera-gui" class="panel-collapse collapse">
						<div class="panel-body text-left">
							<?php require("./GUI/scene_data_sheet.php"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div id="footer" class="container">
			<?php require("standard_page_components/footer.html"); ?>
		</div>
	</body>
</html>
