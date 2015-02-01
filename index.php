<?php
include 'phyth.php';
?>
<html>
<h1>Phyth</h1>
<hr>

<h3>Testing error handling</h3>
Request: {"cmd":"reverse","data":"jj"}<br>
<?php echo "Response: ".callPhyth('{"cmd":"reverse","data":"jj"}'); ?>
<hr>

<h3>Testing reverse string</h3>
Request: {"cmd":"reverse","data":{"string":"should throw error"}}<br>
<?php echo "Response: ".callPhyth('{"cmd":"reverse","data":{"string":"should throw error"}}'); ?>
<hr>

<a href="https://github.com/evanjhopkins/php-python-api">Github</a>
</html>
<?php
function callPhyth($data_string){
	$url = 'http://ec2-54-148-172-8.us-west-2.compute.amazonaws.com/phyth/phyth.php';
	$data = array('data' => $data_string);
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
