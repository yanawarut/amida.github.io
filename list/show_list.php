
<?php
session_start();
include 'header_list_user.php';
?>

<div style="padding:50px "></div>
<div class="container" style="padding: 1px 0 0 0;">
<?php


if($_SESSION['id'] == ''){
    echo "<meta http-equiv='refresh' connect='1;URL=../index.php'>";
} elseif($_SESSION['status'] != 2){
    echo "<meta http-equiv='refresh' connect='1;URL=../login/logout.php'>";
} else {
    echo "<meta http-equiv='refresh' connect='1;URL=../index.php'>";
}

include 'connection.php';

$sql_list_out = "SELECT * FROM list" or die("Error:" . mysqli_error());
$result_list_out = mysqli_query($con,$sql_list_out);

$sql_pd = "SELECT * FROM product_tbl" or die("Error:" . mysqli_error());
$result_pd = mysqli_query($con,$sql_pd);

$sql_us = "SELECT * FROM user_tbl" or die("Error:" . mysqli_error()); 
$result_us = mysqli_query($con, $sql_us); 

  $pd_id = $_REQUEST['pd_id']; 
  $act = $_REQUEST['act'];
  
  $submit1 = $_POST['submit1'];
  $submit2 = $_POST['submit2'];
  $phone = $_POST['phone'];

  $u_id = $_SESSION['us_id'];

  while($row_us = mysqli_fetch_array($result_us)){
    if($_SESSION['us_id'] == $row_us['id']){
        $firstname = $row_us['firstname'];
        $lastname = $row_us['lastname'];
        $user = $firstname.'  '.$lastname;
        $address = $row_us['address'];
        $phone = $row_us['phone'];
        
    }
}

	if($act=='add' && !empty($pd_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$pd_id]))
		{
			$_SESSION['shopping_cart'][$pd_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$pd_id]=1;
		}
	}

	if($act=='remove' && !empty($pd_id))
	{
		unset($_SESSION['shopping_cart'][$pd_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $pd_id=>$amount)
		{
			$_SESSION['shopping_cart'][$pd_id]=$amount;
		}
    }
    
    
if(!empty($_SESSION['shopping_cart']))
{
include 'connection.php';
	foreach($_SESSION['shopping_cart'] as $pd_id=>$p_qty)
	{
		$sql = "SELECT * FROM product_tbl WHERE id = $pd_id";
		$query = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($query))
		{
        
            $type = $row['type'];
            $img = $row['img'];
            $name = $row['name'];
            $inf = $row['inf'];
            $price = $row['price'];

            $sum = $price * $p_qty;
            $total += $sum;
            $ea += $p_qty;

            $list += 1;
            $bill_price[$list] = $price;
            $bill_pd[$list] = $name;
            $bill_ea[$list] = $p_qty;
            $bill_sum[$list] = $sum;

?>
<form method="post" action="?act=update">

<ul class="list-group list-group-flush" >
  <li class="list-group-item"style="background: #282828">
  <div class="row ">
    <div class="col-md-3">
    <a href="../stock/show_details.php?showid=<?php echo $pd_id?>">
      <img src="../stock/image/<?php echo $type ?>/<?php echo $img ?>" class="rounded float-left" style="max-width: 200px">
    </a>
    </div>
    <div class="col-md-5 ">
      <div class="card-body">
        <h5 class="card-title" style="color: #ddd;"><?php echo $name ?></h5>
        <p class="card-text" style="color: #ddd;max-width: 350px; max-height: 100px; overflow: hidden;"><?php echo $inf ?>  </p>
      </div>  
      </div>
    <div class="col-md-2 ">
    	<div style="padding: 10px 0 0 0">
		<label class="form-check-label" style="color: #ddd; padding: 50px 0 30px 0;font-size : 20px;">฿ <?php echo number_format($price,2)?> /ชิ้น</label>
		<input class="col-6" type='number' id='count' name='amount[<?php echo $pd_id ?>]' value='<?php echo $p_qty ?>' size='1' style="background: #c7c7c7; color: black;"></td>
    </div>
    </div>
    <div class="col-md-2 ">
    	<div style="padding: 0px 0 0 50px">
        <a href='show_list.php?pd_id=<?php echo $pd_id?>&act=remove' class='btn btn-danger btn-xs' style="padding: 7px 40px">ลบ</a>
    </div>
    <div class="col-md-2 ">
    	<div style="padding: 0px 0 0 0px">
		<label class="form-check-label" style="color:#ddd; black; padding: 90px 0 0px 0px; font-size : 25px;"> <?php echo number_format($sum,2)?> </label>
    </div>
    </div>

</div>
</li>
<div style="padding:2px "></div>


<?php

        }
    }
}
if($submit1 == 'submit1')
{
  $address = $_POST['address'];
  $phone = $_POST['phone'];
}
?>


