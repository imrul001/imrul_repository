<?php

include './connection.php';
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