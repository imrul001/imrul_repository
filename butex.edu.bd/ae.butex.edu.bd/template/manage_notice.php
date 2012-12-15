<?php get_admin_header(); ?>
<?php get_admin_sidebar(); ?>

<div id="content">

<!--    <p>This Page is Under Construction</p>-->

    <?php if (!logged_in()) : ?>
        <p style="color: red;">First You Need To Log In Properly......  <a href="./index.php?p=login" title="Login">Login</a></p>
      <!--    <p>Welcome, <strong>Guest</strong>! <a href="./index.php?p=register" title="Register">Register</a> - <a href="./index.php?p=login" title="Login">Login</a></p>-->
    <?php else : ?>
        <h2>Notice Publication</h2>
        <div class="modal_login_button button_div_admin" style="margin-top: -50px; float: right; margin-right: 99px; width: 18%">
            <?php
            $privilege = get_user_privilege();
            if ($privilege == 'admin') {
                echo '<a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=admin_panel">Admin Panel</a>';
            } else {
                echo '<a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=office_user_panel_671348">User Panel</a>';
            }
            ?>
        </div>
        <div class="modal_login_button button_div_admin" style="margin-top: -50px; float: right">
            <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=logout">Logout</a>
        </div>

        <div id="login_modal_body">
            <form id="formToUploadNotice" method="post" action="#" enctype="multipart/form-data" onsubmit="">
        <!--            <h2>User Login<span class="arrow"></span></h2>-->
                <div id="notification_publication_box" class="loginContainer">

                    <h3>Notice Publication</h3>
                    <div id="error_box">
                        <a name="errr_login"></a>
                        <fieldset id="ersb_login" style="padding: 2;display: none;font-size: 13px">
                            <legend><b style="font-size: 14px">Validation Errors</b></legend>
                            <span id="ers_login"></span>
                        </fieldset>
                    </div>
                    <div id="current_time">
                        <?php echo "<p style='font-family:times new roman';><b>Current date:</b> " . date("jS-F-Y h:i:s a", time()) . "</p>"; ?>
                    </div>

                    <dl>
                        <dt><label for="Notice Title"><b>Notice Title:</b></label></dt>
                        <dd><input type="text" class="text" name="notice_title" id="notice" size="30" value="<?php echo ($_POST['notice_title']) ? $_POST['notice_title'] : ''; ?>" /></dd>
                    </dl>

                    <div id="increaseEmployee">
                        <a href="#" id="addScnt">Add Another Employee</a>
                    </div>

                    <div id="p_scents">
                        <dl>
                            <dt><label for="Related Employee"><b>Related Employee:</b></label></dt>
                            <dd><input type="text" name="p_scnt_0" id="p_scnt" size="30" value="" /></dd>
                        </dl>
                    </div>


                    <dl>
                        <dt><label for="File Name"><b>File Name</b></label></dt>
                        <dd><input type="file" name="file" id="file" /></dd>
                    </dl>

                    <dl>
                        <dt><label for="Publish To Board"><b>Publish To Board</b></label></dt>
                        <dd>Yes<input type="radio" name="notice_to_board" id="yes" value="yes" checked="checked" /> &nbsp;No<input type="radio" id="no" name="notice_to_board" value="no"/></dd>
                    </dl>

                    <input type="submit" class="submit" name="notice_publication" value="Publish" />
                    <div id="uploader" style="height: 40px; width: 40px; margin-top: -35px; margin-left: 254px;"></div>

                    <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
                </div>
            </form>
        </div>

    <?php endif; ?>

</div>

<?php get_footer(); ?>