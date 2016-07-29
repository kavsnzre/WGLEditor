<div class="row text-center">
	<h3> Ambient. </h3>
</div>
<hr />
<div class="row">
	<div class="col-md-5 col-md-offset-1">
		<label for="appearance-ambient-color-container">Ambient color:</label>
		<div id="appearance-ambient-color-container" class="form-group input-group">
			<input type="text" class="form-control" name="ambient_color" id="appearance-ambient-color" value="rgb(200,55,55)" />
			<script>
			$("input#appearance-ambient-color").ColorPickerSliders({
			    placement: 'bottom',
			    swatches: false,
			    order: {
			      rgb: 1
			    }
			  });
			</script>
		</div>
		<hr />
		<label for="appearance-ambient-texture-container">Ambient Texture:</label>
		<div id="appearance-ambient-texture-container" class="form-group">
			<span class="glyphicon glyphicon-remove text-danger" onClick="removeUploadedTexture('ambient');"> </span>
			<img id="selected-ambient-texture" height="300" width="300"></img>
			<input 
				id="appearance-ambient-texture" 
				name="ambient_texture" 
				multiple 
				type="file" 
				class="file file-loading" 
				data-allowed-file-extensions='["png","jpg","gif","svg"]' >
			</input>
		</div>
		<hr />
		<label for="appearance-ambient-procedural-texture-container">Ambient Procedural Texture:</label>
		<div id="appearance-ambient-procedural-texture-container" class="form-group">
			<select class="form-control" name="ambient_procedural_texture" id="appearance-ambient-procedural-texture" 
				onchange="removeUploadedTexture('ambient');">
				
				<option>none</option>
				<option>brick</option>
				<option>cloud</option>
				<option>fire</option>
				<option>grass</option>
				<option>marble</option>
				<option>road</option>
				<option>starfield</option>
				<option>wood</option>
				
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<label for="appearance-u-offset-ambient-container">Translate the Ambient Texure w.r.t. the U-axis:</label>
		<div id="appearance-u-offset-ambient-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-u-offset-ambient" 
				type="text" 
				name="u_offset_ambient" 
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-u-offset-ambient-span"></span>
		</div>
		<label for="appearance-v-offset-ambient-container">Translate the Ambient Texure w.r.t. the V-axis:</label>
		<div id="appearance-v-offset-ambient-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-v-offset-ambient" 
				type="text" 
				name="v_offset_ambient"
				value="0" 
				autocomplete="off" 
				class="form-control"
				onKeyUp="structureLayerCheck()" 
				/>
			<span  id="appearance-v-offset-ambient-span"></span>
		</div>
		<label for="appearance-u-scale-ambient-container">Scale the Ambient Texure w.r.t. the U-axis:</label>
		<div id="appearance-u-scale-ambient-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-u-scale-ambient" 
				type="text" 
				name="u_scale_ambient"
				value="1"  
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-u-scale-ambient-span"></span>
		</div>
		<label for="appearance-v-scale-ambient-container">Scale the Ambient Texure w.r.t. the V-axis:</label>
		<div id="appearance-v-scale-ambient-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-v-scale-ambient" 
				type="text" 
				name="v_scale_ambient" 
				value="1" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-v-scale-ambient-span"></span>
		</div>
		<label for="appearance-w-angle-ambient-container">Rotate the Ambient Texure:</label>
		<div id="appearance-w-angle-ambient-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-w-angle-ambient" 
				type="text" 
				name="w_angle_ambient" 
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-w-angle-ambient-span"></span>
		</div>			
	</div>
</div>
<div class="row text-center">
	<h3> Diffuse. </h3>
