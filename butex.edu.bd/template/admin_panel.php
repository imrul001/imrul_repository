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
      <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=admin_panel">Admin Panel</a>
    </div>
    <div class="modal_login_button button_div_admin" style="margin-top: -85px; float: right">
      <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=logout">Logout</a>
    </div>
    <?php
    $sql = "SELECT * FROM `butex_table` WHERE status='Active' AND admin_approval='pending' ORDER BY id DESC";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);
    ?>

    <div id="admin_options">
      <ul>
        <li><a href="./index.php?p=manage_download">Manage Download</a></li>
        <li><a href="./index.php?p=manage_notice">Manage Notice</a></li>
        <li><a href="#awaiting_users"  class="login-window">Waiting For Approval<?php echo "(" . $num . ")"; ?></a></li>
        <li><a href="./index.php?p=delete_notice">Delete Notice</a></li>
        <li><a href="./index.php?p=delete_download">Delete Downloads</a></li>
      </ul>
    </div>
    <div id="waiting_for_approval">
      <div id="awaiting_users" class="login-popup awaiting_users_table">
        <?php
        if ($num == 0) {
          echo '<h3>No Pending Registration</h3>';
          echo '<P style="font-weight:bold; font-size:14px">There is No User Awaiting For Registrating!!!!!</p>';
        } else {
          ?>
          <h3>Awaiting User For Approval</h3>
          <?php
          echo "<table class='notice_board_table' id='pending_user_table' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>User Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Full Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Contact Name</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Employee</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Permission</th>
                
            </tr>";
          $i = 1;
          while ($row = mysql_fetch_array($result)) {
            $uname[$i] = $row['user_name'];
            echo "<tr>";
            echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['user_name'] . "</td>";
            echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['full_name'] . "</td>";
            echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['contact_no'] . "</td>";
            echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['designation'] . "</td>";
            echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>
            <form id='approval_form_" . $i . "' class='formApp' method='POST' action='' enctype='multipart/form-data'> 
            <input type='hidden' name='user_name' value='" . $uname[$i] . "'/>
            <input type='submit' id='approval_" . $i . "' class='appClass' name='approval' value='Approve'/>
            <input type='submit' id='cancel_" . $i . "' class='cancelClass' name='cancel' value='Cancel' />
            </form>
            </td>";
            echo "</tr>";
            $i = $i + 1;
          }
          echo "</table>";
          ?>


          <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
        </div>
    <?php
  }
  ?>

    </div>

<!--    <div id="login_modal_body">
      <form id="Form1" name="Form1" method="post" action="" enctype="multipart/form-data" onsubmit="">
              <h2>User Login<span class="arrow"></span></h2>
        <div id="manage_download_box" class="login-popup loginContainer">
          <div id="error_box">
            <a name="errr_login"></a>
            <fieldset id="ersb_login" style="padding: 2;display: none;font-size: 13px">
              <legend><b style="font-size: 14px">Validation Errors</b></legend>
              <span id="ers_login"></span>
            </fieldset>
          </div>
          <h3>Manage Download</h3>
          <div id="current_time">
  <?php echo "<p style='font-family:times new roman';><b>Current date:</b> " . date("jS-F-Y h:i:s a", time()) . "</p>"; ?>
          </div>

          <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_size; ?>" />
          <dl>
            <dt><label for="user_id"><b>Download Title:</b></label></dt>
            <dd><input type="text" class="text" name="Download_title" id="title" size="30" value="<?php echo ($_POST['Download_title']) ? $_POST['Download_title'] : ''; ?>" /></dd>
          </dl>
          <dl>
            <dt><label for="user_id"><b>File Name:</b></label></dt>
            <dd><input type="file" name="fileToUpload" id="fileToUpload" /></dd>
          </dl>

          <input type="Submit" class="submit" name="upload" name="buttonForm" value="Upload" />

          <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
        </div>
      </form>
      <img id="loading" src="./template/img/ajax-loader.gif" style="display:none;" />

      <p id="message"/>

      <p id="result"/>
    </div>-->

<!--    <div id="login_modal_body">
      <form method="post" action="./index.php?p=notice_publish" enctype="multipart/form-data" onsubmit="return isLogInValid()">
              <h2>User Login<span class="arrow"></span></h2>
        <div id="notification_publication_box" class="login-popup loginContainer">
          <div id="error_box">
            <a name="errr_login"></a>
            <fieldset id="ersb_login" style="padding: 2;display: none;font-size: 13px">
              <legend><b style="font-size: 14px">Validation Errors</b></legend>
              <span id="ers_login"></span>
            </fieldset>
          </div>
          <h3>Notice Publication</h3>
          <div id="current_time">
  <?php echo "<p style='font-family:times new roman';><b>Current date:</b> " . date("jS-F-Y h:i:s a", time()) . "</p>"; ?>
          </div>

          <dl>
            <dt><label for="Notice Title"><b>Notice Title:</b></label></dt>
            <dd><input type="text" class="text" name="notice_title" id="notice" size="30" value="<?php echo ($_POST['user_name']) ? $_POST['user_name'] : ''; ?>" /></dd>
          </dl>

          <dl>
            <dt><label for="Related Employee"><b>Related Employee:</b></label></dt>
            <dd><input type="text" class="text" name="related_employee" id="related_employee" size="30" value="<?php echo ($_POST['related_employee']) ? $_POST['related_employee'] : ''; ?>" /></dd>
          </dl>

          <dl>
            <dt><label for="user_id"><b>File Name</b></label></dt>
            <dd><input type="file" name="file" id="file" /></dd>
          </dl>

          <input type="submit" class="submit" name="notice_publish" value="Publish" />

          <p style="text-align: center;">Please Click Outside of the Box to Cancel </p>
        </div>
      </form>
      disabled='disabled'
    </div>-->

<?php endif; ?>

</div>

<?php get_footer(); ?>