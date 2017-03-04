<?php
    include "config.php";
    $id = $_GET["id"];
    $sql = "DELETE FROM administrator WHERE id = $id";
    $conn->query($sql);
    header("location: ../admin/manage_admin.php");
?>