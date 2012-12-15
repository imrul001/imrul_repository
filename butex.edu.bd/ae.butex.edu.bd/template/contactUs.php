<?php get_header(); ?>
<?php get_sidebar(); ?>
<!-- BEGIN Content -->
<form method="post" action="index.php?p=contact#content">
    <div id="content">

        <h2>Contact Us<span class="arrow"></span></h2>

        <?php if (get_error()) : ?>
            <?php error_msg(); ?>
        <?php endif; ?>
        <dl>

            <dt><label for="fname"><b>First Name:</b></label></dt>
            <dd><input type="text"  class="text" name="fname" id="fname" size="35" value="<?php echo ($_POST['fname']) ? $_POST['fname'] : ''; ?>" /></dd>
        </dl>



        <dl>
            <dt><label for="lname"><b>Last Name:</b></label></dt>
            <dd><input type="text" class="text" name="lname" id="lname" size="35" value="<?php echo ($_POST['lname']) ? $_POST['lname'] : ''; ?>" /></dd>
        </dl>

        <dl>
            <dt><label for="email"><b>Email:</b></label></dt>
            <dd><input type="text" class="text" name="email" id="email" size="35" value="<?php echo ($_POST['email']) ? $_POST['email'] : ''; ?>" /></dd>
        </dl>

        <dl>
            <dt><label for="msg"><b>Message:</b></label></dt>
            <dd><textarea name="message" id="msg" cols="50" rows="10"><?php echo ($_POST['msg']) ? $_POST['msg'] : ''; ?></textarea></dd>
        </dl>

        <p><input type="submit" class="submit" name="send" value="Submit" /></p>

        <!-- Begin Advertisment -->
<!--		<p id="adverts"><a href="#" title="Advertisment" class="advert"><img src="./template/images/adverts/advert.gif" width="528" height="62" alt="Advertisment" /></a></p>-->
        <!-- End Advertisment -->

    </div>
</form>
<!-- END Content -->

<?php get_footer(); ?>