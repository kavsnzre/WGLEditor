//###################### CREDITS: #########################
//########## Creator: Michele Cirillo        ##############
//########## @: michelecirillo1993@gmail.com ##############
//########## Project Name: WGLEditor         ##############
//########## Date: June and July 2016        ##############
//########## For: I. Graphics Project        ##############
//########## Prof: Marco Schaerf             ##############
//#########################################################


function settingTheAppearanceLayer( elements ){
// ########## plane1 ##########
elements.plane1.material = new BABYLON.StandardMaterial('plane1Material',scene);


//Setting Colors
elements.plane1.material.ambientColor = new BABYLON.Color3(0.60392156862745,1,1);
elements.plane1.material.diffuseColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.plane1.material.specularColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.plane1.material.emissiveColor = new BABYLON.Color3(0,0,0);


//Setting textures
elements.plane1.material.ambientTexture = new BABYLON.CloudProceduralTexture('plane1-ambient_procedural_texture', 1024, scene);


//Setting wireframe, receiveShadows and visibility properties
elements.plane1.receiveShadows = true;
elements.plane1.material.wireframe = false;
elements.plane1.visibility = 1;



// ########## sphere1 ##########
elements.sphere1.material = new BABYLON.StandardMaterial('sphere1Material',scene);


//Setting Colors
elements.sphere1.material.ambientColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.sphere1.material.diffuseColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.sphere1.material.specularColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.sphere1.material.emissiveColor = new BABYLON.Color3(0,0,0);


//Setting textures
elements.sphere1.material.ambientTexture = new BABYLON.Texture('./img/uploaded_files/168313-sunraise.png',scene);
elements.sphere1.material.ambientTexture.uOffset = 0;
elements.sphere1.material.ambientTexture.vOffset = 0;
elements.sphere1.material.ambientTexture.uScale = 1;
elements.sphere1.material.ambientTexture.vScale = 1;
elements.sphere1.material.ambientTexture.wAng = 0;


//Setting wireframe, receiveShadows and visibility properties
elements.sphere1.receiveShadows = true;
elements.sphere1.material.wireframe = false;
elements.sphere1.visibility = 1;



// ########## torus1 ##########
elements.torus1.material = new BABYLON.StandardMaterial('torus1Material',scene);


//Setting Colors
elements.torus1.material.ambientColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.torus1.material.diffuseColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.torus1.material.specularColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.torus1.material.emissiveColor = new BABYLON.Color3(0,0,0);


//Setting textures


//Setting wireframe, receiveShadows and visibility properties
elements.torus1.receiveShadows = true;
elements.torus1.material.wireframe = false;
elements.torus1.visibility = 1;



// ########## plane2 ##########
elements.plane2.material = new BABYLON.StandardMaterial('plane2Material',scene);


//Setting Colors
elements.plane2.material.ambientColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.plane2.material.diffuseColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.plane2.material.specularColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.plane2.material.emissiveColor = new BABYLON.Color3(0,0,0);


//Setting textures


//Setting wireframe, receiveShadows and visibility properties
elements.plane2.receiveShadows = true;
elements.plane2.material.wireframe = false;
elements.plane2.visibility = 1;



// ########## box1 ##########
elements.box1.material = new BABYLON.StandardMaterial('box1Material',scene);


//Setting Colors
elements.box1.material.ambientColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.box1.material.diffuseColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.box1.material.specularColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.box1.material.emissiveColor = new BABYLON.Color3(0,0,0);


//Setting textures
elements.box1.material.diffuseTexture = new BABYLON.Texture('./img/uploaded_files/Alien.svg',scene);
elements.box1.material.diffuseTexture.uOffset = 0;
elements.box1.material.diffuseTexture.vOffset = 0;
elements.box1.material.diffuseTexture.uScale = 1;
elements.box1.material.diffuseTexture.vScale = 1;
elements.box1.material.diffuseTexture.wAng = Math.PI/4;


//Setting wireframe, receiveShadows and visibility properties
elements.box1.receiveShadows = true;
elements.box1.material.wireframe = false;
elements.box1.visibility = 1;



// ########## cylinder1 ##########
elements.cylinder1.material = new BABYLON.StandardMaterial('cylinder1Material',scene);


//Setting Colors
elements.cylinder1.material.ambientColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.cylinder1.material.diffuseColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.cylinder1.material.specularColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.cylinder1.material.emissiveColor = new BABYLON.Color3(0,0,0);


//Setting textures


//Setting wireframe, receiveShadows and visibility properties
elements.cylinder1.receiveShadows = true;
elements.cylinder1.material.wireframe = true;
elements.cylinder1.visibility = 1;



// ########## cone1 ##########
elements.cone1.material = new BABYLON.StandardMaterial('cone1Material',scene);


//Setting Colors
elements.cone1.material.ambientColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.cone1.material.diffuseColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.cone1.material.specularColor = new BABYLON.Color3(0.7843137254902,0.2156862745098,0.2156862745098);
elements.cone1.material.emissiveColor = new BABYLON.Color3(0,0,0);


//Setting textures


//Setting wireframe, receiveShadows and visibility properties
elements.cone1.receiveShadows = true;
elements.cone1.material.wireframe = false;
elements.cone1.visibility = 1;



}