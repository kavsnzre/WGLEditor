<meta charset="utf-8" ></meta>
<meta name="viewport" content="width=device-width, initial-scale=1" ></meta>

<!-- bootstrap -->
<link rel="stylesheet" href="./style/bootstrap.min.css" ></link>
<script src="./lib/jquery.min.js"></script>
<script src="./lib/bootstrap.min.js"></script>

<!-- bootstrap-tree (a tree.like boostrap-based structure) -->
<script src="./lib/bootstrap-tree.js"></script>
<link rel="stylesheet" href="./style/bootstrap-tree.css" ></link>

<!-- bootstrap-colorpickersliders (a boostrap-based color chooser) -->
<link rel="stylesheet" href="./style/bootstrap.colorpickersliders.min.css"></link>
<script src="./lib/bootstrap.colorpickersliders.min.js"></script>
<script src="./lib/tinycolor-min.js"></script>

<!-- bootstrap-fileinput (an advanced boostrap-based file chooser) -->
<link rel="stylesheet" href="./style/fileinput.css"></link>
<script src="./lib/fileinputLibrary/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="./lib/fileinputLibrary/plugins/sortable.min.js" type="text/javascript"></script>
<script src="./lib/fileinputLibrary/plugins/purify.min.js" type="text/javascript"></script>
<script src="./lib/fileinputLibrary/fileinput.js"></script>
<script src="./lib/fileinputLibrary/themes/gly/gly.js"></script>

<!-- bootstrap-slider ( a boostrap-based slider ) -->
<link rel="stylesheet" href="./style/bootstrap-slider.css"></link>
<script src="./lib/bootstrap-slider.js" type="text/javascript"></script>

<!-- custom --->
<script type="text/javascript" src="./lib/JsUtilities.js"></script>
<link rel="stylesheet" href="./style/custom_style.css" ></link>

<!-- babylon -->
<script src="./lib/babylon.js"></script>
<script src="./lib/hand.js"></script>	 <!--pointer events supporter-->
<script src="./lib/cannon.js"></script>  <!-- physics engine -->

<?php
	$handle = opendir('./lib/ProceduralTexturesLibrary');
	if ($handle) {
		
		do {
			$entry = readdir($handle);
			if( !preg_match("/^(|.{1,2})$/", $entry) )
				echo "<script src =\"./lib/ProceduralTexturesLibrary/$entry\"></script><br />";
		} while ($entry);
		
		closedir($handle);
	} else {
		echo "Not found ./lib/ProceduralTexturesLibrary";
	}
?>




