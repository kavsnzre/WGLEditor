var canvas = document.getElementById("canvas-id");
var engine = new BABYLON.Engine(canvas, true);
var scene = new BABYLON.Scene(engine);

mountScene();

function mountScene() {


	// Defining the elements of the scene
	var elements = [];
	settingElementsOfTheScene(elements);
	settingElementsHierarchy(elements);

	// Setting the scene
	var basicScene = [];
	settingTheScene(basicScene, elements);
	
	// Setting the Structure Layer	
	settingTheStructureLayer(elements);

	// Setting the Appearance Layer
	settingTheAppearanceLayer(elements);

	// Setting the Motion Layer
	settingTheMotionLayer(elements);
}

// Register a render loop to repeatedly render the scene
engine.runRenderLoop(function () {
	scene.render(); 
});

// Watch for browser/canvas resize events
window.addEventListener("resize", function () {
	engine.resize();
});
