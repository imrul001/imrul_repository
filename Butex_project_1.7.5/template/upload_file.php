<?php get_admin_header(); ?>
<?php get_admin_sidebar(); ?>

<div id="content" style="font-family: times new roman; font-size: 15px">

    <?php if (!logged_in()) : ?>
        <p style="color: red;">First You Need To Log In Properly......<a href="./index.php?p=login" title="Login">Login</a></p>
    <?php else : ?>
        <h2>Download Manager</h2>
        <p ><strong><?php user_data('user_name'); ?></strong>!Uploaded File Report</p>
        <div class="modal_login_button button_div_admin" style="margin-top: -85px; float: right; margin-right: 99px; width: 18%">
            <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=admin_panel">Admin Panel</a>
        </div>
        <div class="modal_login_button button_div_admin" style="margin-top: -85px; float: right">
            <a style="text-decoration: none; font-weight: bold; color: #444; width: 25%;" <a href="./index.php?p=logout">Logout</a>
        </div>
        <?php
        $allowedExts = array("jpg", "jpeg", "gif", "png", "pdf");
        $extension = end(explode(".", $_FILES["file"]["name"]));
        $title = $_POST['Download_title'];
        $file_name = $_FILES["file"]["name"];
        $date_of_upload = date("jS-F-Y h:i:s a", time());
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "application/pdf"))
                && ($_FILES["file"]["size"] < 70000000000000)
                && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            } else {
                echo "Title: ".$_POST['Download_title']."<br />";
                echo "Uploaded File Name : " . $_FILES["file"]["name"] . "<br />";
                echo "Type : " . $_FILES["file"]["type"] . "<br />";
                echo "Size : " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";

                if (file_exists("./template/download_files/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "./template/download_files/" . $_FILES["file"]["name"]);
                    $sql = "INSERT INTO `download_manager` (`title`, `file_name`, `date_of_upload`) VALUES('$title', '$file_name', '$date_of_upload')";
                    @mysql_query($sql);
//                echo "Stored in: " . "./template/upload/" . $_FILES["file"]["name"];
                }
            }
        } else {
            echo "Invalid file";
        }
        ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>