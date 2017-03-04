<?php
    include "header_admin.php";
    $_SESSION["active_menu"] = "manage_admin";
    include "navbarside_admin.php";
    include "../process/config.php";

    if ($_SESSION["status"] == "โปรดตรวจสอบรหัสผ่านอีกครั้ง") {
        echo "
        <script>
            swal({
                title: '',
                text: '<span style=\'font-size: 18px\'>โปรดตรวจสอบรหัสผ่านอีกครั้ง</span>',
                html: true
            })
        </script>
        ";
        $_SESSION["status"] = null;
    }

    $admin_id = $_GET["id"];
    $sql = "SELECT * FROM administrator WHERE id = $admin_id";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $username = $row["username"];
        $password = $row["password"];
    }

?>

<form id="form_service" action="../process/update_admin.php?id=<?php echo $admin_id; ?>" method="post">

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px;">ชื่อผู้ใช้งาน</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" style="font-size: 16px" required></input>
            </div>
        </div>

        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px;">รหัสผ่าน</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" style="font-size: 16px" required></input>
            </div>
        </div>

        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px;">ยืนยันรหัสผ่าน</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" name="cf_password" style="font-size: 16px" required></input>
            </div>
        </div>

        <div class="col-md-2 col-md-offset-5" style="margin-bottom: 10px;">
            <button type="submit" id="btn_submit" class="btn btn-success" style="font-size: 16px; width: 100%;">เสร็จสิ้น</button>
        </div>
        <div class="col-md-2">
            <button type="reset" id="btn_reset" class="btn btn-danger" style="font-size: 16px; width: 100%;">ยกเลิก</button>
        </div>

    </div>

</form>

<?php include "footer.php"; ?>
