<?php
include_once('header_admin.php');

?>

<form class="form-horizontal was-validated" action="insertstock.php" method="post" enctype="multipart/form-data">
  <div class="container" style="padding: 200px 0 0 200px;">
  <div class="col-lg-6 offset-lg-3">

  <div class="form-group ">
  <label  class="control-label col-sm-6"> ชื่อสินค้า</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Please enter product name" required>
  </div>

  <div class="form-group">
  <label  class="control-label col-sm-6"> ประเภทสินค้า</label>
    <select class="custom-select" name="type" id="type" required>
      <option value="" selected>Please select type</option>
      <option>mainboard</option>
      <option>cpu</option>
      <option>graphic</option>
      <option>memory</option>
      <option>mouse</option>
      <option>keyboard</option>
      <option>allaccessories</option>
    </select>
  </div>

  <div class="form-group ">
  <div class="form-row">
    <div class="col-5">
    <label  class="control-label col-sm-8"> จำนวนสินค้า </label>
      <input type="number" name="numstk" class="form-control" id="numstk" placeholder="Quantity" required>
    </div>
    <div class="col">
    <label  class="control-label col-sm-6"> ราคาสินค้า</label>
      <input type="number" name="price" class="form-control" id="price" placeholder="Price" required>
    </div>
  </div>
  </div>

  <div class="form-group ">
  <label  class="control-label col-sm-6"> รูปสินค้า</label>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="img" id="img" required>
      <label class="custom-file-label" for="img" >Choose image file...</label>
    </div>
  </div>

  <div class="form-group ">
    <div class="mb-3">
    <label class="control-label col-sm-6"> ข้อมูลสินค้า</label>
      <textarea class="form-control" id="inf" name="inf" placeholder="Please enter product information" required></textarea>
    </div>
  </div>

  <div class="form-group ">
  <button type="submit" class="btn btn-primary btn-block">Add stock</button>
</div>
</div>
</form>

<script>
  $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>