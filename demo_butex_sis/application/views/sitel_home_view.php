  <div id="container">
    <div id="login_modal_body">
  <!--            <h2>User Login<span class="arrow"></span></h2>-->
        <div id="login-box" class="login-popup loginContainer">
          <div id="error_box">
            <?php echo validation_errors(); ?>
            <?php echo form_open('verifylogin'); ?>
            <a name="errr_login"></a>
            <fieldset id="ersb_login" style="padding: 2;display: none;font-size: 13px">
              <legend><b style="font-size: 14px">Validation Errors</b></legend>
              <span id="ers_login"></span>
            </fieldset>
          </div>
  <!--        <div class="close"><a href="#" class="close" ><img class="close btn_close" width="25" height="27" src="./template/images/logo_transparent_back/crossButton2.jpg"/></a></div>-->

          <div style="margin-top: 0px; margin-bottom: 19px; margin-left: 40px;" id="header_login">
            <center>
              <h3 style="width: 150px; font-weight: normal;">User Login</h3>
            </center>
          </div>


          <dl>
            <dt><label for="user_id">User ID:</label></dt>
            <dd><input type="text" class="text" name="username" id="username" size="30" value="" /></dd>
          </dl>

          <dl>
            <dt><label for="password">Password:</label></dt>
            <dd><input type="password" class="text" name="password" id="password" size="30" value="" /></dd>
          </dl>

          <dl>
            <dt><label for="remember">Remember Me:</label></dt>
            <dd><input type="checkbox" name="remember" id="remember" value="1" /></dd>
          </dl>
          <input type="submit" class="submitLogIn" name="login" value="Login"/>
          <p style="text-align: center;">Forgot your Password ? <a href="#change_password_box" class="login-window uniqueLogin">Click Here</a>
          </p>
          <p style="text-align: center;">Don't have an Account ? <a href="#register-box" class="login-window uniqueLogin">Register</a>
          </p>
          <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
        </div>
    </div>
  </div>
  <div id="Footer">
    <?php include 'footer.php'; ?>
  </div>

</div>

