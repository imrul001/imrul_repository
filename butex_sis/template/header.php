<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/template/css/style.css" />
<!--    <script type="text/javascript" src="/butex_sis/template/js/jquery-1.9.1.js"></script>-->
    <script type="text/javascript" src="/template/js/jquery-1.8.0.min.js"></script>
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
        position: relative;
        /*        left: 153px;*/
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
        
        
//        $('#formToUpload').submit(function() {
//          var options = {
//            ////          target: '#message', //Div tag where content info will be loaded in
//            url:'./index.php?p=upload_image_file', //The php file that handles the file that is uploaded
//            beforeSubmit: function() {
//              $('#uploader').html('<img src="./template/images/LoadingWheel.gif" border="0" height="35" width="35" />'); //Including a preloader, it loads into the div tag with id uploader
//            },
//            data: $('#formToUpload').serialize(),
//            success:  function(data) {
//              //Here code can be included that needs to be performed if Ajax request was successful
//              $('#uploader').html('');
//              alert(data);
//              window.location.href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-2";
//            }
//          };
//          $(this).ajaxSubmit(options);
//          alert(options);
//          return false;
//        });
        
        
        
        
        
        //        $('#formToUpload').submit(function(){
        //          var formData = $('#formToUpload').serialize();
        //          var url = './index.php?p=upload_image_file';
        //          var fileName = $('input[name=file]').val();
        //          alert(fileName);
        //          
        //                    
        //          $.ajax({
        //            type:"POST",
        //            beforeSubmit: function() {
        //              $('#uploader').html('<img src="./template/images/LoadingWheel.gif" border="0" height="35" width="35" />'); //Including a preloader, it loads into the div tag with id uploader
        //            },
        //            url:url,
        //            data:formData,
        //            success:function(data){
        //              alert(data);
        //            }
        //          });
        //          return false;
        //        });
        
      });
    </script>
  </head>
  <body>
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

