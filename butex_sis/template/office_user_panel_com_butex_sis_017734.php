<?php get_header(); ?>
<link rel="stylesheet" href="/template/css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="/template/css/jquery.calendar.css"/>
<script type="text/javascript" src="/template/js/jquery-ui.js" ></script>
<script type="text/javascript" src="/template/js/jquery.calendar.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $( "#tabs" ).tabs();
  });
</script>
<script language="javascript">
  function UserValidate(){
    var error="";
    if(document.getElementById("student_id").value==""){
      error+="<li><lable for='full_name' style='cursor:hand;cursor:pointer'>All Fields are required.</label></li>\n";
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
  .logOutButton{
    background-color: cornflowerBlue;
    padding-right: 5px;
    padding-left: 5px;
    float: right;
  }
  .logoutLink{
    text-decoration: none;
    color: #ffffff;
    width: 25%;
  }
  .welcomeMsg{
    padding-left: 5px;
    font-weight: normal;
  }
  #searchBox{
    left: 20px;
    position: relative;
    width: 266px;
    height: 27px;
    background: #f2f2f2;
  }
  #fieldSearch{
    width: 185px;
  }
  .globalsprite {
    position: relative;
    top: -33px;
    left: 196px;
    background: url(/template/images/bhSprite.png);
    font-weight: bold;
    background-position: -546px 56px;
    width: 80px;
    height: 42px;
    text-indent: -9999px;
    display: block;
    text-align: left;
    background-color: transparent;
  }
  #searchForm:hover{
    background-position: -546px 106px;
  }
  .studentIdLabel{
    font-weight: normal;
    line-height: 8px;
    margin-left: 180px;
    float: left;
  }
  #fieldsearch {
    left: 0px;
    position: relative;
    width: 185px;
  }
</style>
<div id="container">
  <?php if (!logged_in()) : ?>
    <p style="color: red;">First You Need To Log In Properly..    <a href="./index.php?p=login" title="Login">Login</a></p>
  <?php else : ?>
    <div class="logOutButton">
      <a class="logoutLink"<a href="./index.php?p=logout">Logout</a>
    </div>
    <h2 class="welcomeMsg">Welcome <?php user_data('user_name'); ?>! Successfully Logged In.</h2>
    <div id="userOptionsContainer">
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Search</a></li>
          <li><a href="#tabs-2">Add Student</a></li>
          <li><a href="#tabs-3">Summery</a></li>
        </ul>
        <div id="tabs-1" style="padding-bottom: 165px; padding-top: 132px;">
          <h3 class="studentIdLabel" style="float:left;">Stundent Id:</h3>
          <fieldset id="searchBox">
            <input type="text" autocomplete="off" id="fieldSearch" value="" class="" />
            <a id="searchForm" href="" class="globalSprite">
              <input type="hidden" value="Search" class="btnSearch" />
            </a> 
          </fieldset>
        </div>
        <div id="tabs-2">
          <p id="reg_form">
            <a href="./index.php?p=reg_complete">Photo Upload</a>
            <?php include 'registration_form.php'; ?>
          </p>
        </div>
        <div id="tabs-3">
          <p id="student_summary">
            <?php include 'list_of_student.php'; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>