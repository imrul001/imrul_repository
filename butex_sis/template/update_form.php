<!--<script type="text/javascript" src="/butex_sis/template/js/jquery-1.8.0.min.js"></script>-->
<style>
  .current_time{
    text-align: center;
  }
  .subButton{
    border: 1px solid #DDD;
    background-color: #F2F2F2;
    color: black;
    text-transform: uppercase;
    text-decoration: none;
    padding: 4px;
  }
</style>
<?php get_header(); ?>
<div id="container">
  <?php if (!logged_in()) : ?>
    <p style="color: red;">First You Need To Log In Properly..    <a href="./index.php?p=login" title="Login">Login</a></p>
  <?php else : ?>
    <div class="logOutButton">
      <a class="logoutLink"<a href="./index.php?p=logout">Logout</a>
    </div>
    <h2 style="width: 31%">Update Information<span class="arrow"></span></h2>
  <!--    <P>After that you will be able to login with the user id <strong><?php reg_info('student_id'); ?></strong>.</p>-->
    <a class="subButton" href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-2">Back TO Admin</a>
    <div id="login_modal_body">
      <?php
      $std_id = $_GET['std'];
      $sql = "SELECT * FROM input WHERE std_id=$std_id";
      $result = mysql_query($sql);
      while ($row = mysql_fetch_array($result)) {
        $student_name = $row['stud_name'];
        $admission_roll = $row['admission_test_roll_no'];
        $merit_position = $row['merit_position'];
        $dept = $row['dept'];
        $gender = $row['gender'];
        $religion = $row['religion'];
        $father_name = $row['father_name'];
        $mother_name = $row['mother_name'];
        $dob = $row['dob'];
        $p_address = $row['p_address'];
        $c_address = $row['c_address'];
        $std_contact_no = $row['stud_contact_no'];
        $gard_contact_no = $row['grd_contact_no'];
        $nationality = $row['nationality'];
        $emr_contact_no = $row['emergency_contact_no'];
        $emr_contact_address = $row['emergency_contact_address'];
        $blood_grp = $row['blood_grp'];
        $ssc_board = $row['ssc_board'];
        $ssc_roll = $row['ssc_roll'];
        $ss_gpa = $row['ssc_gpa'];
        $ssc_ac = $row['ssc_academic_institute'];
        $ssc_year = $row['ssc_year'];
        $hsc_board = $row['hsc_board'];
        $hsc_ac = $row['hsc_academic_institute'];
        $hsc_year = $row['hsc_year'];
        $hsc_roll = $row['hsc_roll'];
        $hsc_gpa = $row['hsc_gpa'];
        $grd_income = $row['grd_income'];
        $extra_curricular = $row['extra_curricular'];
        $link = $row['link'];
      }
      ?>
      <form method="POST" action="./index.php?p=update" enctype="multipart/form-data" onsubmit="return UserValidate()">
        <div id="register-box" class="registerPopup loginContainer">
          <h3>Update Information</h3>
          <div id="error_box">
            <a name="errr_registration"></a>
            <fieldset id="ersb" style="padding: 2;display: none;font-size: 13px">
              <legend><b style="font-size: 14px">Validation Errors</b></legend>
              <span id="ers"></span>
            </fieldset>
          </div>
          <dl>
            <dt><label for="student_id"><b>*Student ID:</b></label></dt>
            <dd><input type="text" class="text" name="student_id" id="student_id" size="30" value="<?php echo $std_id; ?> " readonly /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="full_name"><b>*Admission Test Roll No.:</b></label></dt>
            <dd><input type="text" class="text" name="ad_test_roll_no" id="ad_test_roll_no" size="30" value="<?php echo $admission_roll; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="full_name"><b>*Merit Position:</b></label></dt>
            <dd><input type="text" class="text" name="merit_pos" id="merit_pos" size="30" value="<?php echo $merit_position; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="department"><b>*Department:</b></label></dt>
            <dd><select name="dept" id="dept">
                <option value="<?php echo $dept; ?>" selected="selected"><?php echo $dept; ?></option> 
                <option value="AME">AME</option> 
                <option value="FME">FME</option>
                <option value="YME">YME</option> 
                <option value="WPE">WPE</option> 
                <option value="TM">TM</option> 
                <option value="FD">FD</option> 
              </select>
            </dd>
          </dl>

          <dl>
            <dt><label for="student name"><b>*Student Name:</b></label></dt>
            <dd><input type="text" class="text" name="stud_name" id="stud_name" size="30" value="<?php echo $student_name; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="Gender"><b>*Gender</b></label></dt>
            <dd>
              <select name="gender" id="gender">
                <option value="<?php echo $gender; ?>" selected="selected"><?php echo $gender; ?></option> 
                <option value="Male">Male</option> 
                <option value="Female">Female</option>
              </select>
            </dd>                                                                         
          </dl>

          <dl>
            <dt><label for="religion"><b>*Religion:</b></label></dt>
            <dd><input type="text" class="text" name="religion" id="religion" size="30" value="<?php echo $religion; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="father name"><b>*Father Name:</b></label></dt>
            <dd><input type="text" class="text" name="father_name" id="father_name" size="30" value="<?php echo $father_name; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="mother name"><b>*Mother Name:</b></label></dt>
            <dd><input type="text" class="text" name="mother_name" id="mother_name" size="30" value="<?php echo $mother_name; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="full_name"><b>*Date Of Birth:</b></label></dt>
            <dd><input type="text" class="text" name="dob" id="dob_1" size="30" value="<?php echo $dob; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="permanent_address"><b>*Permanent Address:</b></label></dt>
            <dd><input type="text" class="text" name="p_address" id="p_address" size="30" value="<?php echo $p_address; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="current_address"><b>*Current Address:</b></label></dt>
            <dd><input type="text" class="text" name="c_address" id="c_address" size="30" value="<?php echo $c_address; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="student contact no"><b>*Student Contact No.:</b></label></dt>
            <dd><input type="text" class="text" name="stud_contact_no" id="stud_contact_no" size="30" value="<?php echo $std_contact_no; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="grdiant contact no"><b>* Guardian Contact No.:</b></label></dt>
            <dd><input type="text" class="text" name="grd_contact_no" id="grd_contact_address" size="30" value="<?php echo $gard_contact_no; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="grdiant contact no"><b>*Nationality:</b></label></dt>
            <dd><input type="text" class="text" name="nationality" id="nationality" size="30" value="<?php echo $nationality; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="grdiant contact no"><b>*Emergency Contact No:</b></label></dt>
            <dd><input type="text" class="text" name="emergency_contact_no" id="emergency_contact_no" size="30" value="<?php echo $emr_contact_no; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="grdiant contact no"><b>*Emergency Address:</b></label></dt>
            <dd><input type="text" class="text" name="emergency_address" id="emergency_address" size="30" value="<?php echo $emr_contact_address; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="Blood Group"><b>*Blood Group:</b></label></dt>
            <dd>
              <select name="blood_grp" id="blood_grp">
                <option value="<?php echo $blood_grp; ?>"><?php echo $blood_grp; ?></option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
      <!--        <input type="text" class="text" name="blood_grp" id="blood_grp" size="30" value="" />-->
            </dd>                                                                         
          </dl>
          <dl>
            <dt><label for="ssc board"><b>*SSC Board</b></label></dt>
            <dd><select name="ssc_board" id="sscBoard">
                <option value="<?php echo $ssc_board; ?>" selected="selected"><?php echo $ssc_board; ?></option> 
                <option value="Barisal">Barisal</option> 
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option> 
                <option value="Sylhet">Sylhet</option> 
                <option value="Comilla">Comilla</option> 
                <option value="Dinajpur">Dinajpur</option> 
                <option value="Jessore">Jessore</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Technical">Technical</option> 
                <option value="Madrasha">Madrasha</option> 
              </select>
            </dd>
          </dl>
          <dl>
            <dt><label for="ssc academic institute"><b>*SSC Academic Institute:</b></label></dt>
            <dd><input type="text" class="text" name="ssc_ac" id="ssc_ac" size="30" value="<?php echo $ssc_ac; ?>" /></dd>                                                                         
          </dl>
          <dl>
            <dt><label for="ssc year"><b>*SSC Year</b></label></dt>
            <dd><select name="ssc_year" id="sscYear">
                <option value="<?php echo $ssc_year; ?>"><?php echo $ssc_year; ?></option>
              </select>
            </dd>
          </dl>
          <dl>
            <dt><label for="ssc roll number"><b>*SSC Roll Number:</b></label></dt>
            <dd><input type="text" class="text" name="ssc_roll" id="ssc_roll" size="30" value="<?php echo $ssc_roll; ?>" /></dd>                                                                         
          </dl>
          <dl>
            <dt><label for="ssc gpa"><b>*SSC GPA:</b></label></dt>
            <dd><input type="text" class="text" name="ssc_gpa" id="ssc_gpa" size="30" value="<?php echo $ss_gpa; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="hsc board"><b>*HSC Board</b></label></dt>
            <dd><select name="hsc_board" id="hscBoard">
                <option value="<?php echo $hsc_board; ?>" selected="selected"><?php echo $hsc_board; ?></option> 
                <option value="Barisal">Barisal</option> 
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option> 
                <option value="Sylhet">Sylhet</option> 
                <option value="Comilla">Comilla</option> 
                <option value="Dinajpur">Dinajpur</option> 
                <option value="Jessore">Jessore</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Technical">Technical</option> 
                <option value="Madrasha">Madrasha</option> 
              </select>
            </dd>
          </dl>
          <dl>
            <dt><label for="hsc academic institute"><b>*HSC Academic Institute :</b></label></dt>
            <dd><input type="text" class="text" name="hsc_ac" id="hsc_ac" size="30" value="<?php echo $hsc_ac; ?>" /></dd>                                                                         
          </dl>
          <dl>
            <dt><label for="hsc year"><b>*HSC Year</b></label></dt>
            <dd><select name="hsc_year" id="hscYear">
                <option value="<?php echo $hsc_year; ?>"><?php echo $hsc_year; ?></option>
              </select>
            </dd>
          </dl>
          <dl>
            <dt><label for="hsc roll number"><b>*HSC Roll Number :</b></label></dt>
            <dd><input type="text" class="text" name="hsc_roll" id="hsc_roll" size="30" value="<?php echo $hsc_roll; ?>" /></dd>                                                                         
          </dl>
          <dl>
            <dt><label for="hsc gpa"><b>*HSC GPA :</b></label></dt>
            <dd><input type="text" class="text" name="hsc_gpa" id="hsc_gpa" size="30" value="<?php echo $hsc_gpa; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="gurdian income"><b>*Gurdian Income :</b></label></dt>
            <dd><input type="text" class="text" name="grd_income" id="grd_income" size="30" value="<?php echo $grd_income; ?>" /></dd>                                                                         
          </dl>

          <dl>
            <dt><label for="co-extra curricular activity"><b>*Extra Curricular :</b></label></dt>
            <dd><textarea class="text" name="extraCurricular" id="extraCurricular" value=""><?php echo $extra_curricular; ?></textarea>
      <!--        <input type="text" class="text" name="grd_income" id="full_name" size="300" value="" />-->
            </dd>                                                                         
          </dl>
          <!--    <dl>
                <dt><label for="student photo"><b>File Name:</b></label></dt>
                <dd><input type="file" name="file" id="file1" /></dd>
              </dl>-->
          <input type="submit" class="submitLogIn" id="submitButtonId" name="update" value="Update"/>
        </div>
      </form>
    </div>
  <?php endif; ?>
</div>
<!-- END Content -->
<?php get_footer(); ?>