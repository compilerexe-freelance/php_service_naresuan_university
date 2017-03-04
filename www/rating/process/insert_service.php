<?php
  include "config.php";

  $full_name = $_POST["full_name"];
  $major = $_POST["major"];
  $hardware = $_POST["hardware_select"];
  $software = $_POST["software_select"];
  $network = $_POST["network"];
  $other = $_POST["other"];
  $note = $_POST["note"];
  $status = $_POST["status_select"];
  $created_at = $_POST["date"];

  $sql = "SELECT * FROM service";
  $result = $conn->query($sql);
  $current_year = date("y") + 43;
  if (mysqli_num_rows($result) == 0) {
    $service_code = $current_year . "0001";
  } else {
    $number = mysqli_num_rows($result) + 1;
    $service_code = $current_year . str_pad($number, 4, '0', STR_PAD_LEFT);
  }

  $sql = "INSERT INTO service (service_code, full_name, major, created_at) VALUES('$service_code', '$full_name', '$major', '$created_at')";
  $conn->query($sql);
  $last_id = $conn->insert_id;
  $sql = "INSERT INTO problem (service_id, hardware, software, network, other, note) VALUES('$last_id', '$hardware', '$software', '$network', '$other', '$note')";
  $conn->query($sql);
  $sql = "INSERT INTO status (service_id, status) VALUES('$last_id', '$status')";
  $conn->query($sql);

  $conn->close();

  if ($status == "เสร็จสิ้น") {
      $_SESSION["status"] = "เสร็จสิ้น";
      echo "<script>window.location='../admin/manage_report.php?id=".$last_id."';</script>";
  //        exit(0);
  } else {
      echo "<script>window.location='../admin/manage_report.php';</script>";
  //        exit(0);
  }

?>
