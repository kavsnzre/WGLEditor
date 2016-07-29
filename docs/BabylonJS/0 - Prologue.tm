<TeXmacs|1.99.4>

<style|tmbook>

<\body>
  <prologue>

  <section|The modular layer\Ubased approach.>

  <with|color|red|<with|font-shape|italic|(outstanding)>>

  <section|The basical structure of the code.>

  Basically you should build two files: <verbatim|basic.php> and
  <verbatim|basic.js>.

  The first file has the following code:

  <with|color|dark grey|<\verbatim-code>
    \<less\>!DOCTYPE html\<gtr\>

    \<less\>html xmlns="http://www.w3.org/1999/xhtml"\<gtr\>

    \;

    \<less\>head\<gtr\>

    \ \ \ \ \ \ \ \ \<less\>meta http-equiv="Content-Type"
    content="text/html; charset=utf-8"/\<gtr\>

    \ \ \ \ \ \ \ \ \<less\>title\<gtr\>BabylonJS Guide - The basical
    structure of the code\<less\>/title\<gtr\>

    \;

    \ \ \ \ \ \ \ \ \<less\>script src="./lib/babylon.js"\<gtr\>\<less\>/script\<gtr\>

    \ \ \ \ \ \ \ \ \<less\>script src="./lib/cannon.js"\<gtr\>\<less\>/script\<gtr\>
    \ \<less\>!-- physics engine --\<gtr\>

    \ \ \ \ \ \ \ \ \<less\>script src="./lib/Oimo.js"\<gtr\>\<less\>/script\<gtr\>
    \ \ \ \<less\>!-- physics engine --\<gtr\>

    \ \ \ \ \ \ \ \ \<less\>script src="./lib/hand.js"\<gtr\>\<less\>/script\<gtr\>
    \ \<less\>!--pointer events supporter--\<gtr\>

    \;

    \ \ \ \ \ \ \ \ \<less\>?php

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ $handle =
    opendir('./lib/ProceduralTexturesLibrary');

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ if ($handle) {

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ 

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ do {

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ $entry =
    readdir($handle);

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ if(
    !preg_match("/^.{1,2}$/", $entry) )

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ echo
    "\<less\>script src =\\"./lib/ProceduralTexturesLibrary/$entry\\"\<gtr\>\<less\>/script\<gtr\>\<less\>br
    /\<gtr\>";

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ } while ($entry);

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ 

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ closedir($handle);

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ } else {

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ echo "Not found
    ./lib/ProceduralTexturesLibrary";

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ }

    \ \ \ \ \ \ \ \ ?\<gtr\>

    \;

    \<less\>/head\<gtr\>

    \;

    \<less\>body\<gtr\>\ 

    \ \ \ \ \ \ \ \ \<less\>canvas id="CanvasID" width="400"
    height="400"\<gtr\>\<less\>/canvas\<gtr\>

    \ \ \ \ \ \ \ \ \<less\>script src="basic.js"\<gtr\>\<less\>/script\<gtr\>

    \<less\>/body\<gtr\>

    \;

    \<less\>/html\<gtr\>
  </verbatim-code>>

  <with|font-shape|italic|You'll never change this code>, unless you want
  change the dimentions of the <verbatim|canvas> element.

  It's worth to note that we have: <with|font-shape|italic|(A)> directly
  linked four fundamental scripts, <verbatim|babylon.js> (obviously),
  <verbatim|hand.js>, <verbatim|cannon.js>, and <verbatim|oimo.js>, that are
  stored into the <verbatim|./lib> directory; <with|font-shape|italic|(B)>
  indirectly linked all <verbatim|Javascript> scripts thst are stored into
  the <verbatim|./lib/ProceduralTexturesLibrary> directory by means a
  <verbatim|php> script.

  You can find this sources and more informations about them on the
  <verbatim|Web>, please refer to the <with|font-shape|italic|Useful links>
  section below.\ 

  \ 

  The second file has the following code:

  <with|color|dark grey|<\verbatim-code>
    var canvas = document.getElementById("CanvasID");

    var engine = new BABYLON.Engine(canvas, true);

    var scene = new BABYLON.Scene(engine);

    mountScene();

    \;

    function mountScene() {

    \;

    \ \ \ \ \ \ \ \ // Setting the Structure Layer

    \ \ \ \ \ \ \ \ // ...

    \;

    \ \ \ \ \ \ \ \ // Setting the Appearance Layer

    \ \ \ \ \ \ \ \ scene.clearColor = new BABYLON.Color3(0.5, 0.5, 0.5);

    \ \ \ \ \ \ \ \ var lights = setLights();

    \ \ \ \ \ \ \ \ //...

    \;

    \ \ \ \ \ \ \ \ // Setting the Motion Layer

    \ \ \ \ \ \ \ \ // ...

    \;

    \ \ \ \ \ \ \ \ // Setting the User Interaction Layer

    \ \ \ \ \ \ \ \ var camera = setCamera();

    \ \ \ \ \ \ \ \ // ...

    \;

    \ \ \ \ \ \ \ \ // Setting the Debug Layer (Optional)

    \ \ \ \ \ \ \ \ // ...

    };

    \;

    function setCamera(){

    \ \ \ \ \ \ \ \ var camera = new BABYLON.FreeCamera(

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ "camera", new
    BABYLON.Vector3(0, 5, -10), scene

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ );

    \ \ \ \ \ \ \ \ camera.setTarget(new BABYLON.Vector3(0, 0, 0));

    \ \ \ \ \ \ \ \ scene.activeCamera = camera; \ \ \ 

    \ \ \ \ \ \ \ \ camera.attachControl(canvas);

    \;

    \ \ \ \ \ \ \ \ return camera;

    }

    \;

    function setLights(){

    \ \ \ \ \ \ \ \ lights = new Array();

    \ \ \ \ \ \ \ \ 

    \ \ \ \ \ \ \ \ var light1 = new BABYLON.DirectionalLight(

    \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ \ "light1", new
    BABYLON.Vector3(0, -1, 0), scene);

    \ \ \ \ \ \ \ \ lights.push(light1);

    \ \ \ \ \ \ \ \ 

    \ \ \ \ \ \ \ \ return lights;

    }

    \;

    \;

    // Register a render loop to repeatedly render the scene

    engine.runRenderLoop(function () {

    \ \ \ \ \ \ \ \ scene.render();\ 

    });

    \;

    // Watch for browser/canvas resize events

    window.addEventListener("resize", function () {

    \ \ \ \ \ \ \ \ engine.resize();

    });
  </verbatim-code>>

  You should focus you attention by first on the functions
  <verbatim|mountScene> function, in which the scene will be mounted by
  following the modular layer\Ubased model presented above.

  For now just the minimal elements are insterted: the functions
  <verbatim|scene.clearColor = ...> and <verbatim|setLigths> build a naive
  <with|font-shape|italic|Appearance Layer>, whereas the instruction
  <verbatim|setCamera> builds a naive <with|font-shape|italic|Interaction
  Layer>.

  \;

  <with|font-shape|italic|The other written parts can be ignored: they will
  be ever present but you'll never modify them.>

  \;

  For now the result of this code is just an unuseful grey background, but it
  represents the starting point for creating good results.\ 

  <center|<\big-figure|<image|<tuple|<#89504E470D0A1A0A0000000D494844520000019000000190080600000080BF36CC0000000473424954080808087C086488000000097048597300000EC400000EC401952B0E1B0000059A49444154789CEDD5C10D803010C0B0B693DFE67406F24148F604F965CFCCB300E0A5F3750000FF642000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602406220002406024062200024060240622000240602407201E590059F26AFF35D0000000049454E44AE426082>|png>|400px|400px||>>
    \;

    Before (left) and after (right) <with|color|red|<with|font-shape|italic|<with|font-shape|italic|(after:
    outstanding)>>>
  </big-figure>>

  <section|Useful links (June 2016).>

  At the <with|font-shape|italic|URL> <with|font-shape|italic|https://github.com/BabylonJS/Babylon.js>
  in the <verbatim|dist> directory you can find the releases of the
  <verbatim|babylon.js>, the <verbatim|cannon.js> and the <verbatim|Oimo.js>
  file, whereas the <verbatim|proceduralTexturesLibrary/dist> contains all
  the files that we put into the <verbatim|./lib/ProceduralTexturesLibrary>
  directory.

  \;

  At the <with|font-shape|italic|URL> <with|font-shape|italic|https://handjs.codeplex.com/releases>
  you can find the release of the <verbatim|hand.js> file.

  \;

  At the <with|font-shape|italic|URL> <with|font-shape|italic|http://doc.babylonjs.com/>
  you can find the official documentation of <verbatim|BabylonJS>, that has
  been the main source of this manual. \ <verbatim|>

  \;

  <with|color|red|<with|font-shape|italic|(outstanding)>>
</body>

<\initial>
  <\collection>
    <associate|font-base-size|9>
  </collection>
</initial>

<\references>
  <\collection>
    <associate|auto-1|<tuple|?|?>>
    <associate|auto-2|<tuple|1|?>>
    <associate|auto-3|<tuple|2|?>>
    <associate|auto-4|<tuple|1|?>>
    <associate|auto-5|<tuple|3|?>>
  </collection>
</references>

<\auxiliary>
  <\collection>
    <\associate|figure>
      <\tuple|normal>
        \;

        Before (left) and after (right) <with|color|<quote|red>|<with|font-shape|<quote|italic>|<with|font-shape|<quote|italic>|(after:
        outstanding)>>>
      </tuple|<pageref|auto-4>>
    </associate>
    <\associate|toc>
      <vspace*|1fn><with|font-series|<quote|bold>|math-font-series|<quote|bold>|font-shape|<quote|small-caps>|Prologue>
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <pageref|auto-1><vspace|0.5fn>

      1.<space|2spc>The modular layer\Ubased approach.
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-2>

      2.<space|2spc>The basical structure of the code.
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-3>

      3.<space|2spc>Useful links (June 2016).
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-5>
    </associate>
  </collection>
</auxiliary>