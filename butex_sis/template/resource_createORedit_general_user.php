<?php
include '../../connection.php';
$user_name = isset($_GET['user_name']) ? $_GET['user_name'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
$method = isset($_GET['method']) ? $_GET['method'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
if (!empty($method) && !empty($user_name)) {
    if ($method == 'CREATE_USER') {
        $encryptedPassword = md5($password);
        $user_role = "GENERAL_USER";
        $user_status = "Active";
        $sql = "INSERT INTO `codeIg_table` (`user_name`, `password`, `role`, `status`, `readable_password`)VALUES('$user_name', '$encryptedPassword', '$user_role', '$user_status', '$password')";
        $result = mysql_query($sql);
        if (!$result) {
            echo die(mysql_error());
        } else {
            echo "InsertDone";
        }
    }
    if ($method == 'EDIT_USER' && !empty($status)) {
        $sql1 = "UPDATE codeIg_table SET status='$status' WHERE user_name='$user_name'";
        $result1 = mysql_query($sql1);
        if (!$result1) {
            echo die(mysql_error());
        } else {
            echo "EditDone";
        }
    }
}
?>