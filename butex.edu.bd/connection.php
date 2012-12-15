<?php
$conn = @mysql_connect("localhost", "root", "12345678");
$db = @mysql_select_db("butex_database");

if (!$conn || !$db) {
    printf("<br />Connection to database <b>butex_database</b> has failed! Please check your configuration settings in the <b>Admin Panel</b>.", mysql_error());
    exit();
}
