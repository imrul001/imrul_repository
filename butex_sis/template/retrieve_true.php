<?php
$std_id = $_GET['std_id'];
//$LT = $_GET['LT'];
$sql = "SELECT * FROM backlog WHERE std_id='" . $std_id . "'";
$result = mysql_query($sql);
$i = 0;
if (!$result) {
  echo die(mysql_error());
} else {
  while ($row = mysql_fetch_array($result)) {
    $l1t1 = $row["L1T1blog"];
    $l1t2 = $row["L1T2blog"];
    $l2t1 = $row["L2T1blog"];
    $l2t2 = $row["L2T2blog"];
    $l3t1 = $row["L3T1blog"];
    $l3t2 = $row["L3T2blog"];
    $l4t1 = $row["L4T1blog"];
    $l4t2 = $row["L4T2blog"];
    $status = $row["status"];
  }
  $array = array($l1t1, $l1t2, $l2t1, $l2t2, $l3t1, $l3t2, $l4t1, $l4t2, $status);
}
echo json_encode($array);
?>