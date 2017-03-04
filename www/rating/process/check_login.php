<?php
    include "config.php";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $status = 0;

    $sql = "SELECT * FROM administrator";

    $result = $conn->query($sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["username"] == $username && $row["password"] == $password) {
            $admin_id = $row["id"];
            $status = 1;
        }
    }

    if ($status == 1) {

        $_SESSION["admin_id"] = $admin_id;
        $_SESSION["username"] = $username;
        $_SESSION["login"] = "success";

        header("location: ../admin/manage_report.php");
    } else {
        $_SESSION["status"] = "โปรดตรวจสอบข้อมูลอีกครั้ง";
        header("location: ../admin/login.php");
    }

?>