<?php
$conn = @mysql_connect("localhost", "forhadls_imrul", "imrul123");
$db = @mysql_select_db("forhadls_wdps1");

if (!$conn || !$db) {
    printf("<br />Connection to database <b>forhadls_wdps1</b> has failed! Please check your configuration settings in the <b>config.php</b>.", mysql_error());
    exit();
}