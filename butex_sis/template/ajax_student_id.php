<?php 
$std_id = isset($_GET['std_id'])? $_GET['std_id']: '';
$sql ="SELECT * FROM input WHERE std_id=$std_id";
$result = mysql_query($sql);
if(!$result){
    die(mysql_error());
}
$num_row = mysql_num_rows($result);
echo $num_row;
?>