<?php

	define("UPLOAD_DIR", "./img/uploaded_files/");

	function getUploadDirectory(){
		return UPLOAD_DIR;
	}

	// ######################### FOR SINGLE FILE UPLOADS ################################

	function upload_file_operation( $file ){
		
		//Temp name: $file['tmp_name']; 
		//Original name : $file['name'];
		
		return move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $file['name']);
		  
	}

	/* Even if you don't assign a file to an <input type="file" name="x_file" /> element, the $_FILES variable will contains 
	a row for it like this:
		Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) 
	Conversely if there exists an uploaded file then the $_FILES variable will contains a row for it like this:
		Array ( [name] => name.png [type] => image/png [tmp_name] => /opt/lampp/temp/phpC71ET4 [error] => 0 [size] => 175110 ) 
	
	This function verify if you are in the former or in the latter case;
	*/
	function is_file_uploaded( $file ){
		return $file["error"] == 0;
	}

	// ######################### FOR MULTIPLE FILES UPLOADS ################################

	function upload_directory_operation( $files, $directory_name, $n ){
		
		//Temp names: 
			// $files['tmp_name'][$directory_name][0];
			// ... 
			// $files['tmp_name'][$directory_name][$n-1];
		//Original names :
			// $files['name'][$directory_name][0];
			// ... 
			// $files['name'][$directory_name][$n-1];
		
		$result = true;
		for( $i=0; $i<$n; $i++){
			$result = $result && move_uploaded_file(
						$files['tmp_name'][$directory_name][$i], 
						UPLOAD_DIR . $directory_name . "/" . $files['name'][$directory_name][$i]);
		}
		return $result;
		  
	}

	/* Even if you don't assign a file to an <input type="file" name="x_directory[]" multiple webkitdirectory  /> element, the $_FILES variable
	will contains a row for it like this:
		Array ( 
			[name] => Array (	[x_directory] => Array ( [0] => )	) 
			[type] => Array (	[x_directory] => Array ( [0] => )	) 
			[tmp_name] => Array (	[x_directory] => Array ( [0] => )	) 
			[error] => Array (	[x_directory] => Array ( [0] => 4 )	) 
			[size] => Array (	[x_directory] => Array ( [0] => 0 )	)
		) 
	Conversely if there exists an uploaded file then the $_FILES variable will contains a row for it like this:
		Array ( 
			[name] => Array (	[x_directory] => Array ( [0] => 0.jpg [1] => 1.jpg [2] => 2.jpg	 ) )
			[type] => Array ( 	[x_directory] => Array ( [0] => image/jpeg [1] => image/jpeg [2] => image/jpeg ) )
			[tmp_name] => Array (	[x_directory] => Array ( [0] => /opt/lampp/temp/phpqt2xJF [1] => /opt/lampp/temp/phpgaJR0c [2] => /opt/lampp/temp/phpaRXjiK ) ) 
			[error] => Array ( 	[x_directory] => Array ( [0] => 0 [1] => 0 [2] => 0 ) ) 
			[size] => Array ( 	[x_directory] => Array ( [0] => 142871 [1] => 144977 [2] => 28139 ) ) 
		)
	
	This function verify if you are in the former or in the latter case;
	*/
	function is_directory_uploaded( $files, $directory_name, $n ){
		
		if($n==1) {
			$result = $files["error"][$directory_name][0] == 0;
		} else {
			$result = true;
			for($i=0; $i<$n; $i++){
				$result = $result && ( $files["error"][$directory_name][$i] == 0 );
			}
		}
		
		return $result;
	}

	
?>
