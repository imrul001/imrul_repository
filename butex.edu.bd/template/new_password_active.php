<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- BEGIN Content -->
<div id="content">
  <?php
  $user_name = reg_confirm('user_name');
  $sql = "UPDATE butex_table SET status='Active' WHERE user_name='" . $user_name . "'";
  @mysql_query($sql);
  ?>

  <h2 style="width: 33%">Registration Complete</h2>

  <p>Your password is successfully changed!</p>
  <p>Your account has been successfully activated.You may now <a href="#login-box" class="login-window">login</a> with the user id <strong><?php echo $user_name; ?></strong>.</p>
</div>
<!-- END Content -->

<?php get_footer(); ?>