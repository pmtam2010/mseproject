<?php
include_once('connect.php');
$from = $_GET['from'];
$to = $_GET['to'];
$user = $_GET['user'];
$sstr='SER';
$user =substr_replace($user,$sstr,1,0);
echo "Course: Distributed Systems, Semester 2, 2012".'</br>';
echo "User: ".$user.'</br>';
echo "Start time: ".$from.'</br>';
echo "End time: ".$to.'</br>'.'</br>';

 echo "<table border=1>";
 echo "<tr><th>Event name</th><th>Amount of event</th></tr>";



$sql = "SELECT Name, COUNT(  `Id` ) count
FROM event
WHERE FKUserId='{$user}' and EventTime between '{$from}' and '{$to}'  
GROUP BY Name
ORDER BY count desc";
$query = mysql_query($sql);
while($row=mysql_fetch_array($query)){

		echo '<tr><td>'.$row['Name'].'</td><td>'.$row['count'].'</td></tr>';


}
echo "</table></br>";

 echo "<table border=1>";
 echo "<tr><th>Event context</th><th>Amount of event</th></tr>";

 $sql = "SELECT Prefix, Context, COUNT(  `Id` ) count
FROM event
WHERE FKUserId='{$user}' and EventTime between '{$from}' and '{$to}'  
GROUP BY Context
ORDER BY count desc";
$query = mysql_query($sql);
while($row=mysql_fetch_array($query)){

		echo '<tr><td>'.$row['Prefix'].': '.$row['Context'].'</td><td>'.$row['count'].'</td></tr>';


}
echo "</table>";







mysql_close($link);

?>