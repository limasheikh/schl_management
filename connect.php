<?php
	@$fullName = $_POST['fullName'];
	@$fatherName = $_POST['fatherName'];
	@$motherName = $_POST['motherName'];
	@$gender =$_POST['gender'];
	@$address = $_POST['address'];
	@$email = $_POST['email'];
	@$password = $_POST['password'];
	@$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','school');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into lima(fullName,fatherName, motherName, gender, address, email, password, number) values(?, ?, ?, ?, ?, ?,?,?)");
		$stmt->bind_param("ssssssss", $fullName, $fatherName, $motherName, $gender, $address , $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Admissionform successfully...";
		$stmt->close();
		$conn->close();
	}
?>