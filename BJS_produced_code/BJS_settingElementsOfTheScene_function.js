//###################### CREDITS: #########################
//########## Creator: Michele Cirillo        ##############
//########## @: michelecirillo1993@gmail.com ##############
//########## Project Name: WGLEditor         ##############
//########## Date: June and July 2016        ##############
//########## For: I. Graphics Project        ##############
//########## Prof: Marco Schaerf             ##############
//#########################################################


function settingElementsOfTheScene(elements){
elements.plane1 = BABYLON.MeshBuilder.CreateGround('plane1', {width : 1, height : 1}, scene);
elements.sphere1 = BABYLON.MeshBuilder.CreateSphere('sphere1', {diameter : 1}, scene);
elements.torus1 = BABYLON.MeshBuilder.CreateBox('torus1', {height : 1, width : 1, depth : 1}, scene);
elements.plane2 = BABYLON.MeshBuilder.CreateGround('plane2', {width : 20, height : 20}, scene);
elements.box1 = BABYLON.MeshBuilder.CreateBox('box1', {height : 1, width : 1, depth : 1}, scene);
elements.cylinder1 = BABYLON.MeshBuilder.CreateCylinder('cylinder1', {height : 2, diameterTop : 1, diameterBottom : 1, tessellation : 24}, scene);
elements.cone1 = BABYLON.MeshBuilder.CreateCylinder('cone1', {height : 2, diameterTop : 0, diameterBottom : 1, tessellation : 24}, scene);
return elements;
}