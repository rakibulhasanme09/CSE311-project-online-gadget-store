<?php
// connect files
include('./includes/connect.php');

// getting product
function getproduts()
{
  global $con;
  //condition to check isset or not
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_query = "select * from products order by rand() LIMIT 0,9";
      $result_query = mysqli_query($con, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt=''>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View More</a>
              </div>
            </div>
          </div>";
      }
    }
  }
}

//display all function
function get_all()
{
  global $con;
  //condition to check isset or not
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_query = "select * from products order by rand()";
      $result_query = mysqli_query($con, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt=''>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View More</a>
              </div>
            </div>
          </div>";
      }
    }
  }
}

//getting unique categories
function get_unique_cate()
{
  global $con;
  //condition to check isset or not
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $select_query = "select * from products where category_id=$category_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger'>Sorry!We don't have any product of this category</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
          <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt=''>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View More</a>
            </div>
          </div>
        </div>";
    }
  }
}

//getting unique brands
function get_unique_brands()
{
  global $con;
  //condition to check isset or not
  if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $select_query = "select * from products where brand_id=$brand_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger'>Sorry!We don't have any product of this brand</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
          <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt=''>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View More</a>
            </div>
          </div>
        </div>";
    }
  }
}


// getting brands on side nav
function getbrands()
{
  global $con;
  $select_brands = "select * from brands";
  $result_brands = mysqli_query($con, $select_brands);
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo "<li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
  }
}

// geting categories on side nav
function getcategories()
{
  global $con;
  $select_categories = "select * from categories";
  $result_categories = mysqli_query($con, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo "<li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>";
  }
}

//searching product function
function search_product()
{
  global $con;
  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "select * from products where product_keyword like '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger'>Sorry!Search query doesn't match</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt=''>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View More</a>
              </div>
            </div>
          </div>";
    }
  }
}

//view details funtion
function view_details()
{
  global $con;
  //condition to check isset or not
  if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $product_id = $_GET['product_id'];
        $select_query = "select * from products where product_id=$product_id";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_image2 = $row['product_image2'];
          $product_image3 = $row['product_image3'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt=''>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                <a href='index.php' class='btn btn-primary'>Return</a>
              </div>
            </div>
          </div>
          <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-mid-12'>
                                <h4 class='text-center text-muted mb-5'>Related Details</h4>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin/product_images/$product_image2' class='card-img-top' alt=''>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin/product_images/$product_image3' class='card-img-top' alt=''>
                            </div>
                        </div>
                    </div>
          ";
        }
      }
    }
  }
}

// get ip address
function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip

//cart function
function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $ip = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "Select * from  cart_details where ip_address='$ip' and product_id=$get_product_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script>alert('You have already added this to your cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    } else {
      $insert_query = "insert into cart_details (product_id,ip_address,quantity) values ($get_product_id,'$ip',0)";
      $result_query = mysqli_query($con, $insert_query);
      echo "<script>alert('Item Added!')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

//function to get cart number
function countCartItems()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $ip = getIPAddress();
    $select_query = "Select * from  cart_details where ip_address='$ip'";
    $result_query = mysqli_query($con, $select_query);
    $count = mysqli_num_rows($result_query);
  } else {
    global $con;
    $ip = getIPAddress();
    $select_query = "Select * from  cart_details where ip_address='$ip'";
    $result_query = mysqli_query($con, $select_query);
    $count = mysqli_num_rows($result_query);
  }
  echo $count;
}

//total price
function totalPrice(){
  global $con;
  $ip = getIPAddress();
  $total=0;
  $cart_query="select * from cart_details where ip_address='$ip'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $price="select * from products where product_id=$product_id";
    $result_price=mysqli_query($con,$price);
    while($row_product_price=mysqli_fetch_array($result_price)){
      $total_price=array($row_product_price['product_price']);
      $total_sum=array_sum($total_price);
      $total+=$total_sum;
    }
  }
  echo $total;
}

?>