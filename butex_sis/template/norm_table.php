<?php
$std_id = $_GET['std_id'];
$sql = "SELECT * FROM norm WHERE std_id='$std_id' ORDER BY date_time ASC";
$result = mysql_query($sql);
?>
<?php if (mysql_num_rows($result) < 1): ?>
    <div id="login_modal_body">
        <form id="formToPunishmentEntry" action="" method="POST" enctype="multipart/form-data">
            <div id="manage_download_box" class="registerPopup">
                <h3 style="text-align: center;">Punishment Entry</h3>
                <div class="current_time">
                    <?php echo "<p style='font-family:times new roman';><b>Current date:</b> " . date("jS-F-Y h:i:s a", time()) . "</p>"; ?>
                </div>

                <dl>
                    <dt><label for="Date & Time"><b>Date & Time</b></label></dt>
                    <dd><input type="text" class="text" name="date_time" id="date_time" size="30" value="<?php echo date("jS-F-Y h:i:s a", time()); ?>" readonly/></dd>
                </dl>
                <dl>
                    <dt><label for="student Id"><b>Student ID:</b></label></dt>
                    <dd><input type="text" class="text" name="student_id" id="student_id" size="30" value="<?php echo $std_id; ?>" readonly /></dd>
                </dl>
                <dl>
                    <dt><label for="Punishment:"><b>Punishment:</b></label></dt>
                    <dd><input type="text" class="gpa" name="punishment" id="punishment" size="30" value="" /></dd>
                </dl>
                <dl>
                    <dt><label for="Warning"><b>Warning:</b></label></dt>
                    <dd><input type="text" class="gpa" name="warning" id="warning" size="30" value="" /></dd>
                </dl>
                <input type="submit" class="submitLogIn" id="punishment_submit_id" value="Submit" />
                <div id="uploader" style="">
                </div>
            </div>
        </form>
    </div>
<?php else: ?>
    <div id="punishmentTable">
        <h3>Punishment Record</h3>
        <table class='user_table' style='margin: 0 auto;'>
            <tr>
                <th>Date/Time</th>
                <th>Warning</th>
                <th>Punishment</th>
                <th>Edit</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysql_fetch_array($result)) {
                echo '<tr>
                          <td id=entryDateTime_' . $i . '>' . $row['date_time'] . '</td>
                          <td id=warningID_'.$i.'>' . $row['warning'] . '</td>
                          <td id=punishmentId_' . $i . '>' . $row['punishment'] . '</td>
                          <td>
                              <input type="button" class="editPunishment" method="EDIT" rand-id="'.$row['id'].'" std-id="'.$std_id.'" id=editPun_' . $i . ' value="Edit" />
                              <input type="button" class="deletePunishment" method="DELETE" rand-id="'.$row['id'].'" std-id="'.$std_id.'" id=deletePun_' . $i . ' value="Delete" />
                          </td>
                      </tr>';
                $i++;
            }
            ?>
        </table>
        <div id="addPunishmentRow" class="addRowButtonClass createR" date-time="<?php echo date("jS-F-Y h:i:s a", time()); ?>" stud-id="<?php echo $std_id; ?>">Add Row</div>
    </div>
<?php endif; ?>