<?php
include 'db_access.php';

if (!empty($_POST["p_submit"])){
	if (!empty($_POST["p_com_name"]) && !empty($_POST["p_first_name"]) && !empty($_POST["p_last_name"])){
		if (!empty($_POST["p_mail_id"]) && !empty($_POST["p_number"]) && !empty($_POST["p_fleet_size"])){
			$com_name = $_POST["p_com_name"];
			$first = $_POST["p_first_name"];
			$last = $_POST["p_last_name"];
			$mail = $_POST["p_mail_id"];
			$number = $_POST["p_number"];
			$fleet = $_POST["p_fleet_size"];
			$date = $_POST["p_date"];
			$time = $_POST["p_time"];
			$st_address = $_POST["p_starting_address"];
			$st_pincode = $_POST["p_starting_pincode"];
			$end_address = $_POST["p_ending_address"];
			$end_pincode = $_POST["p_ending_pincode"];
			$message = $_POST["p_message"];
			
			$sql = "INSERT INTO pickup (company_name, first_name, last_name, email, ph_number, fleet_size, date, time, st_address, st_pincode, end_address, end_pincode, message)
			VALUES ('$com_name', '$first', '$last' ,'$mail', '$number', '$fleet', '$date', '$time', '$st_address', '$st_pincode', '$end_address', '$end_pincode', '$message')";

			if ($conn->query($sql) === TRUE) {
				echo '<script> alert("Data successfully created. Call as soon as possible."); </script> ';
				echo '<script> window.location="index.php"; </script> ';
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				echo '<script> alert("Error: Record is not created."); </script> ';
				echo '<script> window.location="index.php"; </script> ';
			}
			
			$conn->close();
		} else {
			echo '<script> alert("mail, number and fleet size is required."); </script> ';
			echo "<script> window.location='index.php'; </script>";
		}
	} else {
		echo '<script> alert("Company name, First name and Last name is required."); </script> ';
		echo "<script> window.location='index.php'; </script>";
	}
} else {
	echo '<script> alert("There is no input by user."); </script> ';
	echo "<script> window.location='index.php'; </script>";
}

?>
