<?php

$allowedExts = array("jpg", "jpeg", "gif", "png");

$extension = end(explode(".", $_FILES["file"]["name"]));

$std_id = $_POST['student_id'];
$file_name = $_FILES["file"]["name"];
$new_name = $std_id.".jpg";

$sql = "SELECT link FROM input WHERE std_id='".$std_id."' AND link='no'";
$result = mysql_query($sql);
if(!empty($result)){
  $num_link= mysql_num_rows($result);
}
else{
  die(mysql_error());	
  $num_link = 0;
}
//while ($row = mysql_fetch_array($result)) {
//  $link = $row['link'];
//}
//$link = 'no';
if ($num_link < 1) {
  echo "This Student has photo already or is not registered";
} else {
  if (!empty($std_id) && !empty($_FILES['file']['name'])) {
    if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "application/pdf"))
            && ($_FILES["file"]["size"] < 70000000000000)
            && in_array($extension, $allowedExts)) {
      if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . ".";
      } else {
        if (file_exists("./template/uploaded_student_images/" . $_FILES["file"]["name"])) {
          echo $_FILES["file"]["name"] . " already exists. ";
        } else {
          $sql = "UPDATE input SET link='$new_name' WHERE std_id=$std_id";
          if (!mysql_query($sql)) {
            die(mysql_error());
          } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "./template/uploaded_student_images/" . $std_id .".jpg");
            echo 'The photo is Successfully ..' . $new_name;
          }
        }
      }
    } else {
      echo "Invalid file";
    }
  } else {
    echo 'All Fields are Required';
  }
}
?>