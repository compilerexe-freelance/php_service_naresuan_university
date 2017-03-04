<?php
require_once("config.php");
require_once("../assets/mpdf60/mpdf.php");

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

$mpdf = new mPDF('th');

$html = '
<style>
    tr td {
        font-size: 18px;
    }
</style>
<table>
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="color: blue; font-size: 20px; font-weight: bold;">ข้อมูลผู้รับบริการ</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>วัน / เดือน / ปี</td>
            <td>:&ensp;&ensp;'.$created_at.'</td>
        </tr>
        <tr>
            <td>ชื่อ-นามสกุล</td>
            <td>:&ensp;&ensp;'.$full_name.'</td>
        </tr>
        <tr>
            <td>ภาควิชา</td>
            <td>:&ensp;&ensp;'.$major.'</td>
        </tr>
        <tr>
            <td><br><br></td>
            <td></td>
        </tr>
        <tr>
            <td style="color: blue; font-size: 20px; font-weight: bold;">ปัญหาที่แจ้งซ่อม</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Hardware</td>
            <td>:&ensp;&ensp;'.$hardware.'</td>
        </tr>
        <tr>
            <td>Software</td>
            <td>:&ensp;&ensp;'.$software.'</td>
        </tr>
        <tr>
            <td>Network</td>
            <td>:&ensp;&ensp;'.$network.'</td>
        </tr>
        <tr>
            <td>อื่นๆ</td>
            <td>:&ensp;&ensp;'.$other.'</td>
        </tr>
        <tr>
            <td>หมายเหตุ</td>
            <td>:&ensp;&ensp;'.$note.'</td>
        </tr>
        <tr>
            <td>สถานะ</td>
            <td>:&ensp;&ensp;'.$status.'</td>
        </tr>
    </tbody>
</table>
';

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>