</div>
<div class="row">
	<hr />
	<div class="col-md-5 col-md-offset-1">
		<label for="appearance-diffuse-color-container">Diffuse color:</label>
		<div id="appearance-diffuse-color-container" class="form-group input-group">
			<input type="text" class="form-control" name="diffuse_color" id="appearance-diffuse-color" value="rgb(200,55,55)" />
			<script>
			$("input#appearance-diffuse-color").ColorPickerSliders({
			    placement: 'bottom',
			    swatches: false,
			    order: {
			      rgb: 1
			    }
			  });
			</script>
		</div>
		<hr />
		<label for="appearance-diffuse-texture-container">Diffuse Texture:</label>
		<div id="appearance-diffuse-texture-container" class="form-group input-group">
			<span class="glyphicon glyphicon-remove text-danger" onClick="removeUploadedTexture('diffuse');"> </span>
			<img id="selected-diffuse-texture" height="300" width="300"></img>
			<input 
				id="appearance-diffuse-texture" 
				name="diffuse_texture" 
				multiple 
				type="file" 
				class="file file-loading" 
				data-allowed-file-extensions='["png","jpg","gif","svg"]'
				/>
		</div>
		<hr />
		<label for="appearance-diffuse-procedural-texture-container">Ambient Procedural Texture:</label>
		<div id="appearance-diffuse-procedural-texture-container" class="form-group">
			<select class="form-control" name="diffuse_procedural_texture" id="appearance-diffuse-procedural-texture" 
				onchange="removeUploadedTexture('diffuse');">
				
				<option>none</option>
				<option>brick</option>
				<option>cloud</option>
				<option>fire</option>
				<option>grass</option>
				<option>marble</option>
				<option>road</option>
				<option>starfield</option>
				<option>wood</option>
				
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<label for="appearance-u-offset-diffuse-container">Translate the Diffuse Texure w.r.t. the U-axis:</label>
		<div id="appearance-u-offset-diffuse-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-u-offset-diffuse" 
				type="text" 
				name="u_offset_diffuse" 
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-u-offset-diffuse-span"></span>
		</div>
		<label for="appearance-v-offset-diffuse-container">Translate the Diffuse Texure w.r.t. the V-axis:</label>
		<div id="appearance-v-offset-diffuse-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-v-offset-diffuse" 
				type="text" 
				name="v_offset_diffuse"
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-v-offset-diffuse-span"></span>
		</div>
		<label for="appearance-u-scale-diffuse-container">Scale the Diffuse Texure w.r.t. the U-axis:</label>
		<div id="appearance-u-scale-diffuse-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-u-scale-diffuse" 
				type="text" 
				name="u_scale_diffuse"
				value="1"  
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-u-scale-diffuse-span"></span>
		</div>
		<label for="appearance-v-scale-diffuse-container">Scale the Diffuse Texure w.r.t. the V-axis:</label>
		<div id="appearance-v-scale-diffuse-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-v-scale-diffuse" 
				type="text" 
				name="v_scale_diffuse" 
				value="1" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-v-scale-diffuse-span"></span>
		</div>
		<label for="appearance-w-angle-diffuse-container">Rotate the Diffuse Texure:</label>
		<div id="appearance-w-angle-diffuse-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-w-angle-diffuse" 
				type="text" 
				name="w_angle_diffuse" 
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-w-angle-diffuse-span"></span>
		</div>			
	</div>
</div>
<div class="row text-center">
	<h3> Specular. </h3>
