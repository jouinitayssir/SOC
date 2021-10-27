<?php
  
	require_once('lib/nusoap.php');
	$error  = '';
	$result = '';
	$response = '';
	$wsdl = "http://www.dneonline.com/calculator.asmx?wsdl";
	if(isset($_POST['intA']) && isset($_POST['intB'])){
		$intA = trim($_POST['intA']);
		$intB = trim($_POST['intB']);
		if(!$intA || !$intB) {
			$error = 'yaatek kasra aabi kol chy';
		}
		// if(!is_nan((int)$intA) ||!is_nan((int)$intB)){
			// $error = 'yaatek kasra aabi hot noumrou';
		// }

		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				$result = $client->call('Add', array('intA'=> $intA, 'intB'=> $intB));
				
				$result = $result['AddResult'];
			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
	}	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Book Store Web Service</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<?= $error ?>
	<div class="container pb-calc-container">
		<form action="" method="POST">
			<div class="row">
				<div class="col-sm-3">
					<input class="form-control" type="number" name="intA" step="1">
				</div>
				<div class="col-sm-3">
					<button class="btn btn-primary btn-block" disabled>+</button>
				</div>
				<div class="col-sm-3">
					<input class="form-control" type="number" name="intB" step="1">
				</div>
				<div class="col-sm-3">
					<button class="btn btn-primary btn-block" type="submit" value="calc">=</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12" style="padding-top: 10px;">
					<input class="form-control" type="number" name="result" value="<?= $result ?>"  disabled>
				</div>
			</div>
		</form>
	</div>
</body>

</html>