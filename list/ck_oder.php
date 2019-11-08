<?php
session_start();
unset($_SESSION['shopping_cart']);

?>
<script>
alert('่สั่งซื้อเรียบร้อยแล้ว');
window.location="oder.php";
</script>