//###################### CREDITS: #########################
//########## Creator: Michele Cirillo        ##############
//########## @: michelecirillo1993@gmail.com ##############
//########## Project Name: WGLEditor         ##############
//########## Date: June and July 2016        ##############
//########## For: I. Graphics Project        ##############
//########## Prof: Marco Schaerf             ##############
//#########################################################


function settingTheScene(basicScene, elements){

basicScene['camera'] = [];
basicScene['light_sources'] = []

// environment
scene.clearColor = new BABYLON.Color3(0.49803921568627,0.49803921568627,0.49803921568627);
// light sources
basicScene['light_sources']['directionalLight1'] = new BABYLON.DirectionalLight(
								'directionalLight1',
								new BABYLON.Vector3( 0, -1, 0 ),
								scene);
basicScene['light_sources']['directionalLight1'].diffuse = new BABYLON.Color3(0.79607843137255,1,1);
basicScene['light_sources']['directionalLight1'].specular = new BABYLON.Color3(1,1,0.63137254901961);
basicScene['light_sources']['spotLight1'] = new BABYLON.SpotLight(
								'spotLight1',
								new BABYLON.Vector3( 0, 10, 0 ),
								new BABYLON.Vector3( 0, -1, 0 ),Math.PI/3,1, 
								scene);
basicScene['light_sources']['spotLight1'].diffuse = new BABYLON.Color3(0.79607843137255,1,1);
basicScene['light_sources']['spotLight1'].diffuse = new BABYLON.Color3(1,1,0.63137254901961);
basicScene['light_sources']['spot33'] = new BABYLON.SpotLight(
								'spot33',
								new BABYLON.Vector3( 0, 5, 0 ),
								new BABYLON.Vector3( 0, -1, 0 ),Math.PI/6,2, 
								scene);
basicScene['light_sources']['spot33'].diffuse = new BABYLON.Color3(1,1,1);
basicScene['light_sources']['spot33'].diffuse = new BABYLON.Color3(1,1,1);
var spot33ShadowGenerator = new BABYLON.ShadowGenerator(
										1024,
										basicScene['light_sources']['spot33']);
spot33ShadowGenerator.getShadowMap().renderList = [];
for( var element in elements ){
spot33ShadowGenerator.getShadowMap().renderList.push(elements[element]);
}

scene.ambientColor = new BABYLON.Color3(1,1,0.86666666666667);
// camera
basicScene['camera'] = new BABYLON.FreeCamera(
										'freeCamera', new BABYLON.Vector3( -2, 2, 25 ), scene);
basicScene['camera'].setTarget(new BABYLON.Vector3( 0, 0, 0 ));
scene.activeCamera = basicScene['camera'];
scene.activeCamera.attachControl(canvas);

// physics
scene.enablePhysics(new BABYLON.Vector3(0,-9.81,0), new BABYLON.CannonJSPlugin());

return basicScene;
}