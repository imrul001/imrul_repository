<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class VerifyInsertion extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('user', '', TRUE);
  }

  function index() {
    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('student_id', 'Student_id', 'trim|required|xss_clean|callback_check_database');
//    $this->form_validation->set_rules('full_name', 'Full_name', 'trim|required|xss_clean|callback_check_database');

    if ($this->form_validation->run() == FALSE) {
      //Field validation failed.&nbsp; User redirected to login page
      if ($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
      }
      $this->load->view('header');
      $this->load->view('home_view', $data);
    } else {
      //Go to private area
      redirect('user_option_controller', 'refresh');
    }
  }

  function check_database() {
    //Field validation succeeded.&nbsp; Validate against database
    $student_id = $this->input->post('student_id');
    $ad_roll = $this->input->post('ad_test_roll_no');
    $merit_position = $this->input->post('merit_pos');
    $dept = $this->input->post('dept');
    $stud_name = $this->input->post('stud_name');
    $father_name = $this->input->post('father_name');
    $mother_name = $this->input->post('mother_name');
    $dob = $this->input->post('dob');
    $p_address = $this->input->post('p_address');
    $c_address = $this->input->post('c_address');
    $stud_contact_no = $this->input->post('stud_contact_no');
    $grd_contact_no = $this->input->post('grd_contact_no');
    $nationality = $this->input->post('nationality');
    $emergency_contact_no = $this->input->post('emergency_contact_no');
    $emergency_contact_address = $this->input->post('emergency_address');
    $blood_grp = $this->input->post('blood_grp');
    $ssc_board = $this->input->post('ssc_board');
    $ssc_ac = $this->input->post('ssc_ac');
    $ssc_year = $this->input->post('ssc_year');
    $ssc_roll = $this->input->post('ssc_roll');
    $ssc_gpa = $this->input->post('ssc_gpa');
    $hsc_board = $this->input->post('hsc_board');
    $hsc_ac = $this->input->post('hsc_ac');
    $hsc_year = $this->input->post('hsc_year');
    $hsc_roll = $this->input->post('hsc_roll');
    $hsc_gpa = $this->input->post('hsc_gpa');
    $grd_income = $this->input->post('grd_income');
    $extraCurricular = $this->input->post('grd_income');
    if ($this->session->userdata('logged_in') || $this->user->isUniqueId($student_id)) {
      $result = $this->user->insertData($student_id, $stud_name, $ad_roll, $blood_grp, $c_address, $dept, $dob, $emergency_contact_address, $emergency_contact_no, $extraCurricular, $father_name, $mother_name, $grd_income, $hsc_ac, $hsc_board, $hsc_gpa, $hsc_roll, $hsc_year, $merit_position, $mother_name, $nationality, $p_address, $c_address, $ssc_ac, $ssc_board, $ssc_gpa, $ssc_roll, $ssc_year, $stud_contact_no, $grd_contact_no);
      $result = TRUE;
    } else {
      $result = false;
    }
    if ($result) {
      return TRUE;
    } else {
      $this->form_validation->set_message('check_database', 'Invalid Data');
      return false;
    }
  }

}

?>