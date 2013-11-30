<?php
$std_id = $_GET['std_id'];
$LT = $_GET['LT'];
$sql = "SELECT * FROM backlog WHERE std_id='" . $std_id . "'";
$result = mysql_query($sql);
$i = 0;
if (!$result) {
  echo die(mysql_error());
} else {
  while ($row = mysql_fetch_array($result)) {
    $lt = $row[$LT];
  }
  $array = array($lt);
}
echo json_encode($array);
?>