<?php

date_default_timezone_set('Asia/Dacca');

/**
 * File Name:  class_user.php  v1.0  09/22/2009  13:28  Imrul Hasan
 */
class user {

  /**
   * Variables
   */
  var $user_data = array();

  /**
   * Constructor
   *
   * @return bool
   */
  function user() {
    if (isset($_COOKIE['user_name']) && isset($_COOKIE['password'])) {
      setcookie("user_name", $_COOKIE['user_name'], time() + (60 * 60 * 24 * 7));
      setcookie("password", $_COOKIE['userword'], time() + (60 * 60 * 24 * 7));

      $_SESSION['user_name'] = $_COOKIE['user_name'];
      $_SESSION['password'] = $_COOKIE['password'];
    }

    if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) {
      $sql = "SELECT * FROM codeIg_table WHERE user_name='" . $_SESSION['user_name'] . "' AND password='" . $_SESSION['password'] . "' LIMIT 1";
      $result = @mysql_query($sql);
      if ($result) {
        $data = @mysql_fetch_assoc($result);

        foreach ($data as $k => $v) {
          $this->user_data[$k] = $v;
        }

        @mysql_free_result($result);
      }
    }
    return true;
  }

  /**
   * Check to see if the user is logged in or not.
   *
   * @return true|false True: User logged in. False: User logged out.
   */
  function logged_in() {
    return ($this->user_data['user_name']) ? true : false;
  }

  /**
   * Log the user in
   *
   * @param str $user_name
   * @param str $user_pass
   */
  function login($user_name, $user_pass, $remember) {
    global $error, $error_msg;
    $error = false;

    if (!$user_name || !$user_pass) {
      $error = true;
      $error_msg[0] = "Incorrect username and/or password!";
    }

    /* Hash the password. */
    $user_pass = md5($user_pass);

    $sql = "SELECT * FROM codeIg_table WHERE user_name='$user_name' AND password='$user_pass' LIMIT 1";
    $result = @mysql_query($sql);

    if ($result) {
      if (@mysql_num_rows($result) >= 1) {
        /* Keep user logged in. */
        if ($remember == 1) {
          setcookie("user_name", $user_name, time() + (60 * 60 * 24 * 7));
          setcookie("password", $user_pass, time() + (60 * 60 * 24 * 7));
        }

        $_SESSION['user_name'] = $user_name;
        $_SESSION['password'] = $user_pass;

        header("Location: ./index.php?p=office_user_panel_com_butex_sis_017734");
      } else {
        $error = true;
        $error_msg[0] = "Incorrect username and/or password!";
      }

      @mysql_free_result($result);
    } else {
      $error = true;
      $error_msg[0] = "Incorrect username and/or password!";
    }
  }

  /**
   * Log user out.
   */
  function logout() {
    if ($_COOKIE['user_name'] && $_COOKIE['password']) {
      setcookie("user_name", "");
      setcookie("password", "");
    }

    unset($_SESSION['user_name']);
    unset($_SESSION['password']);

    header("Location: ./index.php");
    return;
  }

  /**
   * Register new user.
   *
   * @param str $user_name Username being registed.
   * @param str $user_email E-mail attached to this user.
   * @param str $user_cemail Verification of the e-mail.
   * @param str $user_pass Password this user has requested.
   * @param str $user_cpass Verification of the password.
   * @return bool
   */
  function update($old_id, $student_id, $al_dept, $mi_dept, $s_ship, $session, $ad_roll, $merit_position, $dept, $stud_name, $gender, $religion, $father_name, $mother_name, $dob, $p_address, $c_address, $stud_contact_no, $grd_contact_no, $nationality, $emergency_contact_no, $emergency_contact_address, $blood_grp, $ssc_board, $ssc_ac, $ssc_year, $ssc_roll, $ssc_gpa, $hsc_board, $hsc_ac, $hsc_year, $hsc_roll, $hsc_gpa, $grd_income, $extraCurricular) {
    $sql = "UPDATE input SET std_id='$student_id',al_dept='$al_dept', mi_dept='$mi_dept', s_ship='$s_ship', session='$session', admission_test_roll_no='$ad_roll', merit_position='$merit_position', dept='$dept', stud_name='$stud_name', gender='$gender', religion='$religion', father_name='$father_name', mother_name='$mother_name', dob='$dob', p_address='$p_address', c_address='$c_address', stud_contact_no='$stud_contact_no', grd_contact_no='$grd_contact_no', nationality='$nationality', emergency_contact_no='$emergency_contact_no', emergency_contact_address='$emergency_contact_address', blood_grp='$blood_grp', ssc_board='$ssc_board', ssc_academic_institute='$ssc_ac', ssc_year='$ssc_year', ssc_roll='$ssc_roll', ssc_gpa='$ssc_gpa', hsc_board='$hsc_board', hsc_academic_institute='$hsc_ac', hsc_year='$hsc_year', hsc_roll='$hsc_roll', hsc_gpa='$hsc_gpa', grd_income='$grd_income', extra_curricular='$extraCurricular' WHERE std_id=" . $old_id . "";
    if (!@mysql_query($sql)) {
      die(mysql_error());
    } else {
      if ($old_id != $student_id) {
        if (file_exists("./template/uploaded_student_images/" . $old_id . ".jpg")) {
          rename("./template/uploaded_student_images/" . $old_id . ".jpg", "./template/uploaded_student_images/" . $student_id . ".jpg");
        }
      }
    }
    header("Location: ./index.php?p=update_photo&std=$student_id");
    return;
  }

  function register(
  $student_id, $al_dept, $mi_dept, $s_ship, $session, $ad_roll, $merit_position, $dept, $stud_name, $gender, $religion, $father_name, $mother_name, $dob, $p_address, $c_address, $stud_contact_no, $grd_contact_no, $nationality, $emergency_contact_no, $emergency_contact_address, $blood_grp, $ssc_board, $ssc_ac, $ssc_year, $ssc_roll, $ssc_gpa, $hsc_board, $hsc_ac, $hsc_year, $hsc_roll, $hsc_gpa, $grd_income, $extraCurricular, $image) {
    global $error, $error_msg;
    $error = false;

    // All fields filled in?
//		if(empty($student_id) || empty($ad_roll) || empty($merit_position) || empty($dept) || empty($stud_name) || empty($father_name) || empty($mother_name) || empty($dob) || empty($p_address) || empty($c_address) || empty($stud_contact_no) || empty($grd_contact_no) || empty($nationality) || empty($emergency_contact_no) || empty($emergency_contact_address) || empty($blood_grp) || empty($ssc_board) || empty($ssc_ac) || empty($ssc_year) || empty($ssc_roll) || empty($ssc_gpa))
//		{
//			$error = true;
//			$error_msg[0] = "All fields are required.";
//		}
//		
//		/* Validate the information */
//		$this->validate_username($student_id);

    /* Everything checks out, so register the new user. */
    if (!$error) {
      $image = 'no';
      /* Hash the password */
//			$mail_pass = $user_pass;
//			$user_pass = md5($user_pass);

      $sql = "INSERT INTO `input` (`std_id`, `al_dept`, `mi_dept`, `s_ship`, `session`, `admission_test_roll_no`, `merit_position`, `dept`, `stud_name`, `gender`, `religion`, `father_name`, `mother_name`, `dob`, `p_address`, `c_address`, `stud_contact_no`, `grd_contact_no`, `nationality`, `emergency_contact_no`, `emergency_contact_address`, `blood_grp`, `ssc_board`, `ssc_academic_institute`, `ssc_year`, `ssc_roll`, `ssc_gpa`, `hsc_board`, `hsc_academic_institute`, `hsc_year`, `hsc_roll`, `hsc_gpa`, `grd_income`, `extra_curricular`, `link`) VALUES('$student_id', '$al_dept', '$mi_dept', '$s_ship', '$session', '$ad_roll', '$merit_position', '$dept', '$stud_name', '$gender', '$religion', '$father_name', '$mother_name', '$dob', '$p_address', '$c_address', '$stud_contact_no', '$grd_contact_no', '$nationality', '$emergency_contact_no', '$emergency_contact_address', '$blood_grp', '$ssc_board', '$ssc_ac', '$ssc_year', '$ssc_roll', '$ssc_gpa', '$hsc_board', '$hsc_ac', '$hsc_year', '$hsc_roll', '$hsc_gpa', '$grd_income', '$extraCurricular', '$image')";
      if (!@mysql_query($sql)) {
        die(mysql_error());
      }


      $_SESSION['reg_complete']['student_id'] = $student_id;

      /* Build E-Mail Output */
//			$msg = "Dear ".$user_name.", \n\n";
//			$msg .= "Thank you for registering at XHTML/CSS!Below is your login information:\n\n";
//			$msg .= "Username: ".$user_name."\n";
//			$msg .= "Password: ".$mail_pass."\n\n";
//			$msg .= "Best regards, \n";
//			$msg .= "XHTML/CSS Staff\n\n";
//			$msg .= "PS: This was a randomly generated message, please do not respond to this e-mail.";
//			
//			/* E-Mail Confirmation Letter */
//			mail($user_email, "XHTML/CSS Website - Registration Complete!", $msg, "From: admin@dreamlinestudio.com");

      header("Location: ./index.php?p = reg_complete&std_id = " . $student_id);
    }

    return;
  }

  /**
   * Validate username to make sure it is not in use, and only contains allowed characters.
   *
   * @param str $check

    Username to be checked.
   * @return bool
   */
  function validate_username($check) {
    global $result, $error, $error_msg;

    $sql = "SELECT user_name FROM users WHERE user_name = '" . $check . "' LIMIT 1";
    $result = @mysql_query($sql);

    if ($result) {
      if (@mysql_num_rows($result) >= 1) {
        $error = true;
        $error_msg[1] = "Username is in use, please try another.";
      }

      @mysql_free_result($result);
    }

    if (!eregi("^[a-zA-Z]+$", $check)) {
      $error = true;
      $error_msg[2] = "Invalid username. Username may only contain a-z, A-Z";
    }

    return;
  }

  /**
   * Validate password to make sure it only contains allowed characters.
   *
   * @param str $pass Password to be checked.
   * @param str $cpass

    Second password to be compaired with.
   * @return bool
   */
  function validate_password($pass, $cpass) {
    global $error, $error_msg;

    if (!eregi("^[a-zA-Z0-9]+$", $pass)) {
      $error = true;
      $error_msg[3] = "Invalid password. Password may only contain a-z, A-Z, 0-9";
    } elseif ($pass != $cpass) {
      $error = true;
      $error_msg[3] = "Passwords do not match.";
    }
    return;
  }

  /**
   * Validate e-mail to make sure it is not in use, and that it is formatted correctly.
   *
   * @param str $email E-mail to be validated.
   * @param str $cemail

    Second e-mail to be compaired with.
   * @return bool
   */
  function validate_email($email, $cemail) {
    global $error, $error_msg;

    $sql = "SELECT user_email FROM users WHERE user_email = '" . $email . "' LIMIT 1";
    $result = @mysql_query($sql);

    if ($result) {
      if (@mysql_num_rows($result) >= 1) {
        $error = true;
        $error_msg[4] = "That e-mail is already registered to an account.";
      }
      @mysql_free_result($result);
    }
    if (!eregi("^([_a-z0-9-]+)(\\.[_a-z0-9-]+)*@([a-z0-9-]+)(\\.[a-z0-9-]+)*(\\.[a-z]{2, 4})$", $email)) {
      $error = true;
      $error_msg[4] = "E-mail address entered is invalid.";
    }
    if ($email != $cemail) {
      $error = true;
      $error_msg[4] = "E-mail addresses entered do not match.";
    }

    return;
  }

}

?>