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

/**
 * Creat Table Commands
 * * */
$SQL = "CREATE TABLE IF NOT EXISTS `butex_table` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `position` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL,
  `admin_approval` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27";
mysql_query($SQL);

$sql = "INSERT INTO `butex_table` (`id`, `user_name`, `password`, `full_name`, `address`, `contact_no`, `position`, `email`, `status`, `admin_approval`) VALUES
(4, 'butex.admin', '0daec84296c7c43178997a05012d4059', 'butex admin', 'Dhaka, Bangladesh..', '+8801671319014', '', 'imrul001@gmail.com', 'Active', 'admin')";
mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `changed_password` (
  `index` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `new_password` varchar(200) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `confidential_notice` (
  `index` int(100) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(120) NOT NULL,
  `related_employees` varchar(500) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `date_of_publication` text NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2";
mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `download_manager` (
  `index` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `file_name` varchar(60) NOT NULL,
  `date_of_upload` varchar(25) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8";
mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `notice_manager` (
  `index` int(15) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(50) NOT NULL,
  `related_employees` varchar(300) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `date_of_publication` varchar(40) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8";
mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `search_table` (
  `index` int(15) NOT NULL AUTO_INCREMENT,
  `search_name` varchar(500) NOT NULL,
  `search_id` varchar(100) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17";
mysql_query($sql);

$sql ="INSERT INTO `search_table` (`index`, `search_name`, `search_id`) VALUES
(1, 'VCs Message', 'vc_message'),
(2, 'About BUTex', 'about_us'),
(3, 'Administration', 'administration'),
(4, 'Academic Programs', 'academic_program'),
(5, 'Admission', 'admission'),
(6, 'Faculties & Departments', 'departments'),
(7, 'Library', 'library'),
(8, 'Research & Consultancy', 'research_consultancy'),
(9, 'Students Welfare', 'student_welfare'),
(10, 'Co-Curricular Activities', 'co-curricular'),
(11, 'Notice', 'notice_board'),
(12, 'Download', 'list_of_download'),
(13, 'On Going Research', 'on_going_research'),
(14, 'Journals', 'journals'),
(15, 'Phone Book', 'phone_book'),
(16, 'Contact Us', 'contactUs')";
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

function get_admin_header() {
    include 'template/admin_header.php';
    return;
}

function get_admin_sidebar() {
    include 'template/admin_sidebar.php';
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

function reg_confirm($request) {
    /* echo $_SESSION['active'][$request];
      unset($_SESSION['active'][$request]); */

    return $_SESSION['active'][$request];
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
if ($p == "register" || $p == "login") {
    if ($user->logged_in()) {
        header("Location: ./index.php");
    }

    if ($_POST['login']) {
        $user->login($_POST['user_name'], $_POST['password'], $_POST['remember']);
    }

    if ($_POST['register']) {
        $user->register($_POST['user_name'], $_POST['password'], $_POST['cpassword'], $_POST['email'], $_POST['cemail'], $_POST['full_name'], $_POST['position'], $_POST['contact_no'], $_POST['status']);
    }
}

/**
 * Account & New Password Activation 
 * * */
$m = $_GET['m'];
$u = $_GET['u'];
$np = $_GET['np'];
if ($m == 'ac_activation' || $m == 'new_password_activation') {
    $user->account_activation($u, $m);
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
 * Search
 */
//if ($p == "search") {
//  if ($_POST['search']) {
//    $user->searchProcess($_POST['searchText']);
//  }
//}
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