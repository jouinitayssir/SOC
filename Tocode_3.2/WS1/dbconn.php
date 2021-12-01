<?php
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "facture";
try {
    $dbconn = new PDO('mysql:host=localhost; dbname=facture', $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
