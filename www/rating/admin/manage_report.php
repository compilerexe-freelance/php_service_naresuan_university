<?php
  include "header_admin.php";
  $_SESSION["active_menu"] = "manage_report";
  include "navbarside_admin.php";
  include "../process/config.php";

  if ($_SESSION["status"] == "เสร็จสิ้น") {
      echo '<script>
            var service_id = '.$_GET["id"].';
            var score = 0;
            $(document).ready(function() {
                $(\'#input-2\').rating({
                    step: 1,
                    showCaption: false,
                    starCaptions: {1: \'Very Poor\', 2: \'Poor\', 3: \'Ok\', 4: \'Good\', 5: \'Very Good\'},
//                    starCaptionClasses: {1: \'text-danger\', 2: \'text-warning\', 3: \'text-info\', 4: \'text-primary\', 5: \'text-success\'}
                });
                    
                $(\'#input-2\').on(\'rating.change\', function(event, value, caption) {
                    score = value;
                    console.log(value);
                    console.log(caption);
                });

               $(\'#myModal\').modal();
               
               $("#myModal").on("click", function() {
                    location.reload();    
               });
               
               $("#btn_rate_submit").on("click", function() {
                   $.post("../process/insert_rate.php",
                   {
                        service_id: service_id,
                        score: score
                   },
                   function(data, status){
                        if (status == "success") {
                            location.reload();
                        }
//                        alert("Data: " + data + "\nStatus: " + status);
                   });
               });
                
            });
        </script>';
  }

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

    <div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="form-group text-center" style="margin-top: 10px;">
                    <span style="font-size: 24px;">ให้คะแนนความพึ่งพอใจ</span>
                </div>
                <div class="form-group" style="text-align: center;">
<!--                    <input id="input-id" name="input-1" class="rating-loading" data-min="0" data-max="5" data-step="1" data-show-clear="false" >-->
                    <input id="input-2" name="input-2" class="rating-loading" data-show-clear="false">
                </div>
                <div class="form-group">
                    <button type="button" id="btn_rate_submit" class="btn btn-success" style="width: 100%; font-size: 18px; border-radius: 0px;">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

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
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>รหัสการขอรับบริการ</th>
            <th>วันที่</th>
            <th>รายละเอียดการขอรับบริการ</th>
            <th>สถานะ</th>
            <th>แก้ไข / ลบ</th>
            <th>ดาวน์โหลด</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM service";
            $result_service = $conn->query($sql);
            while ($row_service = mysqli_fetch_assoc($result_service)) {
              echo "
                <tr>
                  <td>".$row_service["service_code"]."</td>
                  <td>".$row_service["created_at"]."</td>
              ";

              $service_id = $row_service["id"];
              $sql = "SELECT * FROM problem WHERE service_id = $service_id";
              $result_problem = $conn->query($sql);
              while ($row_problem = mysqli_fetch_assoc($result_problem)) {
                echo "<td>".
                $row_problem["hardware"]." ".
                $row_problem["software"]." ".
                $row_problem["network"]." ".
                $row_problem["other"]." ".
                $row_problem["note"].
                "</td>";
              }

              $sql = "SELECT * FROM status WHERE service_id = $service_id";
              $result_status = $conn->query($sql);
              while ($row_status = mysqli_fetch_assoc($result_status)) {
                echo "<td>".$row_status["status"]."</td>";

                if ($row_status["status"] != "เสร็จสิ้น") {
                 echo "
                 <td><a style='color: green;' href='update_service.php?id=".$service_id."'>แก้ไข</a> / <a style='color: red;' href='../process/delete_service.php?id=".$service_id."'>ลบ</a></td>
                 ";
                } else {
                    echo "
                    <td><a style='color: red;' href='../process/delete_service.php?id=".$service_id."'>ลบ</a></td>
                    ";
                }

              }

              echo "
                  <td><a style='color: green;' target='_blank' href='../process/download.php?id=".$service_id."'>ดาวน์โหลด</a></td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php include "footer.php"; ?>
