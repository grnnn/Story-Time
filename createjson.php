<?php
	include 'lib/ChromePhp.php';
	
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	if (get_magic_quotes_gpc()) {
		function stripslashes_gpc(&$value)
		{
			$value = stripslashes($value);
		}
		array_walk_recursive($_GET, 'stripslashes_gpc');
		array_walk_recursive($_POST, 'stripslashes_gpc');
		array_walk_recursive($_COOKIE, 'stripslashes_gpc');
		array_walk_recursive($_REQUEST, 'stripslashes_gpc');
	}

	if(!empty($_POST['data'])){
		$data = $_POST['data'];
		$fname = $_POST['file'];

		$file = fopen($fname, 'w+');//creates new file
		fwrite($file, $data);
		fclose($file);
		
		ChromePhp::log('done writing');
	}
	
	ChromePhp::log('If this message appears alone, there is a bug.');
	
	
?>