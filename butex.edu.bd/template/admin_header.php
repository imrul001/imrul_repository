<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />
    <title>Bangladeh University of Textiles</title>

    <script type="text/javascript" src="/min/?f=template/js/jquery-1.8.0.min.js"></script>

    <script type="text/javascript" src="/min/?f=template/js/jquery.autocomplete.js"></script>
    <link type="text/css" rel="stylesheet" href="/min/?f=template/js/orbit-1.2.3.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/style.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/jquery.autocomplete.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/form.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/jquery-ui-1.8.24.custom.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/login_modal.css" />
    <link rel="icon" type="image/png" href="./template/images/favicon.ico" />

    <script type="text/javascript" src="/min/?f=template/js/jquery.form.js"></script>
    <script type="text/javascript" src="/min/?f=template/js/jquery.coda-slider-3.0.js"></script>
    <script type="text/javascript" src="/min/?f=template/js/jquery.orbit-1.2.3.min.js"></script>
    <script type="text/javascript">
      $(window).load(function(){
        $('#featured').orbit({
          bullets:true,
          animation:'fade',
          animationSpeed:1100
        });
        $('.orbit-wrapper').hover(function(){
          $(".slider-nav span").css("display", "block");
        },function(){
          $(".slider-nav span").css("display", "none");
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        var loc=$(location).attr('href').split('=')
        $("#"+loc[1]).addClass("active"); 
      });
      $(function() {
        autoComplete($('#p_scnt'));
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;


        
        $('#addScnt').live('click', function() {

          $('<dl><dt><label for="Related Employee"><b>Related Employee:</b></lable></dt><dd><input type="text" id="p_scnt_'+ i +'" size="30" name="p_scnt_' + i +'" value=""/> <a href="#" id="remScnt"><img style="margin-bottom:-5px;" height="20px" width="20px" src="./template/img/cross.png"/></a></dd></dl>').appendTo(scntDiv);
          autoComplete($('#p_scnt_'+i))
          i++;
          return false;
        });
        
        $('#remScnt').live('click', function() {
          if( i > 1 ) {
            $(this).parents('dl').remove();
            i--;
          }
          return false;
        });
      });
    </script>



    <script type="text/javascript">
      $(document).ready(function() {
        $('a.login-window').click(function() {
		
          //Getting the variable's value from a link 
          var loginBox = $(this).attr('href');

          //Fade in the Popup
          $(loginBox).fadeIn(300);
		
          //Set the center alignment padding + border see css style
          var popMargTop = ($(loginBox).height() + 24) / 2; 
          var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
          $(loginBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
          });
		
          // Add the mask to body
          $('body').append('<div id="mask"></div>');
          $('#mask').fadeIn(300);
		
          return false;
        });
	
        // When clicking on the button close or the mask layer the popup closed
        $('a.close, #mask').live('click', function() { 
          $('#mask , .login-popup').fadeOut(300 , function() {
            $('#mask').remove();  
          }); 
          return false;
        });
      });
       
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.deleteClass').click(function(){
          var idForm =$(this).attr("id");
          var idIndex=idForm.split("_");
          var url ="./index.php?p=delete";
          $.ajax({
            type: "POST",
            url: url,
            data: $("#download_delete_form_"+idIndex[1]).serialize(), // serializes the form's elements.
            success: function(data)
            {
              alert("The file "+ data );    
              window.location.href="./index.php?p=delete_download";       
                    
              // show response from the php script.
            }
          });
          return false;
        }); 
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.deleteBoardClass').click(function(){
          var idForm =$(this).attr("id");
          var idIndex=idForm.split("_");
          var url ="./index.php?p=delete";
          $.ajax({
            type: "POST",
            url: url,
            data: $("#board_notice_delete_form_"+idIndex[1]).serialize(), // serializes the form's elements.
            success: function(data)
            {
              alert("The file "+ data );    
              window.location.href="./index.php?p=delete_notice";       
                    
              // show response from the php script.
            }
          });
          return false;
        }); 
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.deleteConfClass').click(function(){
          var idForm =$(this).attr("id");
          var idIndex=idForm.split("_");
          var url ="./index.php?p=delete";
          $.ajax({
            type: "POST",
            url: url,
            data: $("#conf_notice_delete_form_"+idIndex[1]).serialize(), // serializes the form's elements.
            success: function(data)
            {
              alert("The file "+ data );    
              window.location.href="./index.php?p=delete_notice";       
                    
              // show response from the php script.
            }
          });
          return false;
        }); 
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.appClass').click(function() {
          var idValue=$(this).attr("id");
          var idIndex=idValue.split("_");       
          var url = "./index.php?p=admin_approval"; // the script where you handle the form input.
          adminPermissionforUser(url, idIndex[1]);
          return false; // avoid to execute the actual submit of the form.
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.cancelClass').click(function() {
          var idvalue=$(this).attr("id");
          var idIndex=idvalue.split("_");
          var url = "./index.php?p=cancel_user"; // the script where you handle the form input.
          adminPermissionforUser(url, idIndex[1]);
          return false; // avoid to execute the actual submit of the form.
        });
      });
    </script>

    <script type="text/javascript">
      function adminPermissionforUser(Baseurl, index){
        var splitedUrl= Baseurl.split("=");
        if(splitedUrl[1] == 'cancel_user'){
          var msg ="Cancelled & Deleted";
        }
        else{
          msg = "Approved";
        }
        $.ajax({
          type: "POST",
          url: Baseurl,
          data: $("#approval_form_"+index).serialize(), // serializes the form's elements.
          success: function(data)
          {
            alert("The User "+ data +" is "+ msg);
            window.location.href="./index.php?p=admin_panel";       
            // show response from the php script.
          }
        });
      }
    </script>

    <script type="text/javascript">
      function autoComplete(elem){
        $(elem).autocomplete("./remote.php", {
          width: 260,
          matchContains: true,
          selectFirst: false
        });
      }
    </script>
    <script type="text/javascript">
      function isNoticeValid(){
        var error="";
        if(document.getElementById("notice").value=="" || document.getElementById("file").value==""){
          error+="<li><lable for='fullname' style='cursor:hand;cursor:pointer'>All Fields are Required.</label></li>\n";
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
    </script>

    <script type="text/javascript">
      function isDownloadValid(){
        var error="";
        if(document.getElementById("title").value=="" || document.getElementById("file1").value==""){
          error+="<li><lable for='fullname' style='cursor:hand;cursor:pointer'>All Fields are Required.</label></li>\n";
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
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        
        var options = {
          ////          target: '#message', //Div tag where content info will be loaded in
          url:'./index.php?p=upload_file1', //The php file that handles the file that is uploaded
          beforeSubmit: function() {
            $('#uploader').html('<img src="./template/img/LoadingWheel.gif" border="0" height="35" width="35" />'); //Including a preloader, it loads into the div tag with id uploader
          },
          data: $('#formToManageDownload').serialize(),
          success:  function(data) {
            //Here code can be included that needs to be performed if Ajax request was successful
            $('#uploader').html('');
            alert(data);
            window.location.href="./index.php?p=manage_download";
          }
        };
            
        $('#formToManageDownload').submit(function() {
          $(this).ajaxSubmit(options);    
          return false;
        });

      }); 
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        
        var options = {
          ////          target: '#message', //Div tag where content info will be loaded in
          url:'./index.php?p=upload_notice_file', //The php file that handles the file that is uploaded
          beforeSubmit: function() {
            $('#uploader').html('<img src="./template/img/LoadingWheel.gif" border="0" height="35" width="35" />'); //Including a preloader, it loads into the div tag with id uploader
          },
          data: $('#formToUploadNotice').serialize(),
          success:  function(data) {
            //Here code can be included that needs to be performed if Ajax request was successful
            $('#uploader').html('');
            alert(data);
            window.location.href="./index.php?p=manage_notice";
          }
        };
            
        $('#formToUploadNotice').submit(function() {
          $(this).ajaxSubmit(options);    
          return false;
        });

      }); 
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.delete_process').ajaxStart(function(){
          $('.delete_process').html('<img src="./template/img/LoadingWheel.gif" border="0" height="35" width="35" />');
        });
        $('.delete_process').ajaxStop(function(){
          $('.delete_process').html('');
        });
      });
    </script>

  </head>


  <body>
    <div id="mainWrapper">
      <div id="header">
        <div id="welcome">
          <div id="logo">
            <img src="./template/images/logo_transparent_back/logo2_resized.gif" height="108px" width="86px"/>
          </div>
          <div id="University_name">
            <h1 id="bangla_name"> &#2476;&#2494;&#2434;&#2482;&#2494;&#2470;&#2503;&#2486; &#2463;&#2503;&#2453;&#2509;&#2488;&#2463;&#2494;&#2439;&#2482; &#2476;&#2495;&#2486;&#2509;&#2476;&#2476;&#2495;&#2470;&#2509;&#2479;&#2494;&#2482;&#2527;</h1>
            <h1>
              Bangladesh University of Textiles
            </h1>
            <h4 style="height: 8px;"></h4>
          </div>
        </div>

        <div id="banner" style="display: none">
          <img src="./template/images/banner.png" height="320px" width="960px" />
        </div>
        <div id="featured" style="display: block"> 
          <img src="./template/images/resized_image/banner_1.jpg" height="270px" width="960px" alt="Overflow: Hidden No More" data-caption="#htmlCaption1" />
          <img src="./template/images/resized_image/banner_2.jpg" height="270px" width="960px" alt="HTML Captions" data-caption="#htmlCaption2" />
          <img src="./template/images/resized_image/banner_3.jpg" height="270px" width="960px" alt="and more features" data-caption="#htmlCaption3" />
          <img src="./template/images/resized_image/banner_4.jpg" height="270px" width="960px" alt="and more features" data-caption="#htmlCaption4" />
        </div>
        <span class="orbit-caption" id="htmlCaption1">Bangladesh University of Textiles Academic Building</span>
        <span class="orbit-caption" id="htmlCaption2">Honorable Prime Minister inaugurating Bangladesh University of Textiles</span>
        <span class="orbit-caption" id="htmlCaption3">Bangladesh University of Textiles Play Ground</span>
        <span class="orbit-caption" id="htmlCaption4">Bangladesh University of Textiles Shaheed Minar</span>

        <div class="top_nav">  
          <div class="container">
            <ul class="menu" rel="sam1">  
            </ul>  
          </div>
        </div> 
      </div>
