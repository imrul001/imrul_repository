<?php get_admin_header(); ?>
<?php get_admin_sidebar(); ?>

<div id="content">

<!--    <p>This Page is Under Construction</p>-->

  <?php if (!logged_in()) : ?>

    <p style="color: red;">First You Need To Log In Properly..    <a href="./index.php?p=login" title="Login">Login</a></p>

  <?php else : ?>
    <h2>Admin Panel</h2>
    <p >Welcome, <strong><?php user_data('user_name'); ?></strong>! You Have Successfully Logged In.</p>
    <div class="modal_login_button button_div_admin" style="margin-top: -85px; float: right; margin-right: 99px; width: 18%">
      <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=office_user_panel_671348">User Panel</a>
    </div>
    <div class="modal_login_button button_div_admin" style="margin-top: -85px; float: right">
      <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=logout">Logout</a>
    </div>
    <?php
    $sql = "SELECT * FROM `butex_table` WHERE status='Active' AND admin_approval='pending'";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);
    ?>

    <div id="admin_options">
      <ul>
        <li><a href="./index.php?p=manage_download">Manage Download</a></li>
        <li><a href="./index.php?p=manage_notice">Manage Notice</a></li>
      </ul>
    </div>
    
<?php endif; ?>

</div>

<?php get_footer(); ?>