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

  function insertData($student_id, $full_name) {
    $data = array(
        'student_id' => $student_id,
        'full_name' => $full_name,
    );
    $this->db->insert('student_data', $data);
  }

}

?>