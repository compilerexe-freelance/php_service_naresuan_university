<?php
require_once ("config.php");

$get_month = $_POST["get_month"];
$get_year = $_POST["get_year"];

//    $sql = "SELECT * FROM service";
//    $result = $conn->query($sql);
//    while ($row = mysqli_fetch_assoc($result)) {
//
//        $compare_year = $row["created_at"];
//
//    }
//
//
//    $compare_year = explode('-', $compare_year);
//    unset($compare_year[0]);
//    unset($compare_year[1]);
//    echo implode($compare_year);

$count_score = 0;
$total_score = 0;

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

                echo '
                              <tr>
                                <td>'.$row["service_code"].'</td>
                                <td>'.$row["created_at"].'</td>
                                ';

                $service_id = $row["id"];

                $sql = "SELECT * FROM problem WHERE service_id = $service_id";
                $result_problem = $conn->query($sql);
                while ($row_problem = mysqli_fetch_assoc($result_problem)) {
                    echo "<td><a href='view_service.php?id=".$row_problem["service_id"]."'>".
                        $row_problem["hardware"]." ".
                        $row_problem["software"]." ".
                        $row_problem["network"]." ".
                        $row_problem["other"]." ".
                        $row_problem["note"].
                        "</a></td>";
                }

                $sql = "SELECT * FROM rate WHERE service_id = $service_id";
                $result_problem = $conn->query($sql);
                while ($row_problem = mysqli_fetch_assoc($result_problem)) {

                    $count_score++;
                    $total_score = $total_score + $row_problem["score"];

                    echo "<td>".
                        $row_problem["score"].
                        "</td>";
                }

                echo '
                              </tr>
                        ';

            }

        }

    }
}

?>