</div>
<hr />
<div class="row">
	<div class="col-md-5 col-md-offset-1">
		<h4> Specular. </h4>
		<label for="appearance-specular-color-container">Specular color:</label>
		<div id="appearance-specular-color-container" class="form-group input-group">
			<input type="text" class="form-control" name="specular_color" id="appearance-specular-color" value="rgb(200,55,55)" />
			<script>
			$("input#appearance-specular-color").ColorPickerSliders({
			    placement: 'bottom',
			    swatches: false,
			    order: {
			      rgb: 1
			    }
			  });
			</script>
		</div>
		<hr />
		<label for="appearance-specular-texture-container">Specular Texture:</label>
		<div id="appearance-specular-texture-container" class="form-group input-group">
			<span class="glyphicon glyphicon-remove text-danger" onClick="removeUploadedTexture('specular');"> </span>
			<img id="selected-specular-texture" height="300" width="300"></img>
			<input 
				id="specular-ambient-texture" 
				name="specular_texture" 
				multiple 
				type="file" 
				class="file file-loading" 
				data-allowed-file-extensions='["png","jpg","gif","svg"]'
				/>
		</div>
		<hr />
		<label for="appearance-specular-procedural-texture-container">Specular Procedural Texture:</label>
		<div id="appearance-specular-specular-texture-container" class="form-group">
			<select class="form-control" name="specular_procedural_texture" id="appearance-specular-procedural-texture" 
				onchange="removeUploadedTexture('specular');">
				
				<option>none</option>
				<option>brick</option>
				<option>cloud</option>
				<option>fire</option>
				<option>grass</option>
				<option>marble</option>
				<option>road</option>
				<option>starfield</option>
				<option>wood</option>
				
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<label for="appearance-u-offset-specular-container">Translate the Specular Texure w.r.t. the U-axis:</label>
		<div id="appearance-u-offset-specular-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-u-offset-specular" 
				type="text" 
				name="u_offset_specular" 
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-u-offset-specular-span"></span>
		</div>
		<label for="appearance-v-offset-specular-container">Translate the Specular Texure w.r.t. the V-axis:</label>
		<div id="appearance-v-offset-specular-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-v-offset-specular" 
				type="text" 
				name="v_offset_specular"
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-v-offset-specular-span"></span>
		</div>
		<label for="appearance-u-scale-specular-container">Scale the Specular Texure w.r.t. the U-axis:</label>
		<div id="appearance-u-scale-specular-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-u-scale-specular" 
				type="text" 
				name="u_scale_specular"
				value="1"  
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-u-scale-specular-span"></span>
		</div>
		<label for="appearance-v-scale-specular-container">Scale the Specular Texure w.r.t. the V-axis:</label>
		<div id="appearance-v-scale-specular-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-v-scale-specular" 
				type="text" 
				name="v_scale_specular" 
				value="1" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-v-scale-specular-span"></span>
		</div>
		<label for="appearance-w-angle-specular-container">Rotate the Specular Texure:</label>
		<div id="appearance-w-angle-specular-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-w-angle-specular" 
				type="text" 
				name="w_angle_specular" 
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-w-angle-specular-span"></span>
		</div>			
	</div>
</div>
<div class="row text-center">
	<h3> Emissive. </h3>
</div>
<hr />
<div class="row">
	<div class="col-md-5 col-md-offset-1">
		<label for="appearance-emissive-color-container">Emissive color:</label>
		<div id="appearance-emissive-color-container" class="form-group input-group">
			<input type="text" class="form-control" name="emissive_color" id="appearance-emissive-color" value="rgb(0,0,0)" />
			<script>
			$("input#appearance-emissive-color").ColorPickerSliders({
			    placement: 'bottom',
			    swatches: false,
			    order: {
			      rgb: 1
			    }
			  });
			</script>
		</div>
		<hr />	
		<label for="appearance-emissive-texture-container">Emissive Texture:</label>
		<div id="appearance-emissive-texture-container" class="form-group input-group">
			<span class="glyphicon glyphicon-remove text-danger" onClick="removeUploadedTexture('emissive');"> </span>
			<img id="selected-emissive-texture" height="300" width="300"></img>
			<input 
				id="appearance-emissive-texture" 
				name="emissive_texture" 
				multiple 
				type="file" 
				class="file file-loading" 
				data-allowed-file-extensions='["png","jpg","gif","svg"]'
				/>
		</div>
		<hr />
		<label for="appearance-emissive-procedural-texture-container">Emissive Procedural Texture:</label>
		<div id="appearance-emissive-procedural-texture-container" class="form-group">
			<select class="form-control" name="emissive_procedural_texture" id="appearance-emissive-procedural-texture" 
				onchange="removeUploadedTexture('emissive');">
				
				<option>none</option>
				<option>brick</option>
				<option>cloud</option>
				<option>fire</option>
				<option>grass</option>
				<option>marble</option>
				<option>road</option>
				<option>starfield</option>
				<option>wood</option>
				
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<label for="appearance-u-offset-emissive-container">Translate the Emissive Texure w.r.t. the U-axis:</label>
		<div id="appearance-u-offset-emissive-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-u-offset-emissive" 
				type="text" 
				name="u_offset_emissive" 
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-u-offset-emissive-span"></span>
		</div>
		<label for="appearance-v-offset-emissive-container">Translate the Emissive Texure w.r.t. the V-axis:</label>
		<div id="appearance-v-offset-emissive-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-v-offset-emissive" 
				type="text" 
				name="v_offset_emissive"
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-v-offset-emissive-span"></span>
		</div>
		<label for="appearance-u-scale-emissive-container">Scale the Emissive Texure w.r.t. the U-axis:</label>
		<div id="appearance-u-scale-emissive-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-u-scale-emissive" 
				type="text" 
				name="u_scale_emissive"
				value="1"  
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-u-scale-emissive-span"></span>
		</div>
		<label for="appearance-v-scale-emissive-container">Scale the Emissive Texure w.r.t. the V-axis:</label>
		<div id="appearance-v-scale-emissive-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-v-scale-emissive" 
				type="text" 
				name="v_scale_emissive" 
				value="1" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-v-scale-emissive-span"></span>
		</div>
		<label for="appearance-w-angle-emissive-container">Rotate the Emissive Texure:</label>
		<div id="appearance-w-angle-emissive-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="appearance-w-angle-emissive" 
				type="text" 
				name="w_angle_emissive" 
				value="0" 
				autocomplete="off" 
				class="form-control" 
				onKeyUp="structureLayerCheck()"
				/>
			<span  id="appearance-w-angle-emissive-span"></span>
		</div>			
	</div>
