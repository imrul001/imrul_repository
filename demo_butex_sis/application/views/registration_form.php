<div id="register-box" class="registerPopup loginContainer">
  <h3>User Registration</h3>
  <?php echo validation_errors(); ?>
  <?php echo form_open('verifyInsertion'); ?>
  <dl>
    <dt><label for="student_id"><b>*Student ID:</b></label></dt>
    <dd><input type="text" class="text" name="student_id" id="student_id" size="30" value="" /></dd>                                                                         
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
    <dt><label for="student name"><b>*Student Name:</b></label></dt>
    <dd><input type="text" class="text" name="stud_name" id="stud_name" size="30" value="" /></dd>                                                                         
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
    <dd><input type="text" class="text" name="dob" id="dob" size="30" value="" /></dd>                                                                         
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
    <dt><label for="grdiant contact no"><b>* Grdiant Contact No.:</b></label></dt>
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
    <dd><input type="text" class="text" name="blood_grp" id="full_name" size="30" value="" /></dd>                                                                         
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
    <dd><select name="ssc_year" id="sscBoard">
        <option value="" selected="selected">Select One</option> 
        <option value="AME">AM</option> 
        <option value="FME">FME</option>
        <option value="YME">YME</option> 
        <option value="WPE">WPE</option> 
        <option value="TM">TM</option> 
        <option value="FD">FD</option> 
      </select>
    </dd>
  </dl>
  <dl>
    <dt><label for="ssc roll number"><b>*SSC Roll Number:</b></label></dt>
    <dd><input type="text" class="text" name="ssc_roll" id="full_name" size="30" value="" /></dd>                                                                         
  </dl>
  <dl>
    <dt><label for="ssc gpa"><b>*SSC GPA:</b></label></dt>
    <dd><input type="text" class="text" name="ssc_gpa" id="full_name" size="30" value="" /></dd>                                                                         
  </dl>

  <dl>
    <dt><label for="hsc board"><b>*HSC Board</b></label></dt>
    <dd><select name="hsc_board" id="sscBoard">
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
    <dd><select name="hsc_year" id="hscBoard">
        <option value="" selected="selected">Select One</option> 
        <option value=""></option> 
        <option value=""></option>
        <option value=""></option> 
        <option value=""></option> 
        <option value=""></option> 
        <option value=""></option> 
        <option value=""></option>
        <option value=""></option>
        <option value=""></option> 
        <option value=""></option> 
      </select>
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
    <dd><input type="text" class="text" name="grd_income" id="full_name" size="30" value="" /></dd>                                                                         
  </dl>

  <dl>
    <dt><label for="co-extra curricular activity"><b>*Extra Curricular :</b></label></dt>
    <dd><textarea class="text" name="extraCurricular" id="extraCurricular"></textarea>
<!--      <input type="text" class="text" name="grd_income" id="full_name" size="300" value="" />-->
    </dd>                                                                         
  </dl>
  <dl>
    <dt><label for="student photo"><b>File Name:</b></label></dt>
    <dd><input type="file" name="file" id="file1" /></dd>
  </dl>
  <input type="submit" class="submitLogIn" name="login" value="Register"/>
</form>
</div>