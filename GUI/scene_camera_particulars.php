<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<label for="scene-camera-type">Camera type:</label>
			<select 
			class="form-control" 
			name="camera[type]" 
			id="scene-camera-type" 
			onchange="refreshCameraGUIAfterTypeChanged(); sceneCheck()">
				<option>free</option>
				<option>arc rotate</option>
			</select>
		</div>
	</div>
</div>
<hr />
<div class="row">
	<div class="col-md-4 col-md-offset-1 free-camera-particulars">
		<h5> Free Camera Particulars: </h5>
		<label for="scene-free-camera-eye-position-container">Eye Position (Cartesian coordinates):</label>
		<div id="scene-free-camera-eye-position-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-free-camera-eye-position" 
				type="text" 
				name="camera[free][eye-position]" 
				placeholder="e.g.: ( -2, 2, -10 )" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="sceneCheck()" />
			<span  id="scene-free-camera-eye-position-span"></span>
		</div>
		<label for="scene-free-camera-look-at-point-container">Look-at point:</label>
		<div id="scene-free-camera-look-at-point-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-free-camera-look-at-point" 
				type="text" 
				name="camera[free][look-at-point]" 
				placeholder="e.g.: ( 0, 0, 0 )" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="sceneCheck()" />
			<span  id="scene-free-camera-look-at-point-span"></span>
		</div>
		<div id="scene-free-camera-check-collisions-container" class="form-group input-group">
			<input 
				id="scene-free-camera-check-collisions"
				style="width:20px; height:20px" <?php /* it doesn't work elsewhere*/ ?>
				type="checkbox" 
				class="form-control" 
				onchange = "
					   	document.getElementById('scene-free-camera-check-collisions-hidden').value = 
										document.getElementById('scene-free-camera-check-collisions').checked;
					   " 
				>&nbsp;&nbsp; Enable collision system for the camera.
				<!-- there's not "name" attribute, therefore this input will not be posted-->
			</input>
			<input 
				id="scene-free-camera-check-collisions-hidden" 
				type="hidden" 
				name="camera[free][check-collisions]" 
				>
			</input>
			<script>
				document.getElementById('scene-free-camera-check-collisions-hidden').value = 
										document.getElementById('scene-free-camera-check-collisions').checked;
			</script>
		</div>
		<div id="scene-free-camera-apply-gravity-container" class="form-group input-group">
			<input 
				id="scene-free-camera-apply-gravity"
				style="width:20px; height:20px" <?php /* it doesn't work elsewhere*/ ?>
				type="checkbox" 
				class="form-control" 
				onchange = "
					   	document.getElementById('scene-free-camera-apply-gravity-hidden').value = 
										document.getElementById('scene-free-camera-apply-gravity').checked;
					   " 
				>&nbsp;&nbsp; Apply gravity to the camera.
				<!-- there's not "name" attribute, therefore this input will not be posted-->
			</input>
			<input 
				id="scene-free-camera-apply-gravity-hidden" 
				type="hidden" 
				name="camera[free][apply-gravity]" 
				>
			</input>
			<script>
				document.getElementById('scene-free-camera-apply-gravity-hidden').value = 
										document.getElementById('scene-free-camera-apply-gravity').checked;
			</script>
		</div>
	</div>
	<div class="col-md-4 col-md-offset-1 arc-rotate-camera-particulars">
		<h5> Arc-Rotate Camera Particulars: </h5>
		<label for="scene-arc-rotate-camera-eye-position-container">Eye Position (Spherical coordinates):</label>
		<div id="scene-arc-rotate-camera-eye-position-container" class="form-group input-group arc-rotate-camera-particular">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-arc-rotate-camera-eye-position" 
				type="text" 
				name="camera[arc-rotate][eye-position]" 
				placeholder="e.g.: ( -2, 2, -10 )"
				autocomplete="off" 
				class="form-control"  
				onKeyUp="sceneCheck()" />
			<span  id="scene-arc-rotate-camera-eye-position-span"></span>
		</div>
		<label for="scene-arc-rotate-camera-look-at-point-container">Look-at point:</label>
		<div id="scene-arc-rotate-camera-look-at-point-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-arc-rotate-camera-look-at-point" 
				type="text" 
				name="camera[arc-rotate][look-at-point]" 
				placeholder="e.g.: ( 0, 0, 0 )" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="sceneCheck()" />
			<span  id="scene-arc-rotate-camera-look-at-point-span"></span>
		</div>
	</div>
</div>

