<?php
	$data = array();
	$conn = mysqli_connect("localhost", "root", "", "student");
	$sql = "SELECT * FROM attendance WHERE status = 'Present'";
	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			$data[] =  mysqli_num_rows($result);
		}
	}
	$query = "SELECT * FROM attendance WHERE status = 'Absent'";
	if($result = mysqli_query($conn, $query)){
		if(mysqli_num_rows($result) > 0){
			$data[] =  mysqli_num_rows($result);
		}
	}
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($data);
?>