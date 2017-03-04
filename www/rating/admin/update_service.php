<?php
  include "header_admin.php";
  $_SESSION["active_menu"] = "manage_report";
  include "navbarside_admin.php";
  include "../process/config.php";

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

<form id="form_service" action="../process/update_service.php?id=<?php echo $service_id; ?>" method="post">

  <div class="row" style="margin-top: 20px;">
    <div class="col-md-2 col-md-offset-3">
      <div class="form-group">
        <span style="font-size: 26px; color: green;">แก้ไข</span>
      </div>
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
        <input type="text" class="datepicker form-control" name="date" style="font-size: 16px" value="<?php echo $created_at; ?>" required></input>
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
        <input type="text" class="form-control" name="full_name" id="full_name" style="font-size: 16px" value="<?php echo $full_name; ?>" required>
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
        <select name="major" id="" class="form-control" style="font-size: 16px">
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
        <select name="hardware_select" id="hardware_select" class="form-control" style="font-size: 16px" <?php if (empty($hardware)) { echo "disabled"; } ?> >

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
        <select name="software_select" id="software_select" class="form-control" style="font-size: 16px" <?php if (empty($software)) { echo "disabled"; } ?> >

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
        <input type="text" class="form-control" name="other" id="other" style="font-size: 16px" value="<?php if (!empty($other)) { echo $other; } ?>" <?php if (empty($other)) { echo "disabled"; } ?> >
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
        <input type="text" class="form-control" name="note" value="<?php echo $note; ?>" style="font-size: 16px">
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
        <select name="status_select" id="status_select" class="form-control" style="font-size: 16px">

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

  <div class="row">
    <div class="col-md-2 col-md-offset-5" style="margin-bottom: 10px;">
      <button type="button" id="btn_submit" class="btn btn-success" style="font-size: 16px; width: 100%;">เสร็จสิ้น</button>
    </div>
    <div class="col-md-2">
      <a href="manage_report.php"><button type="button" id="btn_reset" class="btn btn-danger" style="font-size: 16px; width: 100%;">ยกเลิก</button></a>
    </div>
  </div>

</form>

<script>

  $(document).ready(function() {

      $(".datepicker").datepicker({
          maxDate: new Date(),
          dateFormat: "yy-mm-dd",
          onSelect: function(data) {
              var d = new Date(data);

              var day = zerofilled(d.getDate());
              var month = zerofilled(d.getMonth() + 1);
              var year = zerofilled(d.getFullYear() + 543);

              $(this).val(day+"-"+month+"-"+year);
          }
      });

      function zerofilled (val) {
          switch (val) {
              case 1: val = "01"; break;
              case 2: val = "02"; break;
              case 3: val = "03"; break;
              case 4: val = "04"; break;
              case 5: val = "05"; break;
              case 6: val = "06"; break;
              case 7: val = "07"; break;
              case 8: val = "08"; break;
              case 9: val = "09"; break;
              default: val = val.toString();
          }
          return val;
      }

    var status_hardware, status_software, status_network, status_other;

    $("#hardware_checkbox").on("change", function() {
      if ($(this).is(":checked") == true) {
        $("#hardware_select").prop("disabled", false);
      } else {
        $("#hardware_select").prop("disabled", true);
      }
    });

    $("#software_checkbox").on("change", function() {
      if ($(this).is(":checked") == true) {
        $("#software_select").prop("disabled", false);
      } else {
        $("#software_select").prop("disabled", true);
      }
    });

    $("#network_checkbox").on("change", function() {
      if ($(this).is(":checked") == true) {
        $("#network").prop("disabled", false);
      } else {
        $("#network").prop("disabled", true);
      }
    });

    $("#other_checkbox").on("change", function() {
      if ($(this).is(":checked") == true) {
        $("#other").prop("disabled", false);
      } else {
        $("#other").prop("disabled", true);
      }
    });

    $("#btn_submit").on("click", function() {

      if ($("#full_name").val().length <= 0) {
        swal({
          title: "",
          text: "<span style=\"font-size: 16px;\">กรุณากรอกข้อมูลให้ครบ</span>",
          html: true
        });
      } else {

        status_hardware = false;
        status_software = false;
        status_network = false;
        status_other = false;

        if ($("#hardware_checkbox").is(":checked") == true) {
          status_hardware = true;
        }

        if ($("#software_checkbox").is(":checked") == true) {
          status_software = true;
        }

        if ($("#network_checkbox").is(":checked") == true) {
          status_network = true;
        }

        if ($("#other_checkbox").is(":checked") == true) {
          if ($("#other").val().length > 0) {
            status_other = true;
          }
        } else {
          $("#other").val("");
        }

        if ((status_hardware == true || status_software == true) || (status_network == true || status_other == true)) {
          $("#form_service").submit();
        } else {
          swal({
              title: "",
              text: "<span style=\"font-size: 16px;\">กรุณาตรวจสอบข้อมูลอีกครั้ง</span>",
              html: true
            });
        }

      }

    });
  });

</script>

<?php include "footer.php"; ?>
