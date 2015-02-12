<?php
include 'phyth.php';
?>
<html>
<h1>Phyth</h1>
<hr>

<h3>PHP permissions test</h3>
<table border="1">
<?php 
$response = exec("pwd");
//currently this value is arbitrary 
if($response == " "){
	echo "<tr><td>Response:</td><td bgcolor='DE8686'>"."Failed"."</td></tr>"; 
}else{
	echo "<tr><td>Response:</td><td bgcolor='86DE8C'>"."Success: ".$response."</td></tr>"; 
}
?>
</table>
<hr>

<h3>Argument buffer size test</h3>
<table border="1">
<tr><td>Command:</td><td>getconf ARG_MAX</td></tr>
<?php 
$response = exec("getconf ARG_MAX");
//currently this value is arbitrary 
if($response < 2097152){
	echo "<tr><td>Response:</td><td bgcolor='DE8686'>".$response."</td></tr>"; 
}else{
	echo "<tr><td>Response:</td><td bgcolor='86DE8C'>".$response."</td></tr>"; 
}
?>
</table>
<hr>

<h3>Module error handling test</h3>
<table border="1">
<tr><td>Request:</td><td>Function=> reverse, Data=> {"data":"should fail"}</td></tr>
<?php 
$response = callPhyth("reverse", '{"bata":"should fail"}');
$response = str_replace("'", '"', $response);
$response_obj = json_decode($response);
if($response_obj->error==""){
	echo "<tr><td>Response:</td><td bgcolor='DE8686'>".$response."</td></tr>"; 
}else{
	echo "<tr><td>Response:</td><td bgcolor='86DE8C'>".$response."</td></tr>"; 
}
?>
</table>
<hr>

<h3>Global error handling test</h3>
<table border="1">
<tr><td>Request:</td><td>{"cmd":"broken","data":"should fail"}</td></tr>
<?php 
$response = callPhyth("broken", '{"cmd":"broken","data":"should fail"}');
$response = str_replace("'", '"', $response);
$response_obj = json_decode($response);
if($response_obj->error==""){
	echo "<tr><td>Response:</td><td bgcolor='DE8686'>".$response."</td></tr>"; 
}else{
	echo "<tr><td>Response:</td><td bgcolor='86DE8C'>".$response."</td></tr>"; 
}
?>
</table>
<hr>

<h3>Successful module test</h3>
<table border="1">
<tr><td>Request:</td><td>{"cmd":"reverse","data":{"string":"should reverse this"}}</td></tr>
<?php 
$response = callPhyth("reverse", '{"function":"reverse", "string":"should reverse this"}');
$response = str_replace("'", '"', $response);
$response_obj = json_decode($response);
if($response_obj->error!="" || $response_obj->data->new_string==""){
	echo "<tr><td>Response:</td><td bgcolor='DE8686'>".$response."</td></tr>"; 
}else{
	echo "<tr><td>Response:</td><td bgcolor='86DE8C'>".$response."</td></tr>"; 
}
?>
</table>
<hr>

<a href="https://github.com/evanjhopkins/php-python-api">Github</a>
</html>
<?php
function callPhyth($function, $data){
	$url = 'http://ec2-54-148-172-8.us-west-2.compute.amazonaws.com/phyth/phyth.php';
	//$data = array('data' => $data, 'function' => $function);
	//use key 'http' even if you send the request to https://...
	$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data),
	    ),
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	return $result;
}
?>
