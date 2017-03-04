<?php
include "header.php";
$_SESSION["active_menu"] = "report";
include "navbarside.php";
include "process/config.php";

$service_id = $_GET["id"];
$sql = "SELECT * FROM service WHERE id = $service_id";
$result = $conn->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
    $service_code = $row["service_code"];
    $full_name = $row["full_name"];
    $major = $row["major"];
    $created_at = $row["created_at"];
}

$sql = "SELECT * FROM problem WHERE service_id = $service_id";
$result = $conn->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
    $hardware = $row["hardware"];
    $software = $row["software"];
    $network = $row["network"];
    $other = $row["other"];
    $note = $row["note"];
}

$sql = "SELECT * FROM status WHERE service_id = $service_id";
$result = $conn->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
    $status = $row["status"];
}

?>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-2 col-md-offset-3">

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <span style="font-size: 26px; color: green;">รหัสบริการ <?php echo $service_code; ?></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px;">วัน/เดือน/ปี</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="datepicker form-control" name="date" style="font-size: 16px" value="<?php echo $created_at; ?>" required disabled></input>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px; color: blue;">ข้อมูลของผู้รับบริการ</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px;">ชื่อ-นามสกุล</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" name="full_name" id="full_name" style="font-size: 16px" value="<?php echo $full_name; ?>" required disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px;">ภาควิชา</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="major" id="" class="form-control" style="font-size: 16px" disabled>
                    <option value="ชีววิทยา" <?php if ($major == "ชีววิทยา") { echo "selected"; } ?> >
                        ชีววิทยา
                    </option>
                    <option value="คณิตศาสตร์" <?php if ($major == "คณิตศาสตร์") { echo "selected"; } ?> >
                        คณิตศาสตร์
                    </option>
                    <option value="เคมี" <?php if ($major == "เคมี") { echo "selected"; } ?> >
                        เคมี
                    </option>
                    <option value="วิทยาการคอมพิวเตอร์และเทคโนโลยี" <?php if ($major == "วิทยาการคอมพิวเตอร์และเทคโนโลยี") { echo "selected"; } ?> >
                        วิทยาการคอมพิวเตอร์และเทคโนโลยี
                    </option>
                    <option value="ฟิสิกส์" <?php if ($major == "ฟิสิกส์") { echo "selected"; } ?> >
                        ฟิสิกส์
                    </option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px; color: blue;">ปัญหาที่แจ้งซ่อม</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <input type="checkbox" id="hardware_checkbox" <?php if (!empty($hardware)) { echo "checked"; } ?> > <span style="font-size: 18px;">Hardware</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="hardware_select" id="hardware_select" class="form-control" style="font-size: 16px" disabled>

                    <option value="จอภาพ" <?php if ($hardware == "จอภาพ") { echo "selected"; } ?> >
                        จอภาพ
                    </option>
                    <option value="แป้นพิมพ์" <?php if ($hardware == "แป้นพิมพ์") { echo "selected"; } ?> >
                        แป้นพิมพ์
                    </option>
                    <option value="เคส" <?php if ($hardware == "เคส") { echo "selected"; } ?> >
                        เคส
                    </option>
                    <option value="เมาส์" <?php if ($hardware == "เมาส์") { echo "selected"; } ?> >
                        เมาส์
                    </option>
                    <option value="เครื่องปริ้น" <?php if ($hardware == "เครื่องปริ้น") { echo "selected"; } ?> >
                        เครื่องปริ้น
                    <option value="โปรเจคเตอร์" <?php if ($hardware == "โปรเจคเตอร์") { echo "selected"; } ?> >
                        โปรเจคเตอร์
                    </option>

                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <input type="checkbox" id="software_checkbox" <?php if (!empty($software)) { echo "checked"; } ?> > <span style="font-size: 18px;">Software</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="software_select" id="software_select" class="form-control" style="font-size: 16px" disabled>

                    <option value="ระบบปฏิบัติการ" <?php if ($software == "ระบบปฏิบัติการ") { echo "selected"; } ?> >
                        ระบบปฏิบัติการ
                    </option>
                    <option value="โปรแกรม" <?php if ($software == "โปรแกรม") { echo "selected"; } ?> >
                        โปรแกรม
                    </option>
                    <option value="ไดร์เวอร์" <?php if ($software == "ไดร์เวอร์") { echo "selected"; } ?> >
                        ไดร์เวอร์
                    </option>

                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <input type="checkbox" id="network_checkbox" <?php if (!empty($network)) { echo "checked"; } ?> > <span style="font-size: 18px;">Network</span>
                <input type="text" name="network" id="network" value="network" hidden disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <input type="checkbox" id="other_checkbox" <?php if (!empty($other)) { echo "checked"; } ?> > <span style="font-size: 18px;">อื่นๆ (โปรดระบุ)</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" name="other" id="other" style="font-size: 16px" value="<?php if (!empty($other)) { echo $other; } ?>" disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px;">หมายเหตุ</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" name="note" value="<?php echo $note; ?>" style="font-size: 16px" disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <div class="form-group">
                <span style="font-size: 18px;">สถานะ</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="status_select" id="status_select" class="form-control" style="font-size: 16px" disabled>

                    <option value="ใหม่" <?php if ($status == "ใหม่") { echo "selected"; } ?> >
                        ใหม่
                    </option>
                    <option value="กำลังดำเนินการ" <?php if ($status == "กำลังดำเนินการ") { echo "selected"; } ?> >
                        กำลังดำเนินการ
                    </option>
                    <option value="เสร็จสิ้น" <?php if ($status == "เสร็จสิ้น") { echo "selected"; } ?> >
                        เสร็จสิ้น
                    </option>

                </select>
            </div>
        </div>
    </div>


<?php include "footer.php"; ?>
