<style>
    .table_data{
        padding-left: 2px;
        padding-bottom: 2px;
        padding-right: 2px;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
    }
    .student_list_table{
        font-family: arial, sans-serif;
        width: 94%;
        border-collapse:collapse;
        border: 1px solid green;
    }
    .student_list_table th{
        background-color: #30769E;
        font-weight: bold;
        color: white;
        text-decoration: none;
        border: 1px solid black;
        font-size: 13px;
        text-align: center;
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
    .resultSummery{
        width: 200px;
        text-align: center;
        margin-bottom: 5px;
        position: relative;
        left: 80%;
        font-weight: bold;
        color: blue;
    }

</style>
<script type="text/javascript">
    $(document).ready(function(){
        if($('.table_data').size()<1){
            $(".stTable").remove();
            $('#listOfStudent').html("<h3>No Result</h3>");
        }
        $("#searchResultSummery").html("Result Found "+$('.table_row').size());
    });
</script>
<?php
$type = isset($_POST['type']) ? $_POST['type'] : '';
?>
<div id="content">
    <div id="listOfStudent">
        <div id="searchResultSummery" class="resultSummery"></div>
        <?php
        /* $data1=user_data('user_id'); */
        if (empty($type)) {
            $randomStarter = rand(1, numberOfRowsAvailableForRandomSearch()- 50);
            $sql = "SELECT * FROM input LIMIT $randomStarter,50";
            $result = mysql_query($sql);
            $num_rows = mysql_num_rows($result);
            
            $search = isset($_GET['searchParam']) ? $_GET['searchParam'] : '';

            if ($search == 'contact') {
                echo "<table class='student_list_table' style='margin: 0 auto;' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header'>Studnet ID</th>
                <th class='table_header'>Student Name</th>
                <th class='table_header'>Contact No.</th>
            </tr>";
                $i = 1;
                while ($row = mysql_fetch_array($result)) {
                    $student_id = $row['std_id'];
                    $std_id[$i] = $row['std_id'];
                    $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";

                    echo "<tr class='table_row'>";
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
                <th class='table_header'>Studnet ID</th>
                <th class='table_header'>Student Name</th>
                <th class='table_header'>Department</th>
                <th class='table_header'>Contact No.</th>
                <th class='table_header'>Emergency Contact</th>
                <th class='table_header'>Blood Group</th>
                <th class='table_header'>Photo</th>
            </tr>";
                $i = 1;
                while ($row = mysql_fetch_array($result)) {
                    $student_id = $row['std_id'];
                    $std_id[$i] = $row['std_id'];
                    $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
                    if ($row['link'] == 'no') {
                        $row['link'] = 'No_Image.jpg';
                    }

                    echo "<tr class='table_row'>";
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
                <th class='table_header'>Studnet ID</th>
                <th class='table_header'>Student Name</th>
                <th class='table_header'>Department</th>
                <th class='table_header'>Contact No.</th>
                <th class='table_header'>Emergency Contact</th>
                <th class='table_header'>Blood Group</th>
                <th class='table_header'>Photo</th>
            </tr>";
                    $i = 1;
                    if ($method == 'dept' && !empty($batch)) {
                        while ($row = mysql_fetch_array($result)) {
                            if ($row['link'] == 'no') {
                                $row['link'] = 'No_Image.jpg';
                            }
                            $student_id = $row['std_id'];
                            $std_id[$i] = $row['std_id'];
                            $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
                            if (isCorrectBatch($batch, $student_id)) {
                                echo "<tr class='table_row'>";
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
                    } else {
                        while ($row = mysql_fetch_array($result)) {
                            $student_id = $row['std_id'];
                            $std_id[$i] = $row['std_id'];
                            if ($row['link'] == 'no') {
                                $row['link'] = 'No_Image.jpg';
                            }
                            $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
                            echo "<tr class='table_row'>";
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
                <th class='table_header'>Studnet ID</th>
                <th class='table_header'>Student Name</th>
                <th class='table_header'>Department</th>
                <th class='table_header'>Contact No.</th>
                <th class='table_header'>Emergency Contact</th>
                <th class='table_header'>Photo</th>
            </tr>";
                    $i = 1;
                    while ($row = mysql_fetch_array($result)) {
                        $student_id = $row['std_id'];
                        $std_id[$i] = $row['std_id'];
                        if ($row['link'] == 'no') {
                            $row['link'] = 'No_Image.jpg';
                        }
                        $link_to_profile = "<a class='profile_link' style='color:green;' href='./index.php?p=student_profile&std=$student_id'>$student_id</a>";
                        if (isCorrectBatch($method_value, $student_id)) {
                            echo "<tr class='table_row'>";
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
function numberOfRowsAvailableForRandomSearch(){
    $sql ="SELECT * FROM input";
    $result = @mysql_query($sql);
    $num_rows = mysql_num_rows($result);
    return $num_rows;
}
?>
