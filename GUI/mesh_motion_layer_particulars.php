<div id="animations-container">
	<div class="row text-center">
		<h3> Animations. </h3>
	</div>
	<div class="row">
		<div class="form-group col-md-4 col-md-offset-1" id="selector-container">
			<label> Property: </label>
			<select class="form-control" id="motion-animation-property-selector"> 
				<!-- there's not "name" attribute, therefore this input will not be posted-->
				<option>position</option>
				<option>rotation</option>
				<option>scaling</option>
				<option>material.ambientColor</option>
				<option>material.diffuseColor</option>
				<option>material.specularColor</option>
				<option>material.emissiveColor</option>
			</select>
			
			<p style="font-size:11pt">For adding an animation click here when you choosed the property:&nbsp;&nbsp;
			<span class="glyphicon glyphicon-plus-sign text-success" 
			style="display: inline-block; width:40px; height:40px" 
			onClick="addAnimationGUI(document.getElementById('motion-animation-property-selector').value);">
			</span></p>
		</div>
	</div>
	<script>
		// initializing "animations"
		var hidden = document.createElement('input');
		hidden.setAttribute('type','hidden');
		hidden.setAttribute('name', 'animations');
		hidden.setAttribute('value', '');
		
		var div = document.getElementById('selector-container');
		div.appendChild(hidden);
	</script>
	<script>
		function addAnimationGUI(property){
			var name = document.getElementById('structure-name').value;

			var animationsContainer = document.getElementById('animations-container');
			
			var animationContainer = document.createElement('div');
			animationContainer.setAttribute('id', 'animation-for-'+property+'container');
			animationsContainer.appendChild(animationContainer);
			
			var hr = document.createElement('hr');
			animationContainer.appendChild(hr);
		
			var removeAnimationBotton = document.createElement('span');
			removeAnimationBotton.setAttribute('class', 'glyphicon glyphicon-remove text-danger');
			removeAnimationBotton.onclick = function(){ removeAnimationGUI(property); };		
			var h5 = document.createElement('h5');
			h5.setAttribute('class','text-center');
			h5.innerHTML = 'Animation for "' + name + "." + property + '"';
			h5.appendChild(removeAnimationBotton);
			animationContainer.appendChild(h5);
			
			var div1 = document.createElement('div');
			div1.setAttribute('class','form-group');
			animationContainer.appendChild(div1);
			
			var label = document.createElement('label');
			label.innerHTML = 'Loop Mode:';
			div1.appendChild(label);
			
			var loopModeInput = document.createElement('select');
			loopModeInput.setAttribute('class', 'form-control');
			loopModeInput.setAttribute('style', 'width:300px;');
			loopModeInput.setAttribute('id', property+'-loop-mode-selector');
			loopModeInput.setAttribute('name', 'animations['+property+'][loop-mode]');
			var option1 = document.createElement('option');
			option1.innerHTML = 'CYCLE';
			loopModeInput.appendChild(option1);
			var option2 = document.createElement('option');
			option2.innerHTML = 'CONSTANT';
			loopModeInput.appendChild(option2);
			var option3 = document.createElement('option');
			option3.innerHTML = 'RELATIVE';
			loopModeInput.appendChild(option3);
			div1.appendChild(loopModeInput);
			
			var div2 = document.createElement('div');
			div2.setAttribute('class', 'table-responsive');
			div1.appendChild(div2);
			
			var table = document.createElement('table');
			table.setAttribute('class', 'table');
			div2.appendChild(table);
			
			var th1 = document.createElement('th');
			th1.innerHTML = '# Frame';
			var th2 = document.createElement('th');
			th2.innerHTML = 'Property Value';
			var trHead = document.createElement('tr');
			trHead.appendChild(th1);
			trHead.appendChild(th2);
			var thead = document.createElement('thead');
			thead.appendChild(trHead);
			table.appendChild(thead);
			
			var keyNumberInput = document.createElement('input');
			keyNumberInput.setAttribute('type', 'text');
			keyNumberInput.setAttribute('id', property+'-frame-number-cell');
			keyNumberInput.setAttribute('autocomplete', 'off');
			keyNumberInput.setAttribute('value', '0');
			var td1 = document.createElement('td');
			td1.appendChild(keyNumberInput);
			// there's not "name" attribute, therefore this input will not be posted
			var propertyValueInput = document.createElement('input');
			propertyValueInput.setAttribute('type', 'text');
			propertyValueInput.setAttribute('id', property+'-property-value-cell');
			propertyValueInput.setAttribute('value', '( 0, 0, 0 )');
			propertyValueInput.setAttribute('autocomplete', 'off');
			var td2 = document.createElement('td');
			td2.appendChild(propertyValueInput);
			// there's not "name" attribute, therefore this input will not be posted
			var trBody = document.createElement('tr');
			trBody.setAttribute('id', property + '-key-form');
			trBody.appendChild(td1);
			trBody.appendChild(td2);
			var tbody = document.createElement('tbody');
			tbody.setAttribute('id',property + '-keys');
			tbody.appendChild(trBody);
			table.appendChild(tbody);
			
			var newKeyBotton = document.createElement('span');
			newKeyBotton.setAttribute('class', 'glyphicon glyphicon-plus-sign text-success');
			newKeyBotton.onclick = function(){ 
							addKeyGUI(
								property, 
								document.getElementById(property+'-frame-number-cell').value,
								document.getElementById(property+'-property-value-cell').value
								);
							};
			var p = document.createElement('p');
			p.setAttribute('style','font-size:11pt;');
			p.innerHTML = 'Click here to add a key: ';
			p.appendChild(newKeyBotton);
			div2.appendChild(p);
		}
	</script>
	<!-- an example of what "addAnimationGUI()" creates:
	<div id="animation-for-P-container" >
		<hr/>
		<h5> Animation for "P"
			<span class="glyphicon glyphicon-remove text-danger" onClick="..."></span>
		</h5>
		<div class="form-group">
			<label> Loop Mode: </label>
			<select class="form-control" id="P-loop-mode-selector" name="animations[P][loop-mode]" style="width:300px;"> 
				<option>CYCLE</option>
				<option>CONSTANT</option>
				<option>RELATIVE</option>
			</select>
			<div class="table-responsive">
				<table class="table">
					<thead><tr><th># Frame</th><th>Property Value</th></tr></thead>
				
					<tbody id="P-keys">
						<tr id="P-key-form">
							<td><input id="P-frame-number-cell" type="text" value="0" autocomplete="off"></td>
							<td><input id="P-property-value-cell" type="text" value="( 0, 0, 0 )" autocomplete="off"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<p style="font-size:11pt"> Click here to add a key: 
				<span class="glyphicon glyphicon-plus-sign text-success" onClick="..."></span>
			</p>
		</div> 
	</div>-->		
	<script>
		function addKeyGUI(property, frameNumber, propertyValue){
			var name = document.getElementById('structure-name').value;
			var tbody = document.getElementById(property + '-keys');
		
			var td1 = document.createElement('td');
			td1.innerHTML = frameNumber;
			var td2 = document.createElement('td');
			td2.innerHTML = propertyValue;
			var td3 = document.createElement('td');
			var removeKeyBotton = document.createElement('span');
			removeKeyBotton.setAttribute('class', 'glyphicon glyphicon-remove text-danger');
			removeKeyBotton.onclick = function(){ removeKeyGUI(property, this); };
			td3.appendChild(removeKeyBotton);
			
			var hidden = document.createElement('input');
			hidden.setAttribute('type','hidden');
			hidden.setAttribute('name', 'animations[' + property + '][keys][' + frameNumber + ']');
			hidden.setAttribute('value', propertyValue);
			
			var tr = document.createElement('tr');
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(hidden);

			tbody.insertBefore(tr, document.getElementById(property + '-key-form'));
			
		}
	</script>
	<!-- an example of what "addKeyGUI()" creates:
		<tr>
			<td>FN</td>
			<td>PV</td>
			<td>
				<span class="glyphicon glyphicon-remove text-danger" onClick="..."></span>
			</td>
			<input type="hidden" name="animations[P][keys][FN]" value="PV" ></input> 
		</tr>
	-->	
	
	<script>
		function removeAnimationGUI( property ){
			var animationsContainer = document.getElementById('animations-container');
			
			var animationContainer = document.getElementById('animation-for-'+property+'container');
			
			animationsContainer.removeChild(animationContainer);
		}
		
		function removeKeyGUI( property, botton ){
			var tbody = document.getElementById(property+'-keys');
			
			tbody.removeChild(botton.parentElement.parentElement);
		}
	</script>
