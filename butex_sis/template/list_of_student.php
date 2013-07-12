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
  .filteringParamSelection{
    float: right;
    font-size: 12px;
    margin-left: 10px;
    font-family: times news roman;
    width: auto;
    height: auto;
    overflow: hidden;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    
  });
</script>
<?php
$type = $_POST['type'];
?>
<div id="content">
<!--  <script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/pf-button.gif" alt="Print Friendly and PDF"/></a>-->
  <div id="listOfStudent">
    <?php
    /* $data1=user_data('user_id'); */
    if (empty($type)) {
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
    }
    if ($type == "dynamic_search") {
      $method = $_POST['method'];
      $method_value = $_POST['methodValue'];
      $queryParam = $method . " = " . "'" . $method_value . "'";
      $sql = "SELECT * FROM input WHERE $queryParam";
      $result = mysql_query($sql);
      if (!$result) {
        die(mysql_error());
      } else {
        if (mysql_num_rows($result) > 0) {
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
        } else {
          echo '<h3>No Result</h3>';
        }
      }
    }
    ?>
  </div>
</div>
