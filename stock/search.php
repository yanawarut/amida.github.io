<?php
include 'connection.php';

$query = "SELECT * FROM product_tbl" or die("Error:" . mysqli_error()); 
$result = mysqli_query($con, $query); 

$text = $_POST['text'];

while($row = $result->fetch_assoc()){
if($row['name'] == $text){
    $text = $row['id'];
    header("location: ../stock/show_details.php?showid=$text");
    mysqli_close($con);
} 
}
    echo"<script>alert('ไม่พบข้อมูลที่ท่านค้นหา');
		history.back();
		</script>";
	    exit();
mysqli_close($con);
?>