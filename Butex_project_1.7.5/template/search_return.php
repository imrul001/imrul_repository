<?php 

$conn = @mysql_connect("localhost", "root", "12345678");
$db = @mysql_select_db("butex_database");

if (!$conn || !$db) {
  printf("<br />Connection to database <b>" . DB_NAME . "</b> has failed! Please check your configuration settings in the <b>config.php</b>.", mysql_error());
  exit();
}
$search_key = $_POST['searchText'];

if (!$search_key)
  return ;

$sql = "SELECT search_id from `search_table` WHERE search_name='$search_key' LIMIT 1";
$rsd = mysql_query($sql);
$cname = mysql_fetch_array($rsd);
echo $cname[0];
?>
