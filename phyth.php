<?php
	$data = "'".json_encode(array_merge($_POST, $_FILES))."'";
	//echo $data;
	echo apiCall($_POST['function'], $data);

function apiCall($function, $data){	
	$cmd = "python modules/".$function.".py"." ".$data;
	$response = exec($cmd);
	return $response;
}
?>
