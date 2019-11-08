<body class="body">
<?php
include 'link.php';
//Database Connection
include 'connection.php';
//Get ID from Database
$showid=$_GET['edit_id'];
if(isset($_GET['delete_id'])){
    $sql = "DELETE FROM product_tbl WHERE id =" .$_GET['delete_id'];
    if (mysqli_query($con, $sql)) {
      ?>
      <script>
      alert('่ลบเรียบร้อยแล้ว');
      window.location="../index.php";
      </script>
      <?php
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
    }

if(isset($_GET['edit_id'])){
$sql = "SELECT * FROM product_tbl WHERE id =" .$_GET['edit_id'];
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
}
//Update Information
if(isset($_POST['btn-update'])){
$name = $_POST['name'];
$inf = $_POST['inf'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$update = "UPDATE product_tbl SET name='$name',inf='$inf',stock='$stock',price='$price' WHERE id=". $_GET['edit_id'];
$up = mysqli_query($con, $update);

if(!isset($sql)){
die ("Error $sql" .mysqli_connect_error());
}
else
{
  ?>
  <script>
  alert('่แก้ไขเรียบร้อยแล้ว');
  window.location="show_details.php?showid=<?php echo $showid?>";
  </script>
  <?php
}
}
?>
<!--Create Edit form -->
<form method="post">
<div class="container col-lg-6" style="padding: 0 0 0 100px"> 
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
      <th scope="row "colspan="1" style="text-align : center;"><br>Detail</th>
      <td  style="word-break: break-word; list-style-type: none;">
        <br>
        <li><input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>"></li>
        <br>
        <li><input type="text" name="inf" placeholder="Infomation" value="<?php echo $row['inf']; ?>"></li>
        <br>
      </td>
    </tr>
        
    <tr>
        <th scope="row "colspan="1" style="text-align : center;"><br>จำนวนสินค้า</th>
        <td  style="word-break: break-word; list-style-type: none;">
          <br>
        <li><input type="text" name="stock" placeholder="Stock" value="<?php echo $row['stock']; ?>"></li>
        <br>
      </td>
    </tr>

    <tr>
        <th scope="row "colspan="1" style="text-align : center;"><br>ราคา</th>
        <td  style="word-break: break-word; list-style-type: none;">
        <br>
        <li><input type="text" name="price" placeholder="Price" value="<?php echo $row['price']; ?>"></li>
        <br>
      </td>
    </tr>
  </tbody>
</table>
</div>



    <div class="row" style="padding: 20 0 25 357px">
      <div style="padding: 0 260px"></div>
      <button type="submit" class="btn btn-primary btn-lg" name="btn-update" id="btn-update" style="padding: 6 34px">บันทึก</button>
      <div style="padding: 0 100px"></div>
      <a href="show_details.php?showid=<?php echo $showid?>" value="button" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="padding: 10 33px">ยกเลิก</a>

      
    </div>

    <br>
    <br>
    <br>
    <br>
    </form>
    </body>

<?php
include 'header_admin.php';
?>
