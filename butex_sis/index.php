<?php

/**
 * File Name:  index.php  v1.0  09/22/2009  13:28  Imrul Hasan
 */

/**
 * Initiate
 */
session_start();

/**
 * Required Files
 */
require('config.php');
require('class_user.php');

/**
 * Check Database Connection
 * ----
 * If it failes, kills the script and alert the user.
 */
$conn = @mysql_connect(DB_HOST, DB_USER, DB_PASS);
$db = @mysql_select_db(DB_NAME);

if(!$conn || !$db)
{
	printf("<br />Connection to database <b>".DB_NAME."</b> has failed! Please check your configuration settings in the <b>config.php</b>.", mysql_error());
	exit();
}

/**
 * Establish Classes
 */
$user = new user();

/**
 * Template Functions
 */
function get_header()
{
	include 'template/header.php';
	return;
}

function get_sidebar()
{
	include 'template/sidebar.php';
	return;
}

function get_footer()
{
	include 'template/footer.php';
	return;
}

/**
 * Error Handling
 */
function get_error()
{
	global $error;
	return $error;
}

function error_msg()
{
	global $error_msg;
	echo "<ul class=\"error\">";
	foreach($error_msg as $v)
	{
		echo "<li>".$v."</li>";
	}
	echo "</ul>";
	return;
}

/**
 * User Functions
 */
function logged_in()
{
	global $user;
	return ($user->user_data['user_name']) ? true : false;
}
function user_data($request)
{
	global $user;
	echo $user->user_data[$request];
}
function reg_info($request)
{
	echo $_SESSION['reg_complete'][$request];
	unset($_SESSION['reg_complete'][$request]);
	
	return;
}

/**
 * Newsletter
 *
 * @param array $post $_POST variables.
 */
function newsletter($post)
{
	global $error, $error_msg;
	
	foreach($post as $k => $v)
	{
		$$k = $v;
	}
	
	if(empty($nlemail))
	{
		$error = true;
		$error_msg[0] = "You must enter a valid email!";
	}
	
	if(!eregi("^([_a-z0-9-]+)(\\.[_a-z0-9-]+)*@([a-z0-9-]+)(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})$", $nlemail))
	{
		$error = true;
		$error_msg[0] = "You must enter a valid email!";
	}
	
	if($error != true)
	{
		$msg = "Thank you for subscribing to your newsletter!";
		mail($nlemail, "XHTML/CSS Newsletter", $msg, "From: newsletter@xhtmlcss.com");
		mail($cfg['admin_email'], "Someone subscribed to XHTML/CSS!", "The following person subscribed:\n\n".$nlemail, "From: newsletter@xhtmlcss.com");
		header("Location: ./index.php?p=newsletter_complete");
	}
}

/**
 * Pages
 */
$p = addslashes($_GET['p']);

/* Define Template */
$tpl = (file_exists("template/".$p.".php")) ? $p : "index";

define('TPL_NAME', "template/".$tpl.".php");

/* Registration/Login */
if($p == "register" || $p == "login")
{
	if($user->logged_in())
	{
		header("Location: ./index.php");
	}
	
	if($_POST['login'])
	{
		$user->login($_POST['username'], $_POST['password'], $_POST['remember']);
	}

	if($_POST['register'])
	{
		$user->register($_POST['username'], $_POST['password'], $_POST['cpassword'], $_POST['email'], $_POST['cemail']);
	}
}

/* Contact */
if($p == "contact")
{
	require('mail.php');
}

/**
 * Logout.
 */
if($p == "logout")
{
	$user->logout();
}

/**
 * Newsletter
 */
if($_POST['nlsubscribe'])
{
	newsletter($_POST);
}

/**
 * Load Template
 */
include TPL_NAME;

/**
 * Close Database Connection
 */
@mysql_close($conn);
?>