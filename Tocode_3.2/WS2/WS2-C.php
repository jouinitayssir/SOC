<?php
	require_once('lib/nusoap.php');
	$response1 = '';
	$wsdl1="https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL";
	$client1 = new nusoap_client($wsdl1, true);
	$err1 = $client1->getError();
	if ($err1) {
		echo '<h2>Constructor error 1</h2>' . $err1;
		exit();
	}
	try {
		$response1 = $client1->call('NumberToWords', array('ubiNum'=>250));
	}catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Facture</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class='row'>
			<h2>250= <?php  echo $response1['NumberToWordsResult'] ?></h2>
		</div>
</body>

</html>