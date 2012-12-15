<?php
$user_name = $_POST['user_name'];
$sql = "DELETE from butex_table WHERE user_name='".$user_name."'";
$result = mysql_query($sql);
if($result)
{
echo $user_name;
}
else
{
  echo 'Failed';
}
?>
