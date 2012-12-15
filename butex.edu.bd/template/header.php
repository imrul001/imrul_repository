<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />
    <title>Bangladeh University of Textiles</title>
    <script type="text/javascript" src="/min/?f=template/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="/min/?f=template/js/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="./template/image_galary/getalbunpics.php?id=myvacation"></script>
    <link type="text/css" rel="stylesheet" href="/min/?f=template/js/orbit-1.2.3.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/jquery.autocomplete.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/style.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/coda-slider.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/form.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/jquery-ui-1.8.24.custom.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/ddphpalbum.css" />
    <link type="text/css" rel="stylesheet" href="/min/?f=template/css/login_modal.css" />
    <link rel="icon" type="image/png" href="./template/images/favicon.ico" />

    <script type="text/javascript" src="/min/?f=template/js/jquery-ui-1.8.20.custom.min.js"></script>
    <script type="text/javascript" src="/min/?f=template/js/jquery.coda-slider-3.0.min.js"></script>
    <script type="text/javascript" src="/min/?f=template/js/jquery.coda-slider-3.0.js"></script>
    <script type="text/javascript" src="/min/?f=template/js/jquery.orbit-1.2.3.min.js"></script>
    <script type="text/javascript" src="/min/?f=template/js/ddphpalbum.js"></script>


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

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36218196-1']);
      _gaq.push(['_setDomainName', 'butex.edu.bd']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        var loc=$(location).attr('href').split('=')
        $("#"+loc[1]).addClass("active"); 
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
            window.location.href="./index.php";
          }); 
          return false;
        });
      });
       
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        var param_for_office = '<dt><label for="position_office"><b>*Office</b></label></dt><dd><select name="designation" id="position_office"><option value="acadmic">Academic</option><option value="exam">Exam Control</option><option value="admin">Administration</option></select></dd>';
        var param_for_teacher = '<dt><label for="position_teacher"><b>*Designation</b></label></dt><dd><select name="designation" id="position_teachaer"><option value="prof">Professor</option><option value="ass_prof">Asst. Professor</option><option value="lecturar">Lecturer</option></select></dd>';
        var office_pos ='<select name="position" id="position_1"><option value="office">Office Stuff</option><option value="teacher">Teacher</option></select>';
        var div_space =$('#office_or_teacher');
        $('#position').change(function(){
          if($('#position').attr('value') == 'office')
          {
            $('#postion_param').html(param_for_office);              
          }
          else if($('#position').attr('value') == 'teacher'){
            $('#postion_param').html(param_for_teacher);
          }
          else{
            $('#postion_param').html('');
            $('#postion_param').html('');
          }
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#email').change(function(){
          var url = "./index.php?p=check_email";
          $.ajax({
            type:"POST",
            url:url,
            data:$('#email').serialize(),
            success:function(data)
            {
              var msg1 =data.trim();
              $('#busyImage1').css("display","none");
              if(msg1 =='ok')
              {   
                $('#response1').html("<img style='margin-top:-3px; margin-left:-2px;' src='./template/img/tick.png' height='25px' width='25px'/>");
                $('#registration_error_box1').css("display", "none");
                if(document.getElementById("user_name").value != '')
                {
                  var url ='./index.php?p=check_user_name';
                  $.ajax({
                    type:"POST",
                    url:url,
                    data:$('#user_name').serialize(),
                    success:function(data){
                      var msg =data.trim();
                      if(msg =='OK')
                      {
                        $('#reg_submit_button').removeAttr('disabled');
                      }
                    }
                  });
                }
              }
              else if (msg1 =='notok'){
                $('#response1').html("<img style='margin-top:2px;' src='./template/img/cross1.png' width='19px' height='19px'/>");
                $('#registration_error_box1').css("display", "block");
                $('#registration_error_msg1').html("<p style='text-align:center; margin-left:45px;'>The Email Addrss is already used.</p>");
                $('#reg_submit_button').attr('disabled','disabled');
                
              }
              else if(msg1 =='invalidEmail'){
                $('#response1').html("<img style='margin-top:2px;' src='./template/img/cross1.png' width='19px' height='19px'/>");
                $('#registration_error_box1').css("display", "block");
                $('#registration_error_msg1').html("<p style='text-align:center; margin-left:45px;'>Invalid Email Address</p>");
                $('#reg_submit_button').attr('disabled','disabled');
              }
            }
          });
          //                    $(this).ajaxStart(function(){
          //                        $('#response1').css("display","none");
          //                        $('#registration_error_box1').css("display", "none");
          //                        $('#busyImage1').html("<img src='./template/css/indicator.gif'/>");
          //                    });
          //                    $(this).ajaxStop(function(){
          //                        $('#response1').css("display","block");
          //                        $('#busyImage1').html("");
          //                    });
                    
        });
                
      }); 
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#user_name').change(function(){
          var url ='./index.php?p=check_user_name';
          $.ajax({
            type:"POST",
            url:url,
            data:$('#user_name').serialize(),
            success:function(data){
              var msg =data.trim();
              $('#busyImage').css("display","none");
              if(msg == 'OK'){
                $('#response').html("<img style='margin-top:-3px; margin-left:-2px;' src='./template/img/tick.png' height='25px' width='25px'/>");
                $('#registration_error_box').css("display", "none");
                if(document.getElementById("email").value != '')
                {
                  var url ='./index.php?p=check_email';
                  $.ajax({
                    type:"POST",
                    url:url,
                    data:$('#email').serialize(),
                    success:function(data){
                      var msg =data.trim();
                      if(msg =='ok')
                      {
                        $('#reg_submit_button').removeAttr('disabled');
                      }
                    }
                  });
                }
              }
              else if (msg =='Not OK'){
                $('#response').html("<img style='margin-top:2px;' src='./template/img/cross1.png' width='19px' height='19px'/>");
                $('#registration_error_box').css("display", "block");
                $('#registration_error_msg').html("<p style='text-align:center; margin-left:45px;'>The User Name is already used.</p>");
                $('#reg_submit_button').attr('disabled','disabled');
                
              }
              else if(msg =='wrongLength'){
                $('#response').html("<img style='margin-top:2px;' src='./template/img/cross1.png' width='19px' height='19px'/>");
                $('#registration_error_box').css("display", "block");
                $('#registration_error_msg').html("<p style='text-align:center; margin-left:45px;'>User Name is too Short.</p>");
                $('#reg_submit_button').attr('disabled','disabled');
              }
            }
          });
          //                    $('#user_name').ajaxStart(function(){
          //                        $('#busyImage').html("<img src='./template/css/indicator.gif'/>");
          //                    });
          //                    $('#user_name').ajaxStop(function(){
          //                        $('#busyImage').html("");
          //                    });
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#searchText").autocomplete("./template/search_suggestion.php", {
          width: 196,
          matchContains: true,
          selectFirst: false
        });
        $("#search_button").click(function() {
        
          var url = "./template/search_return.php"; // the script where you handle the form input.
        
          $.ajax({
            type: "POST",
            url: url,
            data: $("#search").serialize(), // serializes the form's elements.
            success: function(data)
            {
              //              alert(data);
              window.location.href="./index.php?p="+data;       
              // show response from the php script.
            }
          });
          return false; // avoid to execute the actual submit of the form.
        });
      });
    </script>
    <script>
      $(function(){
        $('#slider-id').codaSlider({
          autoSlide:true,
          autoHeight:false
        });
      });           
    </script>
    <script language="javascript">
      function UserValidate(){
        var error="";
        if((document.getElementById("full_name").value=="") || (document.getElementById("position").value=="")){
          error+="<li><lable for='full_name' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
        
        else if(document.getElementById("contactno").value==""){
          error+="<li><lable for='contactno' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
                    
        }
        else if(document.getElementById("user_name").value==""){
          error+="<li><lable for='user_name' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
                    
        }
        else if(document.getElementById("pw").value==""){
                    
          error+="<li><lable for='pass' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
                    
        }
        else if(document.getElementById("cpassword").value==""){
          error+="<li><lable for='cpassword' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
                    
        }
        else if(document.getElementById("email").value==""){
          error+="<li><lable for='email' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
                    
        }
        else if(document.getElementById("cemail").value==""){
          error+="<li><lable for='cemail' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
        }
     
        if(length(document.getElementById("pw").value)<6)
        {
          error+="<li><lable for='password' style='cursor:hand;cursor:pointer'>Password too Small(Should be more then 5 chars).</label></li>\n";
        }
        else if(document.getElementById("pw").value!=document.getElementById("cpassword").value){
          error+="<li><lable for='cpassword' style='cursor:hand;cursor:pointer'>Password Not Matched.</label></li>\n";
        }
                
        if(!isValidEmail(document.getElementById("email").value)){
          error+="<li><lable for='email' style='cursor:hand;cursor:pointer'>Invalid Email Address.</label></li>\n";
        }
        else if(document.getElementById("cemail").value != document.getElementById("email").value){
          error+="<li><lable for='cemail' style='cursor:hand;cursor:pointer'>Email Address is not Matched.</label></li>\n";
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
    <script type="text/javascript">
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
    </script>

    <script type="text/javascript">
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
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.uniqueLogin').click(function(){
          $("div#login_modal_body").hide();
        });
        $('#formToChangePassword').submit(function(){
          var url = './index.php?p=change_password';
                    
          $.ajax({
            type:"POST",
            beforeSubmit: function() {
              $('#progress').html('<img src="./template/img/LoadingWheel.gif" border="0" height="35" width="35" />'); //Including a preloader, it loads into the div tag with id uploader
            },
            url:url,
            data:$('#formToChangePassword').serialize(),
            success:function(data){
              var msg =data;
              $('#progress').html('');
              if(msg == 'ok'){
                alert("Successfull..An Email Is sent for verification");
              }
              else if(msg =='not ok'){
                alert("Failed...Can not change Password");
              }
              else{
                alert(data);
              }
            }
          });
          return false;
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
            
      });
    </script>

  </head>


  <body>
    <div id="mainWrapper">
      <div id="header">
        <div id="welcome">
          <div id="logo">
            <img src="./template/images/logo_transparent_back/logo2_resized.gif" height="108px" width="86px"></img>
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
              <li id="home"><a title="Home" href="./index.php?p=home">Home</a></li>  
              <li id="notice_board"><a title="Notice" href="./index.php?p=notice_board">Notice</a></li>
              <li id="list_of_download"><a title="Download" href="./index.php?p=list_of_download">Download</a></li>  
              <li id="on_going_research"><a title="On Going Reseach" href="./index.php?p=on_going_research">On Going Research</a></li>
              <li id="journals"><a title="Journals" href="./index.php?p=download_page">Journals</a></li>  
              <!--                            <li id="perspective_student"><a title="Perspective Students" href="./index.php?p=perspective_student">Perspective Students</a></li>  -->
              <li id="phone_book"><a title="Phone Book" href="./index.php?p=download_page">Phone Book</a></li>
              <li id="contactUs"><a title="Contatct Us" href="./index.php?p=contactUs" >Contact Us</a></li>                                       
              <li id="siteMap"><a title="Site Map" href="./index.php?p=download_page">Site Map</a></li>
              <li id="faq"><a title="FAQ" href="./index.php?p=download_page">F A Q</a></li>
            </ul>  
          </div>
        </div> 

      </div>
