//###################### CREDITS: #########################
//########## Creator: Michele Cirillo        ##############
//########## @: michelecirillo1993@gmail.com ##############
//########## Project Name: WGLEditor         ##############
//########## Date: June and July 2016        ##############
//########## For: I. Graphics Project        ##############
//########## Prof: Marco Schaerf             ##############
//#########################################################


function settingElementsHierarchy( elements ){
elements.cone1.parent = elements.sphere1;
elements.plane1.parent = elements.box1;
elements.torus1.parent = elements.box1;
}