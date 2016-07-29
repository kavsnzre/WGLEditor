//###################### CREDITS: #########################
//########## Creator: Michele Cirillo        ##############
//########## @: michelecirillo1993@gmail.com ##############
//########## Project Name: WGLEditor         ##############
//########## Date: June and July 2016        ##############
//########## For: I. Graphics Project        ##############
//########## Prof: Marco Schaerf             ##############
//#########################################################


function settingTheMotionLayer( elements ){
//Setting animations
// ########## plane1 ##########



// ########## sphere1 ##########



// ########## torus1 ##########
elements.torus1.animations = [];
var torus1_animation_material_specularColor = new BABYLON.Animation('torus1_animation_material_specularColor', 'material.specularColor', 30, BABYLON.Animation.ANIMATIONTYPE_COLOR3, BABYLON.Animation.ANIMATIONLOOPMODE_CYCLE);
var torus1_keys_material_specularColor = [];
torus1_keys_material_specularColor.push({frame:0,value: new BABYLON.Color3( 0, 0, 0 )});
torus1_keys_material_specularColor.push({frame:100,value: new BABYLON.Color3( 1,1,1 )});
torus1_animation_material_specularColor.setKeys(torus1_keys_material_specularColor);
elements.torus1.animations.push(torus1_animation_material_specularColor);
var torus1_animation_position = new BABYLON.Animation('torus1_animation_position', 'position', 30, BABYLON.Animation.ANIMATIONTYPE_VECTOR3, BABYLON.Animation.ANIMATIONLOOPMODE_CYCLE);
var torus1_keys_position = [];
torus1_keys_position.push({frame:0,value: new BABYLON.Vector3( 0, 0, 0 )});
torus1_keys_position.push({frame:50,value: new BABYLON.Vector3( -3, 0, 0 )});
torus1_keys_position.push({frame:100,value: new BABYLON.Vector3( 3, 0, 0 )});
torus1_animation_position.setKeys(torus1_keys_position);
elements.torus1.animations.push(torus1_animation_position);
scene.beginAnimation(elements.torus1, 0, 100, true);



// ########## plane2 ##########



// ########## box1 ##########



// ########## cylinder1 ##########
elements.cylinder1.animations = [];
var cylinder1_animation_material_emissiveColor = new BABYLON.Animation('cylinder1_animation_material_emissiveColor', 'material.emissiveColor', 30, BABYLON.Animation.ANIMATIONTYPE_COLOR3, BABYLON.Animation.ANIMATIONLOOPMODE_CONSTANT);
var cylinder1_keys_material_emissiveColor = [];
cylinder1_keys_material_emissiveColor.push({frame:0,value: new BABYLON.Color3( 0, 0, 0 )});
cylinder1_keys_material_emissiveColor.push({frame:100,value: new BABYLON.Color3( 1, 1, 1 )});
cylinder1_animation_material_emissiveColor.setKeys(cylinder1_keys_material_emissiveColor);
elements.cylinder1.animations.push(cylinder1_animation_material_emissiveColor);
var cylinder1_animation_scaling = new BABYLON.Animation('cylinder1_animation_scaling', 'scaling', 30, BABYLON.Animation.ANIMATIONTYPE_VECTOR3, BABYLON.Animation.ANIMATIONLOOPMODE_CYCLE);
var cylinder1_keys_scaling = [];
cylinder1_keys_scaling.push({frame:0,value: new BABYLON.Vector3( 1,1,1 )});
cylinder1_keys_scaling.push({frame:50,value: new BABYLON.Vector3( 1,3,1 )});
cylinder1_animation_scaling.setKeys(cylinder1_keys_scaling);
elements.cylinder1.animations.push(cylinder1_animation_scaling);
scene.beginAnimation(elements.cylinder1, 0, 100, true);



// ########## cone1 ##########
elements.cone1.animations = [];
var cone1_animation_material_ambientColor = new BABYLON.Animation('cone1_animation_material_ambientColor', 'material.ambientColor', 30, BABYLON.Animation.ANIMATIONTYPE_COLOR3, BABYLON.Animation.ANIMATIONLOOPMODE_RELATIVE);
var cone1_keys_material_ambientColor = [];
cone1_keys_material_ambientColor.push({frame:0,value: new BABYLON.Color3( 1, 1, 1 )});
cone1_keys_material_ambientColor.push({frame:100,value: new BABYLON.Color3( 0.7, 1, 1 )});
cone1_animation_material_ambientColor.setKeys(cone1_keys_material_ambientColor);
elements.cone1.animations.push(cone1_animation_material_ambientColor);
scene.beginAnimation(elements.cone1, 0, 100, true);



//Setting physics
// ########## plane1 ##########
// ########## sphere1 ##########
// ########## torus1 ##########
// ########## plane2 ##########
elements.plane2.physicsImpostor = new BABYLON.PhysicsImpostor(elements.plane2, BABYLON.PhysicsImpostor.BoxImpostor, {}, scene);
elements.plane2.physicsImpostor.setLinearVelocity( new BABYLON.Vector3( 0, 0, 0 ));
elements.plane2.physicsImpostor.setAngularVelocity( new BABYLON.Vector3( 0, 0, 0 ));
elements.plane2.physicsImpostor.setParam( 'mass', 0);
elements.plane2.physicsImpostor.setParam( 'friction', 0);
elements.plane2.physicsImpostor.setParam( 'restitution', 0.2);
// ########## box1 ##########
// ########## cylinder1 ##########
// ########## cone1 ##########
}
