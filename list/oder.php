
<?php
session_start();
unset($_SESSION['shopping_cart']);

if($_SESSION['id'] == ''){
	header("Location: ../index.php");
  } else if($_SESSION['status'] == 1){
	include 'header_list_admin.php';
  } else if($_SESSION['status'] == 2){
	include 'header_list_user.php';
  }
  else{
	header("Location: ../index.php");
  }
?>


<div style="padding: 100px 0 0 0;"></div>

<?php

include('connection.php'); 

$query = "SELECT * FROM bill" or die("Error:" . mysqli_error()); 
$result = mysqli_query($con, $query); 
$result1 = mysqli_query($con, $query); 

if(isset($_GET['b_id']))
  {
        $update = "UPDATE bill SET status='1' WHERE id=". $_GET['b_id'];
        $up = mysqli_query($con, $update);
?>
        <script>
        window.location="oder.php";
        </script>
<?php
  }

if($_SESSION['status'] == '1'){
  ?>
  <div style="padding: 0 100px 0 100px">
  <table class="table table-borderless table-dark" style="background: #282828;">
  <thead>
    <tr style="text-align : center;">
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ชื่อผู้รับ</th>
      <th scope="col">ที่อยู่</th>
      <th scope="col">เบอร์</th>
      <th scope="col">วันที่สั่งสินค้า</th>
      <th scope="col">สถานะจัดส่ง</th>
    </tr>
  </thead>
  <?php
while($row = mysqli_fetch_array($result)) { 
		if($row['status'] == '0')
		{
      $b_id = $row['id'];
			$pname = $row['product'];
			$uname = $row['user'];
			$address = $row['address'];
			$phone = $row['phone'];
			$stock = $row['stock'];
			$price = $row['price'];
			$total = $row['total'];
			$status = $row['status'];
      $date = $row['date'];
      $status = $row['status'];

      ?>

  
  <tbody>
    <tr>
      <th scope="row" style="word-break: break-word; list-style-type: none; text-align : center;"><li><?php echo $pname?></li></th>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
         <?php echo $stock?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $uname?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $address?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $phone?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $date?>
      </li></td>

<td style="word-break: break-word; list-style-type: none;"><li>
<a href='oder.php?b_id=<?php echo $b_id?>' class='btn btn-danger btn-xs' style="padding: 7px 40px text-align : center;">จัดส่ง</a>
      </li></td>

    </tr>

  </tbody>
  

  <?php
    }
  }
  ?>
  <div style="padding: 0 100px 0 100px">
  <table class="table table-borderless table-dark" style="background: #282828;">
  <thead>
    <tr style="text-align : center;">
      <th scope="col" >ชื่อสินค้า</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ชื่อผู้รับ</th>
      <th scope="col">ที่อยู่</th> 
      <th scope="col">เบอร์</th>
      <th scope="col">วันที่สั่งสินค้า</th>
      <th scope="col">สถานะจัดส่ง</th>
    </tr>
  </thead>
  <?php
  
	while($row = mysqli_fetch_array($result1)) { 
		if($row['status'] == '1')
		{
			$pname = $row['product'];
			$uname = $row['user'];
			$address = $row['address'];
			$phone = $row['phone'];
			$stock = $row['stock'];
			$price = $row['price'];
			$total = $row['total'];
			$status = $row['status'];
      $date = $row['date'];
      $status = $row['status'];

      show_am($pname,$stock,$uname,$address,$phone,$date,$status);
    }
  }
}
else{
  ?>
  <div style="padding: 0 100px 0 100px">
  <table class="table table-borderless table-dark" style="background: #282828;">
  <thead>
    <tr style="text-align : center;">
      <th scope="col" style="padding: 5px 100px;">ชื่อสินค้า</th>
      <th scope="col" style="padding: 5px 1px;">จำนวน</th>
      <th scope="col" style="padding: 5px 9px;">ราคา/ชิ้น</th>
      <th scope="col" style="padding: 5px 100px;">ราคารวม</th>
      <th scope="col" style="padding: 5px 1px;">วันที่สั่งสินค้า</th>
      <th scope="col" style="padding: 5px 1px;">สถานะจัดส่ง</th>
    </tr>
  </thead>
  <?php
  while($row = mysqli_fetch_array($result)) { 
      if($row['status'] == '0')
      {
        $pname = $row['product'];
        $uname = $row['user'];
        $address = $row['address'];
        $phone = $row['phone'];
        $stock = $row['stock'];
        $price = $row['price'];
        $total = $row['total'];
        $status = $row['status'];
        $date = $row['date'];
        $status = $row['status'];
  
        show_us($pname,$stock,$uname,$address,$phone,$date,$status);
      }
    }
    ?>
  <div style="padding: 0 100px 0 100px">
  <table class="table table-borderless table-dark" style="background: #282828;">
  <thead>
    <tr style="text-align : center;">
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคา/ชิ้น</th>
      <th scope="col">ราคารวม</th>
      <th scope="col">วันที่สั่งสินค้า</th>
      <th scope="col">สถานะจัดส่ง</th>
    </tr>
  </thead>
  <?php
    while($row = mysqli_fetch_array($result1)) { 
      if($row['status'] == '1')
      {
        $pname = $row['product'];
        $uname = $row['user'];
        $address = $row['address'];
        $phone = $row['phone'];
        $stock = $row['stock'];
        $price = $row['price'];
        $total = $row['total'];
        $status = $row['status'];
        $date = $row['date'];
        $status = $row['status'];
  
        show_us($pname,$stock,$uname,$address,$phone,$date,$status);
      }
    }
  }



function show_am($pname,$stock,$uname,$address,$phone,$date,$status){
  ?>

  
  <tbody>
    <tr>
      <th scope="row" style="word-break: break-word; list-style-type: none; text-align : center;"><li><?php echo $pname?></li></th>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
         <?php echo $stock?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $uname?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none;text-align : center;"><li>
	  <?php echo $address?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none;text-align : center;"><li>
	  <?php echo $phone?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $date?>
      </li></td>
<?php
if($status == '0')
{
?>
<td style="word-break: break-word; list-style-type: none;"><li>
<a href='oder.php?b_id=<?php echo $b_id?>' class='btn btn-danger btn-xs' style="padding: 7px 40px text-align : center;">จัดส่ง</a>
      </li></td>
<?php
}
else
{
  ?>
  <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  จัดส่งแล้ว
      </li></td>
  <?php
}
?>
    </tr>

  </tbody>

  <?php
}

function show_us($pname,$stock,$uname,$address,$phone,$date,$status){
  ?>


  <tbody>
    <tr>
      <th scope="row" style="word-break: break-word; list-style-type: none; text-align : center;"><li><?php echo $pname?></li></th>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
         <?php echo $stock?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $uname?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $address?>
      </li></td>
      <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  <?php echo $date?>
      </li></td>
<?php
if($status == '1')
{
?>
    <td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
	  จัดส่งแล้ว
      </li></td>
      <?php
}
else
{
?>
<td style="word-break: break-word; list-style-type: none; text-align : center;"><li>
    รอการจัดส่ง
      </li></td>
<?php
}
?>
    </tr>

  </tbody>


  <?php
}

?>
</table>
</div>
</div>



<?php

if($_SESSION['id'] == ''){
	header("Location: ../index.php");
  } else if($_SESSION['status'] == 1){
	include 'header_list_admin.php';
  } else if($_SESSION['status'] == 2){
	include 'header_list_user.php';
  }
  else{
	header("Location: ../index.php");
  }
  ?>