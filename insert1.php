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
      $date = date('Y-m-d');
      $time = date('H:i:s');

      $sql = "SELECT * FROM table_attendance WHERE Name='$text' AND LOGDATE='$date' AND STATUS='IN'";
      $query = $conn->query($sql);
      if($query->num_rows>IN){
        $sql = "UPDATE table_attendance SET TIMEOUT=NOW(), STATUS='OUT' WHERE Name='$text' AND LOGDATE='$date'";
        $query=$conn->query($sql);
        ECHO "Successfully inserted";
      }else{
        $sql ="INSERT INTO table_attendance (Name,TIMEIN,LOGDATE,STATUS) VALUES('$text','$date','$date','IN')";
        if($conn ->query($sql) ===TRUE){
          ECHO "Successfully inserted";
        }else {
          echo "Error: " . $sql . "<br>" . $conn -> error;
        }
      }
    }ELSE{
      echo "Error: " . $sql . "<br>" . $conn -> error;
    }
  header("location: index.php");
$conn->close();

 ?>

