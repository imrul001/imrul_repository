<?php

$std_id = $_GET['std_id'];
$sql = "DELETE from input WHERE std_id='" . $std_id . "'";
$sql1 = "DELETE from exam WHERE std_id='" . $std_id . "'";
$sql2 = "DELETE from result_status WHERE student_id='" . $std_id . "'";
$sql3 = "DELETE from backlog WHERE std_id='" . $std_id . "'";
$sql4 = "DELETE from norm WHERE std_id='" . $std_id . "'";
$fileName = $std_id . ".jpg";
$imageFileName = "./template/uploaded_student_images/$fileName";
$result = mysql_query($sql);
$result1 = mysql_query($sql1);
$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);
$result4 = mysql_query($sql4);
if ($result && $result1 && $result2 && $result3 && $result4) {
    if (file_exists($imageFileName)) {
        unlink($imageFileName);
    }
    echo "Information of " . $std_id . " successfully deleted";
} else {
    echo die(mysql_error());
}
?>
