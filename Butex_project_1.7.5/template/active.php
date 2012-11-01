<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- BEGIN Content -->
<div id="content">
  <?php
//    $user_name = reg_confirm('user_name');
  $m = $_GET['m'];
  $u = $_GET['u'];
  ?>
  <?php if ($m == 'ac_activation'): ?>
    <h2 style="width: 33%">Registration Complete</h2>

    <p>Registration is complete!</p>
    <p>Your account has been successfully activated.You may now <a href="#login-box1" class="login-window">login</a> with the user id <strong><?php echo $u; ?></strong>.</p>
  <?php endif; ?>
  <?php if ($m == 'new_password_activation'): ?>
    <h2 style="width: 33%">Change Password</h2>

    <p>Password is successfully changed!</p>
    <p>You may use the new password to <a href="#login-box" class="login-window">login</a> with the user id <strong><?php echo $u; ?></strong>.</p>
  <?php endif; ?>

  <div id="login_modal_body">
    <form method="post" action="./index.php?p=login" enctype="multipart/form-data" onsubmit="return isLogInValid()">
<!--            <h2>User Login<span class="arrow"></span></h2>-->
      <div id="login-box1" class="login-popup loginContainer">
        <div id="error_box">
          <a name="errr_login"></a>
          <fieldset id="ersb_login" style="padding: 2;display: none;font-size: 13px">
            <legend><b style="font-size: 14px">Validation Errors</b></legend>
            <span id="ers_login"></span>
          </fieldset>
        </div>
<!--        <div class="close"><a href="#" class="close" ><img class="close btn_close" width="25" height="27" src="./template/images/logo_transparent_back/crossButton2.jpg"/></a></div>-->

        <div style="margin-top: -65px; margin-bottom: 45px; margin-left: 50px;" id="header_login">
          <center>
            <div id ="login_logo" style="width: 75px; height: 75px;" >
              <img style="margin-top: 55px; margin-left:-200px;" src="./template/img/user-login-icon.png" width="75px" height="75px">
            </div>
            <h3 style="width: 150px;">User Login</h3>
          </center>
        </div>


        <dl>
          <dt><label for="user_id"><b>User ID:</b></label></dt>
          <dd><input type="text" class="text" name="user_name" id="user" size="30" value="<?php echo ($_POST['user_name']) ? $_POST['user_name'] : ''; ?>" /></dd>
        </dl>

        <dl>
          <dt><label for="password"><b>Password:</b></label></dt>
          <dd><input type="password" class="text" name="password" id="p" size="30" value="<?php echo ($_POST['password']) ? $_POST['password'] : ''; ?>" /></dd>
        </dl>

        <dl>
          <dt><label for="remember"><b>Remember Me:</b></label></dt>
          <dd><input type="checkbox" name="remember" id="remember" value="1" /></dd>
        </dl>

        <input type="submit" class="submit" name="login" value="Login" />
        <p style="text-align: center;">Forgot your Password ? <a href="./index.php?p=forgotPassword">Click Here</a>
        </p>
        <p style="text-align: center;">Don't have an Account ? <a href="#register-box" class="login-window">Register</a>
        </p>
        <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
      </div>
    </form>
  </div>
</div>
<!-- END Content -->

<?php get_footer(); ?>