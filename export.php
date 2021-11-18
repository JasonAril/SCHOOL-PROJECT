<?php
$server = "localhost";
$username="root";
$password="";
$db_name="qr code database";

$conn = new mysqli($server,$username,$password,$db_name);

if($conn->connect_error){
    die("Connection failed" .$conn->connect_error);
}
$filename = 'Attenadance Record-'.date('Y-m-d').'.csv';

$query = "SELECT * FROM table_attendance";
$result = mysqli_query($conn,$query);

$array = array();

$file = fopen($filename,"w");
$array = array("Id","Name","TIMEIN","TIMEOUT","LOGDATE","STATUS");
fputcsv($file,$array);

while($row = mysqli_fetch_array($result)){
    $Id =$row['Id'];
    $Name =$row['Name'];
    $TIMEIN =$row['TIMEIN'];
    $TIMEOUT =$row['TIMEOUT'];
    $LOGDATE =$row['LOGDATE'];
    $STATUS =$row['STATUS'];

    $array =array($Id,$Name,$TIMEIN,$TIMEOUT,$LOGDATE,$STATUS);
    fputcsv($file,$array);
}
fclose($file);

header("Content-Description: File Transfer");
header("Content-Disposition: Attachment; filename=$filename");
header("Content-type: application/csv;");
readfile($filename);
unlink($filename);
exit();

?>
