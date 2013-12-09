<style>
    .table_data{
        padding-left: 2px;
        padding-bottom: 2px;
        padding-right: 2px;
        text-align: center;
    }
    .student_list_table{
        font-family: arial, sans-serif;
        width: 80%;
        border-collapse:collapse;
    }
    .student_list_table th{
        background-color: #f2f2f2;
        text-decoration: none
    }
    .profile_link{
        text-decoration: none;
        color: green;
    }
    .filteringParamSelection{
        float: left;
        font-size: 12px;
        margin-left: 10px;
        font-family: times news roman;
        width: auto;
        height: auto;
        overflow: hidden;
    }
</style>
<script type="text/javascript">
    //  $(document).ready(function(){
    //    if($('.table_data').size()<1){
    //      $(".stTable").remove();
    //      $('#listOfStudent').html("<h3>No Result</h3>");
    //    }
    //  });
</script>
<?php
$type = isset($_POST['type']) ? $_POST['type'] : '';
?>
<div id="content">
<!--  <script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/pf-button.gif" alt="Print Friendly and PDF"/></a>-->
    <div id="listOfStudent">
        <?php
        /* $data1=user_data('user_id'); */
        if (empty($type)) {
            $sql = "SELECT * FROM input";
            $result = mysql_query($sql);
            $search = isset($_GET['searchParam']) ? $_GET['searchParam'] : '';

            if ($search == 'contact') {
                echo "<table class='student_list_table' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px;'>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px;'>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px;'>Contact No.</th>
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
                    echo "</tr>";
                    $i = $i + 1;
                }
                echo "</table>";
            } else {
                echo "<table class='student_list_table' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Department</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Emergency Contact</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Blood Group</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Photo</th>
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
                    echo "<td class='table_data'>" . $row['emergency_contact_no'] . "</td>";
                    echo "<td class='table_data'>" . $row['blood_grp'] . "</td>";
                    echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/$student_id'.jpg</td>";
                    echo "</tr>";
                    $i = $i + 1;
                }
                echo "</table>";
            }
        }
        if ($type == "dynamic_search") {
            $method = $_POST['method'];
            $method_value = $_POST['methodValue'];
            $batch = $_POST['batch_year'];
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
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Department</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Emergency Contact</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Blood Group</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Photo</th>
            </tr>";
                    $i = 1;
                    if ($method == 'dept' && !empty($batch)) {
                        while ($row = mysql_fetch_array($result)) {
                            $student_id = $row['std_id'];
                            $std_id[$i] = $row['std_id'];
                            $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
                            if (isCorrectBatch($batch, $student_id)) {
                                echo "<tr>";
                                echo "<td class='table_data'>" . $link_to_profile . "</td>";
                                echo "<td class='table_data'>" . $row['stud_name'] . "</td>";
                                echo "<td class='table_data'>" . $row['dept'] . "</td>";
                                echo "<td class='table_data'>" . $row['stud_contact_no'] . "</td>";
                                echo "<td class='table_data'>" . $row['emergency_contact_no'] . "</td>";
                                echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/" . $row['link'] . "'</td>";
                                echo "</tr>";
                                $i = $i + 1;
                            }
                        }
                    } else {
                        while ($row = mysql_fetch_array($result)) {
                            $student_id = $row['std_id'];
                            $std_id[$i] = $row['std_id'];
                            $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
                            echo "<tr>";
                            echo "<td class='table_data'>" . $link_to_profile . "</td>";
                            echo "<td class='table_data'>" . $row['stud_name'] . "</td>";
                            echo "<td class='table_data'>" . $row['dept'] . "</td>";
                            echo "<td class='table_data'>" . $row['stud_contact_no'] . "</td>";
                            echo "<td class='table_data'>" . $row['emergency_contact_no'] . "</td>";
                            echo "<td class='table_data'>" . $row['blood_grp'] . "</td>";
                            echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/" . $row['link'] . "'</td>";
                            echo "</tr>";
                            $i = $i + 1;
                        }
                    }
                    echo "</table>";
                } elseif ($method == 'batch') {
                    echo "<table class='student_list_table stTable' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Studnet ID</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Student Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Department</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Contact No.</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Emergency Contact</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; '>Photo</th>
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
                            echo "<td class='table_data'>" . $row['emergency_contact_no'] . "</td>";
                            echo "<td class='table_data'><img width='60' src='/template/uploaded_student_images/" . $row['link'] . "'</td>";
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
