# Introduction
This project consists in an online visual editor for creating 3D graphics by using the **BabylonJS** library.

It has been developed for an academic examination, and for this reason it is avaliable on a *"demo version"* and it has been always used in a localhost mode.
For *"demo version"* we mean that there's not a GUI permitting you to load/import/export a project. In fact it keeps in memory just one project at time.

Here is a sample scene.
![sample_scene](https://cloud.githubusercontent.com/assets/18027256/17245194/a55079b4-5585-11e6-8047-6765e86080ee.png)

# Components
I developed a rich GUI that is organized into three collapsible panels, labeled *"Meshes GUI"*, *"Navigator"* and *"Scene GUI"*.

## *"Meshes GUI"*
This GUI component is organized into three tabbed panes:  
* *Structure Layer*, that includes all geometrical properties (e.g., hight , width, diameter ,
tessellation) of a mesh, its linear transformations (translation, rotation and scaling) and its
hierarchy relationships;
* *Appearance Layer*, that includes each property concerning the look of a mesh: its,
material, the 4 fundamental colors (ambient, diffuse, specular and emissive), the texturing,
the wireframe effect, the shadowing, the shading, the visibility, etc.
* *Motion Layer*, that includes both the animations and the physical mechanisms.

Here is an example, related to the selection of the ambient color, the ambient texture image, and the geometrical properties of the ambient texture image. 
![sample_mesh_GUI](https://cloud.githubusercontent.com/assets/18027256/17245954/58228156-5589-11e6-97c2-b36f241fba54.png)

Please note that in this example the contributes of the external projects "bootstrap-colorpickersliders" and "bootstrap-fileinput" (see below) appear.


## *"Navigator"*
This GUI component permits to browse easily the scene, by selecting its components for modifying or removing them.

![sample_navigator](https://cloud.githubusercontent.com/assets/18027256/17246965/d70b0122-558f-11e6-9158-6023a7f857f1.png)

Please note that its structure is coherent with rispect to the hierarchical relationships set among the meshes.

## *"Scene GUI"*
This GUI component includes the setting, namely: the lights, the camera, the panorama (by means the so called sky-box), the background color, the ambient color, the shadowing mechanism, etc.

Here is an example related to the selection of a sky-box.
![skybox_sample](https://cloud.githubusercontent.com/assets/18027256/17246713/2bf97e4a-558e-11e6-8d5a-444b498116ea.png)

Please note that even in this case the contribute of the external project "bootstrap-fileinput" (see below) appears.

# Getting Start (*Linux* only)
For using WGLEditor you have to:
* enable a PostgeSQL server: "systemctl start postgresql" (you have firstly to install the "postgresql" package)
* enable the PHP web server: "php -S localhost:4000"
* rewrite the constant parameters into "/WGLEditor/settings.php" in a convenient way (it depends on you)
* use PostgreSQL to create a new DB with the parameters written into "/WGLEditor/settings.php".
		e.g.: "host=localhost port=5432 dbname=WGLEditorDB user=michele"
* create the tables by using the following code: 
  *CREATE TABLE Meshes (
  "type" VARCHAR(20) NOT NULL,
  "name" VARCHAR(50) PRIMARY KEY,
  "parent" VARCHAR(50),
  "width" DOUBLE PRECISION,
  "height" DOUBLE PRECISION,
  "depth" DOUBLE PRECISION,
  "diameter_top" DOUBLE PRECISION,
  "diameter_bottom" DOUBLE PRECISION,
  "diameter" DOUBLE PRECISION,
  "radius" DOUBLE PRECISION,
  "thickness" DOUBLE PRECISION,
  "tessellation" INTEGER,
  "translate_world" TEXT NOT NULL,
  "rotate_world" TEXT NOT NULL,
  "translate_local" TEXT NOT NULL,
  "rotate_local" TEXT NOT NULL,
  "scale" TEXT NOT NULL,
  "ambient_color" VARCHAR(30),
  "ambient_texture" VARCHAR(500),
  "ambient_procedural_texture" TEXT,
  "u_offset_ambient" DOUBLE PRECISION,
  "v_offset_ambient" DOUBLE PRECISION,
  "u_scale_ambient" DOUBLE PRECISION,
  "v_scale_ambient" DOUBLE PRECISION,
  "w_angle_ambient" TEXT,
  "diffuse_color" VARCHAR(30),
  "diffuse_texture" VARCHAR(500),
  "diffuse_procedural_texture" TEXT,
  "u_offset_diffuse" DOUBLE PRECISION,
  "v_offset_diffuse" DOUBLE PRECISION,
  "u_scale_diffuse" DOUBLE PRECISION,
  "v_scale_diffuse" DOUBLE PRECISION,
  "w_angle_diffuse" TEXT,
  "specular_color" VARCHAR(30),
  "specular_texture" VARCHAR(500),
  "u_offset_specular" DOUBLE PRECISION,
  "specular_procedural_texture" TEXT,
  "v_offset_specular" DOUBLE PRECISION,
  "u_scale_specular" DOUBLE PRECISION,
  "v_scale_specular" DOUBLE PRECISION,
  "w_angle_specular" TEXT,
  "emissive_color" VARCHAR(30),
  "emissive_texture" VARCHAR(500),
  "emissive_procedural_texture" TEXT,
  "u_offset_emissive" DOUBLE PRECISION,
  "v_offset_emissive" DOUBLE PRECISION,
  "u_scale_emissive" DOUBLE PRECISION,
  "v_scale_emissive" DOUBLE PRECISION,
  "w_angle_emissive" TEXT,
  "wireframe" BOOLEAN,
  "receive_shadows" BOOLEAN,
  "visibility" DOUBLE PRECISION,
  "animations" TEXT,
  "physics" TEXT
);
CREATE TABLE Scenes (
  "name" TEXT PRIMARY KEY,
  "environment" TEXT,
  "light_sources" TEXT,
  "camera" TEXT
);*
* From now on you'll just browse the *index.php* page with your favourite browser
 e.g. browse *"http://localhost:4000/Scrivania/Interactive%20Graphics/WGLEditor/index.php"*

# Documentation
In the *docs* folder you can find:
* a brief guide on **BabylonJS** inspired to the official one (*"https://doc.babylonjs.com/"*), used for better learning the features of the library during the development of this project.
* the representation of the architecture of this project, plus some further informations

You can open the editable files **.tm** by means the **TeXmacs** scientific editor, avaliable here: *https://github.com/timy/texmacs*

# License
This code has been released with the **MIT license**.

# External dependencies
* BabylonJS: https://github.com/BabylonJS
* Bootstrap: http://www.w3schools.com/bootstrap  
* bootstrap-tree: https://github.com/jhfrench/bootstrap-tree
* Tree: https://github.com/nicmart/Tree 
* bootstrap-colorpickersliders: https://github.com/istvan-ujjmeszaros/bootstrap-colorpickersliders 		
* bootstrap-fileinput: https://github.com/kartik-v/bootstrap-fileinput  
* bootstrap-slider: https://github.com/seiyria/bootstrap-slider

You can find these quotations even at the project Web page, into the footer:
![footer](https://cloud.githubusercontent.com/assets/18027256/17247000/29c8f0a4-5590-11e6-8ae9-480cfe8820f5.png)
