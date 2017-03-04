<?php
    session_start();
    include "../process/auth.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>ระบบจัดเก็บข้อมูลและประเมินผลความพึงพอใจ</title>
    <link href="../assets/css/log-in.css" rel="stylesheet" />
  	<link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href="../assets/css/sweetalert.css" rel="stylesheet" />
    <!-- <link href="assets/css/jquery-ui.theme.css" rel="stylesheet" /> -->
    <link href="../assets/css/jquery-ui.css" rel="stylesheet" />
      <link rel="stylesheet" href="../assets/bootstrap-star-rating/css/star-rating.min.css">
      <link rel="stylesheet" href="../assets/bootstrap-star-rating/themes/krajee-svg/theme.min.css">
<!--    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">-->

    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/jquery-ui.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
    <!-- <script src="assets/js/morris/raphael-2.1.0.min.js"></script> -->
    <script src="../assets/js/morris/morris.js"></script>
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <script src="../assets/js/custom.js"></script>

      <script src="../assets/bootstrap-star-rating/js/star-rating.min.js"></script>
      <script src="../assets/bootstrap-star-rating/themes/krajee-svg/theme.min.js"></script>

    <style media="screen">
        @font-face {
            font-family: 'Kanit';
            font-style: normal;
            font-weight: 400;
            src: local('Kanit'), local('Kanit-Regular'), url("../assets/fonts/Kanit.woff2") format('woff2');
            unicode-range: U+0E01-0E5B, U+200B-200D, U+25CC;
        }
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>

  </head>
  <body>

    <div id="wrapper">
      <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- <div class="navbar-header"> -->
          <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> -->
          <!-- <a class="navbar-brand" href="index.html">Admin</a> -->
        <!-- </div> -->
        <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;"> ยินดีต้อนรับคุณ : <?php echo $_SESSION["username"]; ?> &ensp; <a href="update_admin.php?id=<?php echo $_SESSION["admin_id"]; ?>" style="color: yellow;"><i class="fa fa-pencil"></i> แก้ไข</a>
        </div>
      </nav>
