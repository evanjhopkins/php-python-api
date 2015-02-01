<?php
if(isset($_POST['data'])){
	$datastring = "'".$_POST['data']."'";
	echo apiCall(json_decode($_POST['data'])->cmd, $datastring);
}

function apiCall($call, $data){	
	$cmd = "python modules/".$call.".py"." ".$data;
	$response = exec($cmd);
	return $response;
}
?>
