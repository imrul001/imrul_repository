<?php

$user_email = $_POST['email'];
if (!eregi("^([_a-z0-9-]+)(\\.[_a-z0-9-]+)*@([a-z0-9-]+)(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})$", $user_email)) {
    echo "invalidEmail";
} else {
    $sql = "SELECT * FROM butex_table WHERE email='".$user_email."'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        echo "notok";
    } else {
        echo "ok";
    }
}
?>



