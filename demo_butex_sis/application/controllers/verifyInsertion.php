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

    $this->form_validation->set_rules('student_id', 'Student_id', 'trim|required|xss_clean');
    $this->form_validation->set_rules('full_name', 'Full_name', 'trim|required|xss_clean|callback_check_database');

    if ($this->form_validation->run() == FALSE) {
      //Field validation failed.&nbsp; User redirected to login page
      $this->load->view('header');
      $this->load->view('home_view');
    } else {
      //Go to private area
      redirect('user_option_controller', 'refresh');
    }
  }

  function check_database($full_name) {
    //Field validation succeeded.&nbsp; Validate against database
    $student_id = $this->input->post('student_id');
    $full_name = $this->input->post('full_name');
    if($this->session->userdata('logged_in')){
      $result = $this->user->insertData($student_id, $full_name);
      $result = TRUE;
    }
    else{
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