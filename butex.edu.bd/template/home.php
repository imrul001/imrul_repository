<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- BEGIN Content -->
<!--<div class="loading-image" style="display: none;">
  <div class="overlay" style="height: 1263px;"></div>
  <div class="loading-image-container">
    <img alt="loading" src="./template/images/loading4.gif">
  </div>
</div>-->
<div id="content">
    <h2 class="title" style="margin-left: 10px;">News & Events</h2>
    <div id="logos" style="float: right; margin-top: -53px; margin-right: -15px;">
        <div id="fb_logo" style="float: left; margin-left: -86px;"><a href="#"><img src="./template/images/logo_transparent_back/facebook_logo.jpg" height="25" width="25" alt="Follow us on Facebook" /></a></div>
        <div id="tw_logo" style="float: left; margin-left: -58px;"><a href="#"><img src="./template/images/logo_transparent_back/Twitter_logo.jpg" height="25" width="25" alt="Follow us on Twitter"/></a></div>
        <div id="g_logo" style="float: left; margin-left: -30px;"><a href="#"><img src="./template/images/logo_transparent_back/images.jpeg" height="23" width="23" alt="Follow us on Google Plus"/></a></div>
    </div>

    <div id="new_events">
        <div class="coda-slider"  id="slider-id">
            <div>
                <h3>BUTex Admission Announcement 2012-2013</h3>
                <p>B.Sc. in Textile Engineering, Session: 2012-2013.
                    Registration open from 01/10/2012 to 05/11/2012. Admission date: 16/11/2012.
                    Click here for Admission Announcement Detail <a href="./index.php?p=notice_board">Download Admission Announcement</a></p>
                <P>Admission Help Line: 01766-140239</p>

            </div>

            <div>
                <h3>Here goes the Heading</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Sed volutpat ante id mauris laoreet vestibulum. Nam blandit felis non neque cursus aliquet. Morbi vel enim dignissim massa dignissim commodo vitae quis tellus. Nunc non mollis nulla. Sed consectetur elit id mi consectetur bibendum. Ut enim massa, sodales tempor convallis et, iaculis ac massa. Etiam suscipit nisl eget lorem pellentesque quis iaculis mi mattis. Aliquam sit amet purus lectus. Maecenas tempor ornare sollicitudin.</p>
            </div>
            <div>
                <h3>Here goes the Heading</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Sed volutpat ante id mauris laoreet vestibulum. Nam blandit felis non neque cursus aliquet. Morbi vel enim dignissim massa dignissim commodo vitae quis tellus. Nunc non mollis nulla. Sed consectetur elit id mi consectetur bibendum. Ut enim massa, sodales tempor convallis et, iaculis ac massa. Etiam suscipit nisl eget lorem pellentesque quis iaculis mi mattis. Aliquam sit amet purus lectus. Maecenas tempor ornare sollicitudin.</p>
            </div>
            <div>
                <h3>Here goes the Heading</h3>
                <p>Proin nec turpis eget dolor dictum lacinia. Nullam nunc magna, tincidunt eu porta in, faucibus sed magna. Suspendisse laoreet ornare ullamcorper. Nulla in tortor nibh. Pellentesque sed est vitae odio vestibulum aliquet in nec leo.</p>
            </div>

        </div>
    </div>
    <div id="image_galary">
        <h2 id="galary_header" class="galary_header">Photo Galary</h2>
        <script type="text/javascript">

            new phpimagealbum({
                albumvar: myvacation, //ID of photo album to display (based on getpics.php?id=xxx)
                dimensions: [4,1],
                sortby: ["file", "asc"], //["file" or "date", "asc" or "desc"]
                autodesc: "Photo %i", //Auto add a description beneath each picture? (use keyword %i for image position, %d for image date)
                showsourceorder: false, //Show source order of each picture? (helpful during set up stage)
                onphotoclick:function(thumbref, thumbindex, thumbfilename){
                    thumbnailviewer.loadimage(thumbref.src, "fit2screen")
                }
            })

        </script>
    </div>



    <div id="login_modal_body">
        <form method="post" action="./index.php?p=login" enctype="multipart/form-data" onsubmit="return isLogInValid()">
    <!--            <h2>User Login<span class="arrow"></span></h2>-->
            <div id="login-box" class="login-popup loginContainer">
                <div id="error_box">
                    <a name="errr_login"></a>
                    <fieldset id="ersb_login" style="padding: 2;display: none;font-size: 13px">
                        <legend><b style="font-size: 14px">Validation Errors</b></legend>
                        <span id="ers_login"></span>
                    </fieldset>
                </div>
        <!--        <div class="close"><a href="#" class="close" ><img class="close btn_close" width="25" height="27" src="./template/images/logo_transparent_back/crossButton2.jpg"/></a></div>-->

                <div style="margin-top: -65px; margin-bottom: 45px; margin-left: 50px;" id="header_login">
                    <center>
                        <div id ="login_logo" style="width: 75px; height: 75px;" >
                            <img style="margin-top: 55px; margin-left:-200px;" src="./template/img/user-login-icon.png" width="75px" height="75px">
                        </div>
                        <h3 style="width: 150px;">User Login</h3>
                    </center>
                </div>


                <dl>
                    <dt><label for="user_id"><b>User ID:</b></label></dt>
                    <dd><input type="text" class="text" name="user_name" id="user" size="30" value="<?php echo ($_POST['user_name']) ? $_POST['user_name'] : ''; ?>" /></dd>
                </dl>

                <dl>
                    <dt><label for="password"><b>Password:</b></label></dt>
                    <dd><input type="password" class="text" name="password" id="p" size="30" value="<?php echo ($_POST['password']) ? $_POST['password'] : ''; ?>" /></dd>
                </dl>

                <dl>
                    <dt><label for="remember"><b>Remember Me:</b></label></dt>
                    <dd><input type="checkbox" name="remember" id="remember" value="1" /></dd>
                </dl>

                <input type="submit" class="submit" name="login" value="Login" />
                <p style="text-align: center;">Forgot your Password ? <a href="#change_password_box" class="login-window uniqueLogin">Click Here</a>
                </p>
                <p style="text-align: center;">Don't have an Account ? <a href="#register-box" class="login-window uniqueLogin">Register</a>
                </p>
                <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
            </div>
        </form>
    </div>
    <div id="buttons">
        <div class="modal_login_button button_div">
            <a style="text-decoration: none; font-weight: bold; color: #444; width: 20%;"  href="#login-box" class="login-window passwordChangeLink">Log In</a>
        </div>
        <div class="modal_login_button button_div">
            <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;"  href="#register-box" class="login-window registerLink">Register</a>
        </div>
        <div class="modal_login_button button_div">
            <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;"  href="http://www.butex.edu.bd/webmail" class="login-window">Web Mail</a>
        </div>

    </div>

    <div id="model_register_body">


        <form method="POST" action="./index.php?p=register#register-box" enctype="multipart/form-data" onsubmit="return UserValidate()">
            <div id="register-box" class="login-popup loginContainer">


                <h3>User Registration</h3>
                <div id="error_box">
                    <a name="errr_registration"></a>
                    <fieldset id="ersb" style="padding: 2;display: none;font-size: 13px">
                        <legend><b style="font-size: 14px">Validation Errors</b></legend>
                        <span id="ers"></span>
                    </fieldset>
                </div>

                <dl>
                    <dt><label for="full_name"><b>*Full Name:</b></label></dt>
                    <dd><input type="text" class="text" name="full_name" id="full_name" size="30" value="<?php echo ($_POST['full_name']) ? $_POST['full_name'] : ''; ?>" /></dd>                                                                         
                </dl>

                <dl>
                    <dt><label for="contact_no"><b>*Contact No.:</b></label></dt>
                    <dd><input type="text" class="text" name="contact_no" id="contactno" size="30" value="<?php echo ($_POST['contact_no']) ? $_POST['contact_no'] : ''; ?>" /></dd>                                                                         
                </dl>

                <!--        <dl>
                          <dt><label for="address"><b>*Address:</b></label></dt>
                          <dd><input type="text" class="text" name="address" id="address" size="30" value="<?php echo ($_POST['address']) ? $_POST['address'] : ''; ?>" /></dd>                                                                         
                        </dl>-->

                <div id="registration_error_box" style="display: none; text-align: center; font-weight: bold; color: red;">
                    <div id="registration_error_msg" style="text-align: center; margin-bottom: -19px; margin-top: -13px;"></div>
                </div>


                <dl>
                    <dt><label for="user_name"><b>*User Name:</b></label></dt>
                    <dd><input type="text" class="text" name="user_name" id="user_name" size="30" value="<?php echo ($_POST['user_name']) ? $_POST['user_name'] : ''; ?>" /><div id="response" style="width: 25px; height: 25px; margin-left: 390px; margin-top: -24px;"></div><div id="busyImage" style="width: 25px; height: 25px; margin-left: 390px; margin-top: -25px;"></div></dd>
                </dl>

                <dl>
                    <dt><label for="password"><b>*Password:</b></label></dt>
                    <dd><input type="password" class="text" name="password" id="pw" size="30" value="<?php echo ($_POST['password']) ? $_POST['password'] : ''; ?>" /></dd>
                </dl>

                <dl>
                    <dt><label for="cpassword"><b>*Confirm Password:</b></label></dt>
                    <dd><input type="password" class="text" name="cpassword" id="cpassword" size="30" value="<?php echo ($_POST['cpassword']) ? $_POST['cpassword'] : ''; ?>" /></dd>
                </dl>

                <dl>
                    <dt><label for="position"><b>*Position</b></label></dt>
                    <dd><select name="position" id="position">
                            <option value="" selected="selected">None</option> 
                            <option value="office">Office Stuff</option> 
                            <option value="teacher">Teacher</option> 
                        </select>
                    </dd>
                </dl>

                <dl id="postion_param"></dl>
                
                <div id="registration_error_box1" style="display: none; text-align: center; font-weight: bold; color: red;">
                    <div id="registration_error_msg1" style="text-align: center; margin-bottom: -19px; margin-top: -13px;"></div>
                </div>

                <dl>
                    <dt><label for="email"><b>*E-Mail:</b></label></dt>
                    <dd><input type="text" class="text" name="email" id="email" size="30" value="<?php echo ($_POST['email']) ? $_POST['email'] : ''; ?>" /><div id="response1" style="width: 25px; height: 25px; margin-left: 390px; margin-top: -24px;"></div><div id="busyImage1" style="width: 25px; height: 25px; margin-left: 390px; margin-top: -25px;"></div></dd>
                </dl>

                <dl>
                    <dt><label for="cemail"><b>*Confirm E-Mail:</b></label></dt>
                    <dd><input type="text" class="text" name="cemail" id="cemail" size="30" value="<?php echo ($_POST['cemail']) ? $_POST['cemail'] : ''; ?>" /></dd>
                </dl>

                <input type="submit" id="reg_submit_button" disabled="disabled" class="submit" name="register" value="Register" />

                <p style="text-align: center;"> All Fields are Required </p>
                <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
            </div>
        </form>

    </div>
    <div id="password_change_modal">
        <form id="formToChangePassword" action="#" method="POST" enctype="multipart/form-data" onsubmit="">
        <!--            <h2>User Login<span class="arrow"></span></h2>-->
            <div id="change_password_box" class="login-popup loginContainer">
                <h3>Change Password</h3>
                <div id="error_box">
                    <a name="errr_login"></a>
                    <fieldset id="ersb_password_change" style="padding: 2;display: none;font-size: 13px">
                        <legend><b style="font-size: 14px">Validation Errors</b></legend>
                        <span id="ers_password_change"></span>
                    </fieldset>
                </div>
                <dl>
                    <dt><label for="user_id"><b>Email Address:</b></label></dt>
                    <dd><input type="text" class="text" name="email" id="registered_email" size="30" value="<?php echo ($_POST['email']) ? $_POST['email'] : ''; ?>" /></dd>
                </dl>
                <input type="Submit" class="submit" id="change_password_button_id" name="change_password" value="Change" />
                <div id="progress" style="height: 40px; width: 40px; margin-top: -35px; margin-left: 254px;"></div>

                <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
            </div>
        </form>
    </div>
</div>
<!-- END Content -->

<?php get_footer(); ?>
            