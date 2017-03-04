<?php
    require_once ("config.php");

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

                $compare_year = $row["created_at"];
                $compare_year = explode('-', $compare_year);
                unset($compare_year[0]);
                unset($compare_year[1]);

                if ($get_year == implode($compare_year)) {

                    echo '
                          <tr>
                            <td>'.$row["service_code"].'</td>
                            <td>'.$row["created_at"].'</td>
                            ';

                    $service_id = $row["id"];

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

    $total_score = $total_score / $count_score;

    if ($total_score > 0) {
        $total_score = number_format($total_score, 1);
        echo '
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><span>ค่าเฉลี่ย = '.$total_score.'</span></td>
            </tr>
            ';
    }


?>