<!DOCTYPE html>
<html>
<head>
 <title>Databse Records</title>
 <style>
 body {
  border: 10px solid black;
  border-radius: 50px;
}
 .button {
    
    
   
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: yellow; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}



 h1
 {
 color:red;
 }
 body
 {
 background-color:green;
 }
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: center;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
<center><h1> Smart Agriculture Database</h1></center>
 <table>
 <tr>
  <th>Id</th> 
   <th>TEMPERATURE </th> 
   <th>HUMIDITY</th>
   <th>SOIL MOISTURE (%)</th>
   <th>RAIN(%)</th>
   <th>PIR</th>
   <th> DATE AND TIME </th>
 </tr>
 <?php

         $dbhost = 'localhost';                // db host
	   $dbuser = 'id20551940_iot';            // my sql user name
	   $dbpass = 'Z>DT^2$fdCzj/)3p';            // db password
	   $dbname = "id20551940_project";
	   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT id,u1,u2,u3,u4,u5,time FROM irri";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) 
   {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["u1"] . "</td><td>" . $row["u2"]. "</td> <td>" . $row["u3"]. "</td> <td>" . $row["u4"]. "</td><td>" . $row["u5"]. "</td><td>" . $row["time"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<center> <div class="form-group">
        <button onclick="Export()" class="btn btn-primary">Export to CSV File</button>
    </div>
    <!--  /Content   -->

    <script>
        function Export()
        {
            var conf = confirm("Export users to CSV?");
            if(conf == true)
            {
                window.open("backup.php", '_blank');
            }
        }
    </script> </center>
<!--<center><a href="index.php"><button class="button button1">EXIT</button></a></center>-->
</body>
</html>