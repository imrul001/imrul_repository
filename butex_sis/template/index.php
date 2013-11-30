<?php get_header(); ?>
<div id="container">
  <div id="login_modal_body">
    <form method="post" action="./index.php?p=login" enctype="multipart/form-data">
      <!--            <h2>User Login<span class="arrow"></span></h2>-->
      <div id="login-box" class="login-popup loginContainer">
        <div id="error_box">
          <a name="errr_login"></a>
          <fieldset id="ersb_login" style="padding: 2;display: none;font-size: 13px">
            <legend><b style="font-size: 14px">Validation Errors</b></legend>
            <span id="ers_login"></span>
          </fieldset>
        </div>

        <div style="margin-top: 0px; margin-bottom: 19px; margin-left: 40px;" id="header_login">
          <center>
            <h3 style="width: 150px; font-weight: normal;">User Login</h3>
          </center>
        </div>


        <dl>
          <dt><label for="user_id">User ID:</label></dt>
          <dd><input type="text" class="text" name="user_name" id="user" size="30" value="<?php echo (isset($_POST['user_name'])) ? $_POST['user_name'] : ''; ?>" /></dd>
        </dl>

        <dl>
          <dt><label for="password">Password:</label></dt>
          <dd><input type="password" class="text" name="password" id="p" size="30" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ''; ?>" /></dd>
        </dl>

        <dl>
          <dt><label for="remember">Remember Me:</label></dt>
          <dd><input type="checkbox" name="remember" id="remember" value="1" /></dd>
        </dl>
        <input type="submit" class="submitlogin" name="login" value="Login" />
        <p style="text-align: center; display: none;">Forgot your Password ? <a href="#change_password_box" class="login-window uniqueLogin">Click Here</a>
        </p>
        <p style="text-align: center; display: none;">Don't have an Account ? <a href="#register-box" class="login-window uniqueLogin">Register</a>
        </p>
      </div>
    </form>
  </div>
</div>
<?php get_footer(); ?>
  

