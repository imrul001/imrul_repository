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
  .L1T1blog{
  }
  .clear{
    color:green;
    font-size: 13px;
  }
  .backLog{
    color:red;
    font-size: 13px;
  }
  table.result_table, .result_table th, .result_table td
  {
    font-family: arial;
    border:1px solid green;
  }
  table.result_table
  {
    position: relative;
    top: 5px;
    width:80%;
    border-collapse:collapse;
  }
  .result_table th
  {
    height:30px;
    background-color:#30769E;
    color:white;
  }
  .result_table td
  {
    text-align:center;
    height:50px;
    vertical-align:bottom;
    padding:15px;
  }
</style>

<?php get_header(); ?>
<script type="text/javascript">
  $(document).ready(function(){
    //      javascript for result_status table
    $('#createFirstResultRow').live('click', function(){
      var student_id = $(this).attr('stud-id').trim();
      var LevelTerm = $(this).attr('LevelTerm').trim();
      var result =[];
      $.msgBox({ type: "prompt",
        title: "Result "+LevelTerm+"("+student_id+")",
        inputs: [
          { header: "Level-Term", type: "text", name: "levelTerm", value: result[0]},
          { header: "Exam. Year", type: "text", name: "examYear", value: result[1]},
          { header: "GPA", type: "text", name: "gpa", value: result[2]},
          { header: "CGPA", type: "text", name: "cgpa", value: result[3]},
          { header: "Fail/Retake Subject(s)", type: "text", name: "failSubjects", value: result[4]},
          { header: "Remarks", type: "text", name: "remarks", value: result[5]}
        ],
        buttons: [
          { value: "Submit" }, {value:"Cancel"}],
        success: function (result, values) {
          if(result == 'Submit'){
            var course=$('input[name=bCourse]').val();
            var url = "index.php?p=backlog_data_entry&std_id="+std_id+"&LT="+column+"&course="+course; // the script where you handle the form input.
            $.ajax({
              type: "POST",
              url: url, // serializes the form's elements.
              success: function(data)
              {
                $("#std_id").change();
              }
            });
            return false;
          }
          else{
                    
          }
        }
      });
    })
  });
</script>
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
    <div id="login_modal_body" style="min-height: 300px;">
      <?php
      $student_id = isset($_GET['std_id']) ? $_GET['std_id'] : '';
      $sql = "SELECT * FROM exam WHERE std_id='" . $student_id . "'";
      $result = mysql_query($sql);
      $num_row = mysql_num_rows($result);
      ?>
      <?php if ($num_row > 0) : ?>
        <table class='result_table' style='margin: 0 auto;'>
          <th>Level,Term<?php echo $student_id; ?></th>
          <th>Exam Year</th>
          <th>Term/Subject GPA</th>
          <th>CGPA</th>
          <th>Fail/Retake Subject(s)</th>
          <th>Remarks</th>
          <th>Edit Result</th>
          <tr>
            <td>level-1, Term-2</td>
            <td>2012</td>
            <td>3.12</td>
            <td>3.10</td>
            <td>CSE-12</td>
            <td>Good</td>
            <td><input type="button" value="Edit Row"/></td>
          </tr>
        </table>
      <?php else : ?>
        <div style="width: 50%; margin: 0 auto;">
          <div id="information">No Result table is create for Student ID <B><?php echo $student_id; ?></B>
            <input type="button" id="createFirstResultRow" LevelTerm="Level-1,Term-1" stud-id="<?php echo $student_id; ?>" value="Create Result Table" />
          </div>
        </div>

      <?php endif; ?>

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
              <dd><input type="text" class="gpa" name="gpaL1T1" id="gpaL1T1" size="30" value="" /><input type="button"  class="blButton" id="L1T1blog" size="30" value="BackLog L1T1" /><span class="status L1T1blog"></span></dd>
            </dl>
            <dl>
              <dt><label for="student Id"><b>GPA L1 T2:</b></label></dt>
              <dd><input type="text" class="gpa" name="gpaL1T2" id="gpaL1T2" size="30" value="" /><input type="button" class="blButton" name="student_id" id="L1T2blog" size="30" value="BackLog L1T2" /><span class="status L1T2blog"></span></dd>
            </dl>
            <dl>
              <dt><label for="student Id"><b>GPA L2 T1:</b></label></dt>
              <dd><input type="text" class="gpa" name="gpaL2T1" id="gpaL2T1" size="30" value="" /><input type="button" class="blButton"  name="student_id" id="L2T1blog" size="30" value="BackLog L2T1" /><span class="status L2T1blog"></span></dd>
            </dl>
            <dl>
              <dt><label for="student Id"><b>GPA L2 T2:</b></label></dt>
              <dd><input type="text" class="gpa" name="gpaL2T2" id="gpaL2T2" size="30" value="" /><input type="button" class="blButton" name="student_id" id="L2T2blog" size="30" value="BackLog L2T2" /><span class="status L2T2blog"></span></dd>
            </dl>
            <dl>
              <dt><label for="student Id"><b>GPA L3 T1:</b></label></dt>
              <dd><input type="float" class="gpa" name="gpaL3T1" id="gpaL3T1" size="30" value="" /><input type="button" class="blButton" name="student_id" id="L3T1blog" size="30" value="BackLog L3T1" /><span class="status L3T1blog"></span></dd>
            </dl>
            <dl>
              <dt><label for="student Id"><b>GPA L3 T2:</b></label></dt>
              <dd><input type="text" class="gpa" name="gpaL3T2" id="gpaL3T2" size="30" value="" /><input type="button" class="blButton"  name="student_id" id="L3T2blog" column="" size="30" value="BackLog L3T2" /><span class="status L3T2blog"></span></dd>
            </dl>
            <dl>
              <dt><label for="student Id"><b>GPA L4 T1:</b></label></dt>
              <dd><input type="text" class="gpa" name="gpaL4T1" id="gpaL4T1" size="30" value="" /><input type="button" class="blButton" name="student_id" id="L4T1blog" size="30" value="BackLog L4T1" /><span class="status L4T1blog"></span></dd>
            </dl>
            <dl>
              <dt><label for="student Id"><b>GPA L4 T2:</b></label></dt>
              <dd><input type="text" class="gpa" name="gpaL4T2" id="gpaL4T2" size="30" value="" /><input type="button" class="blButton"  name="student_id" id="L4T2blog" size="30" value="BackLog L4T2" /><span class="status L4T2blog"></span></dd>
            </dl>
            <dl>
              <dt><label for="student Id"><b>CGPA:</b></label></dt>
              <dd><input type="text" class="cgpa" name="cgpa" id="cgpa" size="30" value="" /><span class="status cgpaBlog"></span></dd>
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
    <div>
      <form id="dynamicTable">
        
      </form>
    </div>
  <!-- END Content -->
  <?php get_footer(); ?>
