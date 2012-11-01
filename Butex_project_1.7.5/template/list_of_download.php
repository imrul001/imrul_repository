<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
    <h2>Downloads</h2>
    <?php
    /* $data1=user_data('user_id'); */
    $sql = "SELECT * FROM download_manager";
    $result = mysql_query($sql);

    echo "<table class='notice_board_table' border='1px solid black' cellpadding=4 cellspacing=5>
            <tr>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Title</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Date of Upload</th>
                <th class='table_header' style='padding-left: 0px; padding-bottom: 10px; text-decoration: underline'>Download</th>
            </tr>";

    while ($row = mysql_fetch_array($result)) {
        $file = $row['file_name'];
        $link = "<a href='./template/download.php?f=".$file."'</a>";

        echo "<tr>";
        echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['title'] . "</td>";
        echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $row['date_of_upload'] . "</td>";
        echo "<td class='table_data' style='padding-left: 30px; padding-bottom: 10px; padding-right: 30px;'>" . $link ."Download</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>


</div>

<?php get_footer(); ?>