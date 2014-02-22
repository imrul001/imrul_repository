<style>
    .current_time{
        text-align: center;
    }
    dt{
        padding-left: 30px;
        width: 157px;
    }
    #punishment_submit_id{
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
<style>
    .newUserCreateDivcls{
        text-align: center;
    }
    table.user_table, .user_table th, .user_table td
    {
        font-family: arial;
        border:1px solid green;
    }
    table.user_table
    {
        position: relative;
        width:91%;
        border-collapse:collapse;
    }
    .user_table th
    {
        height:22px;
        background-color:#30769E;
        color:white;
        font-size: 11px;
    }
    .user_table td
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
        left: 818px;
        position: relative;
        font-weight: bold;
        text-align: center;
        width: 70px;
        color: white;
        background-color: #30769E;
        border: 1px solid black;
    }
</style>
<?php get_header(); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#punishment_submit_id').live('click',function(){
            var url = "index.php?p=punishment_data_entry";
            var student_id=$('input[name="student_id"]').val();
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formToPunishmentEntry").serialize(), 
                success: function(data)
                {
                    $.msgBox({
                        title: "Confirmation",
                        content: "Data Edited Successfully",
                        type: "info",
                        buttons: [{ value: "Ok" }],
                        success: function (result) {
                            $('#listofpunishment').load("./index/php?p=norm_table&std_id="+student_id)
                        }
                    });
                }
            });
            return false; 
        });
        $('#addPunishmentRow').live('click',function(){
            var std_id = $(this).attr("stud-id");
            var date_time = $(this).attr("date-time");
            var title = "Record Punishment ("+std_id+")";
            var method = "CREATE";
            $.msgBox({ type: "prompt",
                title: title,
                inputs: [
                    { header: "Date Time", type: "text", name: "data_time", value:"" },
                    { header: "Warning", type: "text", name: "warning", value:"" },
                    { header: "Punishment", type: "text", name: "punishment", value:""},
                ],
                buttons: [
                    { value: "Submit" }, {value:"Cancel"}],
                beforeShow: function(){
                    $('div:first span.msgInputHeader span','div.msgBoxInputs').html('<input type="text" name="student_id" readonly value="'+date_time+'"/>');
                },
                success: function (result, values) {   
                    if(result == 'Submit'){
                        if($("input[name='warning']").val()!='' ||  $("input[name='punishment']").val()!=''){
                            var warning = $("input[name='warning']").val();
                            var punishment = $("input[name='punishment']").val();
                            var url = "index.php?p=punishment_data_entry";
                            var postData = "method="+method+"&date_time="+date_time+"&student_id="+std_id+"&punishment="+punishment+"&warning="+warning;
                            $.ajax({
                                url: url,
                                type: "GET",
                                data: postData,
                                success: function(){
                                    $.msgBox({
                                        title: "Confirmation",
                                        content: "Data Entry Successfully Completed",
                                        type: "info",
                                        buttons: [{ value: "Ok" }],
                                        success: function (result) {
                                            $('#listofpunishment').load("./index/php?p=norm_table&std_id="+std_id)
                                        }
                                    });
                                
                                },
                                error: function(){
                                    $.msgBox({
                                        title: "Error",
                                        content: "Got and Error",
                                        type: "error",
                                        buttons: [{ value: "Ok" }],
                                        success: function (result) {
                                                        
                                        }
                                    });
                                }
                            })
                        }else{
                            $.msgBox({
                                title: "Error",
                                content: "Waring or Punishment Field can not be blank",
                                type: "error",
                                buttons: [{ value: "Ok" }],
                                success: function (result) {
                                                        
                                }
                            });
                            
                        }
                    }
                }
            });
        });
        
        /***
         ** Edit punishment by random id
         *
         **/
        $('.editPunishment').live('click', function(){
            var elementId = $(this).attr("id");
            var index = elementId.split("_");
            var dateTime = $('#entryDateTime_'+index[1]).html().trim();
            var warning = $('#warningID_'+index[1]).html().trim();
            var punishment = $('#punishmentId_'+index[1]).html().trim();
            var std_id = $(this).attr("std-id");
            var method = $(this).attr("method");
            var rand_id = $(this).attr("rand-id");
            var title = "Edit Punishment Record "+std_id;
            $.msgBox({ type: "prompt",
                title: title,
                inputs: [
                    { header: "Date Time", type: "text", name: "date_time", value: dateTime },
                    { header: "Warning", type: "text", name: "warning", value: warning },
                    { header: "Punishment", type: "text", name: "punishment", value: punishment},
                ],
                buttons: [
                    { value: "Submit" }, {value:"Cancel"}],
                beforeShow: function(){
                    $('div:first span.msgInputHeader span','div.msgBoxInputs').html('<input type="text" name="dateTime" readonly value="'+dateTime+'"/>');
                },
                success: function (result, values) {   
                    if(result == 'Submit'){
                        if($("input[name='warning']").val()!='' ||  $("input[name='punishment']").val()!=''){
                            var warning = $("input[name='warning']").val();
                            var punishment = $("input[name='punishment']").val();
                            var date_time = $("input[name='date_time']").val();
                            var url = "index.php?p=punishment_data_entry";
                            var postData = "method="+method+"&date_time="+date_time+"&student_id="+std_id+"&punishment="+punishment+"&warning="+warning+"&rand-id="+rand_id;
                            $.ajax({
                                url: url,
                                type: "GET",
                                data: postData,
                                success: function(){
                                    $.msgBox({
                                        title: "Confirmation",
                                        content: "Data Edited Successfully",
                                        type: "info",
                                        buttons: [{ value: "Ok" }],
                                        success: function (result) {
                                            $('#listofpunishment').load("./index/php?p=norm_table&std_id="+std_id)
                                        }
                                    });
                                
                                },
                                error: function(){
                                    $.msgBox({
                                        title: "Error",
                                        content: "Got and Error",
                                        type: "error",
                                        buttons: [{ value: "Ok" }],
                                        success: function (result) {
                                                        
                                        }
                                    });
                                }
                            })
                        }else{
                            $.msgBox({
                                title: "Error",
                                content: "Waring or Punishment Field can not be blank",
                                type: "error",
                                buttons: [{ value: "Ok" }],
                                success: function (result) {
                                                        
                                }
                            });
                            
                        }
                    }
                }
            });
        });
        
        /***
         **Delete Punishment record by random id.
         *
         **/
        $('.deletePunishment').live("click", function(){
            var index = $(this).attr("id").split("_");
            var std_id = $(this).attr("std-id").trim();
            var rand_id = $(this).attr("rand-id").trim();
            var method = $(this).attr("method").trim();
            var warning = $('#warningID_'+index[1]).html().trim();
            var punishment = $('#punishmentId_'+index[1]).html().trim();
            $.msgBox({
                title: "Delete Punishment Entry" ,
                content: "Are you sure?",
                type: "confirm",
                buttons: [{ value: "Ok" },{value: 'Cancel'}],
                success: function (result) {
                    if(result == 'Ok'){
                        var postData = "method="+method+"&student_id="+std_id+"&rand-id="+rand_id+"&punishment="+punishment+"&warning="+warning;
                        var url = "index.php?p=punishment_data_entry";
                        $.ajax({
                            type: "GET",
                            url: url,
                            data: postData,
                            success: function(data)
                            {
                                $.msgBox({
                                    title: "Information",
                                    content: data,
                                    type: "info",
                                    buttons: [{ value: "Ok" }],
                                    success: function (result) {
                                        $('#listofpunishment').load("./index/php?p=norm_table&std_id="+std_id);
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
        });
    })
    
</script>
<div id="container">
    <?php if (!logged_in() || !isSuperAdmin()) : ?>
        <p style="color: red;">First You Need To Log In Properly..    <a href="./index.php?p=login" title="Login">Login</a></p>
    <?php else : ?>
        <div class="logOutButton">
            <a class="logoutLink"<a href="./index.php?p=logout">Logout</a>
        </div>
        <a class="subButton" href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-1">Back TO Admin</a>
        <div id="listofpunishment" style="padding: 10px;">
            <?php include 'norm_table.php'; ?>
        </div>
    <?php endif; ?>
</div>
<!-- END Content -->
<?php get_footer(); ?>