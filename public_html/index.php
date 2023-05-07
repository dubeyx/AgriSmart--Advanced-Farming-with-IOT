<?php 

			
	   $dbhost = 'localhost';                // db host
	   $dbuser = 'id20551940_iot';            // my sql user name
	   $dbpass = 'Z>DT^2$fdCzj/)3p';            // db password
	   $dbname = "id20551940_project";
	   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
	/*	echo "Database Connection Successful ";		*/
	}
	
     $sql = "SELECT *  FROM irri WHERE id = (SELECT MAX(id) FROM irri)";
   $result = $conn->query($sql);
	

	
	
			
?>



<!DOCTYPE html>


<html>
	<head>
		<meta http-equiv="refresh" content="10">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<br>
		<h1 align="center" style="margin:0 auto;">Live Tracking Meters</h1>
		<br><br>
		 <style>
   
   body
   {  
     
  border: 10px solid red;
  border-radius: 50px;

   
    background-size: 50% 20%;
    background-repeat: no-repeat;
    background-position: center;
    margin-bottom: 100px;
    background-color:#e1e8f0;
  
    
   }
   
   .fcc-btn {
  background-color: #199319;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
  cursor: pointer;
  border: none;
}
  
h1 
{
    text-align: center;
color: RED;
}

h2
{
 text-align: center;
 padding-top: 100px;
color: Green;

}

h3 
{
    text-align: center;
color: Greean;
     

} 
p
{
 color:blueviolet;
}
}
</style>

	
	</head>

	<body>
	
		<div id="chart_div" style="width: 400px; height: 120px; align:center; padding-left:350px; margin:0;"></div>
		
		<title> Feched Parameters  </title>
		
		
	
		<?php
	
				if ($result->num_rows > 0)
         {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
        	
				
				 $temp_val = $row["u1"];
				 $humid_val = $row["u2"];
				 $moisture=$row["u3"];
				 $rain_val = $row["u4"];
				 echo  "<h2> PIR:                   {$row['u5']}</h2>   ";
				 
			
			}
         }
			
		?>
		<br>
		<br>
		<br>
<center><h3>Designed By:</h3>
<ol><li>Akhil Dubey - 2020UCO1673</li>
<li>Aman Kumar Jha - 2020UCO1674</li><li>Parneet Singh - 2020UCO1670</li></ol></center>	
<br>
<!--<center><a target="_blank" class="fcc-btn" href="display.php">Explore Database</a></center>-->
	</body>

</html>   

	
<script type="text/javascript">
	
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      
      var temp_val = '<?php echo $temp_val; ?>'; 
      var humid_val = '<?php echo $humid_val; ?>'; 
      var moisture_val= '<?php echo $moisture; ?>'; 
      var rain_val= '<?php echo $rain_val; ?>'; 
      
				 
      
      console.log(temp_val);
      console.log(humid_val);
      console.log(moisture_val);
      console.log(rain_val);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Temperature', parseInt(temp_val) ],
          ['Humidity', parseInt(humid_val) ],
          ['Moisture(%)', parseInt(moisture_val) ],
          ['Rain(%)', parseInt(rain_val) ],
        ]);

        var options = {
          width: 900, height: 320,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

	
        
      }

</script>

