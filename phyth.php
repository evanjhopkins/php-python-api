<?php
if(isset($_POST['function'])){
	echo apiCall($_POST['function'],"'".$_POST['data']."'");
}else if(isset($_GET['function'])){
	echo apiCall($_GET['function'],"'".$_GET['data']."'");
}

function apiCall($function, $data){	
	$cmd = "python modules/".$function.".py"." ".$data;
	$response = exec($cmd);
	return $response;
}
?>
