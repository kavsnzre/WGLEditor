<TeXmacs|1.99.4>

<style|tmbook>

<\body>
  \ 

  <paragraph|Prologue>

  Lettera al lettore

  \;

  Innanzitutto presentare le fonti: le pagine del sito: tutorial, classes,
  ecc ecc

  \;

  Parlare dello schema generico del codice: la funzione createScene, quella
  delle telecamere, delle luci ecc.

  + il debug layer: https://doc.babylonjs.com/tutorials/Using_the_Debug_Layer

  <paragraph|Structure>

  \ \ \ \ \ \ \ \ SCHELETRI (extra):\ 

  Il discorso è un po' oltre quello di cui ho bisogno. Alla fine gli oggetti
  gerarchici li sai creare!

  In ogni caso lascio il link del tutorial e quell di un codice di esempio:

  - https://doc.babylonjs.com/tutorials/How_to_use_Bones_and_Skeletons

  - http://www.babylonjs-playground.com/#11BH6Z#0

  \;

  RENDERING GROUPS (extra)

  /*To use rendering groups, you simply need to set the property
  .renderingGroupId on the objects you want to put in other layers than the
  default one (which has the ID of 0).

  \;

  This property exists on meshes, particle systems and sprite managers.

  \;

  Rendering groups are rendered by ascending ID, starting with the default
  one. There can be no more than 4 rendering groups in total, meaning that
  the only valid IDs are 0, 1, 2 and 3.*/

  <paragraph|Appearance>

  MATERIALI NON STANDARD GIà COSTRUITI (extra)

  Tutti i materiali della cartella materials.

  Esempio cielo:

  https://doc.babylonjs.com/extensions/Sky

  Codice sorgente:

  https://github.com/BabylonJS/Babylon.js/tree/master/materialsLibrary/dist

  \;

  MULTI MATERIALS (extra):

  \ https://www.eternalcoding.com/?p=283

  \;

  PARALLAX MAPPING:

  https://doc.babylonjs.com/tutorials/Using_parallax_mapping

  \;

  FOG (extra)

  http://doc.babylonjs.com/tutorials/Environment#fog

  \;

  BLEND MODES (extra)

  https://doc.babylonjs.com/tutorials/How_to_use_Blend_Modes

  \;

  DECALS (extra)

  http://doc.babylonjs.com/tutorials/Using_decals

  \;

  EDGE RENDER (extra)

  https://doc.babylonjs.com/tutorials/How_to_use_EdgesRenderer

  \;

  PBR (extra):

  Overview:

  http://doc.babylonjs.com/overviews/Physically_Based_Rendering

  Spiegazione più sisematica:

  http://doc.babylonjs.com/overviews/Physically_Based_Rendering_Master

  <paragraph|Movement>

  PARTICLES (EXTRA).

  Particles are often small sprites used to simulate hard-to-reproduce
  phenomena like fire, smoke, water, or abstract visual effects like magic
  glitter and faery dust.

  Studiare da qui:\ 

  http://doc.babylonjs.com/tutorials/Particles

  http://doc.babylonjs.com/overviews/Solid_Particle_System

  <paragraph|User Interaction>

  COLLISIONE CON IL PUNTATORE DEL MOUSE (EXTRA):\ 

  http://localhost/BabylonJSGuide/BJSSiteCopia1/doc.babylonjs.com/tutorials/Picking_Collisions.html

  \;

  BONES ANIMATIONS (EXTRA) :\ 

  A bone can contain animations to animate
  its<nbsp><code*|matrix><nbsp>property.

  <paragraph|ToDo>

  - Togliere oimo dalle librerie...

  \;

  - Uso di canvas2D (ad esempio per interfacce 2D)

  Partire da qui:

  http://doc.babylonjs.com/tutorials/Using_the_Canvas2D

  ma è fatto piuttosto maluccio, e i codici di esempio non funzionano, dovrai
  esplorare tu!

  \;

  - aggiungere il testo come nel tutorial del frame...

  \;

  \ \ \ \ COSE A CASO GIUSTO PER SAPERE:

  <\itemize>
    <item><hlink|Height_Map|http://doc.babylonjs.com/tutorials/Height_Map>

    <item>https://doc.babylonjs.com/tutorials/How_to_use_Curve3
  </itemize>

  PROGETTI ESEMPIO (LINK ESTERNI):

  <\itemize>
    <item>http://www.tutorialspoint.com/articles/run-a-php-program-in-xampp-server\ 

    <item>fare un 3d game e metterlo nel windws store

    https://www.davrous.com/2013/11/19/using-webgl-to-create-games-for-the-windows-store/

    <item>visual editor

    Github per download:

    \ https://github.com/BabylonJS/Editor

    Manuale:

    https://medium.com/babylon-js/welcome-to-the-babylon-js-editor-c08dccdcec07#.6zdyhkvzd
  </itemize>

  \;
</body>

<\initial>
  <\collection>
    <associate|font-base-size|9>
  </collection>
</initial>

<\references>
  <\collection>
    <associate|applyforce-force-contactpoint-rarr-void|<tuple|1|?>>
    <associate|auto-1|<tuple|1|1>>
    <associate|auto-10|<tuple|7|?>>
    <associate|auto-11|<tuple|7|?>>
    <associate|auto-2|<tuple|2|1>>
    <associate|auto-3|<tuple|3|1>>
    <associate|auto-4|<tuple|4|1>>
    <associate|auto-5|<tuple|5|2>>
    <associate|auto-6|<tuple|6|4>>
    <associate|auto-7|<tuple|1|4>>
    <associate|auto-8|<tuple|2|5>>
    <associate|auto-9|<tuple|3|?>>
    <associate|footnote-1|<tuple|1|7>>
    <associate|footnote-2|<tuple|2|?>>
    <associate|footnote-3|<tuple|3|?>>
    <associate|footnote-4|<tuple|4|?>>
    <associate|footnr-1|<tuple|1|7>>
    <associate|footnr-2|<tuple|2|?>>
    <associate|footnr-3|<tuple|3|?>>
    <associate|footnr-4|<tuple|4|?>>
    <associate|getlightbyname-name-rarr-light-classes-2-4-light-|<tuple|6|?>>
    <associate|uang-number|<tuple|1|?>>
    <associate|vang-number|<tuple|2|?>>
    <associate|wang-number|<tuple|3|?>>
  </collection>
</references>

<\auxiliary>
  <\collection>
    <\associate|toc>
      <with|par-left|<quote|4tab>|Prologue
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-1><vspace|0.15fn>>

      <with|par-left|<quote|4tab>|Structure
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-2><vspace|0.15fn>>

      <with|par-left|<quote|4tab>|Appearance
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-3><vspace|0.15fn>>

      <with|par-left|<quote|4tab>|Movement
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-4><vspace|0.15fn>>

      <with|par-left|<quote|4tab>|User Interaction
      <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-5><vspace|0.15fn>>

      <with|par-left|<quote|4tab>|ToDo <datoms|<macro|x|<repeat|<arg|x>|<with|font-series|medium|<with|font-size|1|<space|0.2fn>.<space|0.2fn>>>>>|<htab|5mm>>
      <no-break><pageref|auto-6><vspace|0.15fn>>
    </associate>
  </collection>
</auxiliary>