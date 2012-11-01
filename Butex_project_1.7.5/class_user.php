<?php

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
        if ($_COOKIE['user_name'] && $_COOKIE['password']) {
            setcookie("user_name", $_COOKIE['user_name'], time() + (60 * 60 * 24 * 7));
            setcookie("password", $_COOKIE['password'], time() + (60 * 60 * 24 * 7));

            $_SESSION['user_name'] = $_COOKIE['user_name'];
            $_SESSION['password'] = $_COOKIE['password'];
        }

        if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) {
            $sql = "SELECT * FROM butex_table WHERE user_name='" . $_SESSION['user_name'] . "' AND password='" . $_SESSION['password'] . "' LIMIT 1";
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

//        if (!$user_name || !$user_pass) {
//            $error = true;
//            $error_msg[0] = "Incorrect username and/or password!";
//        }

        /* Hash the password. */
        $user_pass = md5($user_pass);

        $sql = "SELECT * FROM `butex_table` WHERE user_name='$user_name' AND password='$user_pass' LIMIT 1";
        $result = @mysql_query($sql);
        $row = @mysql_fetch_array($result);

        if ($result) {
            if (@mysql_num_rows($result) >= 1) {
                if ($row['status'] == "Active") {
                    if ($row['admin_approval'] == 'approved' || $row['admin_approval'] == 'admin') {
                        /* Keep user logged in. */
                        if ($remember == 1) {
                            setcookie("user_name", $user_name, time() + (60 * 60 * 24 * 7));
                            setcookie("password", $user_pass, time() + (60 * 60 * 24 * 7));
                        }

                        $_SESSION['user_name'] = $user_name;
                        $_SESSION['password'] = $user_pass;

                        header("Location: ./index.php?p=admin_panel");
                    }
                }
            } else {
                header("Location: ./index.php?p=index");
            }
        }
//            else {
//                $error = true;
//                $error_msg[0] = "Incorrect username and/or password!";
//            }

        @mysql_free_result($result);
//        } else {
//            $error = true;
//            $error_msg[0] = "Incorrect username and/or password!";
//        }
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

    function searchProcess($search_name) {
        $sql = "SELECT search_id from `search_table` WHERE search_name='$search_name' LIMIT 1";
        $rsd = @mysql_query($sql);
        $cname = @mysql_fetch_array($rsd);
        header("Location: ./index.php?p=" . $cname[0]);
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
    function register($user_name, $user_pass, $user_cpass, $user_email, $user_cemail, $user_fullname, $user_position, $user_contact, $user_status) {
        global $error, $error_msg;
        $error = false;

        // All fields filled in?
//		if(empty($user_name) || empty($user_pass) || empty($user_cpass) || empty($user_email) || empty($user_cemail) || empty($user_fullname) || empty ($user_position) || empty ($user_contact))
//		{
//			$error = true;
//			$error_msg[0] = "All fields are required.";
//		}

        /* Validate the information */
//		$this->validate_username($user_name);
//		$this->validate_password($user_pass, $user_cpass);
//		$this->validate_email($user_email, $user_cemail);

        /* Everything checks out, so register the new user. */
        if (!$error) {
            /* Hash the password */
            $mail_pass = $user_pass;
            $user_pass = md5($user_pass);
            $user_status = "Inactive";
            $user_approval = "pending";

            $sql = "INSERT INTO `butex_table` (`user_name`, `password`, `full_name`, `position`, `email`, `contact_no`, `status`, `admin_approval`) VALUES('$user_name', '$user_pass', '$user_fullname', '$user_position', '$user_email', '$user_contact', '$user_status', '$user_approval')";
            @mysql_query($sql);

//            $_SESSION['reg_complete']['user_name'] = $user_name;

            /* Build E-Mail Output */
//            $msg = "Dear " . $user_name . ",\n\n";
//            $msg .= "Thank you for registering at XHTML/CSS! Below is your login information:\n\n";
//            $msg .= "Username: " . $user_name . "\n";
//            $msg .= "Password: " . $mail_pass . "\n\n";
//            $msg .= "Best regards,\n";
//            $msg .= "XHTML/CSS Staff\n\n";
//            $msg .= "PS: This was a randomly generated message, please do not respond to this e-mail.";



            $_SESSION['reg_complete']['user_name'] = $user_name;
            $_SESSION['active']['user_name'] = $user_name;
            $href = $_SERVER['SERVER_NAME'];


            $from = "Bangladesh University of Textiles";
            $msg = <<<EOF
<html>
  <body bgcolor="#DCEEFC">
    <center>
        <P>Hello</p>
        <b>"$user_fullname"</b> <br>
        <font color="red">For account activation please click the following link</font> <br>
        <a href="http://$href/imrul/Butex_project_1.7.5/index.php?p=active&m=ac_activation&u=$user_name">click here</a>
      <br><br>***  This was a randomly generated message, please do not respond to this e-mail. <br> Regards<br>
    </center>
  </body>
</html>
EOF;
//            $to = "admin@localhost";
            $to = $user_email;
            $subject = "Account Activation, Bangladeh University of Textiles";
            $headers = "From:butex.edu.bd \n";
            $headers .= "Content-type: text/html\n";
            //$from="SMS_HALL@CUET_CSE.COM";

            /* E-Mail Confirmation Letter */
            mail($to, $subject, $msg, $headers);



            /* E-Mail Confirmation Letter */
//			mail($user_email, "XHTML/CSS Website - Registration Complete!", $msg, "From: admin@dreamlinestudio.com");

            header("Location: ./index.php?p=reg_complete");
        }

        return;
    }

    /**
     * 
     * account activation
     * * */
    function account_activation($user_name, $method) {
        if ($method == "ac_activation") {
            $sql = "UPDATE butex_table SET status='Active' WHERE user_name='" . $user_name . "'";
            @mysql_query($sql);
        }
        if ($method == "new_password_activation") {
            $sql = "UPDATE butex_table SET status='Active' WHERE user_name='" . $user_name . "'";
            @mysql_query($sql);
        }
    }

    /**
     * Validate username to make sure it is not in use, and only contains allowed characters.
     *
     * @param str $check Username to be checked.
     * @return bool
     */
    function validate_username($check) {
        global $result, $error, $error_msg;

        $sql = "SELECT user_name FROM users WHERE user_name='" . $check . "' LIMIT 1";
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
     * @param str $cpass Second password to be compaired with.
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
     * @param str $cemail Second e-mail to be compaired with.
     * @return bool
     */
    function validate_email($email, $cemail) {
        global $error, $error_msg;

        $sql = "SELECT user_email FROM users WHERE user_email='" . $email . "' LIMIT 1";
        $result = @mysql_query($sql);

        if ($result) {
            if (@mysql_num_rows($result) >= 1) {
                $error = true;
                $error_msg[4] = "That e-mail is already registered to an account.";
            }
            @mysql_free_result($result);
        }
        if (!eregi("^([_a-z0-9-]+)(\\.[_a-z0-9-]+)*@([a-z0-9-]+)(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})$", $email)) {
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