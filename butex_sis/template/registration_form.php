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
        $('#student_id').change(function(){
           var std_id=$(this).val();
           var url = "./index.php?p=ajax_student_id&std_id="+std_id;
           $.ajax({
               url: url,
               type: 'POST',
               success: function(data){
                   if(data>0){
                       $('span#sign').html('<img src="./template/images/cross1.png" style="left: 10px;position: relative;top: 5px;width: 17px;"/>');
                   }else{
                       $('span#sign').html('<img src="./template/images/tick.png" style="left: 10px;position: relative;top: 5px;width: 22px;"/>');
                   }
               },
               error: function(){
                   alert('got an error');
               }
           })
        });
    });
</script>
<style>
    #registration_form input[type='text']{
        width: 250px;
    }
    #registration_form{
        font-size: 12px;
        font-weight: normal;
    }
</style>

<form method="POST" action="./index.php?p=register#register-box" id="registration_form" enctype="multipart/form-data" onsubmit="return UserValidate()">
    <div id="register-box" class="registerPopup loginContainer">
        <h3>User Registration</h3>
        <div id="error_box">
            <a name="errr_registration"></a>
            <fieldset id="ersb" style="padding: 2;display: none;font-size: 13px">
                <legend><b style="font-size: 14px">Validation Errors</b></legend>
                <span id="ers"></span>
            </fieldset>
        </div>
        <dl>
            <dt><label for="student_id"><b>*Student ID:</b></label></dt>
            <dd><input type="text" class="text" name="student_id" id="student_id" size="30" value="" autocomplete="off" /><span id="sign"></span></dd>
        </dl>

        <dl>
            <dt><label for="session"><b>*Session:</b></label></dt>
            <dd><input type="text" class="text" name="session" id="session" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="full_name"><b>*Admission Test Roll No.:</b></label></dt>
            <dd><input type="text" class="text" name="ad_test_roll_no" id="ad_test_roll_no" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="full_name"><b>*Merit Position:</b></label></dt>
            <dd><input type="text" class="text" name="merit_pos" id="merit_pos" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="department"><b>*Alloted Department:</b></label></dt>
            <dd><select name="al_dept" id="al_dept">
                    <option value="" selected="selected">None</option> 
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
            <dt><label for="migrated department"><b>Migrated Department:</b></label></dt>
            <dd><select name="mi_dept" id="mi_dept">
                    <option value="" selected="selected">None</option> 
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
                    <option value="" selected="selected">None</option> 
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
                    <option value="" selected="selected">None</option> 
                    <option value="Board">Board</option> 
                    <option value="BUTex">BUTex</option>
                    <option value="Others">Others</option> 
                </select>
            </dd>
        </dl>

        <dl>
            <dt><label for="student name"><b>*Student Name:</b></label></dt>
            <dd><input type="text" class="text" name="stud_name" id="stud_name" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="Gender"><b>*Gender</b></label></dt>
            <dd>
                <select name="gender" id="gender">
                    <option value="" selected="selected">None</option> 
                    <option value="Male">Male</option> 
                    <option value="Female">Female</option>
                </select>
            </dd>                                                                         
        </dl>

        <dl>
            <dt><label for="religion"><b>*Religion:</b></label></dt>
            <dd><input type="text" class="text" name="religion" id="religion" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="father name"><b>*Father Name:</b></label></dt>
            <dd><input type="text" class="text" name="father_name" id="father_name" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="mother name"><b>*Mother Name:</b></label></dt>
            <dd><input type="text" class="text" name="mother_name" id="mother_name" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="full_name"><b>*Date Of Birth:</b></label></dt>
            <dd><input type="text" class="text" name="dob" id="dob_1" size="30" value="" autocomplete="off" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="permanent_address"><b>*Permanent Address:</b></label></dt>
            <dd><input type="text" class="text" name="p_address" id="p_address" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="current_address"><b>*Current Address:</b></label></dt>
            <dd><input type="text" class="text" name="c_address" id="c_address" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="student contact no"><b>*Student Contact No.:</b></label></dt>
            <dd><input type="text" class="text" name="stud_contact_no" id="stud_contact_no" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="grdiant contact no"><b>* Guardian Contact No.:</b></label></dt>
            <dd><input type="text" class="text" name="grd_contact_no" id="grd_contact_address" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="grdiant contact no"><b>*Nationality:</b></label></dt>
            <dd><input type="text" class="text" name="nationality" id="nationality" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="grdiant contact no"><b>*Emergency Contact No:</b></label></dt>
            <dd><input type="text" class="text" name="emergency_contact_no" id="emergency_contact_no" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="grdiant contact no"><b>*Emergency Address:</b></label></dt>
            <dd><input type="text" class="text" name="emergency_address" id="emergency_address" size="30" value="" /></dd>                                                                         
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
                    <option value="NONE">NONE</option>
                </select>
        <!--        <input type="text" class="text" name="blood_grp" id="blood_grp" size="30" value="" />-->
            </dd>                                                                         
        </dl>
        <dl>
            <dt><label for="ssc board"><b>*SSC Board</b></label></dt>
            <dd><select name="ssc_board" id="sscBoard">
                    <option value="" selected="selected">Select One</option> 
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
            <dd><input type="text" class="text" name="ssc_ac" id="ssc_ac" size="30" value="" /></dd>                                                                         
        </dl>
        <dl>
            <dt><label for="ssc year"><b>*SSC Year</b></label></dt>
            <dd><select name="ssc_year" id="sscYear"></select>
            </dd>
        </dl>
        <dl>
            <dt><label for="ssc roll number"><b>*SSC Roll Number:</b></label></dt>
            <dd><input type="text" class="text" name="ssc_roll" id="ssc_roll" size="30" value="" /></dd>                                                                         
        </dl>
        <dl>
            <dt><label for="ssc gpa"><b>*SSC GPA:</b></label></dt>
            <dd><input type="text" class="text" name="ssc_gpa" id="ssc_gpa" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="hsc board"><b>*HSC Board</b></label></dt>
            <dd><select name="hsc_board" id="hscBoard">
                    <option value="" selected="selected">Select One</option> 
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
            <dd><input type="text" class="text" name="hsc_ac" id="hsc_ac" size="30" value="" /></dd>                                                                         
        </dl>
        <dl>
            <dt><label for="hsc year"><b>*HSC Year</b></label></dt>
            <dd><select name="hsc_year" id="hscYear"></select>
            </dd>
        </dl>
        <dl>
            <dt><label for="hsc roll number"><b>*HSC Roll Number :</b></label></dt>
            <dd><input type="text" class="text" name="hsc_roll" id="hsc_roll" size="30" value="" /></dd>                                                                         
        </dl>
        <dl>
            <dt><label for="hsc gpa"><b>*HSC GPA :</b></label></dt>
            <dd><input type="text" class="text" name="hsc_gpa" id="hsc_gpa" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="gurdian income"><b>*Gurdian Income :</b></label></dt>
            <dd><input type="text" class="text" name="grd_income" id="grd_income" size="30" value="" /></dd>                                                                         
        </dl>

        <dl>
            <dt><label for="co-extra curricular activity"><b>*Extra Curricular :</b></label></dt>
            <dd><textarea class="text" name="extraCurricular" id="extraCurricular"></textarea>
      <!--        <input type="text" class="text" name="grd_income" id="full_name" size="300" value="" />-->
            </dd>                                                                         
        </dl>
        <!--    <dl>
              <dt><label for="student photo"><b>File Name:</b></label></dt>
              <dd><input type="file" name="file" id="file1" /></dd>
            </dl>-->
        <input type="submit" class="submitLogIn" id="submitButtonId" name="register" value="Register"/>
    </div>
</form>
