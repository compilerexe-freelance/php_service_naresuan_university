<?php
include "config.php";
$id = $_GET["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$cf_password = $_POST["cf_password"];

if ($password != $cf_password) {
    $_SESSION["status"] = "โปรดตรวจสอบรหัสผ่านอีกครั้ง";
    header("location: ../admin/update_admin.php?id=".$id);
} else {
    $sql = "UPDATE administrator SET username = '$username', password = '$password' WHERE id = $id";
    $conn->query($sql);
    header("location: ../admin/manage_admin.php");
}
exit(0);

?>