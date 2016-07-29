<div class="tree">
	<ul>
		<li><span class="glyphicon glyphicon-folder-open">&nbsp;Scene</span>	
			<ul>
				<!--meshes-->
				<li>
					<span class="badge badge-success glyphicon glyphicon-plus-sign">&nbsp;Meshes</span>
					<?php crateBootTree(getSubTree("Meshes", unserialize($_SESSION["tree"])), "get_mesh_page.php"); ?>
				</li>
			</ul>
		</li>
	</ul>
</div>
