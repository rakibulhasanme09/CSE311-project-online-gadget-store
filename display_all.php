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
  <title>CSE311_Project</title>
  <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- front awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- css file -->
  <link rel="stylesheet" href="./style.css">



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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <li class="nav-item">
              <a class="nav-link" href="#">Total Ammount:
                <?php totalPrice(); ?>/-
              </a>
            </li>
          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
            <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>


    <!-- 2nd child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
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
    <div class="bg-light">
      <h3 class="text-center">Gadget Store</h3>
    </div>



    <!-- 4th child -->
    <div class="row">
      <div class="col-md-10">
        <!-- products -->
        <div class="row">
          <!-- frtching products -->
          <?php
          get_all();
          get_unique_cate();
          get_unique_brands();
          ?>
          <!-- row end -->
        </div>
        <!-- col end -->
      </div>
      <div class="col-md-2 bg-secondary p-0">
        <!-- sidenav -->
        <!-- brands -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-light">
            <a href="#" class="nav-link text-dark">
              <h4>Brands</h4>
            </a>
          </li>
          <?php
          getbrands();
          ?>
        </ul>
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-light">
            <a href="#" class="nav-link text-dark">
              <h4>Categories</h4>
            </a>
          </li>
          <?php
          getcategories();
          ?>
        </ul>
      </div>
    </div>



    <!-- last child -->
    <?php include("./includes/footer.php") ?>
  </div>

  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>