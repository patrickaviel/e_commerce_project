<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoepify</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/index.css">
</head>
<body>
    <!-- Main container -->
    <div class="container-fluid mx-auto p-0">
        <!-- Navbar -->
        <header class="p-3 bg-dark text-white">
            <div class="container-fluid">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.html" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                  <img src="<?php base_url() ?>/assets/images/cover.png" class="" width="150px" >
                </a>
          
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                  <!-- <li><a href="#" class="nav-link px-2 text-white">Products</a></li> -->
                </ul>
          
                <div class="text-end">
                  <a href="users/login_page" type="button" class="btn btn-outline-light me-2">Login</a>
                  <a href="users/registration_page" type="button" class="btn btn-warning">Sign-up</a>
                </div>
              </div>
            </div>
        </header>
          <!-- Navbar End -->

        <div class="position-relative overflow-hidden bg-light banner-bgs ">
            <div class="col-md-5 p-lg-5 heads min-vh-100 d-flex align-items-center">
                <div>
                    <h1 class="display-4 fw-normal">Find New Great Deals!</h1>
                    <p class="lead fw-normal">up to 50% discount!</p>
                    <a class="btn btn-outline-dark" href="product_page.html">Browse Products</a>
                </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
        <footer class="container-fluid mt-2">
            <p class="text-center mb-0">&copy; 2021 Shoepify, Inc. &middot;</p>
        </footer>
    </div>
    <!-- main container end -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
