<style>
    .current_time{
        text-align: center;
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
<?php $std_id = trim($_GET['std_id']); ?>
<?php get_header(); ?>
<style>
    .bypassPhotoUploadClass{
        position: relative;
        left: 492px;
    }
    #container{
        font-family: sans-serif, arial;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('#bypassPhotoUpload').click(function(){
            window.location.href="./index.php?p=office_user_panel_com_butex_sis_017734"; 
        })
    })
</script>
<div id="container">
    <?php if (!logged_in()) : ?>
        <p style="color: red;">First You Need To Log In Properly..    <a href="./index.php?p=login" title="Login">Login</a></p>
    <?php else : ?>
        <div class="logOutButton">
            <a class="logoutLink"<a href="./index.php?p=logout">Logout</a>
        </div>
        <h2 style="width: 31%">Registration Continues<span class="arrow"></span></h2>
      <!--    <P>After that you will be able to login with the user id <strong><?php reg_info('student_id'); ?></strong>.</p>-->
        <a class="subButton" href="./index.php?p=office_user_panel_com_butex_sis_017734#tabs-2">Back TO Admin</a>
        <div id="login_modal_body">
            <form id="formToUpload" action="" method="POST" enctype="multipart/form-data">
                <div id="manage_download_box" class="registerPopup">
                    <h3 style="text-align: center;">Photo Upload</h3>
                    <div class="current_time">
                        <?php echo "<p style='font-family:times new roman';><b>Current date:</b> " . date("jS-F-Y h:i:s a", time()) . "</p>"; ?>
                    </div>

                    <dl>
                        <dt><label for="student Id"><b>Student ID:</b></label></dt>
                        <dd><input type="text" class="text" name="student_id" id="student_id" size="30" value="<?php echo $std_id; ?>" readonly /></dd>
                    </dl>
                    <dl>
                        <dt><label for="Photo"><b>Image:</b></label></dt>
                        <dd><input type="file" name="file" id="file1" /></dd>
                    </dl>

                    <input type="submit" class="submitLogIn" id="upload_file_submit_id" value="Upload" />
                    <div id="uploader" style="height: 40px; width: 40px; margin-top: -35px; margin-left: 254px;">
                    </div>
                </div>
            </form>
            <input type="button" class="submitLogIn bypassPhotoUploadClass" id="bypassPhotoUpload" value="Continue" />
        </div>
    <?php endif; ?>
</div>
<!-- END Content -->
<?php get_footer(); ?>