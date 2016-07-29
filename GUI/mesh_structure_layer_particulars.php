<div class="col-md-4">
	<h4> Particulars. </h4>
	<div class="form-group">
		<label for="structure-type">Type:</label>
		<select class="form-control" name="type" id="structure-type" onchange="refreshMeshGUIAfterTypeChanged();">
			<option>box</option>
			<option>plane</option>
			<option>sphere</option>
			<option>cylinder</option>
			<option>torus</option>
			<option>disc</option>
		</select>
	</div>
	<hr />
	<label for="structure-name-container">Name:</label>
	<div id="structure-name-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-name" 
			type="text" 
			name="name" 
			autocomplete="off" 
			class="form-control" 
			placeholder="Name" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-name-span"></span>
	</div>
	<label for="structure-parent-container">Parent:</label>
	<div id="structure-parent-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-parent" 
			type="text" 
			name="parent" 
			value="Meshes" 
			autocomplete="off" 
			class="form-control" 
			placeholder="Name of the Parent" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-parent-span"></span>
	</div>
</div>
<div class="col-md-4">
	<h4> Geometrical Properties. </h4>
	<label for="structure-width-container">Width:</label>
	<div id="structure-width-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-width" 
			type="text" 
			name="width" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-width-span"></span>
	</div>
	<label for="structure-height-container">Height:</label>
	<div id="structure-height-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-height" 
			type="text" 
			name="height" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-height-span"></span>
	</div>
	<label for="structure-depth-container">Depth:</label>
	<div id="structure-depth-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-depth" 
			type="text" 
			name="depth" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-depth-span"></span>
	</div>
	<label for="structure-diameter-top-container">Diameter at the top:</label>
	<div id="structure-diameter-top-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-diameter-top" 
			type="text" 
			name="diameter_top" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-diameter-top-span"></span>
	</div>
	<label for="structure-diameter-bottom-container">Diameter at the bottom:</label>
	<div id="structure-diameter-bottom-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-diameter-bottom" 
			type="text" 
			name="diameter_bottom" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-diameter-bottom-span"></span>
	</div>
	<label for="structure-diameter-container">Diameter (general case):</label>
	<div id="structure-diameter-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-diameter" 
			type="text" 
			name="diameter" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-diameter-span"></span>
	</div>
	<label for="structure-radius">Radius:</label>
	<div id="structure-radius-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-radius" 
			type="text" 
			name="radius" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-radius-span"></span>
	</div>
	<label for="structure-thickness">Thickness:</label>
	<div id="structure-thickness-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-thickness" 
			type="text" 
			name="thickness" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-thickness-span"></span>
	</div>
	<label for="structure-tessellation">Tessellation:</label>
	<div id="structure-tessellation-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-tessellation" 
			type="text" 
			name="tessellation" 
			autocomplete="off" 
			class="form-control" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-tessellation-span"></span>
	</div>
</div>
<div class="col-md-4">
	<h4> Linear Transformations. </h4>
	<label for="structure-translate-world-container">Translate w.r.t. the World System:</label>
	<div id="structure-translate-world-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-translate-world" 
			type="text" 
			name="translate_world" 
			autocomplete="off" 
			class="form-control" 
			value="( 0, 0, 0 )"
			placeholder="( 0, 0, 0 )" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-translate-world-span"></span>
	</div>
	<label for="structure-rotate-world-container">Rotate w.r.t. the World System:</label>
	<div id="structure-rotate-world-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-rotate-world" 
			type="text" 
			name="rotate_world" 
			autocomplete="off" 
			class="form-control" 
			value="( 0, 0, 0 )"
			placeholder="( 0, 0, 0 )" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-rotate-world-span"></span>
	</div>
	<label for="structure-translate-local-container">Translate w.r.t. the Local System:</label>
	<div id="structure-translate-local-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-translate-local" 
			type="text" 
			name="translate_local" 
			autocomplete="off" 
			class="form-control" 
			value="( 0, 0, 0 )"
			placeholder="( 0, 0, 0 )" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-translate-local-span"></span>
	</div>
	<label for="structure-rotate-local-container">Rotate w.r.t. the Local System:</label>
	<div id="structure-rotate-local-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-rotate-local" 
			type="text" 
			name="rotate_local" 
			autocomplete="off" 
			class="form-control" 
			value="( 0, 0, 0 )"
			placeholder="( 0, 0, 0 )" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-rotate-local-span"></span>
	</div>
	<label for="structure-scale-container">Scale w.r.t. the Local System:</label>
	<div id="structure-scale-container" class="form-group input-group">
		<span class="input-group-addon glyphicon glyphicon-pencil"></span>
		<input 
			id="structure-scale" 
			type="text" 
			name="scale" 
			autocomplete="off" 
			class="form-control" 
			value="( 1, 1, 1 )"
			placeholder="( 1, 1, 1 )" 
			onKeyUp="structureLayerCheck()" />
		<span  id="structure-scale-span"></span>
	</div>
</div>
