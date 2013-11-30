<?php
$std_id = $_POST['student_id'];
$l1t1 = $_POST['gpaL1T1'];
$l1t2 = $_POST['gpaL1T2'];
$l2t1 = $_POST['gpaL2T1'];
$l2t2 = $_POST['gpaL2T2'];
$l3t1 = $_POST['gpaL3T1'];
$l3t2 = $_POST['gpaL3T2'];
$l4t1 = $_POST['gpaL4T1'];
$l4t2 = $_POST['gpaL4T2'];
$cgpa = $_POST['cgpa'];
$record = $_POST['record'];
$note = $_POST['note'];
if (!empty($std_id)) {
  $sql = "SELECT std_id FROM input WHERE std_id=$std_id";
  $result = mysql_query($sql);
  if (!empty($result)) {
    $num = mysql_num_rows($result);
    if ($num >= 1) {
      $sql = "SELECT * FROM exam WHERE std_id=$std_id";
      $result = mysql_query($sql);
      if (!empty($result)) {
        $num_r = mysql_num_rows($result);
      } else {
        $num_r = 0;
      }
      if ($num_r < 1) {
        $sql = "INSERT INTO `exam` (`std_id`, `L1T1GPA`, `L1T2GPA`, `L2T1GPA`, `L2T2GPA`, `L3T1GPA`, `L3T2GPA`, `L4T1GPA`, `L4T2GPA`, `CGPA`, `RECORD`, `note`) VALUES('$std_id', '$l1t1', '$l1t2', '$l2t1', '$l2t2', '$l3t1', '$l3t2', '$l4t1', '$l4t2', '$cgpa', '$record', '$note')";
        if (!@mysql_query($sql)) {
          die(mysql_error());
        } else {
          echo 'Exam Result Inserted Successfully';
        }
      } else {
        $sql = "UPDATE exam SET L1T1GPA='$l1t1', L1T2GPA='$l1t2', L2T1GPA='$l2t1', L2T2GPA='$l2t2', L3T1GPA='$l3t1', L3T2GPA='$l3t2', L4T1GPA='$l4t1', L4T2GPA='$l4t2', CGPA='$cgpa', RECORD='$record', note='$note' WHERE std_id=$std_id";
        if (!@mysql_query($sql)) {
          die(mysql_error());
        } else {
          echo 'Exam Result Edited Successfully';
        }
      }
    } else {
      echo "The Student is not registered";
    }
  } else {
    echo 'The Student is not registered';
  }
} else {
  echo "Student Id Field Can not be blank.";
}
?>