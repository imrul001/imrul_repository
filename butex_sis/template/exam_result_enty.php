<?php
$std_id = isset($_GET['student_id'])? $_GET['student_id']:'';
$l1t1 = isset($_GET['gpaL1T1'])? $_GET['gpaL1T1']:'';
$l1t2 = isset($_GET['gpaL1T2']) ? $_GET['gpaL1T2']:'';
$l2t1 = isset($_GET['gpaL2T1']) ? $_GET['gpaL2T1']:'';
$l2t2 = isset($_GET['gpaL2T2']) ? $_GET['gpaL2T2']:'';
$l3t1 = isset($_GET['gpaL3T1']) ? $_GET['gpaL3T1']:'';
$l3t2 = isset($_GET['gpaL3T2']) ? $_GET['gpaL3T2']:'';
$l4t1 = isset($_GET['gpaL4T1']) ? $_GET['gpaL4T1'] :'';
$l4t2 = isset($_GET['gpaL4T2']) ? $_GET['gpaL4T2'] :'';
$cgpa = isset($_GET['cgpa']) ? $_GET['cgpa']:'';
$record = isset($_GET['record']) ?$_GET['record']:'';
$note = isset($_GET['note']) ? $_GET['note'] : '';
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
          while ($row1 = mysql_fetch_array($result)) {
              $lv1t1 = $row1['L1T1GPA'];
              $lv1t2 = $row1['L1T2GPA'];
              $lv2t1 = $row1['L2T1GPA'];
              $lv2t2 = $row1['L2T2GPA'];
              $lv3t1 = $row1['L3T1GPA'];
              $lv3t2 = $row1['L3T2GPA'];
              $lv4t1 = $row1['L4T1GPA'];
              $lv4t2 = $row1['L4T2GPA'];
              $lvCGPA = $row1['CGPA'];
              $lvRecord = $row1['RECORD'];
              $lvnote = $row1['note'];
          }
          !empty($l1t1)? $l1t1: $l1t1=$lv1t1; 
          !empty($l1t2)? $l1t2: $l1t2=$lv1t2;
          !empty($l2t1)? $l2t1: $l2t1=$lv2t1; 
          !empty($l2t2)? $l2t2: $l2t2=$lv2t2;
          !empty($l3t1)? $l3t1: $l3t1=$lv3t1; 
          !empty($l3t2)? $l3t2: $l3t2=$lv3t2; 
          !empty($l4t1)? $l4t1: $l4t1=$lv4t1; 
          !empty($l4t2)? $l4t2: $l4t2=$lv4t2; 
          !empty($cgpa)? $cgpa: $cgpa=$lvCGPA;
          !empty($record)? $record: $record=$lvRecord;
          !empty($note)? $note: $note=$lvnote; 
          
        $sql = "UPDATE exam SET L1T1GPA='$l1t1', L1T2GPA='$l1t2', L2T1GPA='$l2t1', L2T2GPA='$l2t2', L3T1GPA='$l3t1', L3T2GPA='$l3t2', L4T1GPA='$l4t1', L4T2GPA='$l4t2', CGPA='$cgpa', RECORD='$record', note='$note' WHERE std_id=$std_id";
        if (!@mysql_query($sql)) {
          die(mysql_error());
        } else {
//          echo 'Exam Result Edited Successfully';
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