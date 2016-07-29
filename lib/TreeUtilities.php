<?php 	
	require './lib/vendor/autoload.php';
	
	use Tree\Node\Node;
	use Tree\Visitor\PreOrderVisitor;
	use Tree\Visitor\PostOrderVisitor;
	use Tree\Builder\NodeBuilder;

	function initTree(){
	
		$builder = new NodeBuilder();
		$builder
		    ->value('Scene')
		    ->leaf('Meshes')
		;
		$rootNode = $builder->getNode();

		$meshes = get_elements("meshes", array("1"  => "1") );

		while(count($meshes) > 0){
			foreach($meshes as $name => $mesh){
				if(getSubTree($mesh["parent"], $rootNode) != null){
					addNode($mesh["name"], $mesh["parent"], $rootNode);
					unset($meshes[$mesh["name"]]);
				}
			}
		}
	
		return $rootNode;
	}	

	function addNode($nameChild, $nameParent, $rootNode){
		$nodeChild = new Node($nameChild);
		$nodeChild->setValue($nameChild);
		
		$visitor = new PreOrderVisitor;
		$yield = $rootNode->accept($visitor);
		
		foreach( $yield as $node ){
			if($node->getValue() == $nameParent){
				$node->addChild($nodeChild);
			}
		}
		
		return $rootNode;
	}

	function updateTree($old_name, $new_name, $rootNode){
		$visitor = new PreOrderVisitor;
		$yield = $rootNode->accept($visitor);
		
		foreach( $yield as $node ){
			if($node->getValue() == $old_name){
				$node->setValue($new_name);
				break;
			}
		}
		
		return $rootNode;
	}

	function removeNode($nodeToRemoveName, $rootNode){
		$nodeToRemove = getSubTree($nodeToRemoveName, $rootNode);
	
		$parent = $nodeToRemove->getParent();

		$parent -> removeChild($nodeToRemove);

		return $rootNode;
	}
		 
	function getAllDescendantsWithPostOrder($ancestorName, $rootNode){
		$ancestor = getSubTree($ancestorName, $rootNode);

		$visitor = new PostOrderVisitor;
		$yield = $ancestor->accept($visitor);
		
		$descendants = array();
		foreach( $yield as $node ){
			$descendants += [$node->getValue() => $node];
		}		

		return $descendants;
	}

	function getAllDescendantsWithPreOrder($ancestorName, $rootNode){
		$ancestor = getSubTree($ancestorName, $rootNode);

		$visitor = new PreOrderVisitor;
		$yield = $ancestor->accept($visitor);
		
		$descendants = array();
		foreach( $yield as $node ){
			$descendants += [$node->getValue() => $node];
		}		

		return $descendants;
	}

	function getSubTree($subRootName, $rootNode){
		$visitor = new PreOrderVisitor;
		$yield = $rootNode->accept($visitor);
		
		foreach( $yield as $node ){
			if($node->getValue() == $subRootName){
				return $node;
			}
		}
		return null;
	}
	
	function printTree($rootNode){
		$visitor = new PreOrderVisitor;
		$yield = $rootNode->accept($visitor);
		
		foreach( $yield as $node ){
			echo $node->getValue() . "<br />";	
		}
	}

	function crateBootTree($subRootNode, $url){
				echo "<ul>";
					if(!$subRootNode->isLeaf()){
						foreach($subRootNode->getChildren() as $children){
							printBootTreeNode($children, $url);
							crateBootTree($children, $url);
						}
					}
				echo "</ul>";
	}
	
	function printBootTreeNode($node, $url){
		echo "<li>";
		echo "<span class=\"glyphicon glyphicon-minus-sign\">"; 
		echo "&nbsp;<a onClick=\"doForm('post','" . $url ."',{ name:'" ,  $node->getValue() , "'})\">",  $node->getValue() ,"</a>";
		echo "</span>";
		echo "</li>";
	}

?>
