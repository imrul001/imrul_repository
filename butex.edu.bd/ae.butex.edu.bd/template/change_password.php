<?php

include '../../connection.php';
$registerd_email = $_POST['email'];
$sql = "SELECT * FROM butex_table WHERE email='$registerd_email'";
$result = mysql_query($sql);
$num_row = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$user_name = $row['user_name'];
$user_fullname = $row['full_name'];
$old_password = $row['password'];
$user_email = $row['email'];
//$sql1 = "SELECT * FROM changed_password WHERE user_name=$user_name LIMIT 1";
//$result1 = mysql_query($sql1);
//$num_row1 = mysql_num_rows($result1);

if ($num_row > 0) {

  $href = $_SERVER['SERVER_NAME'];
  $new_password = createRandom_number();

  $from = "Bangladesh University of Textiles";
  $msg = <<<EOF
<html>
  <body bgcolor="#DCEEFC">
    <center>
        <P>Hello</p>
        <b>"$user_fullname"</b> <br>
        <font color="green">Your password is changed..Here is your new password <b>$new_password</b></font> <br>
        <p>If it was not you..Please Contact the System Admin as soon as you get this notification</p>
      <br><br>***  This was a randomly generated message, please do not respond to this e-mail. <br> Regards<br>
    </center>
  </body>
</html>
EOF;
  $to = "admin@localhost";
  $to = $user_email;
  $subject = "Password Changed, Bangladeh University of Textiles";
  $headers = "From:butex.edu.bd \n";
  $headers .= "Content-type: text/html\n";

  $new_password = md5($new_password);


  /* E-Mail Confirmation Letter */
  mail($to, $subject, $msg, $headers);
  $sql3 = "UPDATE butex_table SET password='$new_password' WHERE user_name='" . $user_name . "'";
  $result3 = mysql_query($sql3);
  $sql2 = "INSERT INTO `changed_password` (`user_name`, `new_password`, `old_password`) VALUES('$user_name', '$new_password', '$old_password')";
  $result2 = mysql_query($sql2);
  if (($result2) && ($result3)) {
    echo 'ok';
  } else {
    echo "process failed..Internal Sever Error";
  }
} else {
  echo "not ok";
}

function createRandom_number() {
  $chars = "abcdefghijkmnopqrstuvwxyz023456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  srand((double) microtime() * 1000000);
  $i = 0;
  $pass = '';
  while ($i <= 6) {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;
  }
  return $pass;
}

?>