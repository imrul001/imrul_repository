<?php

$allowedExts = array("jpg", "jpeg", "gif", "png", "pdf");
$extension = end(explode(".", $_FILES["file"]["name"]));
$title = $_POST['notice_title'];
$file_name = $_FILES["file"]["name"];
$date_of_upload = date("jS-F-Y h:i:s a", time());
$related_employee = null;
$employee[] = null;
$from = "butex.edu.bd";
$counter = 0;
for ($i = 0;; $i++) {
  if (empty($_POST['p_scnt_' . $i])) {
    break;
  } else {
    $employee[$i] = $_POST['p_scnt_' . $i];
    $related_employee = $related_employee . " " . $_POST['p_scnt_' . $i] . ", ";
    $counter++;
  }
}
if (!empty($title) && !empty($_FILES['file']['name']) && !empty($_POST["notice_to_board"])) {
  if ((($_FILES["file"]["type"] == "image/gif")
          || ($_FILES["file"]["type"] == "image/jpeg")
          || ($_FILES["file"]["type"] == "image/pjpeg")
          || ($_FILES["file"]["type"] == "application/pdf"))
          && ($_FILES["file"]["size"] < 70000000000000)
          && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
      echo "Return Code: " . $_FILES["file"]["error"] . ".";
    } else {
//    echo "Title: " . $_POST['notice_title'] . "<br />";
//    echo "Uploaded File Name : " . $_FILES["file"]["name"] . "<br />";
//    echo "Type : " . $_FILES["file"]["type"] . "<br />";
//    echo "Size : " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      $href = $_SERVER["SERVER_NAME"];

      if (file_exists("../template/uploaded_notice_files/" . $_FILES["file"]["name"]) || file_exists("../template/uploaded_notice_files/confidential/" . $_FILES['file']['name'])) {
        echo $_FILES["file"]["name"] . " already exists. ";
      } else {

        if ($_POST["notice_to_board"] == "yes") {
          move_uploaded_file($_FILES["file"]["tmp_name"], "../template/uploaded_notice_files/" . $_FILES["file"]["name"]);
          $notice_id = md5(createRandom_number());
          $type = 'glob';
          $sql = "INSERT INTO `notice_manager` (`notice_title`, `file_name`, `related_employees`, `date_of_publication`, `notice_id`) VALUES('$title', '$file_name', '$related_employee', '$date_of_upload', '$notice_id')";
          @mysql_query($sql);
        } else {
          move_uploaded_file($_FILES["file"]["tmp_name"], "../template/uploaded_notice_files/confidential/" . $_FILES["file"]["name"]);
          $notice_id = md5(createRandom_number());
          $type = 'conf';
          $sql = "INSERT INTO `confidential_notice` (`notice_title`, `file_name`, `related_employees`, `date_of_publication`, `notice_id` ) VALUES('$title', '$file_name', '$related_employee', '$date_of_upload', '$notice_id')";
          @mysql_query($sql);
        }
//                $href = $_SERVER['SERVER_NAME'];

        for ($j = 0; $j < $counter; $j++) {
          $sql1 = "SELECT email FROM `butex_table` WHERE full_name='$employee[$j]' LIMIT 1";
          $result = @mysql_query($sql1);
          $row = @mysql_fetch_array($result);
          $msg = <<<EOF
<html>
  <body bgcolor="#DCEEFC">
    <center>
        <P>Hello</p>
        <b>"$employee[$j]"</b> <br>
        <font color="Blue">You have a Notice. To check it or Download Please Click the following link</font> <br>
        <a href="http://$href/template/download_notice.php?f=$file_name&type=$type&notice_id=$notice_id">click here</a>
      <br><br>***  This was a randomly generated message, please do not respond to this e-mail. <br> Regards<br>
    </center>
  </body>
</html>
EOF;
              //      $to = "admin@localhost";
          $to = $row['email'];
          $subject = "Notice from Bangladeh University of Textiles";
          $headers = "From:$from \n";
          $headers .= "Content-type: text/html\n";
          

          /* E-Mail Confirmation Letter */
          mail($to, $subject, $msg, $headers);
        }
        echo 'The notice is Successfully Publish..';
//                echo "Stored in: " . "./template/upload/" . $_FILES["file"]["name"];
      }
    }
  } else {
    echo "Invalid file";
  }
} else {
  echo 'All Fields are Required';
}

function createRandom_number() {
  $chars = "abcdefghijkmnopqrstuvwxyz023456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  srand((double) microtime() * 1000000);
  $i = 0;
  $pass = '';
  while ($i <= 10) {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;
  }
  return $pass;
}

?>