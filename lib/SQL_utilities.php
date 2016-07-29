<?php

function add( $element, $table_name ){
	
	$query1 = "INSERT INTO " . $table_name . " (";
	$query2 = ") VALUES (";
	
	foreach( $element as $name => $value ){
		$query1 .= $name . ",";
		if( is_numeric($value) )
			$query2 .= $value . ","; 
		else
			$query2 .= "'" . $value . "',";
		
		/* ************ ATTENZIONE ************
		anche se una sequenza di cifre rappresenta una stringa e non un numero (ad esempio "username"="11"), il precedente selettore lo proporrà al DB come un 
		dato numerico (privo di apici delimitatori), ma ho notato che una stringa di tale natura ( divenuta un dato numerico in SQL ) viene accettata 
		senza alcun errore e riconvertita in stringa automaticamente dal DB 
		
		Al contrario una sequenza di caratteri non soltanto numerici priva degli apici delimitatori genera un errore, da qui l'esigenza del selettore
		*/
	}
	
	$query1 = substr($query1, 0, strlen($query1)-1);
	$query2 = substr($query2, 0, strlen($query2)-1) . ")";
	
	$query = $query1 . $query2;

	$connection = pg_connect(CONN_STR);
	
	$result = pg_query($query);
	
	pg_close($connection);
	
	return (boolean) $result;
	
}


function remove( $table_name , $condition ){
	
	$query1 = "DELETE FROM " . $table_name;
	$query2 = " WHERE ";
	foreach( $condition as $name => $value ){
		if( is_numeric($value) ){
			$query2 .= $name . "=" . $value . " AND ";
		}
		else
			$query2 .= $name . "='" . $value . "' AND ";
	}
	
	$query = $query1 . substr($query2, 0, strlen($query2)-5);

	echo $query;

	$connection = pg_connect(CONN_STR);
		
	$result = pg_query($query);
			
	return pg_affected_rows($result);	
}

function update( $table_name, $columns_to_change, $condition ){
	
	$query1 = "UPDATE " . $table_name;
	$query2 = " SET ";
	foreach( $columns_to_change as $name => $value ){
		if( is_numeric($value) )
			$query2 .= $name . "=" . $value . ",";
		else
			$query2 .= $name . "='" . $value . "',"; 
	}
	$query3 = " WHERE ";
	foreach( $condition as $name => $value ){
		if( is_numeric($value) ){
			$query3 .= $name . "=" . $value . " AND ";
		}
		else
			$query3 .= $name . "='" . $value . "' AND ";
	}
	
	$query = $query1 . substr($query2, 0, strlen($query2)-1) . substr($query3, 0, strlen($query3)-5);

	$connection = pg_connect(CONN_STR);
	
	$result = pg_query($query);
	
	pg_close($connection);
	
	return (boolean) $result;
}

function get_elements( $table_name, $condition ){
	
	$query1 = "SELECT * FROM " . $table_name;
	$query2 = " WHERE ";
	foreach( $condition as $name => $value ){
		if( is_numeric($value) )
			$query2 .= $name . "=" . $value . " AND ";
		else
			$query2 .= $name . "='" . $value . "' AND ";
	}
	
	$query = $query1 . substr($query2, 0, strlen($query2)-5);
	
	$connection = pg_connect(CONN_STR);

	$result = pg_query($query);
	
	$meshes = array();
	while ($row=pg_fetch_assoc($result)) {
		$meshes += [$row["name"] => $row];
	}

	pg_close($connection);

	return $meshes;
	
}

function counter( $table_name, $condition ){
	$query = "SELECT COUNT(*) FROM " . $table_name . " WHERE " . $condition;
	
	$connection = pg_connect(CONN_STR);
	
	$result = pg_query($query);
	
	pg_close($connection);
	
	return $result;
}
