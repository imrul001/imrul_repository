<style>
  .table_data{
    padding-left: 2px;
    padding-bottom: 2px;
    padding-right: 2px;
    text-align: center;
  }
  .student_list_table{
    width: 800px;
  }
  .profile_link{
    text-decoration: none;
    color: green;
  }
</style>
<div id="content">
  <h2 id="listHeader">List of Students</h2>
  <?php
  /* $data1=user_data('user_id'); */
  $sql = "SELECT * FROM input";
  $result = mysql_query($sql);

  echo "<table class='student_list_table' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Department</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>HSC Year</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Photo</th>
            </tr>";

  while ($row = mysql_fetch_array($result)) {
    $student_id = $row['std_id'];
    $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";

    echo "<tr>";
    echo "<td class='table_data'>" . $link_to_profile . "</td>";
    echo "<td class='table_data'>" . $row['stud_name'] . "</td>";
    echo "<td class='table_data'>" . $row['dept'] . "</td>";
    echo "<td class='table_data'>" . $row['stud_contact_no'] . "</td>";
    echo "<td class='table_data'>" . $row['hsc_year'] . "</td>";
    echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/" . $row['link'] . "'</td>";
    echo "</tr>";
  }
  echo "</table>";
  ?>
</div>
