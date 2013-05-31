<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Sitel_home extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {

    $sql = "CREATE TABLE IF NOT EXISTS `input` (
  `std_id` int(100) NOT NULL AUTO_INCREMENT,
  `admission_test_roll_no` int(25) NOT NULL,
  `merit_position` int(20) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `stud_name` varchar(1000) NOT NULL,
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
  `link` varchar(1000) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
    mysql_query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS `norm` (
  `std_id` int(100) NOT NULL AUTO_INCREMENT,
  `punishment` varchar(100) NOT NULL,
  `warning` varchar(200) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
    mysql_query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS `exam` (
  `std_id` int(100) NOT NULL AUTO_INCREMENT,
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

    $this->load->helper(array('form', 'url'));
    $this->load->view('header');
    $this->load->view('sitel_home_view');
  }

}

?>