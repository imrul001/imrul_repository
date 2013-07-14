<?php

$std_id = $_GET['std_id'];
$sql = "DELETE from input WHERE std_id='" . $std_id . "'";
$sql1 = "DELETE from exam WHERE std_id='" . $std_id . "'";
$fileName = $std_id . ".jpg";
$imageFileName = "./template/uploaded_student_images/$fileName";
if (file_exists($imageFileName)) {
  unlink($imageFileName);
  $deletion = true;
}
if ($deletion) {
  $result = mysql_query($sql);
  $result1 = mysql_query($sql1);
  if ($result && $result1 && $deletion) {
    echo $std_id;
  } else {
    echo die(mysql_error()) . 'failed';
  }
} else {
  echo 'failed';
}
?>
