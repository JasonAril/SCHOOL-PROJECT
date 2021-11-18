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
  line-height: 90px;
  text-transform: uppercase;
}
</style>





</head>
<body>
<body background="media/greeny.png">

<header>
  <nav>
    <img src="media/LOGO small.png" style="width:600px; height:150px;">
    <ul>
<li><a href="">Home</a></li>
<li><a href="">About</a></li>
</ul>
</nav>
</header>


<div class="container">
  <div class='row'>
    <div class ="col-md-12">
      <table>
      <tr height="40px">
      </tr>
    </table>
    </div>


    <div class="col-md-5" style="padding:5px;border-radius: 6px;" id="divvideo">

     <video id="preview" width="100%" height="60%" style="border-radius:1px;"></video>
     <center><p style="color:yellow;font-size:160%;font-family:Arial Black;border:1px; border-style:solid; border-color:#yellow; padding: 10px;box-shadow: 0 0 10px rgba(255,255,0,0.8);">SCAN QR CODE</p></center>
   </div>
   <div class='column'>
     <div class ="col-md-1">
     </div>
   </div>


   <div class="col-md-7">
     <form action="insert1.php" method="post" class="form-horizontal">

     <input type="text" name="text" id="text" readonly="" placeholder="Name Preview" class="form-control">

   </form>


   <div class='row'>
     <div class ="col-md-7">
       <table>
       <tr height="10px">
       </tr>
     </table>
     </div>
   </div>



   <div style="border-radius: 5px;padding:5px;background:#fff; width: 115%;height: 400px;overflow: scroll;">
   <table class="table-bordered table-striped table-condensed table-fixed ">

          <thead style="position: sticky;top: 0;background: white;">
                <tr>
                     <td>#</td>
                     <td>Name</td>
                     <td>TIMEIN</td>
                     <td>TIMEOUT</td>
                      <td>LOGDATE</td>
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
              $sql = "SELECT Id,Name,TIMEIN,TIMEOUT,LOGDATE,STATUS FROM table_attendance";
              $query = $conn->query($sql);
              while ($row = $query -> fetch_assoc()){
              ?>
                  <tr>
                      <td><?php echo $row['Id'];?></td>
                      <td><?php echo $row['Name'];?></td>
                      <td><?php echo $row['TIMEIN'];?></td>
                      <td><?php echo $row['TIMEOUT'];?></td>
                      <td><?php echo $row['LOGDATE'];?></td>
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
<button type="submit" class="btn btn-success pull-right" onclick="Export()">
   <i class="fa fa-file-excel-o fa-fw"></i> Export to excel
 </button>
 </div>

 <script>
 function Export()
 {
var conf = confirm("Please confirm if you wish to export the attendance in to Excel File");
if (conf ==true)
{
  window.open("export.php",'_blank');
}

 }
 </script>

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
