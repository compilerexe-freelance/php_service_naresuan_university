<?php
  include "header_admin.php";
  $_SESSION["active_menu"] = "manage_service";
  include "navbarside_admin.php";
?>

<form id="form_service" action="../process/insert_service.php" method="post">

  <div class="row" style="margin-top: 20px;">
    <div class="col-md-2 col-md-offset-3">
      <div class="form-group">
        <span style="font-size: 18px;">วัน/เดือน/ปี</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <input type="text" class="datepicker form-control" name="date" style="font-size: 16px" required></input>
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
        <input type="text" class="form-control" name="full_name" id="full_name" style="font-size: 16px" required>
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
          <option value="ชีววิทยา">ชีววิทยา</option>
          <option value="คณิตศาสตร์">คณิตศาสตร์</option>
          <option value="เคมี">เคมี</option>
          <option value="วิทยาการคอมพิวเตอร์และเทคโนโลยี">วิทยาการคอมพิวเตอร์และเทคโนโลยี</option>
          <option value="ฟิสิกส์">ฟิสิกส์</option>
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
        <input type="checkbox" id="hardware_checkbox"> <span style="font-size: 18px;">Hardware</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <select name="hardware_select" id="hardware_select" class="form-control" style="font-size: 16px" disabled>
          <option value="จอภาพ">จอภาพ</option>
          <option value="แป้นพิมพ์">แป้นพิมพ์</option>
          <option value="เคส">เคส</option>
          <option value="เมาส์">เมาส์</option>
          <option value="เครื่องปริ้น">เครื่องปริ้น</option>
          <option value="โปรเจคเตอร์">โปรเจคเตอร์</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2 col-md-offset-3">
      <div class="form-group">
        <input type="checkbox" id="software_checkbox"> <span style="font-size: 18px;">Software</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <select name="software_select" id="software_select" class="form-control" style="font-size: 16px" disabled>
          <option value="ระบบปฏิบัติการ">ระบบปฏิบัติการ</option>
          <option value="โปรแกรม">โปรแกรม</option>
          <option value="ไดร์เวอร์">ไดร์เวอร์</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2 col-md-offset-3">
      <div class="form-group">
        <input type="checkbox" id="network_checkbox"> <span style="font-size: 18px;">Network</span>
        <input type="text" name="network" id="network" value="network" hidden disabled>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2 col-md-offset-3">
      <div class="form-group">
        <input type="checkbox" id="other_checkbox"> <span style="font-size: 18px;">อื่นๆ (โปรดระบุ)</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <input type="text" class="form-control" name="other" id="other" style="font-size: 16px" disabled>
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
        <input type="text" class="form-control" name="note" style="font-size: 16px">
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
          <option value="ใหม่">ใหม่</option>
          <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
          <option value="เสร็จสิ้น">เสร็จสิ้น</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2 col-md-offset-5" style="margin-bottom: 10px;">
      <button type="button" id="btn_submit" class="btn btn-success" style="font-size: 16px; width: 100%;">เสร็จสิ้น</button>
    </div>
    <div class="col-md-2">
      <button type="reset" id="btn_reset" class="btn btn-danger" style="font-size: 16px; width: 100%;">ยกเลิก</button>
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
