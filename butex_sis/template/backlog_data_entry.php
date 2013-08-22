<?php
$std_id = $_GET['std_id'];
$LT = $_GET['LT'];
$course = $_GET['course'];
if (!empty($std_id)) {
  $sql = "SELECT std_id FROM  backlog WHERE std_id=$std_id";
  $result = mysql_query($sql);
  if (!empty($result) && mysql_num_rows($result)> 0) {
    $sql = "UPDATE backlog SET $LT='$course' WHERE std_id=$std_id";
    if (!@mysql_query($sql)) {
      die(mysql_error());
    } else {
      echo 'Exam Result Edited Successfully';
    }
  } else {
    $sql = "INSERT INTO `backlog` (`std_id`, `$LT`) VALUES('$std_id', '$course')";
    if (!@mysql_query($sql)) {
      die(mysql_error());
    } else {
      echo 'Exam Result Inserted Successfully';
    }
  }
}
?>