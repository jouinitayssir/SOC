<?php
	require_once('lib/nusoap.php');
	$error  = '';
    $montant=0;
	$ref='';
	$response = '';
	$response1 = '';
	$response2 = 0;
	
	$wsdl = "http://localhost/soc/ToCode3.2/ws1.php?wsdl";
	$wsdl1="https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL";
	
	if(isset($_POST['addbtn'])){
		$montant = trim($_POST['montant']);
		$ref = trim($_POST['ref']);
        if(!$montant){
			$error = 'donnez un montant';
		}
		if(!$ref){
			$error = 'donnez une réference';
		}
		if(!$error){
			$client = new nusoap_client($wsdl, true);
			$client1 = new nusoap_client($wsdl1, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
			    exit();
			}
			$err1 = $client1->getError();
			if ($err1) {
				echo '<h2>Constructor error 1</h2>' . $err1;
			    exit();
			}
			try {
				$response =  $client->call('Insert', array($ref,$montant));
				$response = json_decode($response);
				$response2 =  $client->call('Somme', array());
				$response1 = $client1->call('NumberToWords', array('ubiNum'=>$montant));
			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
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
			<h2>Ajouter montant produit</h2>
			<?php
				if(isset($response->status)&&isset($response1)) {
				if($response->status == 200){ 
			?>
			<div class="alert alert-success fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>réussit!</strong>le montant <b><?= $response1["NumberToWordsResult"] ?></b> ajouté à la facture.
			</div>
			<?php }elseif($response->status != 200 || $response1->status != 200) { ?>
			<div class="alert alert-danger fade in">
				<strong>Erreur!</strong>Réessayer!
			</div>
		</div>
		<?php
				} 
				}
				?>
		<div class='row'>
			<div class='col-md-6'>
				<form class="form-inline" method='post' name='form1'>
					<?php if($error) { ?>
					<div class="alert alert-danger fade in">
						<strong>Erreur!</strong><?php echo $error; ?>
					</div>
					<?php } ?>
					<div class='col-md-6'>
					<div class="form-group">
						<label for="ref">Référence: </label>
						<input type="text" class="form-control" name="ref" id="ref"
							placeholder="Enter la référence du produit" required>
					</div></div>
					<div class='col-md-6'>
					<div class="form-group">
						<label for="montant">Montant: </label>
						<input type="number" class="form-control" name="montant" id="montant"
							placeholder="Enter le montant du produit" required>
					</div></div><br>
					<div class='col-md-12'>
					<button type="submit" name='addbtn' class="btn btn-default">Ajouter</button></div>
				</form>
			</div>
			<div class='col-md-6'>
				<h2>Vous avez un totale de: <?php  echo $response2 ?><br></h2>
					</div>

		</div>

	</div>

</body>

</html>