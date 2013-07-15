<?php
$std_id = $_GET['std_id'];
$sql = "SELECT * FROM exam WHERE std_id='" . $std_id . "'";
$result = mysql_query($sql);
$i = 0;
if (!$result) {
  echo die(mysql_error());
} else {
  while ($row = mysql_fetch_array($result)) {
    $l1t1 = $row['L1T1GPA'];
    $l1t2 = $row['L1T2GPA'];
    $l2t1 = $row['L2T1GPA'];
    $l2t2 = $row['L2T2GPA'];
    $l3t1 = $row['L3T1GPA'];
    $l3t2 = $row['L3T2GPA'];
    $l4t1 = $row['L4T1GPA'];
    $l4t2 = $row['L4T2GPA'];
    $cgpa = $row['CGPA'];
    $record = $row['RECORD'];
    $note = $row['note'];
  }
  $array = array($l1t1, $l1t2, $l2t1, $l2t2, $l3t1, $l3t2, $l4t1, $l4t2, $cgpa, $record, $note);
}
echo json_encode($array);
?>