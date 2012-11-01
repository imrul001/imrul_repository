<?php get_admin_header(); ?>
<?php get_admin_sidebar(); ?>

<div id="content" style="font-family: times new roman; font-size: 15px">

  <?php if (!logged_in()) : ?>
    <p style="color: red;">First You Need To Log In Properly.....<a href="./index.php?p=login" title="Login">Login</a></p>
  <?php else : ?>
    <h2>Notice Manager</h2>
    <p ><strong><?php user_data('user_name'); ?></strong>!Uploaded File Report</p>
    <div class="modal_login_button button_div_admin" style="margin-top: -85px; float: right; margin-right: 99px; width: 18%">
      <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=admin_panel">Admin Panel</a>
    </div>
    <div class="modal_login_button button_div_admin" style="margin-top: -85px; float: right">
      <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=logout">Logout</a>
    </div>
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
    if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "application/pdf"))
            && ($_FILES["file"]["size"] < 70000000000000)
            && in_array($extension, $allowedExts)) {
      if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
      } else {
        echo "Title: " . $_POST['notice_title'] . "<br />";
        echo "Uploaded File Name : " . $_FILES["file"]["name"] . "<br />";
        echo "Type : " . $_FILES["file"]["type"] . "<br />";
        echo "Size : " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";

        if (file_exists("./template/uploaded_notice_files/" . $_FILES["file"]["name"])) {
          echo $_FILES["file"]["name"] . " already exists. ";
        } else {
          move_uploaded_file($_FILES["file"]["tmp_name"], "./template/uploaded_notice_files/" . $_FILES["file"]["name"]);
          if ($_POST["notice_to_board"] == "yes") {
            $sql = "INSERT INTO `notice_manager` (`notice_title`, `file_name`, `related_employees`, `date_of_publication`) VALUES('$title', '$file_name', '$related_employee', '$date_of_upload')";
            @mysql_query($sql);
          }

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
        <a href="http://forhadlifestyle.com/imrul/Butex_project_1.7.2/template/download_notice.php?f=$file_name">click here</a>
      <br><br>***  This was a randomly generated message, please do not respond to this e-mail. <br> Regards<br>
    </center>
  </body>
</html>
EOF;
            //$to = "admin@localhost";
            $to = $row['email'];
            $subject = "Notice from Bangladeh University of Textiles";
            $headers = "From:$from \n";
            $headers .= "Content-type: text/html\n";
            //$from="SMS_HALL@CUET_CSE.COM";

            /* E-Mail Confirmation Letter */
            mail($to, $subject, $msg, $headers);
          }
//                echo "Stored in: " . "./template/upload/" . $_FILES["file"]["name"];
        }
      }
    } else {
      echo "Invalid file";
    }
    ?>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
