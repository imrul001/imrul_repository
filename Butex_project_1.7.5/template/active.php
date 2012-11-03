<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- BEGIN Content -->
<div id="content">
    <?php
//    $user_name = reg_confirm('user_name');
    $m = $_GET['m'];
    $u = $_GET['u'];
    $r = $_GET['rand_id'];
    ?>
    <?php if ($m == 'ac_activation'): ?>
        <h2 style="width: 33%">Registration Complete</h2>

        <p>Registration is complete!</p>
        <p>Your account has been successfully activated.You may now <a href="./index.php" class="login-window">login</a> with the user id <strong><?php echo $u; ?></strong>.</p>
    <?php endif; ?>
    <?php if ($m == 'new_password_activation'): ?>
        <h2 style="width: 33%">Change Password</h2>

        <p>Password is successfully changed!</p>
        <p>You may use the new password to <a href="./index.php" class="login-window">login</a> with the user id <strong><?php echo $u; ?></strong>.</p>
    <?php endif; ?>
</div>
<!-- END Content -->

<?php get_footer(); ?>