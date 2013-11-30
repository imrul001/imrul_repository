<?php 
$std_id = $_POST['std_id'];
$sql = "UPDATE input SET link='no' WHERE std_id='" . $std_id . "'";
$fileName = $std_id . ".jpg";
$imageFileName = "./template/uploaded_student_images/$fileName";
if (file_exists($imageFileName)) {
  unlink($imageFileName);
  $deletion = true;
}
if ($deletion) {
  $result = mysql_query($sql);
  if ($result && $deletion) {
    echo $std_id;
  } else {
    echo die(mysql_error()) . 'failed';
  }
} else {
  echo 'failed';
}
?>