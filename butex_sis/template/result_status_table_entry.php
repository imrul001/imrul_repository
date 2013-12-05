<?php

$student_id = isset($_GET['std_id']) ? $_GET['std_id'] : '';
$levelTerm = isset($_GET['levelTerm']) ? $_GET['levelTerm'] : '';
$examYear = isset($_GET['examYear']) ? $_GET['examYear'] : '';
$gpa = isset($_GET['gpa']) ? $_GET['gpa'] : '';
$cgpa = isset($_GET['cgpa']) ? $_GET['cgpa'] : '';
$failSubjects = isset($_GET['failSubjects']) ? $_GET['failSubjects'] : '';
$remarks = isset($_GET['remarks']) ? $_GET['remarks'] : '';
$date_time = date("jS-F-Y h:i:s a", time());
$id = createRandom_number();

//$examData = isset($_GET['examData'])? $_GET['examData']:'';
$sql = "INSERT INTO `result_status` (`id`, `student_id`, `level_term`, `exam_year`, `gpa`, `cgpa`, `backlog_subject`, `remarks`, `entry_date_time`) 
VALUES('$id', '$student_id', '$levelTerm', '$examYear', '$gpa', '$cgpa', '$failSubjects', '$remarks', '$date_time')";
$result = mysql_query($sql);
if(!$result){
    return die(mysql_error());
}else{
    return "Data Entry Completed Successfully";
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