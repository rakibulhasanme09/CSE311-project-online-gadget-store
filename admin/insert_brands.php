<?php 
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];
  
  $select_query="select brand_title from brands where brand_title='$brand_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This is present on the database')</script>";
  }
  else{

  $insert_query="insert into brands(brand_title) values ('$brand_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Inserted Successfully')</script>";
  }}
}

?>

<h2 class="text-center">Insert Brand</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-light" id="basic-addon1"><i class="da-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brand" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">
  <input type="submit" class="form-control bg-info" name="insert_brand" value="Insert Brand" aria-label="Username" aria-describedby="basic-addon1">
</div>
</form>