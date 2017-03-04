<?php
include "header_admin.php";
$_SESSION["active_menu"] = "manage_print";
include "navbarside_admin.php";
require_once ("../process/config.php");
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

<div class="row">
    <div class="col-md-2">
        <div class="form-inline" style="text-align: right;">
            <div class="form-group" style="margin-top: 35px;">
                <label for="" style="font-size: 16px;">ปี พ.ศ.</label>
                <select name="year_selected" id="year_selected" class="form-control" style="font-size: 16px;">
                    <?php
                    for ($i = 55; $i <= 80; $i++) {
                        if ((date("Y") + 543) == (2500 + $i)) {
                            $year_selected = 2500 + $i;
                            echo '<option value="25'.$i.'" selected>25'.$i.'</option>';
                        } else {
                            echo '<option value="25'.$i.'">25'.$i.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-10">

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                    <th style="border: 0px solid #FFFFFF !important;"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="01"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>ม.ค.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="02"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>ก.พ.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="03"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>มี.ค.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="04"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>เม.ษ.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="05"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>พ.ค.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="06"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>มิ.ย.</span></td>
                </tr>
                <tr>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="07"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>ก.ค.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="08"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>ส.ค.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="09"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>ก.ย.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="10"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>ต.ค.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="11"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>พ.ย.</span></td>
                    <td style="border: 0px solid #FFFFFF !important;"><input type="radio" name="selected_month" id="selected_month" value="12"></td>
                    <td style="border: 0px solid #FFFFFF !important;"><span>ธ.ค.</span></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center;">รหัสการขอรับบริการ</th>
                    <th style="text-align: center;">วันที่</th>
                    <th style="text-align: center;">รายละเอียดการขอรับบริการ</th>
                    <th style="text-align: center;">คะแนนความพึ่งพอใจ</th>
                </tr>
                </thead>
                <tbody id="table_report">

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row" style="//margin-top: 50px;">
    <div class="col-md-12 text-center">
        <div class="form-group">
            <span style="font-size: 20px;">รายงานผลการดำเนินงานของเจ้าหน้าที่หน่วยไอที</span>
        </div>
        <div class="form-group">
            <span style="font-size: 20px;">คณะวิทยาศาสตร์ มหาวิทยาลัยนเรศวร</span>
        </div>
        <div class="form-group">
            <span style="font-size: 20px;">ประจำเดือน <span id="text_month"></span> ปีพุทธศักราช <span id="text_year"></span></span>
        </div>
    </div>
</div>

<div class="row" style="//margin-top: 50px;">
    <div class="col-md-4 col-md-offset-4">
        <div class="form-group text-center">
            <a id="process_print" href="#"><button type="button" class="btn btn-success" style="width: 100%; font-size: 18px;"><i class="fa fa-print"></i> พิมพ์</button></a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        function fetch_report_year () {
            $("#text_year").text($("#year_selected").val());
            $.post("../process/fetch_report_year.php", {
                    get_year: $("#year_selected").val()
                },
                function (data, status) {
                    $("#table_report").html(data);
                    $("#process_print").prop("href", "../process/print_from_year.php?year=" + $("#year_selected").val());
                });
        }

        function fetch_report_month () {

            switch ($("input[name='selected_month']:checked").val()) {
                case "01" : $("#text_month").text("มกราคม"); break;
                case "02" : $("#text_month").text("กุมภาพันธ์"); break;
                case "03" : $("#text_month").text("มีนาคม"); break;
                case "04" : $("#text_month").text("เมษายน"); break;
                case "05" : $("#text_month").text("พฤษภาคม"); break;
                case "06" : $("#text_month").text("มิถุนายน"); break;
                case "07" : $("#text_month").text("กรกฎาคม"); break;
                case "08" : $("#text_month").text("สิงหาคม"); break;
                case "09" : $("#text_month").text("กันยายน"); break;
                case "10" : $("#text_month").text("ตุลาคม"); break;
                case "11" : $("#text_month").text("พฤศจิกายน"); break;
                case "12" : $("#text_month").text("ธันวาคม"); break;
            }

            $.post("../process/fetch_report_month.php", {
                    get_month: $("input[name='selected_month']:checked").val(),
                    get_year: $("#year_selected").val()
                },
                function (data, status) {
                    $("#table_report").html(data);
                    $("#process_print").prop("href", "../process/print_from_month.php?month=" + $("input[name='selected_month']:checked").val() + "&year=" + $("#year_selected").val());
//                console.log(data);
                });
        }

        fetch_report_year();

        $("#year_selected").on("change", function() {
            $("input[name='selected_month']").prop("checked", false);
            fetch_report_year();
        });

        $("input[name='selected_month']").on("change", function() {
            fetch_report_month();
        });
    });
</script>

<?php include "footer.php"; ?>
