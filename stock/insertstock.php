
<meta charset="UTF-8">
<?php

include('connection.php');  

$names = $_REQUEST['name'];
$inf = $_REQUEST['inf'];
$numstk = $_REQUEST['numstk'];
$img = $_REQUEST['img'];
$types = $_REQUEST['type'];
$price = $_REQUEST['price'];

$pos = "";

if($types == 'mainboard')
{
    $pos="image/mainboard/";
}
else if($types == 'cpu')
{
    $pos="image/cpu/";
}
else if($types == 'graphic')
{
    $pos="image/graphic/";
}
else if($types == 'memory')
{
    $pos="image/memory/";
}
else if($types == 'mouse')
{
    $pos="image/mouse/";
}
else if($types == 'keyboard')
{
    $pos="image/keyboard/";
}
else if($types == 'allaccessories')
{
    $pos="image/allaccessories/";
}
else
{
    echo"<script>alert('อัพโหลดไม่สำเร็จ');
		history.back();
		</script>";
		exit();
}

date_default_timezone_set('Asia/Bangkok'); //ฟังก์ชั่นวันที่
$date = date("Ymd");	

$numrand = (mt_rand()); //ฟังก์ชั่นสุ่มตัวเลข

$upload=$_FILES['img']; //เพิ่มไฟล์
if($upload <> '') {   //not select file

$path=$pos;  //โฟลเดอร์ที่จะ upload file เข้าไป 

 $type = strrchr($_FILES['img']['name'],"."); //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
	
$newname = $date.$numrand.$type; //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
$path_copy=$path.$newname;
$path_link=$pos.$newname;

move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);  	//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์

}
    
$sql = "INSERT INTO product_tbl (type,name,inf,img,stock,price) VALUES ('$types','$names','$inf','$newname','$numstk',$price)";                // เพิ่มไฟล์เข้าไปในตาราง 

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con);

header("Location: ../index.php");
	
?>