<?php
    include "config.php";

    $service_id = $_GET["id"];
    $full_name = $_POST["full_name"];
    $major = $_POST["major"];
    $hardware = $_POST["hardware_select"];
    $software = $_POST["software_select"];
    $network = $_POST["network"];
    $other = $_POST["other"];
    $note = $_POST["note"];
    $status = $_POST["status_select"];
    $created_at = $_POST["date"];

//    $sql = "SELECT * FROM service";
//    $result = $conn->query($sql);
//    $current_year = date("y") + 43;
//    if (mysqli_num_rows($result) == 0) {
//        $service_code = $current_year . "0001";
//    } else {
//        $number = mysqli_num_rows($result) + 1;
//        $service_code = $current_year . str_pad($number, 4, '0', STR_PAD_LEFT);
//    }

    $sql = "UPDATE service SET full_name = '$full_name', major = '$major', created_at = '$created_at' WHERE id = $service_id";
    $conn->query($sql);
//    $last_id = $conn->insert_id;
    $sql = "UPDATE problem SET hardware = '$hardware', software = '$software', network = '$network', other = '$other', note = '$note' WHERE service_id = $service_id";
    $conn->query($sql);

    $sql = "UPDATE status SET status = '$status' WHERE service_id = $service_id";
    $conn->query($sql);

    $conn->close();

    if ($status == "เสร็จสิ้น") {
        $_SESSION["status"] = "เสร็จสิ้น";
        echo "<script>window.location='../admin/manage_report.php?id=".$service_id."';</script>";
//        exit(0);
    } else {
        echo "<script>window.location='../admin/manage_report.php';</script>";
//        exit(0);
    }

?>
