<?php
include("includes/db.php");

(isset($_POST['set']))
    $name = $_POST['name'];
    $Place = $_POST['place'];
    $Check = $_POST['Check'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    
    $data = [
        'name' => $name,
        'place' => $Place,
        'check' => $Check,
        'date' => $date,
        'time' => $time
    
    $ref = "timestamp/";
    $pushData = $database->getReference($ref)->set($data);
}


?>