<?php
include_once('connect.php');

$sql = "SELECT DATE_FORMAT(  `EventTime` ,  '%Y%m%d' ) days, COUNT(  `Id` ) count
FROM event
GROUP BY days";
$query = mysql_query($sql);
while($row=mysql_fetch_array($query)){
	$arr[] = array(
		'day'=> $row['days'],
		'count' => $row['count']
	);
}
//var_dump($arr);


mysql_close($link);
echo json_encode($arr);
//[{"name":"����","value":"2.29"},{"name":"�½�","value":"0.94"}]
?>