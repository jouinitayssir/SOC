<?php


if(isset($_POST)) {
    $data = json_decode(file_get_contents('php://input'), true);
    //echo file_get_contents('php://input');
    $counts = array(
        "available" => 0,
        "pending" => 0,
        "sold" => 0,
        "total" => count($data)
    );
    foreach($data as $pet) {
        switch($pet["status"]) {
            case "available" : $counts["available"]++; break;
            case "pending"   : $counts["pending"]++; break;
            case "sold"      : $counts["sold"]++; break;
        }
    }

    echo json_encode($counts);
}

?>