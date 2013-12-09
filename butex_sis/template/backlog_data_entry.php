<?php

$std_id = $_GET['std_id'];
$LT = $_GET['LT'];
$course = $_GET['course'];
if (!empty($std_id)) {
    $sql = "SELECT std_id, $LT FROM  backlog WHERE std_id=$std_id";
    $result = mysql_query($sql);
    if (!empty($result) && mysql_num_rows($result) > 0) {
        $sql = "UPDATE backlog SET $LT='$course' WHERE std_id=$std_id";
        if (!@mysql_query($sql)) {
            die(mysql_error());
        } else {
            chooseStatus($std_id);
//            echo 'Exam Result Edited Successfully';
        }
    } else {
        while ($row = mysql_fetch_array($result)) {
            $std_id = $row['std_id'];
            $failedCourses = $row[$LT];
        }
        !empty($course)? $course=$course.",".$failedCourses: $course= $failedCourses;
        $sql = "INSERT INTO `backlog` (`std_id`, `$LT`) VALUES('$std_id', '$course')";
        if (!@mysql_query($sql)) {
            die(mysql_error());
        } else {
            chooseStatus($std_id);
//            echo 'Exam Result Inserted Successfully';
        }
    }
}

function chooseStatus($std_id) {
    $sql = "SELECT * FROM backlog WHERE std_id=$std_id";
    $backlog = false;
    $column = array("L1T1blog", "L1T2blog", "L2T1blog", "L2T2blog", "L3T1blog", "L3T2blog", "L4T1blog", "L4T2blog");
    $result = mysql_query($sql);
    if (!$result) {
        echo die(mysql_error());
    } else {
        $row = mysql_fetch_array($result);
        for ($i = 0; $i <= 7; $i++) {
            if (!empty($row[$column[$i]])) {
                $backlog = true;
                $sql = "UPDATE backlog SET status='Back Log' WHERE std_id=$std_id";
                $res = mysql_query($sql);
                if (!$res) {
                    echo die(mysql_error());
                }
                break;
            }
        }
        if (!$backlog) {
            $sql = "UPDATE backlog SET status='Clear' WHERE std_id=$std_id";
            $res = mysql_query($sql);
            if (!$res) {
                echo die(mysql_error());
            }
        }
    }
}

?>