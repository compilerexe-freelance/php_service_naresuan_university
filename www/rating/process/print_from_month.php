<?php
require_once ("config.php");
require_once("../assets/mpdf60/mpdf.php");

$get_month = $_GET["month"];
$get_year = $_GET["year"];

$count_score = 0;
$total_score = 0;

$mpdf = new mPDF('th');

$html = '
<html>
<head>
<style>
    tr th {
        text-align: center;
    }
    tr td {
    text-align: center;
    }
</style>
</head>
<body>

    <div style="margin-bottom: 50px; font-size: 20px; font-weight: bold; text-align: center;">
        <span>สรุปแบบประเมินความพึ่งพอใจ</span>
    </div>

    <table border="1">
        <thead>
          <tr>
            <th style="width: 170px;">รหัสการขอรับบริการ</th>
            <th style="width: 100px;">วันที่</th>
            <th style="width: 250px;">รายละเอียดการขอรับบริการ</th>
            <th style="width: 180px;">คะแนนความพึ่งพอใจ</th>
          </tr>
        </thead>
        <tbody>
';

$sql = "SELECT * FROM status";
$result_status = $conn->query($sql);
while ($row_status = mysqli_fetch_assoc($result_status)) {
    if ($row_status["status"] == "เสร็จสิ้น") {
        $service_done = $row_status["service_id"];



        $sql = "SELECT * FROM service WHERE id = $service_done";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $compare_month = $row["created_at"];
            $compare_month = explode('-', $compare_month);
            unset($compare_month[0]);
            unset($compare_month[2]);

            $compare_year = $row["created_at"];
            $compare_year = explode('-', $compare_year);
            unset($compare_year[0]);
            unset($compare_year[1]);

            if ($get_month == implode($compare_month) && $get_year == implode($compare_year)) {

                $html = $html . '
                              <tr>
                                <td>'.$row["service_code"].'</td>
                                <td>'.$row["created_at"].'</td>
                                ';

                $service_id = $row["id"];

                $sql = "SELECT * FROM problem WHERE service_id = $service_id";
                $result_problem = $conn->query($sql);
                while ($row_problem = mysqli_fetch_assoc($result_problem)) {
                    $html = $html . "<td>".
                        $row_problem["hardware"]." ".
                        $row_problem["software"]." ".
                        $row_problem["network"]." ".
                        $row_problem["other"]." ".
                        $row_problem["note"].
                        "</td>";
                }

                $sql = "SELECT * FROM rate WHERE service_id = $service_id";
                $result_problem = $conn->query($sql);
                while ($row_problem = mysqli_fetch_assoc($result_problem)) {

                    $count_score++;
                    $total_score = $total_score + $row_problem["score"];

                    $html = $html . "<td>".
                        $row_problem["score"].
                        "</td>";
                }

                $html = $html . '
                              </tr>
                        ';

            }

        }

    }
}

$total_score = $total_score / $count_score;

if ($total_score > 0) {
    $total_score = number_format($total_score, 1);
    $html = $html . '
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><span>ค่าเฉลี่ย = '.$total_score.'</span></td>
        </tr>
        ';
}

// convert month number to text
switch ($get_month) {
    case "01" : $text_month = "มกราคม"; break;
    case "02" : $text_month = "กุมภาพันธ์"; break;
    case "03" : $text_month = "มีนาคม"; break;
    case "04" : $text_month = "เมษายน"; break;
    case "05" : $text_month = "พฤษภาคม"; break;
    case "06" : $text_month = "มิถุนายน"; break;
    case "07" : $text_month = "กรกฎาคม"; break;
    case "08" : $text_month = "สิงหาคม"; break;
    case "09" : $text_month = "กันยายน"; break;
    case "10" : $text_month = "ตุลาคม"; break;
    case "11" : $text_month = "พฤศจิกายน"; break;
    case "12" : $text_month = "ธันวาคม"; break;
}

$html = $html . '
        </tbody>
    </table>
    
    <div style="margin-top: 50px; text-align: center;">
        <span>รายงานผลการดำเนินงานของเจ้าหน้าที่หน่วยไอที</span>
    </div>
    <div style="text-align: center;">
        <span>คณะวิทยาศาสตร์ มหาวิทยาลัยนเรศวร</span>
    </div>
    <div style="text-align: center;">
        <span>ประจำเดือน <span id="text_month">'.$text_month.'</span> ปีพุทธศักราช <span id="text_year">'. $get_year .'</span></span>
    </div>
    
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>