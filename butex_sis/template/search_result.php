<style>
  .table_data{
    padding-left: 2px;
    padding-bottom: 2px;
    padding-right: 2px;
    text-align: center;
    text-decoration: none;
  }
  .student_list_table{
    width: 800px;
  }
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
    position: relative;
    top: -17px;
  }
  .profile_link{
    text-decoration: none;
    color: green;
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
    <?php $search_key = $_POST['student_id']; ?>
    <h2 style="width: 31%; margin: 0 auto;">Search Result for <?php echo $search_key ?><span class="arrow"></span></h2>
  <!--    <P>After that you will be able to login with the user id <strong><?php reg_info('student_id'); ?></strong>.</p>-->
    <a class="subButton" href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-1">Back TO Search</a>
    <?php
    echo "<table class='student_list_table' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Department</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>HSC Year</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Photo</th>
            </tr>";
    $sql = "SELECT * FROM `input` WHERE std_id = $search_key";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);
    if ($num >= 1) {
      while ($row = mysql_fetch_array($result)) {
        $student_id = $row['std_id'];
        $link_to_profile = "<a class='profile_link' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
        echo "<tr>";
        echo "<td class='table_data'>".$link_to_profile."</td>";
        echo "<td class='table_data'>" . $row['stud_name'] . "</td>";
        echo "<td class='table_data'>" . $row['dept'] . "</td>";
        echo "<td class='table_data'>" . $row['stud_contact_no'] . "</td>";
        echo "<td class='table_data'>" . $row['hsc_year'] . "</td>";
        echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/" . $row['link'] . "'</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo '<h3>No search result!</h3>';
    }
    ?>
  <?php endif; ?>
</div>
<!-- END Content -->
<?php get_footer(); ?>