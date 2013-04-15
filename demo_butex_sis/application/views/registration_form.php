<div id="register-box" class="registerPopup loginContainer">
  <h3>User Registration</h3>
  <?php echo validation_errors(); ?>
  <?php echo form_open('verifyInsertion'); ?>
  <dl>
    <dt><label for="student_id"><b>*Student ID:</b></label></dt>
    <dd><input type="text" class="text" name="student_id" id="student_id" size="30" value="" /></dd>                                                                         
  </dl>

  <dl>
    <dt><label for="full_name"><b>*Full Name:</b></label></dt>
    <dd><input type="text" class="text" name="full_name" id="full_name" size="30" value="" /></dd>                                                                         
  </dl>

  <!--        <dl>
            <dt><label for="address"><b>*Address:</b></label></dt>
            <dd><input type="text" class="text" name="address" id="address" size="30" value="" /></dd>                                                                         
          </dl>-->

  <!--          <div id="registration_error_box" style="display: none; text-align: center; font-weight: bold; color: red;">
              <div id="registration_error_msg" style="text-align: center; margin-bottom: -19px; margin-top: -13px;"></div>
            </div>
  
  
            <dl>
              <dt><label for="user_name"><b>*User Name:</b></label></dt>
              <dd><input type="text" class="text" name="user_name" id="user_name" size="30" value="" /><div id="response" style="width: 25px; height: 25px; margin-left: 390px; margin-top: -24px;"></div><div id="busyImage" style="width: 25px; height: 25px; margin-left: 390px; margin-top: -25px;"></div></dd>
            </dl>
  
            <dl>
              <dt><label for="password"><b>*Password:</b></label></dt>
              <dd><input type="password" class="text" name="password" id="pw" size="30" value="" /></dd>
            </dl>
  
            <dl>
              <dt><label for="cpassword"><b>*Confirm Password:</b></label></dt>
              <dd><input type="password" class="text" name="cpassword" id="cpassword" size="30" value="" /></dd>
            </dl>
  
            <dl>
              <dt><label for="position"><b>*Position</b></label></dt>
              <dd><select name="position" id="position">
                  <option value="" selected="selected">None</option> 
                  <option value="office">Office Stuff</option> 
                  <option value="teacher">Teacher</option> 
                </select>
              </dd>
            </dl>
  
            <dl id="postion_param"></dl>
  
            <div id="registration_error_box1" style="display: none; text-align: center; font-weight: bold; color: red;">
              <div id="registration_error_msg1" style="text-align: center; margin-bottom: -19px; margin-top: -13px;"></div>
            </div>
  
            <dl>
              <dt><label for="email"><b>*E-Mail:</b></label></dt>
              <dd><input type="text" class="text" name="email" id="email" size="30" value="" /><div id="response1" style="width: 25px; height: 25px; margin-left: 390px; margin-top: -24px;"></div><div id="busyImage1" style="width: 25px; height: 25px; margin-left: 390px; margin-top: -25px;"></div></dd>
            </dl>
  
            <dl>
              <dt><label for="cemail"><b>*Confirm E-Mail:</b></label></dt>
              <dd><input type="text" class="text" name="cemail" id="cemail" size="30" value="" /></dd>
            </dl>
  
            <input type="submit" id="reg_submit_button" disabled="disabled" class="submit" name="register" value="Register" />
  
            <p style="text-align: center;"> All Fields are Required </p>
            <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>-->
  <input type="submit" class="submitLogIn" name="login" value="Register"/>
</form>
</div>