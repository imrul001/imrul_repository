<?php

$dataTime = $_POST['date_time'];
$std_id = $_POST['student_id'];
$punishment = $_POST['punishment'];
$warning = $_POST['warning'];

if (!empty($std_id) && !empty($punishment) && !empty($warning)) {
  $sql = "SELECT std_id FROM input WHERE std_id=$std_id";
  $result = mysql_query($sql);
  $num = mysql_num_rows($result);
  $id = md5(createRandom_number());
  if ($num >= 1) {
    $sql = "INSERT INTO `norm` (`id`, `date_time`, `std_id`, `punishment`, `warning`) VALUES('$id', '$dataTime', '$std_id', '$punishment', '$warning')";
    if (!@mysql_query($sql)) {
      die(mysql_error());
    } else {
      echo 'Data Entered Successfully';
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
  while ($i <= 7) {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;
  }
  return $pass;
}

?>