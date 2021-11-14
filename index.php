<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></scrip
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<style>
*{
  margin:0;
  padding:0;
}
header{
  height:70px;
  background: #666666;
  padding: 0 50px;
}
.nav{
  width: 68%;
  float:right;
}
nav ul{
  list-style: none;
  float: right;
}
nav ul li{
  display: inline-block;
}
nav ul li a{
  text-decoration: none;
  color: #FFFC20;
  font-family: sans-serif;
  font-weight: bold;
  margin: 0 40px;
  line-height: 70px;
  text-transform: uppercase;
}
</style>


</head>
<body>
<body background="media/green.jpg">

<header>
  <nav>
    <img src="media/logo.png" style="width:70px; height:70px;">
    <ul>
<li><a href="">Home</a></li>
<li><a href="">Records</a></li>
<li><a href="">About</a></li>
</ul>
</nav>
</header>


<div class="container">
  <div class='row'>
    <div class ="col-md-12">
      <table>
      <td>
        <td>
      <tr height="40px">
      </tr>
    </table>
    </div>


    <div class="col-md-6" style="padding:5px;border-radius: 6px;" id="divvideo">
      <center><p class="login-box-msg">SCAN QR CODE</p></center>


     <video id="preview" width="100%" height="60%" style="border-radius:1px;"></video>
   </div>
   <div class='column'>
     <div class ="col-md-1">
     </div>
   </div>


   <div class="col-md-6">
     <form action="insert1.php" method="post" class="form-horizontal">
     <input type="text" name="text" id="text" readonly="" placeholder="Name Preview" class="form-control">
   </form>
   <div style="border-radius: 5px;padding:5px;background:#fff; width: 115%;" id="divvideo">


   <table class="table table-bordered">
          <thead>
                <tr>
                    <td>Id</td>
                     <td>Name</td>
                     <td>TIMEIN</td>
                     <td>TIMEOUT</td>
                     <td>STATUS</td>
                </tr>
          </thead>

            <tbody>
              <?php
              $server = "localhost";
              $username="root";
              $password="";
              $db_name="qr code database";

              $conn = new mysqli($server,$username,$password,$db_name);

              if($conn->connect_error){
                  die("Connection failed" .$conn->connect_error);
              }
              $sql = "SELECT Id,Name,TIMEIN FROM table_attendance WHERE DATE(TIMEIN)=CURDATE()";
              $query = $conn->query($sql);
              while ($row = $query -> fetch_assoc()){
              ?>
                  <tr>
                      <td><?php echo $row['Id'];?></td>
                      <td><?php echo $row['Name'];?></td>
                      <td><?php echo $row['TIMEIN'];?></td>
                      <td><?php echo $row['TIMEOUT'];?></td>
                      <td><?php echo $row['STATUS'];?></td>
                  </tr>

              <?php
              }
              ?>


            </tbody>


</table>
</div>
   </div>
</div>
 </div>


 <script type="text/javascript">
 let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
     scanner.addListener('scan', function (c) {
       document.getElementById("text").value = c;
       document.forms[0].submit();
     });
 Instascan.Camera.getCameras().then(function (cameras) {
 if (cameras.length > 0) {
   scanner.start(cameras[0]);
 } else {
   console.error('No cameras found.');
 }
 }).catch(function (e) {
 console.error(e);
 });
</script>

</body>
</html>
