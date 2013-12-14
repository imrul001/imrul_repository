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
<link rel="stylesheet" href="/template/css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="/template/css/jquery.calendar.css"/>
<script type="text/javascript" src="/template/js/jquery-ui.js" ></script>
<script type="text/javascript" src="/template/js/jquery.calendar.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#dob_1').calendar();
        for (i = new Date().getFullYear(); i > 1900; i--)
        {
            $('#sscYear').append($('<option />').val(i).html(i));
        }
        for (i = new Date().getFullYear(); i > 1900; i--)
        {
            $('#hscYear').append($('<option />').val(i).html(i));
        }
    
        //    javascript for drop down lists

        $('#student_status').val($('#hidden_student_status').val()).attr("selected", true);
        $('#al_dept').val($('#hidden_al_dept').val()).attr("selected", true);
        $('#mi_dept').val($('#hidden_mi_dept').val()).attr("selected", true);
        $('#dept').val($('#hidden_student_dept').val()).attr("selected", true);
        $('#s_ship').val($('#hidden_s_ship').val()).attr("selected", true);
        $('#gender').val($('#hidden_gender').val()).attr("selected", true);
        $('#blood_grp').val($('#hidden_blood_grp').val()).attr("selected", true);
        $('#sscBoard').val($('#hidden_sscBoard').val()).attr("selected", true);
        $('#hscBoard').val($('#hidden_hscBoard').val()).attr("selected", true);
        $('#sscYear').val($('#hidden_sscYear').val()).attr("selected", true);
        $('#hscYear').val($('#hidden_hscYear').val()).attr("selected", true);
    });
</script>
<div id="container">
    <?php if (!logged_in()) : ?>
        <p style="color: red;">First You Need To Log In Properly..    <a href="./index.php?p=login" title="Login">Login</a></p>
    <?php else : ?>
        <div class="logOutButton">
            <a class="logoutLink"<a href="./index.php?p=logout">Logout</a>
        </div>
        <h2 style="width: 31%">Update Information<span class="arrow"></span></h2>
      <!--    <P>After that you will be able to login with the user id <strong><?php reg_info('student_id'); ?></strong>.</p>-->
        <a class="subButton" href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-1">Back TO Admin</a>
        <div id="login_modal_body">
            <?php
            $std_id = $_GET['std'];
            $sql = "SELECT * FROM input WHERE std_id=$std_id";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_array($result)) {
                $student_name = $row['stud_name'];
                $al_dept = $row['al_dept'];
                $mi_dept = $row['mi_dept'];
                $s_ship = $row['s_ship'];
                $session = $row['session'];
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
                $student_status = $row['student_status'];
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
                    <input type='hidden' name="hidden_student_id" value="<?php echo $std_id; ?> "/>
                    <input type='hidden' name="hidden_student_status" id="hidden_student_status" value="<?php echo $student_status; ?>" />
                    <input type='hidden' name="hidden_al_dept" id="hidden_al_dept" value="<?php echo $al_dept; ?>" />
                    <input type='hidden' name="hidden_mi_dept" id="hidden_mi_dept" value="<?php echo $mi_dept; ?>" />
                    <input type='hidden' name="hidden_student_dept" id="hidden_student_dept" value="<?php echo $dept; ?>" />
                    <input type='hidden' name="hidden_s_ship" id="hidden_s_ship" value="<?php echo $s_ship; ?>" />
                    <input type='hidden' name="hidden_gender" id="hidden_gender" value="<?php echo $gender; ?>" />
                    <input type='hidden' name="hidden_blood_grp" id="hidden_blood_grp" value="<?php echo $blood_grp; ?>" />
                    <input type='hidden' name="hidden_sscBoard" id="hidden_sscBoard" value="<?php echo $ssc_board; ?>" />
                    <input type='hidden' name="hidden_hscBoard" id="hidden_hscBoard" value="<?php echo $hsc_board; ?>" />
                    <input type='hidden' name="hidden_sscYear" id="hidden_sscYear" value="<?php echo $ssc_year; ?>" />
                    <input type='hidden' name="hidden_hscYear" id="hidden_hscYear" value="<?php echo $hsc_year; ?>" />
                    <dl>
                        <dt><label for="student_status"><b>*Student Status:</b></label></dt>
                        <dd><select name="student_status" id="student_status">
                                <option value="passed_out">Passed Out</option>
                                <option value="enrolled">Enrolled</option> 
                                <option value="admission_canceled">Admission Canceled</option> 
                            </select>
                        </dd>                                                                         
                    </dl>
                    <dl>
                        <dt><label for="student_id"><b>*Student ID:</b></label></dt>
                        <dd><input type="text" class="text" name="student_id" id="student_id" size="30" value="<?php echo $std_id; ?> " readonly/></dd>                                                                         
                    </dl>

                    <dl>
                        <dt><label for="session"><b>*Session:</b></label></dt>
                        <dd><input type="text" class="text" name="session" id="session" size="30" value="<?php echo $session; ?>"  /></dd>                                                                         
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
                        <dt><label for="department"><b>*Alloted Department:</b></label></dt>
                        <dd><select name="al_dept" id="al_dept">
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
                        <dt><label for="department"><b>Migrated Department:</b></label></dt>
                        <dd><select name="mi_dept" id="mi_dept">
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
                        <dt><label for="department"><b>*Department:</b></label></dt>
                        <dd><select name="dept" id="dept">
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
                        <dt><label for="scholarship"><b>Scholarship:</b></label></dt>
                        <dd><select name="s_ship" id="s_ship">
                                <option value="None">None</option> 
                                <option value="Board">Board</option> 
                                <option value="BUTex">BUTex</option>
                                <option value="Others">Others</option> 
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
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </dd>                                                                         
                    </dl>
                    <dl>
                        <dt><label for="ssc board"><b>*SSC Board</b></label></dt>
                        <dd><select name="ssc_board" id="sscBoard">
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