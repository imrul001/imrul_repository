<div id="content">
  <h2>List of Students</h2>
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
    $file = $row['file_name'];
    $download_id = $row['download_id'];
    $link = "<a href='./template/download.php?f=$file&downlod_id=$download_id'>";

    echo "<tr>";
    echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['std_id'] . "</td>";
    echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['stud_name'] . "</td>";
    echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['dept'] . "</td>";
    echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['stud_contact_no'] . "</td>";
    echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['hsc_year'] . "</td>";
    echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'><img width='100' src='/template/uploaded_student_images/".$row['link']."'</td>";
    echo "</tr>";
  }
  echo "</table>";
  ?>
</div>
