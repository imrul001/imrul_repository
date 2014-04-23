<?php
$student_id = isset($_GET['std_id']) ? $_GET['std_id'] : '';
$levelTerm = isset($_GET['levelTerm']) ? $_GET['levelTerm'] : '';
$examYear = isset($_GET['examYear']) ? $_GET['examYear'] : '';
$gpa = isset($_GET['gpa']) ? $_GET['gpa'] : '';
$cgpa = isset($_GET['cgpa']) ? $_GET['cgpa'] : '';
$failSubjects = isset($_GET['failSubjects']) ? $_GET['failSubjects'] : '';
$remarks = isset($_GET['remarks']) ? $_GET['remarks'] : '';
$date_time = date("jS-F-Y h:i:s a", time());
$id = md5(createRandom_number());
$method = isset($_GET['method']) ? $_GET['method'] : '';

$randomIdFromTable = isset($_GET['rowRand_ID']) ? $_GET['rowRand_ID'] : '';
if ($randomIdFromTable != '' && $randomIdFromTable !=null && empty($method)) {
//    $sql_q = "SELECT * FROM result_status WHERE student_id='$student_id' AND id='$randomIdFromTable'";
//    $result1=mysql_query($sql_q);
//    while ($row = mysql_fetch_array($result1)) {
//        $lvtr = $row['level_term'];
//        $exyr = $row['exam_year'];
//        $gp = $row['gpa'];
//        $cg = $row['cgpa'];
//        $blogSub = $row['backlog_subject'];
//        $rmk = $row['remarks'];
//    }
    /***
     * $gpa comes from form
     * $gp comes from database
     * 
     */
//    !empty($levelTerm) ? $levelTerm : $levelTerm=$lvtr;
//    !empty($examYear) ? $examYear : $examYear=$exyr;
//    !empty($gpa) ? $gpa : $gpa=$gp;
//    !empty($cgpa) ? $cgpa : $cgpa=$cg;
//    !empty($failSubjects) ? $blogSub : $failSubjects=$failSubjects;
//    !empty($remarks) ? $rmk : $remarks=$remarks;
    $sql = "UPDATE result_status SET level_term='$levelTerm', exam_year='$examYear', gpa='$gpa', cgpa='$cgpa', backlog_subject='$failSubjects', remarks='$remarks' WHERE student_id='$student_id' AND id='$randomIdFromTable'";
    if (!@mysql_query($sql)) {
        die("mysql_error ".mysql_error());
    } else {
//        echo 'Exam Result Edited Successfully';
    }
}elseif(!empty ($method) && $method =="DELETE_ROW"){
    $sql1 = "DELETE FROM `result_status` WHERE student_id='$student_id' AND id='$randomIdFromTable'";
    $result = mysql_query($sql1);
    if(!$result){
        return die(mysql_error());
    }else{
        echo "Row Deleted Successfully.";
    }
}
else {
    $sql = "INSERT INTO `result_status` (`id`, `student_id`, `level_term`, `exam_year`, `gpa`, `cgpa`, `backlog_subject`, `remarks`, `entry_date_time`) 
VALUES('$id', '$student_id', '$levelTerm', '$examYear', '$gpa', '$cgpa', '$failSubjects', '$remarks', '$date_time')";
    $result = mysql_query($sql);
    if (!$result) {
        return die("mysql_error ".mysql_error());
    } else {
//        return "Data Entry Completed Successfully";
    }
}
function createRandom_number() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    srand((double) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 8) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}

?>