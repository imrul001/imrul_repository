<?php 

include '../../connection.php';
$search_key = $_POST['searchText'];

if (!$search_key)
  return ;

$sql = "SELECT search_id from `search_table` WHERE search_name='$search_key' LIMIT 1";
$rsd = mysql_query($sql);
$cname = mysql_fetch_array($rsd);
echo $cname[0];
?>
