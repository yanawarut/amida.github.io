
<?php

session_start();

include 'connection.php';

$sql = "SELECT * FROM product_tbl";
$result = mysqli_query($con,$sql);
$showid = $_GET['showid'];

?>
<body class="body">
<div class="container col-lg-6" style="padding: 0 0 0 100px"> 

    <?php
    while($row = $result->fetch_assoc()){
    if($row['id']==$showid){
    ?>
      <div class="row"> 
      	<div style="top:20px;
  					padding: 0px 0 0 0;
  					float: left;
  					color: #fff;
  					list-style-type:none;">
        <h1><?php echo $row['name']; ?></h1>
    	</div>
        <div style="padding: 0px 0 0 180px;
  					">
        <?php
        echo"<img src='image/".$row['type']."/".$row['img']."' class='rounded mx-auto d-block' style='width: 700px; height: 700px;'>"
        ?>
      </div>
      </div>
      </div>
        

        <div style="padding: 0 400px 0 680px">
      <table class="table table-striped table-dark "  >
  <thead>
    <tr>
      <th scope="col  " colspan="1"  style="text-align : center;">Specification</th>
      <th scope="col"></th>
    </tr>

  </thead>
  <tbody>
    <tr>
      <th scope="row "colspan="1" style="text-align : center; "><br>Detail</th>
      <td  style="word-break: break-word; list-style-type: none;">
        <br>
        <li><?php echo $row['name']; ?></li>
        <br>
        <li><?php echo $row['inf']; ?></li>
        <br>
      </td>
    </tr>

    <tr>
        <th scope="row "colspan="1" style="text-align : center;"><br>จำนวนสินค้า</th>
        <td  style="word-break: break-word; list-style-type: none;">
          <br>
        <li><?php echo $row['stock']; ?></li>
        <br>
      </td>
    </tr>

    <tr>
        <th scope="row "colspan="1" style="text-align : center;"><br>ราคา</th>
        <td  style="word-break: break-word; list-style-type: none;">
        <br>
        <li><?php echo $row['price']; ?></li>
        <br>
      </td>
    </tr>
    
  </tbody>
</table>
</div>


<?php
if($_SESSION['id'] == ''){
  include 'header.php';
} else if($_SESSION['status'] == 1){
  include 'header_admin.php';
?>
  <div class="row" style="padding: 20 0 150 335px">
      <div style="padding: 0 260px"></div>
      <a href="edit_details.php?edit_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="padding: 7px 34px">แก้ไข</a>
      <div style="padding: 0 100px"></div>
      <div style="padding: 0 50px">
      <a href="edit_details.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="padding: 7px 50px">ลบ</a>
    </div>
    </div>
<?php
} else if($_SESSION['status'] == 2){
  include 'header_user.php';
  ?>
   <div class="row" style="padding: 0 0 100 400px">
      <div style="padding: 0 310px"></div>
      <a type="submit" href="../list/show_list.php?pd_id=<?php echo $row['id'];?>&act=add" alt="edit_details.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" >เพิ่มใส่ตะกร้า</a>
      </div>
      </div>
<?php
}
else{
  include 'header.php';
}
?>

    <?php
      }
    }
    ?>

  </div>
  </body>

