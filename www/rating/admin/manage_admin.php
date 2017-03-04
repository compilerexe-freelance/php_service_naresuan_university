<?php
include "header_admin.php";
$_SESSION["active_menu"] = "manage_admin";
include "navbarside_admin.php";
include "../process/config.php";
?>

<style>
    tr th {
        text-align: center !important;
        font-size: 16px;
    }
    tr td {
        text-align: center !important;
        font-size: 16px;
    }
</style>

<div class="row" style="margin-top: 20px;">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h1>ระบบจัดเก็บข้อมูลและประเมินผลความพึงพอใจ</h1>
        </div>
        <div class="form-group">
            <h4>คณะวิทยาศาสตร์ มหาวิทยาลัยนเรศวร</h4>
        </div>
        <div class="form-group">
            <hr>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group text-right">
            <a href="insert_admin.php" style="font-size: 20px"><i class="fa fa-plus"></i> เพิ่มผู้ดูแลระบบ</a>
        </div>
    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อผู้ใช้งาน</th>
                    <th>รหัสผ่าน</th>
                    <th>แก้ไข / ลบ</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM administrator";
                $result = $conn->query($sql);
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                          <td>".$count."</td>
                          <td>".$row["username"]."</td>
                          <td>".$row["password"]."</td>
                          <td><a style='color: green;' href='update_admin.php?id=".$row["id"]."'>แก้ไข</a> / <a style='color: red;' href='../process/delete_admin.php?id=".$row["id"]."'>ลบ</a></td>
                        </tr>
                      ";

                    $count++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include "footer.php"; ?>
