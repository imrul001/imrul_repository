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
        height:22px;
        background-color:#30769E;
        color:white;
        font-size: 11px;
    }
    .result_table td
    {
        text-align:center;
        height:18px;
        vertical-align:bottom;
        padding:1px;
        font-size: 11px;
        font-weight: bold;
    }
    .addRowButtonClass{
        cursor: pointer;
        top: 10px;
        left: 790px;
        position: relative;
        font-weight: bold;
        text-align: center;
        width: 70px;
        color: white;
        background-color: #30769E;
        border: 1px solid black;
    }
    .levelTermDropdownClass{
        border: 0 !important;  /*Removes border*/
        -webkit-appearance: none;  /*Removes default chrome and safari style*/
        -moz-appearance: none; /* Removes Default Firefox style*/
        background-position: 82px 7px;  /*Position of the background-image*/
        width: 180px; /*Width of select dropdown to give space for arrow image*/
        text-indent: 0.01px; /* Removes default arrow from firefox*/
        text-overflow: "";  /*Removes default arrow from firefox*/
        color: black;
    }
</style>

<?php get_header(); ?>
<script type="text/javascript">
    $(document).ready(function(){
        //      javascript for result_status table
        /*******************data entry for first row of result_status_table****************/
        /**method for create and upate 
         *
         *method to create and update exam table
         *method to create and update backlog table
         *method to create result_table table but not to update
         *
         **/
        $('.editResultTableButtonClass').live('click',function(){
            var buttonRandomId=($(this).attr('rand_id'));
            var buttonStudent_id=$(this).attr('update_row_student_id');
            var fetchResultStatusTableData = 'index.php?p=fetch_result_status_table_data&std_id='+buttonStudent_id+'&rand_id='+buttonRandomId;
            $.ajax({
                url: fetchResultStatusTableData,
                type: 'POST',
                dataType: 'json',
                success: function(result){
                    var title = "Edit Result "+result[0]+"("+buttonStudent_id+")";
                    $.msgBox({ type: "prompt",
                        title: title,
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
                        beforeShow: function(){
                            $('div:first span.msgInputHeader span','div.msgBoxInputs').html('<select id="levelTermDropBox" name="levelTerm" class="levelTermDropdownClass"><option value="L1T2">Level-1,Term-2</option><option value="L1T1">Level-1,Term-1</option><option value="L2T1">Level-2,Term-1</option><option value="L2T2">Level-2,Term-2</option><option value="L3T1">Level-3,Term-1</option><option value="L3T2">Level-3,Term-2</option><option value="L4T1">Level-4,Term-1</option><option value="L4T2">Level-4,Term-2</option></select>');
                            $('#levelTermDropBox').val(result[0]).attr("selected", true);
                        },
                        success: function (result, values) {
                            dataBasedQuery(buttonStudent_id, buttonRandomId, result);
                        }
                    });
                },
                error: function(){
                    alert("got an error");
                }
            });
           
        });
        function dataBasedQuery(student_id, randRowId, result){
            if(result == 'Submit'){
                var levelterm=$('#levelTermDropBox').val();
                var examYear=$('input[name=examYear]').val();
                var gpa=$('input[name=gpa]').val();
                var cgpa=$('input[name=cgpa]').val();
                var failSubjects=$('input[name=failSubjects]').val();
                var remarks=$('input[name=remarks]').val();
                if(levelterm!='' && examYear!=''){
                    var url = "index.php?p=result_status_table_entry&std_id="+student_id+"&levelTerm="+levelterm+"&examYear="+examYear+"&gpa="+gpa+"&cgpa="+cgpa+"&failSubjects="+failSubjects+"&remarks="+remarks+"&rowRand_ID="+randRowId; 
                    var lt = 'gpa'+levelterm;
                    var examTableUrl = "index.php?p=exam_result_enty&student_id="+student_id+"&"+lt+"="+gpa+"&cgpa="+cgpa;
                    $.ajax({
                        type: "POST",
                        url: url, 
                        success: function(data)
                        {
                            $.ajax({
                                url: examTableUrl,
                                type: 'POST',
                                success: function(examEntrydata){
                                    var column = levelterm+"blog";
                                    var backlogTableurl = "index.php?p=backlog_data_entry&std_id="+student_id+"&LT="+column+"&course="+failSubjects; // the script where you handle the form input.
                                    $.ajax({
                                        type: "POST",
                                        url: backlogTableurl, // serializes the form's elements.
                                        success: function(data)
                                        {
//                                            alert(data);
                                            $.msgBox({
                                                title: "Confirmation",
                                                content: "Data Entry Successfully Completed",
                                                type: "info",
                                                buttons: [{ value: "Ok" }],
                                                success: function (result) {
                                                    window.location.href=$(location).attr('href');
                                                }
                                            });
                                        },
                                        error: function(){
                                            alert("data entry error");
                                        }
                                    });
                                },
                                error: function(){
                                    alert("exam data entry error");
                                }
                            })
                        },
                        error:function(){
                            $.msgBox({
                                title: "Error",
                                content: "Got an Error",
                                type: "error",
                                buttons: [{ value: "Ok" }],
                                success: function (result) {
                                                        
                                }
                            });
                        }
                    });
                    return false;
                }else{
                    alert("Level-Term & Exam Year Should not be blank");
                }
            }
            else{
                    
            }
        }
        
        $('.createRow').live('click', function(){
            var student_id = $(this).attr('stud-id').trim();
            if($(this).attr("id")=='createFirstResultRow'){
                var LevelTerm = $(this).attr('LevelTerm').trim();
            }
            var title = "Result Entry "+LevelTerm+"("+student_id+")";
            if(LevelTerm=='' || LevelTerm==undefined){
                var title = "Result Entry("+student_id+")";
            }
            var result =[];
            $.msgBox({ type: "prompt",
                title: title,
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
                beforeShow: function(){
                    $('div:first span.msgInputHeader span','div.msgBoxInputs').html('<select id="levelTermDropBox" name="levelTerm" class="levelTermDropdownClass"><option value="L1T1">Level-1,Term-1</option><option value="L1T2">Level-1,Term-2</option><option value="L2T1">Level-2,Term-1</option><option value="L2T2">Level-2,Term-2</option><option value="L3T1">Level-3,Term-1</option><option value="L3T2">Level-3,Term-2</option><option value="L4T1">Level-4,Term-1</option><option value="L4T2">Level-4,Term-2</option></select>');
                },
                success: function (result, values) {   
                    var rowRandId ='';
                    dataBasedQuery(student_id, rowRandId, result)
                }
            });
            /*******************data entry for first row of result_status_table****************/
        })
        
        /***
        *
        * Delete Result Status row
        *
        *
        **/
        
        $('.deleteResultTableButtonClass').live('click', function(){
        var idRow = $(this).attr("id").trim();
        var index = idRow.split("_");
        var rand_id = $(this).attr("rand_id");
        var std_id = $(this).attr("delete_row_student_id");
        $.msgBox({
                title: "Delete Row",
                content: "Information will be permanently deleted. Are you sure?",
                type: "confirm",
                buttons: [{ value: "Ok" },{value: 'Cancel'}],
                success: function (result) {
                    if(result == 'Ok'){
                        var url = "index.php?p=result_status_table_entry";
                        var method = "DELETE_ROW";
                        var postData = "method="+method+"&std_id="+std_id+"&rowRand_ID="+rand_id;
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: postData, // serializes the form's elements.
                            success: function(data)
                            {
                                $.msgBox({
                                    title: "Information",
                                    content: data,
                                    type: "info",
                                    buttons: [{ value: "Ok" }],
                                    success: function (result) {
                                        window.location.href=$(location).attr('href');
                                    }
                                });
                                
                                // show response from the php script.
                            },
                            error: function(){
                                $.msgBox({
                                    title: "Error",
                                    content: "Got an Error",
                                    type: "error",
                                    buttons: [{ value: "Ok" }],
                                    success: function (result) {
                                                        
                                    }
                                });
                            }
                        });
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
        <a class="subButton" href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-1">Back TO Admin</a>
        <div id="login_modal_body" style="min-height: 300px;">
            <?php
            $student_id = isset($_GET['std_id']) ? $_GET['std_id'] : '';
            $sql = "SELECT * FROM result_status WHERE student_id='" . $student_id . "'ORDER BY `index` ASC";
            $result = mysql_query($sql);
            $num_row = mysql_num_rows($result);
            ?>z
            <?php if ($num_row > 0) : ?>
                <div id="tableContainer">
                    <table class='result_table' style='margin: 0 auto;'>
                        <th>Level,Term</th>
                        <th>Exam Year</th>
                        <th>Term/Subject GPA</th>
                        <th>CGPA</th>
                        <th>Fail/Retake Subject(s)</th>
                        <th>Remarks</th>
                        <th>Edit Result</th>
                        <?php

                        function getLevelTerm($lt) {
                            $level = $lt[1];
                            $term = $lt[3];
                            $levelTermText = 'Level-' . $level . ',Term-' . $term . '';
                            return $levelTermText;
                        }

                        $i = 0;
                        while ($row = mysql_fetch_array($result)) {
                            echo '<tr>
                                <td>' . getLevelTerm($row['level_term']) . '</td>
                                <td>' . $row['exam_year'] . '</td>
                                <td>' . $row['gpa'] . '</td>
                                <td>' . $row['cgpa'] . '</td>
                                <td>' . $row['backlog_subject'] . '</td>
                                <td>' . $row['remarks'] . '</td>
                                <td>
                                 <input type = "hidden" value = "' . $row['id'] . '"/>
                                 <input type = "button" class="editResultTableButtonClass" id="editResultRow_' . $i . '" rand_id="' . $row['id'] . '" update_row_student_id="' . $student_id . '" value="Edit"/>
                                 <input type = "button" class="deleteResultTableButtonClass" id="deleteResultRow_' . $i . '" rand_id="' . $row['id'] . '" delete_row_student_id="' . $student_id . '" value="Delete"/>
                                </td>
                            </tr>';
                            $i++;
                        }
                        ?>
                    </table>
                </div>
                <div id="addRowButton" class="addRowButtonClass createRow" stud-id="<?php echo $student_id; ?>">Add Row</div>
    <?php else : ?>
                <div style="width: 50%; margin: 0 auto;">
                    <div id="information">No Result table is create for Student ID <B><?php echo $student_id; ?></B>
                        <input type="button" class="createRow" id="createFirstResultRow" LevelTerm="Level-1,Term-1" stud-id="<?php echo $student_id; ?>" value="Create Result Table" />
                    </div>
                </div>
    <?php endif; ?>

            <!--            <div id="login_modal_body">
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
                        </div>-->
<?php endif; ?>
    </div>
    <div>
        <form id="dynamicTable">

        </form>
    </div>
    <!-- END Content -->
<?php get_footer(); ?>
