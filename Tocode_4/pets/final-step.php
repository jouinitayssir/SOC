<?php
if (isset($_POST["submit"])) {
    //var_dump($_POST);die;
    $query="";
    if(isset($_POST["status1"])) {
        $query.=$_POST["status1"].',';
    }
    if(isset($_POST["status2"])) {
        $query.=$_POST["status2"].',';
    }
    if(isset($_POST["status3"])) {
        $query.=$_POST["status3"].',';
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://petstore.swagger.io/v2/pet/findByStatus/?status='.$query,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost/pets/rws1.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $response,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    $response = json_decode($response, true);

    curl_close($curl);
    // echo $response;
}

?>
<!DOCTYPE html>
<html>

<body>

    <h2>Get pets status</h2>

    <form action="final-step.php" method="POST">
        <label for="fname">Check the status:</label><br>
        <input type="checkbox" name="status1" id="status1" value="available">
        <label for="status1"> Available</label><br>
        <input type="checkbox" name="status2" id="status2" value="pending">
        <label for="status2"> Pending</label><br>
        <input type="checkbox" name="status3" id="status3" value="sold">
        <label for="status3"> Sold</label><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
if (isset($_POST["submit"])) { ?>
    <p>
    <?= $response["total"] ?> results:
        <ul>
            <li>Available: <?= $response["available"] ?></li>
            <li>Pending: <?= $response["pending"] ?> </li>
            <li>Sold: <?= $response["sold"] ?></li>
        </ul>
    </p>
<?php

}

?>

</body>

</html>