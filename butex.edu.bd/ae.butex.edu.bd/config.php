<?php

/**
 * File Name:  config.php  v1.0  09/22/2009  13:28  Imrul Hasan
 */
 
/*******************************************************************************
 ** ADMINISTRATION INFORMATION
 *******************************************************************************/
/**
 * Administration E-Mail
 * -----
 * All on-site e-mails will go to this address.
 */
$cfg['admin_email'] = "admin@localhost.com";
 
/*******************************************************************************
 ** DATABASE INFORMATION
 *******************************************************************************/ 

/**
 * Database Username
 * ----
 */
$dbcfg['db_user'] = "root";

/**
 * Database Password
 * ----

 */
$dbcfg['db_pass'] = "12345678";

/**
 * Database Name
 * ----
 */
$dbcfg['db_name'] = "butex_database";

/**
 * Database Host
 * ----
 * This is most likely 'localhost'. If you are unsure, leave this value alone. If you fail to
 * connect to your database then you will need to contact your Web Host to obtain this
 * value. 
 */

/**
 * Creat Table COMMANDS
 */

$dbcfg['db_host'] = "localhost";

#########################################################
## DO NOT EDIT BELOW THIS POINT!
#########################################################
define('ADMIN_EMAIL', $cfg['admin_email']);
define('DB_HOST', $dbcfg['db_host']);
define('DB_USER', $dbcfg['db_user']);
define('DB_PASS', $dbcfg['db_pass']);
define('DB_NAME', $dbcfg['db_name']);

?>