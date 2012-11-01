<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
    <h2>Notice Board</h2>
    <?php
    /* $data1=user_data('user_id'); */
    $sql = "SELECT * FROM notice_manager";
    $result = mysql_query($sql);

    echo "<table class='notice_board_table' border='1 px solid black;' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Notice On</th>
                <th class='table_header'style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Related Employee</th>
                <th class='table_header'style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Date of Upload</th>
                <th class='table_header'style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Download</th>                
            </tr>";

    while ($row = mysql_fetch_array($result)) {
        $file = $row['file_name'];
        $link = "<a href='./template/download_notice.php?f=".$file."'</a>";

        echo "<tr>";
        echo "<td class='table_data' style='padding-left: 20px; padding-bottom: 10px;'>" . $row['notice_title'] . "</td>";
        echo "<td class='table_data' style='padding-left: 43px; padding-bottom: 10px;'>" . $row['related_employees'] . "</td>";
        echo "<td class='table_data' style='padding-left: 25px; padding-bottom: 10px;'>" . $row['date_of_publication'] . "</td>";
        echo "<td class='table_data' style='padding-left: 10px; padding-bottom: 10px;'>" . $link ."Download</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>


</div>

<?php get_footer(); ?>