</div>
<div class="row text-center">
	<h3> Other Properties. </h3>
</div>
<hr />
<div class="row">
	<div class="col-md-3 col-md-offset-1">
		<div id="appearance-wireframe-container" class="form-group input-group">
			<input 
				id="appearance-wireframe"
				style="width:20px; height:20px" <?php /* it doesn't work elsewhere*/ ?>
				type="checkbox" 
				class="form-control" 
				onchange = "
					   	document.getElementById('appearance-wireframe-hidden').value = 
										document.getElementById('appearance-wireframe').checked;
					   " 
				>&nbsp;&nbsp;The wireframe effect.
				<!-- there's not "name" attribute, therefore this input will not be posted-->
			</input>
			<input id="appearance-wireframe-hidden" type="hidden" name="wireframe" ></input>
			<script>
				document.getElementById('appearance-wireframe-hidden').value = 
										document.getElementById('appearance-wireframe').checked;
			</script>
		</div>
	</div>
	<div class="col-md-4">
		<div id="appearance-receive-shadows-container" class="form-group input-group">
			<input 
				id="appearance-receive-shadows"
				style="width:20px; height:20px" <?php /* it doesn't work elsewhere*/ ?>
				type="checkbox" 
				checked
				class="form-control" 
				onchange = "
					   	document.getElementById('appearance-receive-shadows-hidden').value = 
										document.getElementById('appearance-receive-shadows').checked;
					   " 
				>&nbsp;&nbsp;If this mesh receives shadows projected by the other meshes.
				<!-- there's not "name" attribute, therefore this input will not be posted-->
			</input>
			<input id="appearance-receive-shadows-hidden" type="hidden" name="receive_shadows"></input>
			<script>
				document.getElementById('appearance-receive-shadows-hidden').value = 
										document.getElementById('appearance-receive-shadows').checked;
			</script>
		</div>
	</div>
	<div class="col-md-4">
		<label for="appearance-visibility-container">Visibility:</label>
		<div id="appearance-visibility-container" class="form-group input-group">
			<input
			    id="appearance-visibility"
			    name="visibility"
			    type="text"
			    data-provide="slider"
			    data-slider-min="0"
			    data-slider-max="1"
			    data-slider-step="0.05"
			    data-slider-value="1" 
			>
		</div>
	</div>
</div>
