<?php

$dataTime = $_POST['date_time'];
$std_id = $_POST['student_id'];
$punishment = $_POST['punishment'];
$warning = $_POST['warning'];

if (!empty($std_id) && !empty($punishment) && !empty($warning)) {
  $sql = "SELECT std_id FROM input WHERE std_id=$std_id";
  $result = mysql_query($sql);
  $num = mysql_num_rows($result);
  if ($num >= 1) {
    $sql = "INSERT INTO `norm` (`date_time`, `std_id`, `punishment`, `warning`) VALUES('$dataTime', '$std_id', '$punishment', '$warning')";
    if (!@mysql_query($sql)) {
      die(mysql_error());
    } else {
      echo 'Data Entered Successfully';
    }
  }else{
    echo "No Stundent found for: ".$std_id;
  }
}else{
  echo "All Field Required";
}
?>