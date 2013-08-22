<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/min/?f=template/css/style.css" />
    <script type="text/javascript" src="/min/?f=template/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="/min/?f=template/js/jquery.form.js"></script>
    <link rel="stylesheet" type="text/css" href="/min/?f=template/css/msgBoxLight.css" />
    <script type="text/javascript" src="/min/?f=template/js/jquery.msgBox.js"></script>
    <link rel="stylesheet" href="/min/?f=template/css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="/min/?f=template/css/jquery.calendar.css"/>
    <script type="text/javascript" src="/min/?f=template/js/jquery-ui.js" ></script>
    <script type="text/javascript" src="/min/?f=template/js/jquery.calendar.js"></script>
    <link rel="icon" type="image/png" href="/template/images/favicon.ico" />
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
    <!--    <script type="text/javascript">
          $(document).ready(function(){
            $('#dob_1').calendar();
            for (i = new Date().getFullYear(); i > 1900; i--)
            {
              $('#sscYear').append($('<option />').val(i).html(i));
            }
            for (i = new Date().getFullYear(); i > 1900; i--)
            {
              $('#hscYear').append($('<option />').val(i).html(i));
            }
          });
        </script>-->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.subButton').hover(function(){
          $(this).addClass("hoverButtonClass")
        },function(){
          $(this).removeClass("hoverButtonClass")
        });
        $("#photoDeleter").click(function(){
          var url = "./index.php?p=photo_delete";
          var std_id= $('input[name=std_id]').val();
          $.ajax({
            type: "POST",
            url: url,
            data: $('#photoDeleterForm').serialize(),
            success:function(data){
              alert("Photo of "+data+" is successfully deleted");
              window.location.href="./index.php?p=update_photo&std="+std_id;
            }
          });
          return false;
        });
      });
    </script>
    <script language="javascript">
      function UserValidate(){
        
        var error="";
        if(document.getElementById("student_id").value==""){
          error+="<li><lable for='full_name' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("session").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
          alert(0);
        }
        else if(document.getElementById("al_dept").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("ad_test_roll_no").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("merit_pos").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("dept").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("stud_name").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("gender").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("religion").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>2All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("father_name").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("mother_name").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("dob_1").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("p_address").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("c_address").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("stud_contact_no").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("grd_contact_address").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("nationality").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("emergency_contact_no").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("emergency_address").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("blood_grp").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("sscBoard").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("ssc_ac").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("sscYear").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("ssc_roll").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("ssc_gpa").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("hscBoard").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("hsc_ac").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("hscYear").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("hsc_roll").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("hsc_gpa").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        else if(document.getElementById("grd_income").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        error = error? "<ul style='color:#f00;font-weight:bold'>" + error +"</ul>":'';
        if(error!=''){
          document.getElementById("ersb").style.display="block";
          document.getElementById("ers").innerHTML=error;
          location.href="#errr_registration";
          return false;
        }
        else
          document.getElementById("ersb").display="none";
      }
      function isValidEmail(email) 
      { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      }
                
      function length(v)
      {
        return v.length;
      }    
    </script>
    <style>
      .hoverButtonClass{
        border: 1px solid blue;
      }
      .logoutlink {
        text-decoration: none;
        color: white;
        width: 25%;
      }
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
        background-color: #f2f2f2;
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
      h3{
        text-align: center;
        text-transform: uppercase; 
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
          $("#paramField").val("");
          var val = $(this).val().trim();
          if(val !='blood_grp' && val != 'dept'){
            if(val == 'stud_contact_no'){
              $('#type').val("");
              var url ="index.php?p=list_of_student&searchParam=contact";
              $.ajax({
                type: "POST",
                url: url,            
                data: $('#summeryForm').serialize(),
                success:function(data){
                  //              $("#content").html(data);
                  $('#listOfStudent', 'body').html(data);
                }
              });
            }
            $("#paramField").show();
            $("#submitDiv").show();
            $("#blood_grp_list").hide();
            $("#dept_list").hide();
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
            if(val == 'dept'){
              $("#blood_grp_list").hide();
              $("#dept_list").show();
              $("#paramField").hide();
              $('#method').attr("value", $('#paramSelector').val());
              $("#submitDiv").hide()
              $(this).children('option').each(function(){
                if($(this).val() == val){
                  $('#searchParamLabel').html($(this).attr('nameVal'));
                  $('method').attr("value", val);
                }
              });
            }else{
              $("#dept_list").hide();
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
          }
          $('#type').val("dynamic_search");
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
        
        $('#dept_list').live("change",(function(){
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
          var type = $('input[name=queryType]').val();
          var std_id =$('input[name=student_id]').val().trim();
          var options = {
            ////          target: '#message', //Div tag where content info will be loaded in
            url:'./index.php?p=upload_image_file&type='+type, //The php file that handles the file that is uploaded
            beforeSubmit: function() {
              $('#uploader').html('<img src="./template/images/LoadingWheel.gif" border="0" height="35" width="35" />'); //Including a preloader, it loads into the div tag with id uploader
            },
            data: $('#formToUpload').serialize(),
            success:  function(data) {
              //Here code can be included that needs to be performed if Ajax request was successful
              $('#uploader').html('');
              alert(data);
              if(type=='update'){
                window.location.href="./index.php?p=update_photo&std="+std_id;
              }
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
              window.location.href="./index.php?p=exam_statistics";
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
        
        //        $('.editClass').live("click",(function(){
        //          var idvalue=$(this).attr("id");
        //          var idIndex=idvalue.split("_");
        //          var std_id = $('input[name=std_'+idIndex[1]+']').val();
        //          var url = "index.php?p=update_form";
        //          $.ajax({
        //            type: "POST",
        //            url: url,
        //            data: $("#approval_form_"+idIndex[1]).serialize(), // serializes the form's elements.
        //            success:function(){
        //              window.location.href="./index.php?p=update_form&std="+std_id;
        //              
        //            }
        //          });
        //          return false;
        //        })
        //      );
      
        $('#continueButton').click(function(){
          window.location.href="./index.php?p=office_user_panel_com_butex_sis_017734";
        });  
        
        $('.deleteClass').live("click",(function(){
          var std_id = $( this ).attr("student_ID");
          var url = "./index.php?p=delete_student&std_id="+std_id;
          // the script where you handle the form input.
          //
          $('#dialog-confirm').attr('title',"Delete "+std_id+" permanently");
          $('#dialog-confirm').css("display","block");
          $('.ui-dialog-title').html("Delete "+std_id+" permanently");
          //          $('#dialog-confirm').dialog('option', 'position', 'center');
          $( "#dialog-confirm" ).dialog({
            resizable: true,
            height:220,
            width: 420,
            modal: true,
            buttons: {
              "Delete": function() {
                $.ajax({
                  type: "POST",
                  url: url,
                  data: $("#approval_form").serialize(), // serializes the form's elements.
                  success: function(data)
                  {
                    alert("The Student information of "+ data +" is deleted successfully");
                    window.location.href="./index.php?p=office_user_panel_com_butex_sis_017734";       
                    // show response from the php script.
                  }
                });
                $('.ui-dialog-title').html('');
                $( this ).dialog( "close" );
              },
              Cancel: function() {
                $('.ui-dialog-title').html('');
                $( this ).dialog( "close" );
              }
            }
          });
          return false;
        })
      );
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.gpa').change(function(){
          var gradeTotal = 0;
          var count = 0;
          var cgpa = 0;
          $('.gpa').each(function(){
            if($(this).val()!=""){
              var gpa =Number($(this).val());
              gradeTotal = Number(gradeTotal + Number(gpa));
              count = count + 1; 
              cgpa =  Number(gradeTotal/count);
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('.blButton').click(function(){
          var value = $(this).val();
          var column = $(this).attr("id");
          var std_id =$('#std_id').val();
          var url = "index.php?p=retrieve_blog_data&std_id="+std_id+"&LT="+column; // the script where you handle the form input.
          $.ajax({
            type: "POST",
            url: url, // serializes the form's elements.
            dataType: 'json',
            success: function(result)
            {
              $.msgBox({ type: "prompt",
                title: "Entry for"+value,
                inputs: [
                  { header: "Course(s)", type: "text", name: "bCourse", value: result[0]}],
                buttons: [
                  { value: "Submit" }, {value:"Cancel"}],
                success: function (result, values) {
                  if(result == 'Submit'){
                    var course=$('input[name=bCourse]').val();
                    var url = "index.php?p=backlog_data_entry&std_id="+std_id+"&LT="+column+"&course="+course; // the script where you handle the form input.
                    $.ajax({
                      type: "POST",
                      url: url, // serializes the form's elements.
                      success: function(data)
                      {
                        $("#std_id").change();
                      }
                    });
                    return false;
                  }
                  else{
                    
                  }
                }
              });
            }
          });
          return false;          
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.blButton').each(function(){
          $(this).attr("disabled","true");
        });
        var columnName = Array("L1T1blog", "L1T2blog", "L2T1blog","L2T2blog","L3T1blog","L3T2blog","L4T1blog","L4T2blog");
        $("#std_id").change(function(){
          if($(this).val()!=""){
            $('.blButton').each(function(){
              $(this).removeAttr("disabled");
            });
          }
          else{
            $('.blButton').each(function(){
              $(this).attr("disabled","true");
            });
          }
          $('span.status').each(function(){
            $(this).html("")
            $(this).removeClass("clear");
            $(this).removeClass("backLog");
          });
          var std_id=$(this).val().trim();
          var url = "index.php?p=fetch_results&std_id="+std_id;
          $.ajax({
            type: "POST",
            url: url,
            data : $("#examDataForm").serialize(),
            dataType: 'json',
            success:function(result)
            {
              $('#gpaL1T1').val(result[0]);
              $('#gpaL1T2').val(result[1]);
              $('#gpaL2T1').val(result[2]);
              $('#gpaL2T2').val(result[3]);
              $('#gpaL3T1').val(result[4]);
              $('#gpaL3T2').val(result[5])
              $('#gpaL4T1').val(result[6]);
              $('#gpaL4T2').val(result[7]);
              $('#cgpa').val(result[8]);
              $('#record').val(result[9]);
              $('#note').val(result[10]);
              $('.gpa').change();
              var url = "index.php?p=retrieve_true&std_id="+std_id;
              $.ajax({
                type: "POST",
                url: url,
                data : $("#examDataForm").serialize(),
                dataType: 'json',
                success:function(res)
                {
                  for(var i=0; i<=7;i++){
                    var column = columnName[i];
                    if(res[i]!="" && result[i]!="" && res[i]!=null && result[i]!=null){
                      $('span.'+column).removeClass("clear");
                      $('span.'+column).addClass("backLog");
                      $('span.'+column).html("Back Log");
                      
                    }
                    if(res[i]=="" && result[i]!=""){
                      $('span.'+column).removeClass("backLog");
                      $('span.'+column).addClass("clear");
                      $('span.'+column).html("Clear");
                    }
                  }
                }
              });
            },
            error:function(){
              alert("error")
            }
          });
          //          return false;
        });
      });
    </script>
  </head>
  <body>
    <div class="myLoadingImage">
      <div class="myOverlay" style="height: 1519px"></div>
      <div class="imageForLoading">
        <img src="/template/images/ajax-loader.gif" alt="Loading" height="60" />
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
      <div id="dialog-confirm" title="Delete This Student Information." style="display:none;">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
          Information will be permanently deleted and cannot be recovered. Are you sure?</p>
      </div>

