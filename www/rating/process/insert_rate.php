<?php
    require_once ("config.php");
    $service_id = $_POST["service_id"];
    $score = $_POST["score"];

    $sql = "INSERT INTO rate (service_id, score) VALUES('$service_id', '$score')";
    $conn->query($sql);

    $_SESSION["status"] = null;
?>