<?php
 require_once('lib/nusoap.php'); 
 require_once('dbconn.php');
 $server = new nusoap_server();
function Somme()
{
  global $dbconn;
	$res = $dbconn->query("SELECT sum(montant_produit) as somme FROM facture");
  $data = $res->fetch(PDO::FETCH_ASSOC);
  return $data["somme"];
  $dbconn = null;
}

function Insert($ref,$montant)
{
  global $dbconn;
  $sql_insert = "INSERT INTO facture(reference,montant_produit) VALUES (:ref,:montant_produit)";
  $stmt = $dbconn->prepare($sql_insert);
  $result = $stmt->execute(array(':ref'=>$ref,':montant_produit'=>$montant));
  if($result) {
    return json_encode(array('status'=> 200, 'msg'=> 'success'));
  }
  else {
    return json_encode(array('status'=> 400, 'msg'=> 'fail'));
  }
  
  $dbconn = null;
}

$server->configureWSDL('myname', 'http://www.mynamespace.com');

    $server->register('Somme',
		array(),  //input parameter
		array('data' => 'xsd:float'),  //output
		'http://www.mynamespace.com',   //namespace
    'http://www.mynamespace.com#Somme', //soapaction           
    ); 

    $server->register('Insert',
		array('ref'=>'xsd:string','montant' => 'xsd:float'),  //input parameter
		array('err' => 'xsd:string'),  //output
		'http://www.mynamespace.com',   //namespace
    'http://www.mynamespace.com#Insert', //soapaction           
    ); 

$server->service(file_get_contents("php://input"));
?>