<?php

$registered_email = $_POST['register_email'];
$newPassword = $_POST['new_password'];
$sql ="SELECT * FROM butex_table WHERE email='$registered_email' LIMIT 1";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
  $row = mysql_fetch_array($result);
  $user_name = $row['user_name'];
  $user_fullname = $row['full_name'];
  $sql1 = "INSERT INTO `changed_password` (`user_name`, `password`) VALUES('$user_name', '$newPassword')";
  mysql_query($sql1);
  $msg = <<<EOF
<html>
  <body bgcolor="#DCEEFC">
    <center>
        <P>Hello</p>
        <b>"$user_fullname"</b> <br>
        <font color="red">For account activation please click the following link</font> <br>
        <a href="http://forhadlifestyle.com/imrul/Butex_project_1.7.2/index.php?p=active">click here</a>
      <br><br>***  This was a randomly generated message, please do not respond to this e-mail. <br> Regards<br>
    </center>
  </body>
</html>
EOF;
//            $to = "admin@localhost";
      $to = $user_email;
      $subject = "New Password Activation, Bangladeh University of Textiles";
      $headers = "From:butex.edu.bd \n";
      $headers .= "Content-type: text/html\n";
      //$from="SMS_HALL@CUET_CSE.COM";

      /* E-Mail Confirmation Letter */
      mail($to, $subject, $msg, $headers);
  echo "ok";
}
else{
  echo 'not ok';
}
?>