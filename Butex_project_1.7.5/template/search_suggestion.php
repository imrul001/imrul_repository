<?php
include '../connection.php';
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
