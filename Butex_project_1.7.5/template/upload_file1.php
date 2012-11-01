<?php

$allowedExts = array("jpg", "jpeg", "gif", "png", "pdf");
$extension = end(explode(".", $_FILES["file"]["name"]));
$title = $_POST['Download_title'];
$file_name = $_FILES["file"]["name"];
$date_of_upload = date("jS-F-Y h:i:s a", time());

if(!empty($title) && !empty($file_name)){

if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "application/pdf"))
        && ($_FILES["file"]["size"] < 70000000000000)
        && in_array($extension, $allowedExts)){
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  } else {
//    echo "Title: " . $_POST['Download_title'] . "<br />";
//    echo "Uploaded File Name : " . $_FILES["file"]["name"] . "<br />";
//    echo "Type : " . $_FILES["file"]["type"] . "<br />";
//    echo "Size : " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//    echo 'temp_file: '.($_FILES["file"]["tmp_name"]).'<br />';

    if (file_exists("./template/download_files/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. First Delete the existing file or change the name ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"], "template/download_files/" . $_FILES["file"]["name"]);
      echo 'File Upload is Successfull. File Name:'. $_FILES["file"]["name"];
      $sql = "INSERT INTO `download_manager` (`title`, `file_name`, `date_of_upload`) VALUES('$title', '$file_name', '$date_of_upload')";
      @mysql_query($sql);                
    }
  }
} else {
  echo "Invalid file ";
}
}
else{
  echo "All Fields are Required";
}
?>