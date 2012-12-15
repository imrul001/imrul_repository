<?php
$file = $_POST['file'];
$method = $_POST['method'];
$download_id = $_POST['download_id'];
$notice_id = $_POST['notice_id'];
if ($method == "download") {
    $fileName = "./template/download_files/$file";
    if (file_exists($fileName)) {
        unlink($fileName);
        $deletion = true;
        $sql = "DELETE from download_manager WHERE download_id='" . $download_id . "'";
        $result = mysql_query($sql);
        if ($result && $deletion) {
            echo "is deleted successfully";
        } else {
            echo 'Failed';
        }
    } else {
        echo "does not exist";
    }
} else if ($method == "conf") {
    $fileName = "./template/uploaded_notice_files/confidential/$file";
    if (file_exists($fileName)) {
        unlink($fileName);
        $deletion = true;
        $sql = "DELETE from confidential_notice WHERE notice_id='" . $notice_id . "'";
        $result = mysql_query($sql);
        if ($result && $deletion) {
            echo "is deleted successfully";
        } else {
            echo 'Failed';
        }
    } else {
        echo 'does not exist';
    }
} else if ($method == "board") {
    $fileName = "./template/uploaded_notice_files/$file";
    if (file_exists($fileName)) {
        unlink($fileName);
        $deletion = true;
        $sql = "DELETE from notice_manager WHERE notice_id='" . $notice_id . "'";
        $result = mysql_query($sql);
        if ($result && $deletion) {
            echo "is deleted successfully";
        } else {
            echo 'Failed';
        }
    } else {
        echo 'does not exist';
    }
} else {
    echo 'deletion process is failed';
}
?>