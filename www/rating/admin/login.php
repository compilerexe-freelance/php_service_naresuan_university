<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>ระบบจัดเก็บข้อมูลและประเมินผลความพึงพอใจ</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href="../assets/css/sweetalert.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>

    <style media="screen">
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>

</head>
<body>

    <?php
        if ($_SESSION["status"] == "โปรดตรวจสอบข้อมูลอีกครั้ง") {
            echo "
            <script>
                swal({
                    title: '',
                    text: '<span style=\'font-size: 18px\'>โปรดตรวจสอบข้อมูลอีกครั้ง</span>',
                    html: true
                })
            </script>
            ";
            $_SESSION["status"] = null;
        }
    ?>

    <div class="container">
        <div class="row" style="margin-top: 20px">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span style="font-size: 20px;">ผู้ดูแลระบบ</span>
                    </div>
                    <div class="panel-body">
                        <form action="../process/check_login.php" method="post">
                            <div class="form-group">
                                <span style="font-size: 18px;">ชื่อผู้ใช้งาน</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" style="font-size: 16px" required autofocus>
                            </div>
                            <div class="form-group">
                                <span style="font-size: 18px;">รหัสผ่าน</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" style="font-size: 16px" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" style="width: 100%; font-size: 18px;">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
