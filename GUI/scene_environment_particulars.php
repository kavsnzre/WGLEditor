<div class="row text-center">
	<h3> Background Color. </h3>
</div>
<hr />
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<label for="scene-background-color-container">Background color:</label>
		<div id="scene-background-color-container" class="form-group input-group">
			<input type="text" class="form-control" name="environment[background-color]" id="scene-background-color" />
			<script>
			$("input#scene-background-color").ColorPickerSliders({
			    placement: 'bottom',
			    swatches: false,
			    order: {
			      rgb: 1
			    }
			  });
			</script>
		</div>
	</div>
</div>
<div class="row text-center">
	<h3> Sky Box. </h3>
</div>
<hr />
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div id="scene-skybox-container" class="form-group">
			<label class="control-label">Select the Folder containing the skybox files.</label>
			<span class="glyphicon glyphicon-remove text-danger" onClick="removeUploadedSkyBoxTexture();"> </span>
			<div style="width:700px;">
				<img id="selected-skybox-px-texture" height="100" width="100"></img>
				<img id="selected-skybox-nx-texture" height="100" width="100"></img>
				<img id="selected-skybox-py-texture" height="100" width="100"></img>
				<img id="selected-skybox-ny-texture" height="100" width="100"></img>
				<img id="selected-skybox-pz-texture" height="100" width="100"></img>
				<img id="selected-skybox-nz-texture" height="100" width="100"></img>
			</div>
			<script>
				function removeUploadedSkyBoxTexture(){
					var px = document.getElementById('selected-skybox-px-texture');
					px.src=''; 
					var nx = document.getElementById('selected-skybox-nx-texture');
					nx.src='';
					var py = document.getElementById('selected-skybox-py-texture');
					py.src='';
					var ny = document.getElementById('selected-skybox-ny-texture');
					ny.src='';
					var pz = document.getElementById('selected-skybox-pz-texture');
					pz.src='';
					var nz = document.getElementById('selected-skybox-nz-texture');
					nz.src='';
	
					var hidden = document.createElement('input');
					hidden.setAttribute('type','hidden');
					hidden.setAttribute('name','environment[if-skybox-removed]');
					var container = document.getElementById('scene-skybox-container');
					container.appendChild(hidden);

				}
			</script>
			<input 
				id="scene-skybox" 
				name="environment[skybox-folder][]" 
				class="file-loading" 
				type="file" 
				multiple 
				webkitdirectory 
				data-allowed-file-extensions='["png","jpg","gif","svg"]'"></input>
			<script>
			$(document).on('ready', function() {
			    $("#scene-skybox").fileinput({
				browseLabel: 'Select Folder...'
			    });
			});
			</script>
		</div>
	</div>
</div>
<hr />
<div class="row">
	<div class="col-md-4 col-md-offset-1">
	</div>
</div>
