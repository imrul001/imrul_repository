<style>
  .current_time{
    text-align: center;
  }
  dt{
    padding-left: 30px;
    width: 157px;
  }
  #punishment_submit_id{
    margin-left: 190px;
  }
  #uploader{
    margin-left: 285px;
    height: 40px;
    width: 40px;
    margin-top: -35px;
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
  <!--    <h2 style="width: 31%">Registration Continues<span class="arrow"></span></h2>-->
  <!--    <P>After that you will be able to login with the user id <strong><?php reg_info('student_id'); ?></strong>.</p>-->
    <a class="subButton" href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-2">Back TO Admin</a>
    <div id="login_modal_body">
      <form id="formToPunishmentEntry" action="" method="POST" enctype="multipart/form-data">
        <div id="manage_download_box" class="registerPopup">
          <h3 style="text-align: center;">Punishment Entry</h3>
          <div class="current_time">
            <?php echo "<p style='font-family:times new roman';><b>Current date:</b> " . date("jS-F-Y h:i:s a", time()) . "</p>"; ?>
          </div>
          
          <dl>
            <dt><label for="Date & Time"><b>Date & Time</b></label></dt>
            <dd><input type="text" class="text" name="date_time" id="date_time" size="30" value="<?php echo date("jS-F-Y h:i:s a", time()); ?>" readonly/></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>Student ID:</b></label></dt>
            <dd><input type="text" class="text" name="student_id" id="student_id" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="Punishment:"><b>Punishment:</b></label></dt>
            <dd><input type="text" class="gpa" name="punishment" id="punishment" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="Warning"><b>Warning:</b></label></dt>
            <dd><input type="text" class="gpa" name="warning" id="warning" size="30" value="" /></dd>
          </dl>
          <input type="submit" class="submitLogIn" id="punishment_submit_id" value="Submit" />
          <div id="uploader" style="">
          </div>
        </div>
      </form>
    </div>
  <?php endif; ?>
</div>
<!-- END Content -->
<?php get_footer(); ?>