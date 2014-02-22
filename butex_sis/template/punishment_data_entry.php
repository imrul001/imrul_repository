<?php

$method = isset($_GET['method']) ? $_GET['method'] : '';
if (!empty($method)) {
    $dataTime = isset($_GET['date_time']) ? $_GET['date_time'] : '';
    $std_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';
    $punishment = isset($_GET['punishment']) ? $_GET['punishment'] : '';
    $warning = isset($_GET['warning']) ? $_GET['warning'] : '';
    $rand_id = isset($_GET['rand-id']) ? $_GET['rand-id'] : '';
} else {
    $dataTime = isset($_POST['date_time']) ? $_POST['date_time'] : '';
    $std_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    $punishment = isset($_POST['punishment']) ? $_POST['punishment'] : '';
    $warning = isset($_POST['warning']) ? $_POST['warning'] : '';
}
if (!empty($std_id) && (!empty($punishment) || !empty($warning))) {
    $sql = "SELECT std_id FROM input WHERE std_id=$std_id";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);
    $id = md5(createRandom_number());
    if ($num >= 1) {
        if (empty($method)) {
            $sql = "INSERT INTO `norm` (`id`, `date_time`, `std_id`, `punishment`, `warning`) VALUES('$id', '$dataTime', '$std_id', '$punishment', '$warning')";
            if (!@mysql_query($sql)) {
                die(mysql_error());
            } else {
                echo 'Data Entered Successfully';
            }
        }
        if ($method == 'CREATE') {
            $sql = "INSERT INTO `norm` (`id`, `date_time`, `std_id`, `punishment`, `warning`) VALUES('$id', '$dataTime', '$std_id', '$punishment', '$warning')";
            if (!@mysql_query($sql)) {
                die(mysql_error());
            } else {
                echo 'Data Entered Successfully';
            }
        }
        if ($method == 'EDIT' && !empty($rand_id)) {
            $sql = "UPDATE `norm` SET punishment='$punishment', warning='$warning' WHERE id='$rand_id'";
            if (!@mysql_query($sql)) {
                die(mysql_error());
            } else {
                echo 'Data Edited Successfully';
            }
        }
        if ($method == 'DELETE' && !empty($rand_id) && !empty($std_id)) {
            $sql = "DELETE FROM `norm` WHERE id='$rand_id' AND std_id='$std_id'";
            if (!@mysql_query($sql)) {
                die(mysql_error());
            } else {
                echo 'Data Deleted Successfully';
            }
        }
    } else {
        echo "No Stundent found for: " . $std_id;
    }
} else {
    echo "All Field Required";
}

function createRandom_number() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    srand((double) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 5) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}

?>