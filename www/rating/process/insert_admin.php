<?php
    include "config.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cf_password = $_POST["cf_password"];

    if ($password != $cf_password) {
        $_SESSION["status"] = "โปรดตรวจสอบรหัสผ่านอีกครั้ง";
        header("location: ../admin/insert_admin.php");
    } else {
        $sql = "INSERT INTO administrator (username, password) VALUES('$username', '$password')";
        $conn->query($sql);
        header("location: ../admin/manage_admin.php");
    }
    exit(0);

?>