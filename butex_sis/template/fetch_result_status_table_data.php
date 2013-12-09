<?php    
$std_id = $_GET['std_id'];
$random_id = $_GET['rand_id'];
$sql = "SELECT * FROM result_status WHERE student_id='" . $std_id . "' AND id='".$random_id."'";
$result = mysql_query($sql);
if (!$result) {
  echo die(mysql_error());
} else {
  while ($row = mysql_fetch_array($result)) {
    $levelTerm = $row['level_term'];
    $examYear = $row['exam_year'];
    $gpa = $row['gpa'];
    $cgpa = $row['cgpa'];
    $backLogSubjects = $row['backlog_subject'];
    $remarks = $row['remarks'];
    $dataTime = $row['entry_date_time'];
  }
  $array = array($levelTerm, $examYear, $gpa, $cgpa, $backLogSubjects, $remarks, $dataTime);
}
echo json_encode($array);
?>