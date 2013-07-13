<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/template/css/style.css" />
    <script type="text/javascript" src="/template/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="/template/js/jquery.form.js"></script>
<!--    <script type="text/javascript">
      function isLogInValid(){
        var error="";
        if(document.getElementById("user").value=="" || document.getElementById("p").value==""){
          error+="<li><lable for='fullname' style='cursor:hand;cursor:pointer'>Wrong User ID Or Password.</label></li>\n";
        }
        error = error? "<ul style='color:#f00;font-weight:bold'>" + error +"</ul>":'';
        if(error!=''){
          document.getElementById("ersb_login").style.display="block";
          document.getElementById("ers_login").innerHTML=error;
          location.href="#errr_login";
          return false;
        }
        else{
          document.getElementById("ersb_login").display="none";
        }
      }
    </script>-->
    <style>
      .login-popup {
        margin-bottom: 45px;
        top: 35px;
        position: relative;
        left: 250px;
        font-family: sans-serif, times new roman;
        padding: 10px;
        border: 1px solid #DDD;
        font-size: 1.2em;
        width: 440px;
        height: auto;
        z-index: 99999;
        box-shadow: 0px 0px 20px #999;
        -moz-box-shadow: 0px 0px 20px #999;
        -webkit-box-shadow: 0px 0px 20px #999;
        border-radius: 3px 3px 3px 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
      }
      .submitLogIn{
        font-size: 19px;
        margin-left: 162px;
        height: 35px;
        font-family: times new roman;
        cursor: pointer;
      }
      .login-popup p{
        margin: 0px;
        padding: 0px;
        font-size: 11px;
      }
      dt {
        float: left;
        width: 161px;
        font-size: 13px;
      }
      .logOutButton{
        background-color: cornflowerBlue;
        padding-right: 5px;
        padding-left: 5px;
        float: right;
      }
      .registerPopup{
        bottom: 45px;
        top: 35px;
        position:relative;
        clear: both;
        margin: 0 auto 45px;
        font-family: sans-serif, times new roman;
        padding: 10px;
        border: 1px solid #DDD;
        font-size: 1.2em;
        width: 580px;
        overflow: hidden;
        height: auto;
        z-index: 99999;
        box-shadow: 0px 0px 20px #999;
        -moz-box-shadow: 0px 0px 20px #999;
        -webkit-box-shadow: 0px 0px 20px #999;
        border-radius: 3px 3px 3px 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
      }
      .myOverlay{
        background-color: #33404D;
        position: absolute;
        top: -286px;
        left: 0;
        width: 100%;
        opacity: 0.6;
        z-index: 2000;
      }
      .imageForLoading
      {
        width: 70px;
        margin: 0 auto;
        z-index: 3000;
        position: relative;
      }
      .myLoadingImage{
        position: fixed;
        width: 100%;
        left: 0;
        top: 285px;
        display: none;
        z-index: 900000;
      }
    </style>
    <style>
      .footerContent p{
        font-size: 11px;
        margin: 0px;
        padding: 0px;
      }
    </style>
    <script type="text/javascript">
      $(document).ready(function(){
        
        $('#method').attr("value", $('#paramSelector').val());
        $('#paramSelector').change(function(){
          var val = $(this).val().trim();
          if(val !='blood_grp'){
            $("#paramField").show();
            $("#submitDiv").show();
            $("#blood_grp_list").hide();
            //        $("#inputField").html('<input type="text" id="paramField" name="" value="" />');
            //        $("#submitDiv").html('<input type="submit" value="submit" />');
            $('#method').attr("value", val);
            $('#paramField').attr("name", val)
            $(this).children('option').each(function(){
              if($(this).val() == val){
                $('#searchParamLabel').html($(this).attr('nameVal'));
              }
            });
          }
          else{
            $("#blood_grp_list").show();
            $("#paramField").hide();
            $('#method').attr("value", $('#paramSelector').val());
            $("#submitDiv").hide()
            $(this).children('option').each(function(){
              if($(this).val() == val){
                $('#searchParamLabel').html($(this).attr('nameVal'));
                $('method').attr("value", val);
              }
            });
          }
        });
        $('#submitBTn').live("click",(function(){
          var value = $('#paramField').val();
          $('#method_value').attr("value", value);
          var url ="index.php?p=list_of_student";
          $.ajax({
            type: "POST",
            url: url,            
            data: $('#summeryForm').serialize(),
            success:function(data){
              //              $("#content").html(data);
              $('#listOfStudent', 'body').html(data);
            }
          });
          return false;
        }));
        $('#blood_grp_list').live("change",(function(){
          $('#method_value').val($(this).val());
          var url ="index.php?p=list_of_student";
          $.ajax({
            type: "POST",
            url: url,            
            data: $('#summeryForm').serialize(),
            success:function(data){
              //              $("#content").html(data);
              $('#listOfStudent', 'body').html(data);
            }
          });
          return false;
        })
      );
        
        $('#formToUpload').submit(function() {
          var options = {
            ////          target: '#message', //Div tag where content info will be loaded in
            url:'./index.php?p=upload_image_file', //The php file that handles the file that is uploaded
            beforeSubmit: function() {
              $('#uploader').html('<img src="./template/images/LoadingWheel.gif" border="0" height="35" width="35" />'); //Including a preloader, it loads into the div tag with id uploader
            },
            data: $('#formToUpload').serialize(),
            success:  function(data) {
              //Here code can be included that needs to be performed if Ajax request was successful
              $('#uploader').html('');
              alert(data);
              //              window.location.href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-2";
            }
          };
          $(this).ajaxSubmit(options);
          return false;
        });
        //        $('#exam_result_submit_id').ajaxStart(function(){
        //          $('#uploader').html('<img src="./template/images/LoadingWheel.gif" border="0" height="35" width="35" />');
        //        });
        //        $('#exam_result_submit_id').ajaxStop(function(){
        //          $('#uploader').html('<img src="./template/images/LoadingWheel.gif" border="0" height="35" width="35" />');
        //        });
        $('#exam_result_submit_id').click(function(){
          var url = "index.php?p=exam_result_enty"; // the script where you handle the form input.
          $.ajax({
            type: "POST",
            url: url,
            data: $("#formToExamResultEntry").serialize(), // serializes the form's elements.
            success: function(data)
            {
              alert(data); // show response from the php script.
              //              window.location.href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-2";
            }
          });
          return false; // avoid to execute the actual submit of the form.
        });
              
        
        $('#punishment_submit_id').click(function(){
          var url = "index.php?p=punishment_data_entry"; // the script where you handle the form input.
          $.ajax({
            type: "POST",
            url: url,
            data: $("#formToPunishmentEntry").serialize(), // serializes the form's elements.
            success: function(data)
            {
              alert(data); // show response from the php script.
              //              window.location.href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-2";
            }
          });
          return false; // avoid to execute the actual submit of the form.
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.gpa').change(function(){
          var cgpa = 0;
          var count = 0;
          $('.gpa').each(function(){
            if($(this).val()!=''){
              count = count + 1;
              var gpa =$(this).val();
              cgpa = (cgpa + parseFloat($(this).val()))/count; 
            }
          });
          $("#cgpa").val(cgpa);
        });
        if($('.table_data').size()<1){
          $('.student_list_table').remove();
          $('#listHeader').html("Nothing Found");
        }
        $(document).ajaxStart(function(){
          $(".myLoadingImage").show();
        });
        $(document).ajaxStop(function(){
          $(".myLoadingImage").hide();
        });
      });
    </script>
  </head>
  <body>
    <div class="myLoadingImage">
      <div class="myOverlay" style="height: 1519px"></div>
      <div class="imageForLoading">
        <img src="/template/images/LoadingWheel.gif" alt="Loading" height="60" />
      </div>
    </div>
    <div id="mainDiv">
      <div id="header">
        <div id="PageTitle">
          <div class="logoContainer" style="margin-left: 20px; margin-top: 10px; float: left;">
            <img src="/template/images/logo.gif" height="90" />
          </div>
          <h1>Bangladesh University of Textiles</h1>
          <h2>Student Information System</h2>
        </div>
      </div>

