<?php 
include('../includes/connect.php');

    if(isset($_POST['insert_product'])){


        $product_title=$_POST['product_title'];
        $discription=$_POST['discription'];
        $product_keyword=$_POST['product_keyword'];
        $product_category=$_POST['product_category'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_status='true';
        // accessing images
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];
        // accessing image tmp name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];
        // check empty condition
        if($product_title=='' or $discription=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){

            echo "<script>alert('Please fill all the fields')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            // insert data
            $insert_products="insert into products (product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status)  values ('$product_title','$discription','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
            
            $result=mysqli_query($con,$insert_products);
            if($result){
                echo "<script>alert('Product added')</script>";
            }
            else{
                echo "<script>alert('Product not added')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>

     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- front awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center">Insert Product</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lebel for="product_title" class="form-lebel">Product Title</lebel>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- discription -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lebel for="discription" class="form-lebel">Product Discription</lebel>
                <input type="text" name="discription" id="discription" class="form-control" placeholder="Enter Product Discription" autocomplete="off" required="required">
            </div>
            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lebel for="product_keyword" class="form-lebel">Product keyword</lebel>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
            <lebel for="product_category" class="form-lebel">Category</lebel>
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php 
                        $select_query="select * from categories";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
            <lebel for="product_brand" class="form-lebel">Brand</lebel>
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select Brand</option>
                    <?php 
                        $select_query="select * from brands";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- image1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lebel for="product_image1" class="form-lebel">Product Image 1</lebel>
                <input type="file" name="product_image1" id="product_image1" class="form-control"  required="required">
            </div>
            <!-- image2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lebel for="product_image2" class="form-lebel">Product Image 2</lebel>
                <input type="file" name="product_image2" id="product_image2" class="form-control"  required="required">
            </div>
            <!-- image3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lebel for="product_image3" class="form-lebel">Product Image 3</lebel>
                <input type="file" name="product_image3" id="product_image3" class="form-control"  required="required">
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lebel for="product_price" class="form-lebel">Product Price</lebel>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Ente Product Price" autocomplete="off" required="required">
            </div>
            <!-- submit button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">

            </div>
        </form>
    </div>    
</body>
</html>
