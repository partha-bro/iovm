<?php
include 'db_access.php';

if (!empty($_POST["m_submit"])){
	if (!empty($_POST["m_com_name"]) && !empty($_POST["m_first_name"]) && !empty($_POST["m_last_name"])){
		if (!empty($_POST["m_emailid"]) && !empty($_POST["m_number"])){
			$com_name = $_POST["m_com_name"];
			$first = $_POST["m_first_name"];
			$last = $_POST["m_last_name"];
			$mail = $_POST["m_emailid"];
			$number = $_POST["m_number"];
			$message = $_POST["m_message"];
			for ($i=1;$i<=4;$i++){
				if (!empty($_POST["checkbox_".$i])){
					$var[] = $_POST["checkbox_".$i];
				}
			}
			$k = count($var);
			for ($j=0;$j<$k;$j++){
				$service .= $var[$j] . ",";
			}
			$service=rtrim($service,", ");
			$sql = "INSERT INTO table2 (company_name, first_name, last_name, email, ph_number, services, message)
			VALUES ('$com_name', '$first', '$last' ,'$mail', '$number', '$service', '$message')";

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
			echo '<script> alert("Number and mail is required."); </script> ';
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
