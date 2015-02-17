<?php
	foreach ($_FILES as $file){
		$target = __DIR__."/tmp/".$file['name'];
		move_uploaded_file($file['tmp_name'], $target);
	}
	if(isset($_POST['function'])){
		$data = "'".json_encode(array_merge($_POST, $_FILES))."'";
		echo apiCall($_POST['function'], $data);
	}else if(isset($_GET['function'])){
		$data = "'".json_encode(array_merge($_GET, $_FILES))."'";
		echo apiCall($_GET['function'], $data);
	}

function apiCall($function, $data){	
	$cmd = "python modules/".$function.".py"." ".$data;
	$response = exec($cmd);
	return $response;
}
?>
