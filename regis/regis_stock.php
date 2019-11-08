<!--
Here, we write code for registration.
-->
<?php
$conn = mysqli_connect("localhost","root","","stock");

if(!$conn)
{
	echo "Database connection faild...";
} 
else
{
	$firstname = $lastname = $gender = $email = $password = $pwd = $adress = $phone = '';
	$status = '2';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
    $pwd = $_POST['password'];
	$confirm = $_POST['confirm'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$password = MD5($pwd);

	$sqlmail = "select * from user_tbl where email = '$email'";
	$querymail = mysqli_query($conn, $sqlmail) or die(mysqli_error());
	$rowsmail = mysqli_num_rows($querymail);
	
	if($rowsmail>0)
	{
		echo"<script>alert('Email นี้ได้ถูกใช้งานไปแล้ว');
		history.back();
		</script>";
		exit();
	}
	else if($pwd != $confirm)
	{
		echo"<script>alert('กรุณากรอก password ให้ตรงกัน');
		history.back();
		</script>";
		exit();
	}
	else
	{
		$sql = "INSERT INTO user_tbl (firstname,lastname,gender,email,password,address,phone,status) VALUES ('$firstname','$lastname','$gender','$email','$password','$address','$phone','$status')";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			header("Location: ../index.php");
		} 
		else
		{
			echo "Error :".$sql;
		}
	}
}
?>