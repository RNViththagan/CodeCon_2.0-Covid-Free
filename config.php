<?php
$con = new mysqli("localhost","root",'',"Covid-Free");
if ($con->connect_error) {
	 die('Connection failed: '. $con->connect_error);
 }
else{
    echo "db connected";
}

?>