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
$sql = "select DISTINCT search_name as search_name from search_table where search_name LIKE '%$q%'";

$rsd = mysql_query($sql);
while ($rs = mysql_fetch_array($rsd)) {
    
    $cname = $rs['search_name'];
    echo "$cname\n";
}
?>
