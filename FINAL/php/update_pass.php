<?php


include "connect.php";
$data = json_decode(file_get_contents("php://input"));

session_start();
	
if(count($data) > 0){

	$passHash = password_hash($data->password, PASSWORD_DEFAULT);
     $mypassword = mysqli_real_escape_string($connect, $passHash); 
	$sql = "UPDATE `users` SET password = '$mypassword' WHERE idusers = '$data->user_id'";
		if(mysqli_query($connect, $sql)){
			$return  = "Success";
			echo $return;
		}
	else{
		 echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
}

	
?>