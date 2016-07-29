//###################### CREDITS: #########################
//########## Creator: Michele Cirillo        ##############
//########## @: michelecirillo1993@gmail.com ##############
//########## Project Name: WGLEditor         ##############
//########## Date: June and July 2016        ##############
//########## For: I. Graphics Project        ##############
//########## Prof: Marco Schaerf             ##############
//#########################################################


function settingTheStructureLayer( elements ){
//Setting linear transformations
// ########## plane1 ##########
elements.plane1.translate(new BABYLON.Vector3( -3, 0, 0 ), 1, BABYLON.Space.WORLD);
elements.plane1.rotation = new BABYLON.Vector3( 0, 0, 0 );
elements.plane1.locallyTranslate(new BABYLON.Vector3( 0, 0, 0 ));
elements.plane1.scaling = new BABYLON.Vector3( 1, 1, 1 );



// ########## sphere1 ##########
elements.sphere1.translate(new BABYLON.Vector3( 3, 0, 0 ), 1, BABYLON.Space.WORLD);
elements.sphere1.rotation = new BABYLON.Vector3( 0, 0, 0 );
elements.sphere1.locallyTranslate(new BABYLON.Vector3( 0, 0, 0 ));
elements.sphere1.scaling = new BABYLON.Vector3( 1, 1, 1 );



// ########## torus1 ##########
elements.torus1.translate(new BABYLON.Vector3( 0, -3, 0 ), 1, BABYLON.Space.WORLD);
elements.torus1.rotation = new BABYLON.Vector3( Math.PI*1, 0, 0 );
elements.torus1.locallyTranslate(new BABYLON.Vector3( 0, 0, 0 ));
elements.torus1.scaling = new BABYLON.Vector3( 1, 1, 1 );



// ########## plane2 ##########
elements.plane2.translate(new BABYLON.Vector3( 0, -5, 0 ), 1, BABYLON.Space.WORLD);
elements.plane2.rotation = new BABYLON.Vector3( 0, 0, 0 );
elements.plane2.locallyTranslate(new BABYLON.Vector3( 0, 0, 0 ));
elements.plane2.scaling = new BABYLON.Vector3( 1, 1, 1 );



// ########## box1 ##########
elements.box1.translate(new BABYLON.Vector3( 0, 0, 0 ), 1, BABYLON.Space.WORLD);
elements.box1.rotation = new BABYLON.Vector3( 0, 0, 0 );
elements.box1.locallyTranslate(new BABYLON.Vector3( 0, 0, 0 ));
elements.box1.scaling = new BABYLON.Vector3( 1, 1, 1 );



// ########## cylinder1 ##########
elements.cylinder1.translate(new BABYLON.Vector3( 3, -3, 0 ), 1, BABYLON.Space.WORLD);
elements.cylinder1.rotation = new BABYLON.Vector3( 0, 0, 0 );
elements.cylinder1.locallyTranslate(new BABYLON.Vector3( 0, 0, 0 ));
elements.cylinder1.scaling = new BABYLON.Vector3( 1, 1, 1 );



// ########## cone1 ##########
elements.cone1.translate(new BABYLON.Vector3( 0, 3, 0 ), 1, BABYLON.Space.WORLD);
elements.cone1.rotation = new BABYLON.Vector3( 0, 0, 0 );
elements.cone1.locallyTranslate(new BABYLON.Vector3( 0, 0, 0 ));
elements.cone1.scaling = new BABYLON.Vector3( 1, 1, 1 );



}