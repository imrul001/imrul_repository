<?php get_admin_header(); ?>
<?php get_admin_sidebar(); ?>

<div id="content">

<!--    <p>This Page is Under Construction</p>-->

  <?php if (!logged_in()) : ?>
    <p style="color: red;">First You Need To Log In Properly......  <a href="./index.php?p=login" title="Login">Login</a></p>
  <!--    <p>Welcome, <strong>Guest</strong>! <a href="./index.php?p=register" title="Register">Register</a> - <a href="./index.php?p=login" title="Login">Login</a></p>-->
  <?php else : ?>
    <h2>Downloads</h2>
    <div id="" class="delete_process"></div>
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

    <div id="download_file">
      <?php
      /* $data1=user_data('user_id'); */
      $sql = "SELECT * FROM download_manager ORDER BY 1 DESC";
      $result = mysql_query($sql);
      $num = mysql_num_rows($result);
      if ($num > 0) {
        echo "<table class='notice_board_table' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Title</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Date of Upload</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Delete</th>
            </tr>";
        $i = 1;
        while ($row = mysql_fetch_array($result)) {
          $method[$i] = "download";
          $file[$i] = $row['file_name'];
          $download_id[$i] = $row['download_id'];
//                $link = "<a href='./template/download.php?f=$file&downlod_id=$download_id'>";

          echo "<tr>";
          echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['title'] . "</td>";
          echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['date_of_upload'] . "</td>";
          echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>
            <form id='download_delete_form_" . $i . "' class='deleteDownloadNotice' method='POST' action='' enctype='multipart/form-data'> 
            <input type='hidden' name='method' value='" . $method[$i] . "'/>    
            <input type='hidden' name='file' value='" . $file[$i] . "'/>
            <input type='hidden' name='download_id' value='" . $download_id[$i] . "'/>            
            <input type='submit' id='delete_" . $i . "' class='deleteClass' name='cancel' value='Delete' />
            </form>
            </td>";
          echo "</tr>";
          $i = $i + 1;
        }
        echo "</table>";
      } else {
        echo "There is no Downloadable file.";
      }
      ?>
    </div>

  <?php endif; ?>

</div>

<?php get_footer(); ?>



