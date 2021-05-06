<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shoepify - My Orders</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- User defined CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/index.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body>
    <!-- Main container -->
    <div class="container-fluid mx-auto p-0 main-c">
        <!-- Navbar -->
        <header class="p-3 bg-dark text-white">
            <div class="container-fluid">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                        <img src="<?php base_url() ?>/assets/images/cover.png" class="" width="150px" >
                    </a>
            
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <!-- <li><a href="#" class="nav-link px-2 text-white">Products</a></li> -->
                    </ul>
            
                    <div class="text-end">
<?php               if(is_null($this->session->userdata('user_id'))){                   ?>
                        <a href="login" type="button" class="btn btn-outline-light me-2">Login</a>
                        <a href="register" type="button" class="btn btn-warning">Sign-up</a>
<?php               }else{                                                              ?>
                        <div class="dropdown d-inline">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <?= $this->session->userdata('user_first_name')?>!
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a href="logout" class="dropdown-item" type="button"> <i class="fas fa-clipboard-list"></i> My Orders</a></li>
                                <li><a href="/users/user_profile" class="dropdown-item" type="button"> <i class="fas fa-user-circle"></i> Edit Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="logout" class="dropdown-item" type="button"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
<?php               }                                                                   ?>
                    </div>
                </div>
            </div>
        </header>
          <!-- Navbar End -->

        <div class="container p-5 heads mx-auto mt-3">
            
            <h1 class="display-6">My Orders</h1>
            <!-- order box -->
            <div class="container px-2 pt-2 pb-4 border">
                <div class="container d-flex justify-content-between p-0">
                    <p class="lead m-0 fs-4">Order #12133 </p>
                    <small class="fw-light rounded-pill text-secondary px-2 text-center d-flex justify-content-center align-items-center fst-italic">Order on Process</small>
                </div>
                <div class="container d-flex justify-content-between p-0">
                    <small class="text-muted d-block">Placed on Oct 12 2020</small>
                    <a href="">VIEW DETAILS</a>
                </div>
                
                <hr>
                <div class="row p-1 mt-1">
                    <div class="col-1 text-center">
                        1
                    </div>
                    <div class="col-2">
                        <img src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.0/w_402,c_limit/763ffe26-0bd9-44e4-9278-f2953e53804b/flex-stride-wild-run-unlined-running-shorts-PGr6Kw.png" alt="" height="50">
                    </div>
                    <div class="col-4">
                        Nike Shorts
                    </div>
                    <div class="col-2">
                        <span class="text-muted">Qty</span>: 3
                    </div>
                    <div class="col-3">
                        Total Price: 1200
                    </div>
                </div>
                <hr class="w-75 mx-auto">
                <div class="row p-1 mt-1">
                    <div class="col-1 text-center">
                        1
                    </div>
                    <div class="col-2">
                        <img src="https://static.nike.com/a/images/q_auto:eco/t_product_v1/f_auto/dpr_1.0/w_402,c_limit/763ffe26-0bd9-44e4-9278-f2953e53804b/flex-stride-wild-run-unlined-running-shorts-PGr6Kw.png" alt="" height="50">
                    </div>
                    <div class="col-4">
                        Nike Shorts
                    </div>
                    <div class="col-2">
                        <span class="text-muted">Qty</span>: 3
                    </div>
                    <div class="col-3">
                        Total Price: 1200
                    </div>
                </div>
            </div>
            <!-- order box end-->
        </div>
        
        
    </div>
    <!-- main container end -->
    <!-- <footer class="container-fluid mt-2">
            <p class="text-center mb-0">&copy; 2021 E-Shoepify, Inc. &middot;</p>
    </footer> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
