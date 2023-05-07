<?php

       $temp_s1 =  $_GET['u1'];
	   $temp_s2 =  $_GET['u2'];
	    $temp_s3 =  $_GET['u3'];
	    $temp_s4 =  $_GET['u4'];
	    $temp_s5 =  $_GET['u5'];
        $dbhost = 'localhost';                // db host
	   $dbuser = 'id20551940_iot';            // my sql user name
	   $dbpass = 'Z>DT^2$fdCzj/)3p';            // db password
	   $dbname = "id20551940_project";
	   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	   
	   if(! $conn )
	    {
		  die('<br>Could not connect: <br>' . mysqli_connect_error());
	    }
	   //echo '<br>Database Connected successfully</br>';
	    date_default_timezone_set("Asia/kolkata"); 
	   $d1=date("Y-m-d h:i:s");
	         $sql = "INSERT INTO irri (u1,u2,u3,u4,u5,time)   VALUES ('$temp_s1', '$temp_s2','$temp_s3','$temp_s4','$temp_s5','$d1')";
			
			          if ($conn->query($sql) === TRUE) 
			          {
			                  $last_id = $conn->insert_id;
			                  echo "New record created successfully. Last inserted ID is: " . $last_id;
				}
				 else 
				 
				 {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				 }
				
			
	        
				$conn->close();
				
   
   
 ?>
 
 
 
</body>
</html>