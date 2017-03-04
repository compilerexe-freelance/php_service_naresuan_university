<?php
    include "config.php";
    $id = $_GET["id"];

    $sql = "DELETE FROM problem WHERE service_id = $id";
    $conn->query($sql);
    $sql = "DELETE FROM status WHERE service_id = $id";
    $conn->query($sql);
    $sql = "DELETE FROM service WHERE id = $id";
    $conn->query($sql);

    echo "<script type='text/javascript'>window.location='../admin/manage_report.php';</script>";
?>