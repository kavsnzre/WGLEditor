<div class="text-center">
	<h3> Actual State. </h3>
</div>
<div class="table-responsive text-center">
	<h5> Registered point lights. </h5>
	<table class="table">
		<thead><tr><th>Name</th><th>Position</th><th>Diffuse color</th><th>Specular color</th><th>Produce shadows</th></tr></thead>
	
		<tbody id="point-light-sources-tbody">
			
		</tbody>
	</table>
</div>
<hr />
<div class="table-responsive text-center">
	<h5> Registered directional lights. </h5>
	<table class="table">
		<thead><tr><th>Name</th><th>Direction</th><th>Diffuse color</th><th>Specular color</th><th>Produce shadows</th></tr></thead>
	
		<tbody id="directional-light-sources-tbody">
			
		</tbody>
	</table>
</div>
<hr />
<div class="table-responsive text-center">
	<h5> Registered spot lights. </h5>
	<table class="table">
		<thead><tr><th>Name</th><th>Position</th><th>Direction</th><th>c.o. angle</th><th>f.o. exponent</th><th>Diffuse color</th><th>Specular color</th><th>Produce shadows</th></tr></thead>
	
		<tbody id="spot-light-sources-tbody">
			
		</tbody>
	</table>
</div>
<hr />
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h5> Choosed ambient light color. </h5>
		<label for="scene-diffuse-light-color-container">Ambient light color:</label>
		<div id="scene-ambient-light-color-container" class="form-group input-group">
			<input 
				type="text" 
				class="form-control" 
				id="scene-ambient-light-color" 
				name="light_sources[ambient-light-color]" 
				/>
			<script>
			$("input#scene-ambient-light-color").ColorPickerSliders({
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
<hr />
<div class="text-center">
	<h3> Add a light source. </h3>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<label for="scene-camera-type">Light source type:</label>
			<select 
			class="form-control" 
			id="scene-light-source-type-selector" 
			onchange="refreshLightSourcesGUIAfterTypeChanged();">
				<option>point</option>
				<option>directional</option>
				<option>spot</option>
			</select>
		</div>
	</div>
</div>
<hr />
<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<label for="scene-diffuse-light-color-container">Diffuse light color:</label>
		<div id="scene-diffuse-light-color-container" class="form-group input-group">
			<input type="text" class="form-control" id="scene-diffuse-light-color" value="rgb(255, 255, 255)" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<script>
			$("input#scene-diffuse-light-color").ColorPickerSliders({
			    placement: 'bottom',
			    swatches: false,
			    order: {
			      rgb: 1
			    }
			  });
			</script>
		</div>
	</div>
	<div class="col-md-4 col-md-offset-1">
		<label for="scene-specular-light-color-container">Specular light color:</label>
		<div id="scene-specular-light-color-container" class="form-group input-group">
			<input type="text" class="form-control" id="scene-specular-light-color" value="rgb(255, 255, 255)"/>
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<script>
			$("input#scene-specular-light-color").ColorPickerSliders({
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
<div class="row">
	<div class="col-md-4 col-md-offset-1" >
		<div id="scene-produce-shadows-container" class="form-group input-group">
			<input 
				id="scene-produce-shadows"
				style="width:20px; height:20px" <?php /* it doesn't work elsewhere*/ ?>
				type="checkbox" 
				class="form-control" 
				>&nbsp;&nbsp;If this light source produces shadows.
			</input>
			<!-- there's not "name" attribute, therefore this input will not be posted-->
		</div>
	</div>
</div>
<hr />
<div class="row">
	<div class="col-md-3 col-md-offset-1 point-light-particulars">
		<h5> Add a new point light source: </h5>
		<label for="scene-point-light-name-container">Name:</label>
		<div id="scene-point-light-name-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-point-light-name" 
				type="text" 
				placeholder="Name"
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-point-light-name-span"></span>
		</div>
		<label for="scene-point-light-position-container">Position:</label>
		<div id="scene-point-light-position-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-point-light-position" 
				type="text" 
				value="( 0, 0, 0 )" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-point-light-position-span"></span>
		</div>
	</div>
	<div class="col-md-3 col-md-offset-1 directional-light-particulars">
		<h5> Add a new point light source: </h5>
		<label for="scene-directional-light-name-container">Name:</label>
		<div id="scene-directional-light-name-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-directional-light-name" 
				type="text" 
				placeholder="Name"
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-directional-light-name-span"></span>
		</div>
		<label for="scene-directional-light-direction-container">Direction:</label>
		<div id="scene-directional-light-direction-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-directional-light-direction" 
				type="text" 
				value="( 0, 0, 0 )" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-directional-light-direction-span"></span>
		</div>
	</div>
	<div class="col-md-3 col-md-offset-1 spot-light-particulars">
		<h5> Add a new point light source: </h5>
		<label for="scene-spot-light-name-container">Name:</label>
		<div id="scene-spot-light-name-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-spot-light-name" 
				type="text" 
				placeholder="Name"
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-spot-light-name-span"></span>
		</div>
		<label for="scene-spot-light-position-container">Position:</label>
		<div id="scene-spot-light-position-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-spot-light-position" 
				type="text" 
				value="( 0, 0, 0 )" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-spot-light-position-span"></span>
		</div>
		<label for="scene-spot-light-direction-container">Direction:</label>
		<div id="scene-spot-light-direction-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-spot-light-direction" 
				type="text" 
				value="( 0, 0, 0 )" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-spot-light-direction-span"></span>
		</div>
		<label for="scene-spot-light-cut-off-angle-container">Cut-Off Angle:</label>
		<div id="scene-spot-light-cut-off-angle-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-spot-light-cut-off-angle" 
				type="text" 
				value="0" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-spot-light-cut-off-angle-span"></span>
		</div>
		<label for="scene-spot-light-fall-off-exponent-container">Fall-Off Exponent:</label>
		<div id="scene-spot-light-fall-off-exponent-container" class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-pencil"></span>
			<input 
				id="scene-spot-light-fall-off-exponent" 
				type="text" 
				value="1" 
				autocomplete="off" 
				class="form-control"  
				onKeyUp="lightsCheck()" />
			<!-- there's not "name" attribute, therefore this input will not be posted-->
			<span  id="scene-spot-light-fall-off-exponent-span"></span>
		</div>
	</div>
</div>
<hr />
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<p style="font-size:13pt">For adding a light source click here when you have set all the needed light properties:&nbsp;&nbsp;
			<span 
			id="scene-light-add-botton" 
			class="glyphicon glyphicon-plus-sign text-success" 
			style="display: inline-block; width:40px; height:40px" 
			onClick="	
					var name;
					var properties = [];
					var type = document.getElementById('scene-light-source-type-selector').value;
					switch(type){
						case 'point':
							name = document.getElementById('scene-point-light-name').value;
							properties['position'] = document.getElementById('scene-point-light-position').value;
							properties['diffuse-light-color'] = 
									document.getElementById('scene-diffuse-light-color').value;
							properties['specular-light-color'] = 
									document.getElementById('scene-specular-light-color').value;
							properties['produce-shadows'] = 
									document.getElementById('scene-produce-shadows').checked;
							break;
						case 'directional':
							name = document.getElementById('scene-directional-light-name').value;
							properties['direction'] = document.getElementById('scene-directional-light-direction').value;
							properties['diffuse-light-color'] = 
									document.getElementById('scene-diffuse-light-color').value;
							properties['specular-light-color'] = 
									document.getElementById('scene-specular-light-color').value;
							properties['produce-shadows'] = 
									document.getElementById('scene-produce-shadows').checked;
							break;
						case 'spot':
							name = document.getElementById('scene-spot-light-name').value;
							properties['position'] = document.getElementById('scene-spot-light-position').value;
							properties['direction'] = document.getElementById('scene-spot-light-direction').value;
							properties['cut-off-angle'] = 
									document.getElementById('scene-spot-light-cut-off-angle').value;
							properties['fall-off-exponent'] = 
									document.getElementById('scene-spot-light-fall-off-exponent').value;
							properties['diffuse-light-color'] = 
									document.getElementById('scene-diffuse-light-color').value;
							properties['specular-light-color'] = 
									document.getElementById('scene-specular-light-color').value;
							properties['produce-shadows'] = 
									document.getElementById('scene-produce-shadows').checked;
							break;
					}
					addLightSource(name, type, properties);
				">
			</span></p>
		</div>
	</div>
</div>
<hr />
<script>
	function addLightSource(name, type, properties){
		
		var tbody = document.getElementById(type+'-light-sources-tbody');
		var tr = document.createElement('tr');
		
		switch(type){
			case "point":
				var td1 = document.createElement('td');
				td1.innerHTML = name;
				var td2 = document.createElement('td');
				td2.innerHTML = properties["position"];
				var td3 = document.createElement('td');
				td3.innerHTML = properties["diffuse-light-color"];
				var td4 = document.createElement('td');
				td4.innerHTML = properties["specular-light-color"];
				var td5 = document.createElement('td');
				td5.innerHTML = properties["produce-shadows"];
				var td6 = document.createElement('td');
				var removeLightSourceBotton = document.createElement('span');
				removeLightSourceBotton.setAttribute('class', 'glyphicon glyphicon-remove text-danger');
				removeLightSourceBotton.onclick = function(){ removeLightSource(type, this); };
				td6.appendChild(removeLightSourceBotton);
				
				var hidden1 = document.createElement('input');
				hidden1.setAttribute('type','hidden');
				hidden1.setAttribute('name', 'light_sources['+name+'][type]');
				hidden1.setAttribute('value', type);
				var hidden2 = document.createElement('input');
				hidden2.setAttribute('type','hidden');
				hidden2.setAttribute('name', 'light_sources['+name+'][position]');
				hidden2.setAttribute('value', properties["position"]);
				var hidden3 = document.createElement('input');
				hidden3.setAttribute('type','hidden');
				hidden3.setAttribute('name', 'light_sources['+name+'][diffuse-light-color]');
				hidden3.setAttribute('value', properties["diffuse-light-color"]);
				var hidden4 = document.createElement('input');
				hidden4.setAttribute('type','hidden');
				hidden4.setAttribute('name', 'light_sources['+name+'][specular-light-color]');
				hidden4.setAttribute('value', properties["specular-light-color"]);
				var hidden5 = document.createElement('input');
				hidden5.setAttribute('type','hidden');
				hidden5.setAttribute('name', 'light_sources['+name+'][produce-shadows]');
				hidden5.setAttribute('value', properties["produce-shadows"]);
				
				tr.appendChild(td1);
				tr.appendChild(td2);
				tr.appendChild(td3);
				tr.appendChild(td4);
				tr.appendChild(td5);
				tr.appendChild(td6);
				tr.appendChild(hidden1);
				tr.appendChild(hidden2);
				tr.appendChild(hidden3);
				tr.appendChild(hidden4);
				tr.appendChild(hidden5);

				break;
				/* an example:
					<tr>
						<td>N</td>
						<td>P</td>
						<td>DC</td>
						<td>SC</td>
						<td>
							<span class="glyphicon glyphicon-remove text-danger" onClick="..."></span>
						</td>
						<input type="hidden" name="light_sources[N][type]" value="T" ></input>
						<input type="hidden" name="light_sources[N][position]" value="P" ></input>
						<input type="hidden" name="light_sources[N][diffuse-light-color]" value="DLC" ></input>
						<input type="hidden" name="light_sources[N][specular-light-color]" value="SLC" ></input>
 
					</tr>
				*/
			case "directional":
				var td1 = document.createElement('td');
				td1.innerHTML = name;
				var td2 = document.createElement('td');
				td2.innerHTML = properties["direction"];
				var td3 = document.createElement('td');
				td3.innerHTML = properties["diffuse-light-color"];
				var td4 = document.createElement('td');
				td4.innerHTML = properties["specular-light-color"];
				var td5 = document.createElement('td');
				td5.innerHTML = properties["produce-shadows"];
				var td6 = document.createElement('td');
				var removeLightSourceBotton = document.createElement('span');
				removeLightSourceBotton.setAttribute('class', 'glyphicon glyphicon-remove text-danger');
				removeLightSourceBotton.onclick = function(){ removeLightSource(type, this); };
				td6.appendChild(removeLightSourceBotton);
				
				var hidden1 = document.createElement('input');
				hidden1.setAttribute('type','hidden');
				hidden1.setAttribute('name', 'light_sources['+name+'][type]');
				hidden1.setAttribute('value', type);
				var hidden2 = document.createElement('input');
				hidden2.setAttribute('type','hidden');
				hidden2.setAttribute('name', 'light_sources['+name+'][direction]');
				hidden2.setAttribute('value', properties["direction"]);
				var hidden3 = document.createElement('input');
				hidden3.setAttribute('type','hidden');
				hidden3.setAttribute('name', 'light_sources['+name+'][diffuse-light-color]');
				hidden3.setAttribute('value', properties["diffuse-light-color"]);
				var hidden4 = document.createElement('input');
				hidden4.setAttribute('type','hidden');
				hidden4.setAttribute('name', 'light_sources['+name+'][specular-light-color]');
				hidden4.setAttribute('value', properties["specular-light-color"]);
				var hidden5 = document.createElement('input');
				hidden5.setAttribute('type','hidden');
				hidden5.setAttribute('name', 'light_sources['+name+'][produce-shadows]');
				hidden5.setAttribute('value', properties["produce-shadows"]);
				
				tr.appendChild(td1);
				tr.appendChild(td2);
				tr.appendChild(td3);
				tr.appendChild(td4);
				tr.appendChild(td5);
				tr.appendChild(td6);
				tr.appendChild(hidden1);
				tr.appendChild(hidden2);
				tr.appendChild(hidden3);
				tr.appendChild(hidden4);
				tr.appendChild(hidden5);

				break;
				/* an example:
					<tr>
						<td>N</td>
						<td>D</td>
						<td>DC</td>
						<td>SC</td>
						<td>
							<span class="glyphicon glyphicon-remove text-danger" onClick="..."></span>
						</td>
						<input type="hidden" name="light_sources[N][type]" value="T" ></input>
						<input type="hidden" name="light_sources[N][direction]" value="D" ></input>
						<input type="hidden" name="light_sources[N][diffuse-light-color]" value="DLC" ></input>
						<input type="hidden" name="light_sources[N][specular-light-color]" value="SLC" ></input>
 
					</tr>
				*/
			case "spot":
				var td1 = document.createElement('td');
				td1.innerHTML = name;
				var td2 = document.createElement('td');
				td2.innerHTML = properties["position"];
				var td3 = document.createElement('td');
				td3.innerHTML = properties["direction"];
				var td4 = document.createElement('td');
				td4.innerHTML = properties["cut-off-angle"];
				var td5 = document.createElement('td');
				td5.innerHTML = properties["fall-off-exponent"];
				var td6 = document.createElement('td');
				td6.innerHTML = properties["diffuse-light-color"];
				var td7 = document.createElement('td');
				td7.innerHTML = properties["specular-light-color"];
				var td8 = document.createElement('td');
				td8.innerHTML = properties["produce-shadows"]
				var td9 = document.createElement('td');
				var removeLightSourceBotton = document.createElement('span');
				removeLightSourceBotton.setAttribute('class', 'glyphicon glyphicon-remove text-danger');
				removeLightSourceBotton.onclick = function(){ removeLightSource(type, this); };
				td9.appendChild(removeLightSourceBotton);
				
				var hidden1 = document.createElement('input');
				hidden1.setAttribute('type','hidden');
				hidden1.setAttribute('name', 'light_sources['+name+'][type]');
				hidden1.setAttribute('value', type);
				var hidden2 = document.createElement('input');
				hidden2.setAttribute('type','hidden');
				hidden2.setAttribute('name', 'light_sources['+name+'][position]');
				hidden2.setAttribute('value', properties["position"]);
				var hidden3 = document.createElement('input');
				hidden3.setAttribute('type','hidden');
				hidden3.setAttribute('name', 'light_sources['+name+'][direction]');
				hidden3.setAttribute('value', properties["direction"]);
				var hidden4 = document.createElement('input');
				hidden4.setAttribute('type','hidden');
				hidden4.setAttribute('name', 'light_sources['+name+'][cut-off-angle]');
				hidden4.setAttribute('value', properties["cut-off-angle"]);
				var hidden5 = document.createElement('input');
				hidden5.setAttribute('type','hidden');
				hidden5.setAttribute('name', 'light_sources['+name+'][fall-off-exponent]');
				hidden5.setAttribute('value', properties["fall-off-exponent"]);
				var hidden6 = document.createElement('input');
				hidden6.setAttribute('type','hidden');
				hidden6.setAttribute('name', 'light_sources['+name+'][diffuse-light-color]');
				hidden6.setAttribute('value', properties["diffuse-light-color"]);
				var hidden7 = document.createElement('input');
				hidden7.setAttribute('type','hidden');
				hidden7.setAttribute('name', 'light_sources['+name+'][specular-light-color]');
				hidden7.setAttribute('value', properties["specular-light-color"]);
				var hidden8 = document.createElement('input');
				hidden8.setAttribute('type','hidden');
				hidden8.setAttribute('name', 'light_sources['+name+'][produce-shadows]');
				hidden8.setAttribute('value', properties["produce-shadows"]);
				
				tr.appendChild(td1);
				tr.appendChild(td2);
				tr.appendChild(td3);
				tr.appendChild(td4);
				tr.appendChild(td5);
				tr.appendChild(td6);
				tr.appendChild(td7);
				tr.appendChild(td8);
				tr.appendChild(td9);
				tr.appendChild(hidden1);
				tr.appendChild(hidden2);
				tr.appendChild(hidden3);
				tr.appendChild(hidden4);
				tr.appendChild(hidden5);
				tr.appendChild(hidden6);
				tr.appendChild(hidden7);
				tr.appendChild(hidden8);

				break;
				/* an example:
					<tr>
						<td>N</td>
						<td>P</td>
						<td>D</td>
						<td>COA</td>
						<td>FOE</td>
						<td>DC</td>
						<td>SC</td>
						<td>
							<span class="glyphicon glyphicon-remove text-danger" onClick="..."></span>
						</td>
						<input type="hidden" name="light_sources[N][type]" value="T" ></input>
						<input type="hidden" name="light_sources[N][position]" value="P" ></input>
						<input type="hidden" name="light_sources[N][direction]" value="D" ></input>
						<input type="hidden" name="light_sources[N][cut-off-angle]" value="COA" ></input>
						<input type="hidden" name="light_sources[N][fall-off-exponent]" value="FOE" ></input>
						<input type="hidden" name="light_sources[N][diffuse-light-color]" value="DLC" ></input>
						<input type="hidden" name="light_sources[N][specular-light-color]" value="SLC" ></input>
 
					</tr>
				*/	
		}
		
		tbody.appendChild(tr);
	}
	
	function removeLightSource(type, botton){
		var tbody = document.getElementById(type+'-light-sources-tbody');
			
		tbody.removeChild(botton.parentElement.parentElement);

	}
</script>







 

