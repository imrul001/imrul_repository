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
    if($('.table_data').size()<1){
      $(".stTable").remove();
      $('#listOfStudent').html("<h3>No Result</h3>");
    }
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
      $search = $_GET['searchParam'];

      if ($search == 'contact') {
        echo "<table class='student_list_table' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Privilege</th>
            </tr>";
        $i = 1;
        while ($row = mysql_fetch_array($result)) {
          $student_id = $row['std_id'];
          $std_id[$i] = $row['std_id'];
          $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";

          echo "<tr>";
          echo "<td class='table_data'>" . $link_to_profile . "</td>";
          echo "<td class='table_data'>" . $row['stud_name'] . "</td>";
          echo "<td class='table_data'>" . $row['stud_contact_no'] . "</td>";
          echo "<td class='table_data' style='padding-left: 0px; padding-bottom: 0px; padding-right: 0px;'>
            <form id='approval_form_" . $i . "' class='formApp' method='POST' action='' enctype='multipart/form-data'> 
            <input type='hidden' name='std_" . $i . "' id='std_" . $i . "' value='" . $std_id[$i] . "'/>
            <input type='submit' id='edit_" . $i . "' class='editClass' name='edit' value='Edit'/>
            <input type='submit' id='delete_" . $i . "' class='deleteClass' name='delete' value='Delete' />
            </form>
            </td>";
          echo "</tr>";
          $i = $i + 1;
        }
        echo "</table>";
      } else {
        echo "<table class='student_list_table' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Department</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>HSC Year</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Photo</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Privilege</th>
            </tr>";
        $i = 1;
        while ($row = mysql_fetch_array($result)) {
          $student_id = $row['std_id'];
          $std_id[$i] = $row['std_id'];
          $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";

          echo "<tr>";
          echo "<td class='table_data'>" . $link_to_profile . "</td>";
          echo "<td class='table_data'>" . $row['stud_name'] . "</td>";
          echo "<td class='table_data'>" . $row['dept'] . "</td>";
          echo "<td class='table_data'>" . $row['stud_contact_no'] . "</td>";
          echo "<td class='table_data'>" . $row['hsc_year'] . "</td>";
          echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/" . $row['link'] . "'</td>";
          echo "<td class='table_data' style='padding-left: 0px; padding-bottom: 0px; padding-right: 0px;'>
            <form id='approval_form_" . $i . "' class='formApp' method='POST' action='' enctype='multipart/form-data'> 
            <input type='hidden' name='std_" . $i . "' id='std_" . $i . "' value='" . $std_id[$i] . "'/>
            <input type='submit' id='edit_" . $i . "' class='editClass' name='edit' value='Edit'/>
            <input type='submit' id='delete_" . $i . "' class='deleteClass' name='delete' value='Delete' />
            </form>
            </td>";
          echo "</tr>";
          $i = $i + 1;
        }
        echo "</table>";
      }
    }
    if ($type == "dynamic_search") {
      $method = $_POST['method'];
      $method_value = $_POST['methodValue'];
      if ($method == 'batch') {
        $sql = "SELECT * FROM input";
      } else {
        $queryParam = $method . " = " . "'" . $method_value . "'";
        $sql = "SELECT * FROM input WHERE $queryParam";
      }
      $result = mysql_query($sql);
      if (!$result) {
        die(mysql_error());
      } else {
        if (mysql_num_rows($result) > 0 && $method != 'batch') {
          echo "<table class='student_list_table' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Department</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>HSC Year</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Photo</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Privilege</th>
            </tr>";
          $i = 1;
          while ($row = mysql_fetch_array($result)) {
            $student_id = $row['std_id'];
            $std_id[$i] = $row['std_id'];
            $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
            echo "<tr>";
            echo "<td class='table_data'>" . $link_to_profile . "</td>";
            echo "<td class='table_data'>" . $row['stud_name'] . "</td>";
            echo "<td class='table_data'>" . $row['dept'] . "</td>";
            echo "<td class='table_data'>" . $row['stud_contact_no'] . "</td>";
            echo "<td class='table_data'>" . $row['hsc_year'] . "</td>";
            echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/" . $row['link'] . "'</td>";
            echo "<td class='table_data' style='padding-left: 0px; padding-bottom: 0px; padding-right: 0px;'>
            <form id='approval_form_" . $i . "' class='formApp' method='POST' action='' enctype='multipart/form-data'> 
            <input type='hidden' name='std_" . $i . "' id='std_" . $i . "' value='" . $std_id[$i] . "'/>
            <input type='submit' id='edit_" . $i . "' class='editClass' name='edit' value='Edit'/>
            <input type='submit' id='delete_" . $i . "' class='deleteClass' name='delete' value='Delete' />
            </form>
            </td>";
            echo "</tr>";
            $i = $i + 1;
          }
          echo "</table>";
        } elseif ($method == 'batch') {
          echo "<table class='student_list_table stTable' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Department</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>HSC Year</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Photo</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Privilege</th>
            </tr>";
          $i = 1;
          while ($row = mysql_fetch_array($result)) {
            $student_id = $row['std_id'];
            $std_id[$i] = $row['std_id'];
            $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
            if (isCorrectBatch($method_value, $student_id)) {
              echo "<tr>";
              echo "<td class='table_data'>" . $link_to_profile . "</td>";
              echo "<td class='table_data'>" . $row['stud_name'] . "</td>";
              echo "<td class='table_data'>" . $row['dept'] . "</td>";
              echo "<td class='table_data'>" . $row['stud_contact_no'] . "</td>";
              echo "<td class='table_data'>" . $row['hsc_year'] . "</td>";
              echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/" . $row['link'] . "'</td>";
              echo "<td class='table_data' style='padding-left: 0px; padding-bottom: 0px; padding-right: 0px;'>
            <form id='approval_form_" . $i . "' class='formApp' method='POST' action='' enctype='multipart/form-data'> 
            <input type='hidden' name='std_" . $i . "' id='std_" . $i . "' value='" . $std_id[$i] . "'/>
            <input type='submit' id='edit_" . $i . "' class='editClass' name='edit' value='Edit'/>
            <input type='submit' id='delete_" . $i . "' class='deleteClass' name='delete' value='Delete' />
            </form>
            </td>";
              echo "</tr>";
              $i = $i + 1;
            }
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
<?php

function isCorrectBatch($batch, $std_d) {
  $b = $std_d[0] . $std_d[1] . $std_d[2] . $std_d[3];
  if ($b == $batch) {
    return true;
  } else {
    return false;
  }
}
?>
