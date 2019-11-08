<?php
session_start();
?>
<body class="body">
<div  style="padding:  80px 0 0 350px;">
<?php

include 'connection.php'; 
$query = "SELECT * FROM product_tbl" or die("Error:" . mysqli_error()); 
$result = mysqli_query($con, $query); 

$type = $_GET['cate'];



while($row = mysqli_fetch_array($result)) { 
if($row['type'] == $type){
  $showid = $row['id'];
echo<<<EOD
<a class="card " href="../stock/show_details.php?showid=$showid"  style="width: 19rem; height: 28.5rem; background: #242424; float:left; margin: 1px; overflow: hidden; max-height: 28.5rem;color: #fff; text-decoration: none;">
EOD;
  echo "<img src='../stock/image/".$row['type']."/".$row['img']."' class='card-img-top'>";
 echo"<div class='card-body'>";
  echo"<h5 class='card-title'>".$row['name']."</h5>";
echo<<<EOD
 </div>
</a>
EOD;
    }
}
mysqli_close($con); 
?>

</div>
</body>
<?php


if($_SESSION['id'] == ''){
  include 'header.php';
} else if($_SESSION['status'] == 1){
  include 'header_admin.php';
} else if($_SESSION['status'] == 2){
  include 'header_user.php';
}
else{
  include 'header.php';
}
?>
