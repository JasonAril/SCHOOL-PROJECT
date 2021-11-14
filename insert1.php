<?php

    $server = "localhost";
    $username="root";
    $password="";
    $db_name="qr code database";

    $conn = new mysqli($server,$username,$password,$db_name);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['text'])){

  $text =$_POST['text'];

  $sql ="INSERT INTO table_attendance(Name,TIMEIN) VALUES('$text',NOW())";
  if($conn ->query($sql) ===TRUE){
    ECHO "Successfully inserted";
  }else {
    echo "Error: " . $sql . "<br>" . $conn -> error;
  }
  header("location: index.php");
}
$conn->close();

 ?>
