<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- front awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- css file -->
    <link rel="stylesheet" href="./style.css">
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>



</head>

<body>
    <!-- bootstrap css link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- 1st child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img src="./images/icons.png" alt="" class="icons">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php countCartItems(); ?>
                                </sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- cart calling -->
        <?php
        cart();
        ?>

        <!-- 2nd child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>

        </nav>


        <!-- 3rd child -->
        <div class="bg-secondary">
            <h3 class="text-center text-white">Gadget Store</h3>
        </div>

        <!-- table -->
        <form action="" method="post">
            <div class="container">
                <div class="row">

                    <table class="table table-bordered text-center">

                        <!-- php code to dynamic data -->
                        <?php
                        // global $con;
                        $ip = getIPAddress();
                        $total = 0;
                        $cart_query = "SELECT * from cart_details where ip_address='$ip'";
                        $result_query = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result_query);
                        if ($result_count > 0) {
                            echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                            </thead>
                            <tbody>";
                            while ($row = mysqli_fetch_array($result_query)) {
                                $product_id = $row['product_id'];
                                $price = "SELECT * from products where product_id=$product_id";
                                $result_price = mysqli_query($con, $price);
                                while ($row_product_price = mysqli_fetch_array($result_price)) {
                                    $total_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $total_sum = array_sum($total_price);
                                    $total += $total_sum;

                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $product_title ?>
                                        </td>
                                        <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                        <td><input type="text" name="quantity" class="form-input w-50"></td>
                                        <?php
                                        $ip = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['quantity'];
                                            $update_cart_do = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$ip'";
                                            $result_update = mysqli_query($con, $update_cart_do);
                                            $total = $total * $quantities;
                                        }
                                        ?>
                                        <td>
                                            <?php echo $price_table ?>/-
                                        </td>
                                        <td><input type="checkbox" name="removeitem[]" value=<?php echo $product_id ?>></td>
                                        <td>
                                            <!-- <button class="bg-secondary text-white px-3 py-2 mx-3 border-0">Update</button> -->
                                            <input type="submit" value="Update Cart"
                                                class="bg-secondary text-white px-3 py-2 mx-3 border-0" name="update_cart">
                                            <!-- <button class="bg-secondary text-white px-3 py-2 mx-3 border-0">Remove</button> -->
                                            <input type="submit" value="Remove Cart"
                                                class="bg-secondary text-white px-3 py-2 mx-3 border-0" name="remove_cart">
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        else{
                            echo "<h2 class='text-center text-danger'> Cart Is Empty";
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="d-flex mb-5">
                        <?php $ip = getIPAddress();
                        $cart_query = "SELECT * from cart_details where ip_address='$ip'";
                        $result_query = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result_query); 
                        if ($result_count > 0) {
                            echo "<h4 class='px-4' text-dark>Subtotal: <strong>
                             $total /-
                        </strong></h4>
                        <input type='submit' value='Continue Shopping'
                        class='bg-secondary text-white px-3 py-2 mx-3 border-0' name='continue_shopping'>
                        <button class='bg-secondary text-white px-3 py-2 border-0'><a href='checkout.php' class='text-light text-decoration-none'>Checkout</button></a>";
                        }
                        else{
                            echo "<input type='submit' value='Continue Shopping'
                            class='bg-secondary text-white px-3 py-2 mx-3 border-0' name='continue_shopping'>";
                        }
                        if(isset($_POST["continue_shopping"])){
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                            ?>
                        
                    </div>

                </div>
            </div>
        </form>

        <!-- remove item -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST["remove_cart"])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delte_query = "DELETE from cart_details where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delte_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();
        ?>


        <!-- last child -->
        <?php include("./includes/footer.php") ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>