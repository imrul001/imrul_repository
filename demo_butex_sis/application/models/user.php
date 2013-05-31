<?php

class user extends CI_Model {

  function login($username, $password) {
    $this->db->select('id, user_name, password');
    $this->db->from('codeIg_table');
    $this->db->where('user_name = ' . "'" . $username . "'");
    $this->db->where('password = ' . "'" . $password . "'");
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }
  
  function isUniqueId($student_id){
    $this->db->select('std_id');
    $this->db->from('input');
    $this->db->where('std_id = ' . "'" . $student_id . "'");
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() >= 1) {
      return $query->result();
    } else {
      return false;
    }
    
  }

  function insertData($student_id, $stud_name, $ad_roll, $blood_grp, $c_address, $dept, $dob, $emergency_contact_address, $emergency_contact_no, $extraCurricular, $father_name, $mother_name, $grd_income, $hsc_ac, $hsc_board, $hsc_gpa, $hsc_roll, $hsc_year, $merit_position, $mother_name, $nationality, $p_address, $c_address, $ssc_ac, $ssc_board, $ssc_gpa, $ssc_roll, $ssc_year, $stud_contact_no, $grd_contact_no) {
    $data = array(
        'std_id' => $student_id,
        'stud_name' => $stud_name,
    );
    $this->db->insert('input', $data);
  }

}

?>