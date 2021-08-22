<?php
require 'config.php';
if(isset($_POST['Vaccination'])){
    
    $sql="SELECT email FROM vaccination_request "
		." WHERE email='".$_POST['email']."'";
	if(!$result = $con->query($sql))
		{
			echo $con->error;       
		}
	$wishid=$result->fetch_assoc();	
	if(!$result->num_rows)
	{
		$check ="SELECT ID FROM vaccination_request "
			." ORDER BY ID ASC";
		$result=$con->query($check);
        if($result->num_rows)
        {
            $lastid=null;
            while($row = $result->fetch_assoc()) 
            {
                $lastid = $row['ID'];
            }
            $newIDno = substr($lastid, 4)+1;
            $newIDno=str_pad($newIDno, 4, '0', STR_PAD_LEFT);
            $newID=substr($lastid, 0,2 ).$newIDno;
        }
        else{
            $newID="VC0001";
        }
        echo $newID."<br>";
		$sql="INSERT INTO vaccination_request (ID, email, first_name, last_name, phone, city, address) VALUES ('".$newID."', '".$_POST['email']."', '".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['phone']."', '".$_POST['city']."', '".$_POST['address']."')";
		if(!$result = $con->query($sql))
		{
			echo $con->error;       
		}
		else{
			echo "<script>alert('your details entered!!')</script>";
		}

	}
    else{
        echo "<script>alert('Email already entered!!');
        document.location = 'Vaccination-Request.html'</script>";
    }
    echo "<script>document.location = 'Covid-Free.html'</script>";
}

else if(isset($_POST['Need-Help'])){
    echo $_POST['first_name']."<br>";
    echo $_POST['last_name']."<br>";
    echo $_POST['email']."<br>";
    echo $_POST['phone']."<br>";
    echo $_POST['city']."<br>";
    echo $_POST['address']."<br>";
    echo $_POST['N_things']."<br>";
    $sql="SELECT email FROM need_help "
		." WHERE email='".$_POST['email']."'";
    echo $sql."<br>";
	if(!$result = $con->query($sql))
		{
			echo $con->error;       
		}
	$wishid=$result->fetch_assoc();	
    print_r($wishid);
	if(!$result->num_rows)
	{
		$check ="SELECT ID FROM need_help "
			." ORDER BY ID ASC";
		$result=$con->query($check);
        if($result->num_rows)
        {
            $lastid=null;
            while($row = $result->fetch_assoc()) 
            {
                $lastid = $row['ID'];
            }
            echo $lastid."<br>";
            $newIDno = substr($lastid, 4)+1;
            echo $newIDno."<br>";
            $newIDno=str_pad($newIDno, 4, '0', STR_PAD_LEFT);
            echo $newIDno."<br>";
            $newID=substr($lastid, 0,2 ).$newIDno;
        }
        else{
            $newID="NH0001";
        }
        echo $newID."<br>";
		$sql="INSERT INTO need_help (ID, email, first_name, last_name, phone, city, address,N_things) VALUES ('".$newID."', '".$_POST['email']."', '".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['phone']."', '".$_POST['city']."', '".$_POST['address']."', '".$_POST['N_things']."')";
        echo $sql."<br>";
		if(!$result = $con->query($sql))
		{
			echo $con->error;       
		}
		else{
			echo "<script>alert('your details entered!!')</script>";
		}

	}
    else{
        echo "<script>alert('Email already entered!!');
        document.location = 'Vaccination-Request.html'</script>";
    }
    echo "<script>document.location = 'Covid-Free.html'</script>";
    
}
else{
    echo "<script>document.location = 'Covid-Free.html'</script>";
}



?>