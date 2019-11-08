<?php
session_start();
$conn = mysqli_connect("localhost", "root", "");
$db = md5(mysqli_select_db($conn, "stock"));
/*
* 1 = Admin
* 2 = User
* 3 = Boss
*/
$email=$_POST['email'];
$password=MD5($_POST['password']);

$sqlmail = "select * from user_tbl where email = '$email'";
$querymail = mysqli_query($conn, $sqlmail) or die(mysqli_error());
$rowsmail = mysqli_num_rows($querymail);
	
 if($rowsmail<=0)
 {
	echo"<script>alert('Email ไม่ถูกต้อง');
	history.back();
	</script>";
	exit();
 }
 else {
    $sql = mysqli_query($conn, "SELECT * FROM user_tbl WHERE password='$password' AND email='$email'");
    $num = mysqli_num_rows($sql);
    if($num <= 0){
        echo"<script>alert('password ไม่ถูกต้อง');
	    history.back();
	    </script>";
	    exit();
    } else {
        while ($user = mysqli_fetch_array($sql)) {
            // Admin case
            if($user['status'] == 1){
                $_SESSION['id'] = session_id();
                $_SESSION['us_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['status'] = 1;
                header("Location: ../index.php");
            // User case
            } else {
                $_SESSION['id'] = session_id();
                $_SESSION['us_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['status'] = 2;
                header("Location: ../index.php");
            }
        }
    }
}

?>