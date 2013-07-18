<style>
  .current_time{
    text-align: center;
  }
  dt{
    padding-left: 30px;
    width: 157px;
  }
  #exam_result_submit_id{
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
      <form id="formToExamResultEntry" action="" method="POST" enctype="multipart/form-data">
        <div id="manage_download_box" class="registerPopup">
          <h3 style="text-align: center;">Exam Results</h3>
          <div class="current_time">
            <?php echo "<p style='font-family:times new roman';><b>Current date:</b> " . date("jS-F-Y h:i:s a", time()) . "</p>"; ?>
          </div>

          <dl>
            <dt><label for="student Id"><b>Student ID:</b></label></dt>
            <dd><input type="text" class="text" name="student_id" id="std_id" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>GPA L1 T1:</b></label></dt>
            <dd><input type="text" class="gpa" name="gpaL1T1" id="gpaL1T1" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>GPA L1 T2:</b></label></dt>
            <dd><input type="text" class="gpa" name="gpaL1T2" id="gpaL1T2" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>GPA L2 T1:</b></label></dt>
            <dd><input type="text" class="gpa" name="gpaL2T1" id="gpaL2T1" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>GPA L2 T2:</b></label></dt>
            <dd><input type="text" class="gpa" name="gpaL2T2" id="gpaL2T2" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>GPA L3 T1:</b></label></dt>
            <dd><input type="float" class="gpa" name="gpaL3T1" id="gpaL3T1" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>GPA L3 T2:</b></label></dt>
            <dd><input type="text" class="gpa" name="gpaL3T2" id="gpaL3T2" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>GPA L4 T1:</b></label></dt>
            <dd><input type="text" class="gpa" name="gpaL4T1" id="gpaL4T1" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>GPA L4 T2:</b></label></dt>
            <dd><input type="text" class="gpa" name="gpaL4T2" id="gpaL4T2" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>CGPA:</b></label></dt>
            <dd><input type="text" class="cgpa" name="cgpa" id="cgpa" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>Record</b></label></dt>
            <dd><input type="text" class="text" name="record" id="record" size="30" value="" /></dd>
          </dl>
          <dl>
            <dt><label for="student Id"><b>Note:</b></label></dt>
            <dd><input type="text" class="text" name="note" id="note" size="30" value="" /></dd>
          </dl>

          <input type="submit" class="submitLogIn" id="exam_result_submit_id" value="Submit" />
          <div id="uploader" style="">
          </div>
        </div>
      </form>
      <form id="examDataForm" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" class="text" name="stdent_id" id="stud_id" size="30" value="" /></dd>
      </form>
    </div>
  <?php endif; ?>
</div>
<!-- END Content -->
<?php get_footer(); ?>