<?php

$uname = $_POST['user_name'];
if (strlen($uname) >= 6) {
  $sql = "SELECT * from butex_table WHERE user_name='" . $_POST['user_name'] . "'";
  $result = mysql_query($sql);
  if (mysql_num_rows($result) > 0) {
    echo "Not OK";
  } else {
    echo "OK";
  }
} else {
  echo "wrongLength";
}
?>