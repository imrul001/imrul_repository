<?php
$conn = @mysql_connect("localhost", "root", "12345678");
$db = @mysql_select_db("butex_database");

if (!$conn || !$db) {
    printf("<br />Connection to database <b>" . DB_NAME . "</b> has failed! Please check your configuration settings in the <b>config.php</b>.", mysql_error());
    exit();
}
//require_once "./Butex_project_1.7.1/config.php";
$q = strtolower($_GET["q"]);

if (!$q)
    return;
$sql = "select DISTINCT full_name as full_name from butex_table where full_name LIKE '%$q%'";

$rsd = mysql_query($sql);
while ($rs = mysql_fetch_array($rsd)) {
    
    $cname = $rs['full_name'];
    echo "$cname\n";
}
?>