</div>
<hr />
<div id="physics-container">
	<div class="row text-center">
		<h3> Physics. </h3>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<div class="form-group input-group">	
				<input 
					id="motion-enable-physics"
					style="width:20px; height:20px" <?php /* it doesn't work elsewhere*/ ?>
					type="checkbox" 
					class="form-control" 
					onchange = "setPhysicsGUIState(); structureLayerCheck();" 
					>&nbsp;&nbsp;Enable physics for this mesh.
				</input>
				<!-- there's not "name" attribute, therefore this input will not be posted-->
				<input id="motion-enable-physics-hidden" type="hidden" name="physics[enable-physics]"></input>
			</div>
		</div>
		<div class="col-md-4">
			<label for="motion-mass-container">Mass:</label>
			<div id="motion-mass-container" class="form-group input-group">
				<span class="input-group-addon glyphicon glyphicon-pencil"></span>
				<input 
					id="motion-mass" 
					type="text" 
					name="physics[mass]" 
					value="0"
					autocomplete="off" 
					class="form-control" 
					onKeyUp="structureLayerCheck()"
					/>
				<span  id="motion-mass-span"></span>
			</div>
			<label for="motion-friction-coefficient-container">Friction Coefficient:</label>
			<div id="motion-friction-coefficient-container" class="form-group input-group">
				<span class="input-group-addon glyphicon glyphicon-pencil"></span>
				<input 
					id="motion-friction-coefficient" 
					type="text" 
					name="physics[friction-coefficient]"
					value="0"
					autocomplete="off" 
					class="form-control" 
					onKeyUp="structureLayerCheck()"
					/>
				<span  id="motion-friction-coefficient-span"></span>
			</div>
			<label for="motion-restitution-coefficient-container">Restitution Coefficient:</label>
			<div id="motion-restitution-coefficient-container" class="form-group input-group">
				<span class="input-group-addon glyphicon glyphicon-pencil"></span>
				<input 
					id="motion-restitution-coefficient" 
					type="text" 
					name="physics[restitution-coefficient]"
					value="0"
					autocomplete="off" 
					class="form-control" 
					onKeyUp="structureLayerCheck()"
					/>
				<span  id="motion-restitution-coefficient-span"></span>
			</div>
			<label for="motion-initial-linear-velocity-container">Initial Linear Velocity:</label>
			<div id="motion-initial-linear-velocity-container" class="form-group input-group">
				<span class="input-group-addon glyphicon glyphicon-pencil"></span>
				<input 
					id="motion-initial-linear-velocity" 
					type="text" 
					name="physics[initial-linear-velocity]"
					value="( 0, 0, 0 )"
					autocomplete="off" 
					class="form-control" 
					onKeyUp="structureLayerCheck()"
					/>
				<span  id="motion-initial-linear-velocity-span"></span>
			</div>
			<label for="motion-initial-angular-velocity-container">Initial Angular Velocity:</label>
			<div id="motion-initial-angular-velocity-container" class="form-group input-group">
				<span class="input-group-addon glyphicon glyphicon-pencil"></span>
				<input 
					id="motion-initial-angular-velocity" 
					type="text" 
					name="physics[initial-angular-velocity]" 
					value="( 0, 0, 0 )" 
					autocomplete="off" 
					class="form-control" 
					onKeyUp="structureLayerCheck()"
					/>
				<span  id="motion-initial-angular-velocity-span"></span>
			</div>
		</div>
		<script>	
			function setPhysicsGUIState(){ 
				var enablePhysicsCheckBox = document.getElementById('motion-enable-physics');
				var hidden = document.getElementById('motion-enable-physics-hidden');
			
				var mass = document.getElementById('motion-mass');
				var frictionCoefficient = document.getElementById('motion-friction-coefficient');
				var restitutionCoefficient = document.getElementById('motion-restitution-coefficient');
				var initialLinearVelocity = document.getElementById('motion-initial-angular-velocity');
				var initialAngularVelocity = document.getElementById('motion-initial-linear-velocity');
			
				mass.disabled = !enablePhysicsCheckBox.checked;
				mass.value = enablePhysicsCheckBox.checked ? mass.value : "";
				frictionCoefficient.disabled = !enablePhysicsCheckBox.checked;
				frictionCoefficient.value = enablePhysicsCheckBox.checked ? frictionCoefficient.value : "";
				restitutionCoefficient.disabled = !enablePhysicsCheckBox.checked;
				restitutionCoefficient.value = enablePhysicsCheckBox.checked ? restitutionCoefficient.value : "";
				initialLinearVelocity.disabled = !enablePhysicsCheckBox.checked;
				initialLinearVelocity.value = enablePhysicsCheckBox.checked ? initialLinearVelocity.value : "";
				initialAngularVelocity.disabled = !enablePhysicsCheckBox.checked;
				initialAngularVelocity.value = enablePhysicsCheckBox.checked ? initialAngularVelocity.value : "";
			
				hidden.value = enablePhysicsCheckBox.checked; 
			}
		
			setPhysicsGUIState();
		</script>
	</div>
</div>