<!-- ส่วนของรวมรายการ-->

  <li class="list-group-item" style="background: #303030">
  	<div class="row ">
  	<div class="col-md-6 ">
    	<div style="padding: 0px 0 0 35">
    <label class="form-check-label" style="color: #ddd; padding: 00px 0 0px 10px;">ที่อยู่</label>
    <textarea type="text" class="form-control-lg col-lg-12" style="height: 75px; background: #757575; color: black;" name="address" id="address"><?php echo $address?></textarea>
    <label class="form-check-label" style="color: #ddd; padding: 00px 0 0px 10px;">เบอร์โทรศัพท์</label>
    <textarea type="number" class="form-control-lg col-lg-12 " style="height: 35px; background: #757575; color: black; padding:3px 50px 15px 17px;" name="phone" id="phone"><?php echo $phone?></textarea>
    </div>
    </div>


    <ul class="list-group list-group-flush">
    <div style="padding:10px"></div>
    <li style="list-style-type:none;">
      <label class="form-check-label" style="color: #ddd; padding: 00px 0 0px 135px;">สินค้ารวม</label>
      <label class="form-check-label" style="color: #ddd; padding: 00px 0 0px 122px;"> <?php echo $list ?></label>
      <label class="form-check-label" style="color: #ddd; padding: 00px 24px 0px 0px; float: right;">รายการ</label>
    </li>
    <div style="padding:8px "></div>

    <li style="list-style-type:none;">
      <label class="form-check-label" style="color: #ddd; padding: 00px 0 0px 135px;">จำนวนรวม</label>
      <label class="form-check-label" style="color: #ddd; padding: 00px 0 0px 115px;"><?php echo $ea ?></label>
      <label class="form-check-label" style="color: #ddd; padding: 00px 24px 0px 0px; float: right;">ชิ้น</label>
    </li>
    <div style="padding:8px "></div>

    <li style="list-style-type:none;">
      <label class="form-check-label" style="color: #ddd; padding: 00px 0 0px 137px;">ราคารวม</label>
      <label class="form-check-label" style="color: #ddd; padding: 00px 0 0px 100px;"><?php echo number_format($total,2) ?></label>
      <label class="form-check-label" style="color: #ddd; padding: 00px 24px 0px 0px; float: right;">บาท</label>
    </li>
    <div style="padding:8px"></div>
<?php
if($list >= 1){
?>
    <li style="list-style-type:none;">
      <div style="padding: 0 0 0 120px">
      <div class="row">
      <div class="col">
      <button type="submit" name="submit1" id="submit1" value="submit1" class="btn btn-warning" style="display: block; padding: 7px 75px;">บันทึก</button>
      </div>
      <div class="col">
      <button type="submit" name="submit2" id="submit2" value="submit2" class="btn btn-info" style="display: block; padding: 7px 75px;">สั่งซื้อ</button>
      </div>
      </div>
      </div>
    </li>
<?php
}

?>
    </ul>
   
    </div>
    </div>
    </div>

 
</li>
</ul>

<div style="padding:5px"></div>
</div>
</form>

<?php

if($submit2 == 'submit2'){
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  for($i=1;$i<=$list;$i++)
{
   
    $sql_list_in = "INSERT INTO bill (u_id,product,user,address,phone,stock,price,total,status) VALUES ('$u_id','$bill_pd[$i]','$user','$address','$phone','$bill_ea[$i]','$bill_price[$i]','$bill_sum[$i]','0')"; 
    $result_list_in = mysqli_query($con, $sql_list_in);
    
}
         
?>
<script>
window.location="ck_oder.php";
</script>
<?php
mysqli_close($con); 

}

include 'header_list_user.php';
?>