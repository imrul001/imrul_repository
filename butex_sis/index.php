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

if (!$conn || !$db) {
  printf("<br />Connection to database <b>" . DB_NAME . "</b> has failed! Please check your configuration settings in the <b>config.php</b>.", mysql_error());
  exit();
}
$sql = "CREATE TABLE IF NOT EXISTS `input` (
  `std_id` varchar(100) NOT NULL,
  `admission_test_roll_no` int(25) NOT NULL,
  `merit_position` int(20) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `stud_name` varchar(1000) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `father_name` varchar(1000) NOT NULL,
  `mother_name` varchar(1000) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `p_address` varchar(1000) NOT NULL,
  `c_address` varchar(1000) NOT NULL,
  `stud_contact_no` varchar(15) NOT NULL,
  `grd_contact_no` varchar(15) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `emergency_contact_no` varchar(1000) NOT NULL,
  `emergency_contact_address` varchar(1000) NOT NULL,
  `blood_grp` varchar(15) NOT NULL,
  `ssc_board` varchar(30) NOT NULL,
  `ssc_academic_institute` varchar(30) NOT NULL,
  `ssc_year` varchar(10) NOT NULL,
  `ssc_roll` varchar(10) NOT NULL,
  `ssc_gpa` varchar(10) NOT NULL,
  `hsc_board` varchar(30) NOT NULL,
  `hsc_academic_institute` varchar(1000) NOT NULL,
  `hsc_year` varchar(10) NOT NULL,
  `hsc_roll` varchar(20) NOT NULL,
  `hsc_gpa` varchar(10) NOT NULL,
  `grd_income` varchar(1000) NOT NULL,
  `extra_curricular` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `codeIg_table` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
mysql_query($sql);

$sql = "INSERT INTO `codeIg_table` (`id`, `user_name`, `password`) VALUES(1, 'codeAdmin', 'e10adc3949ba59abbe56e057f20f883e')";
mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `norm` (
  `id` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `std_id` varchar(100) NOT NULL,
  `punishment` varchar(1000) NOT NULL,
  `warning` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `exam` (
  `std_id` varchar(100) NOT NULL,
  `L1T1GPA` varchar(10) NOT NULL,
  `L1T2GPA` varchar(10) NOT NULL,
  `L2T1GPA` varchar(10) NOT NULL,
  `L2T2GPA` varchar(10) NOT NULL,
  `L3T1GPA` varchar(10) NOT NULL,
  `L3T2GPA` varchar(10) NOT NULL,
  `L4T1GPA` varchar(10) NOT NULL,
  `L4T2GPA` varchar(10) NOT NULL,
  `CGPA` varchar(10) NOT NULL,
  `RECORD` varchar(10) NOT NULL,
  `note` varchar(50) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
mysql_query($sql);

/**
 * Establish Classes
 */
$user = new user();

/**
 * Template Functions
 */
function get_header() {
  include 'template/header.php';
  return;
}

function get_sidebar() {
  include 'template/sidebar.php';
  return;
}

function get_footer() {
  include 'template/footer.php';
  return;
}

/**
 * Error Handling
 */
function get_error() {
  global $error;
  return $error;
}

function error_msg() {
  global $error_msg;
  echo "<ul class=\"error\">";
  foreach ($error_msg as $v) {
    echo "<li>" . $v . "</li>";
  }
  echo "</ul>";
  return;
}

/**
 * User Functions
 */
function logged_in() {
  global $user;
  return ($user->user_data['user_name']) ? true : false;
}

function user_data($request) {
  global $user;
  echo $user->user_data[$request];
}

function reg_info($request) {
  echo $_SESSION['reg_complete'][$request];
  unset($_SESSION['reg_complete'][$request]);

  return;
}

/**
 * Newsletter
 *
 * @param array $post $_POST variables.
 */
function newsletter($post) {
  global $error, $error_msg;

  foreach ($post as $k => $v) {
    $$k = $v;
  }

  if (empty($nlemail)) {
    $error = true;
    $error_msg[0] = "You must enter a valid email!";
  }

  if (!eregi("^([_a-z0-9-]+)(\\.[_a-z0-9-]+)*@([a-z0-9-]+)(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})$", $nlemail)) {
    $error = true;
    $error_msg[0] = "You must enter a valid email!";
  }

  if ($error != true) {
    $msg = "Thank you for subscribing to your newsletter!";
    mail($nlemail, "XHTML/CSS Newsletter", $msg, "From: newsletter@xhtmlcss.com");
    mail($cfg['admin_email'], "Someone subscribed to XHTML/CSS!", "The following person subscribed:\n\n" . $nlemail, "From: newsletter@xhtmlcss.com");
    header("Location: ./index.php?p=newsletter_complete");
  }
}

/**
 * Pages
 */
$p = addslashes($_GET['p']);

/* Define Template */
$tpl = (file_exists("template/" . $p . ".php")) ? $p : "index";

define('TPL_NAME', "template/" . $tpl . ".php");

/* Registration/Login */
if ($p == "register" || $p == "login" || $p="update") {
//  if ($user->logged_in()) {
//    header("Location: ./index.php");
//  }

  if ($_POST['login']) {
    $user->login($_POST['user_name'], $_POST['password'], $_POST['remember']);
  }

  if ($_POST['register']) {
    $image = 'no';
    $user->register($_POST['student_id'], $_POST['ad_test_roll_no'], $_POST['merit_pos'], $_POST['dept'], $_POST['stud_name'], $_POST['gender'], $_POST['religion'], $_POST['father_name'], $_POST['mother_name'], $_POST['dob'], $_POST['p_address'], $_POST['c_address'], $_POST['stud_contact_no'], $_POST['grd_contact_no'], $_POST['nationality'], $_POST['emergency_contact_no'], $_POST['emergency_address'], $_POST['blood_grp'], $_POST['ssc_board'], $_POST['ssc_ac'], $_POST['ssc_year'], $_POST['ssc_roll'], $_POST['ssc_gpa'], $_POST['hsc_board'], $_POST['hsc_ac'], $_POST['hsc_year'], $_POST['hsc_roll'], $_POST['hsc_gpa'], $_POST['grd_income'], $_POST['extraCurricular'], $image);
//    $user->register($_POST['student_id']);
//    header("Location: ./index.php?p=office_user_panel_com_butex_sis_017734");
  }
  if($_POST['update']){
    $user->update($_POST['student_id'], $_POST['ad_test_roll_no'], $_POST['merit_pos'], $_POST['dept'], $_POST['stud_name'], $_POST['gender'], $_POST['religion'], $_POST['father_name'], $_POST['mother_name'], $_POST['dob'], $_POST['p_address'], $_POST['c_address'], $_POST['stud_contact_no'], $_POST['grd_contact_no'], $_POST['nationality'], $_POST['emergency_contact_no'], $_POST['emergency_address'], $_POST['blood_grp'], $_POST['ssc_board'], $_POST['ssc_ac'], $_POST['ssc_year'], $_POST['ssc_roll'], $_POST['ssc_gpa'], $_POST['hsc_board'], $_POST['hsc_ac'], $_POST['hsc_year'], $_POST['hsc_roll'], $_POST['hsc_gpa'], $_POST['grd_income'], $_POST['extraCurricular']);
  }
}

/* Contact */
if ($p == "contact") {
  require('mail.php');
}

/**
 * Logout.
 */
if ($p == "logout") {
  $user->logout();
}

/**
 * Newsletter
 */
if ($_POST['nlsubscribe']) {
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