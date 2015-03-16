<?php
$db = array (
	'host' => 'localhost',    	// Database server
	'login' => 'root',        	// Database user
	'password' => '123456',		  	// Password of database user
	'database' => 'jvbboard'  		// Database name
);

$conn = mysqli_connect($db['host'],$db['login'],$db['password'], $db['database']) 
or die("Error " . mysqli_error($link)); 

$qry = 'INSERT INTO `message_tbl` select uuid() as message_id , user_id, message, 3 as type, now() as create_time, now() as update_time from daily_message_tbl where daily_message_tbl.type=3' or die("Error in the consult.." . mysqli_error($conn)); 
echo $qry , '<br>';
$res = $conn->query($qry); 

if($res){	
	$qry = 'TRUNCATE TABLE daily_message_tbl';
	$res = $conn->query($qry); 
	if($res){
		echo 'FINISH <br>';
	}else{
		echo 'ERROR DELETE <br>';
	}
}else{
	echo 'ERROR INSERT <br>';
}
