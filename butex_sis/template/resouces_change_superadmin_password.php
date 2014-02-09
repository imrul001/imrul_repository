<?php 
$old_password = isset($_POST['old_password'])? $_POST['old_password']: '' ;
$new_password = isset($_POST['new_password'])? $_POST['new_password'] : '';
$confirm_password = isset($_POST['confirm_new_password'])? $_POST['confirm_new_password'] : '';

$sql = "SELECT * FROM codeIg_table WHERE role='SUPER_ADMIN' LIMIT 1";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if((md5($old_password) == $row['password']) && ($new_password == $confirm_password)){
    $sql1 = "UPDATE codeIg_table SET password='".md5($new_password)."' WHERE role='SUPER_ADMIN'";
    $result1 = mysql_query($sql1);
    if($result1){
        echo "done";
    }else{
      die(mysql_error());   
    }
}else{
    echo "Wrong Password";
}
?>