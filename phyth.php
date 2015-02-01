<?php
if(isset($_POST['data'])){
	//remove spaces from json
	$json = json_decode($_POST['data']);
	$datastring = $_POST['data'];
	//$datastring = str_replace(" ", "\ ", $_POST['data']);
	$datastring = "'".$datastring."'";
	echo apiCall($json->cmd, $datastring);
}

function apiCall($call, $data){	
	$cmd = "python modules/".$call.".py"." ".$data;
	$response = exec($cmd);
	return $response;//test
}
?>
