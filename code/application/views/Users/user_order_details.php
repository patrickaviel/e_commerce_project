<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shoepify - My Orders</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
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
                                <li><a href="/users/my_orders" class="dropdown-item" type="button"> <i class="fas fa-clipboard-list"></i> My Orders</a></li>
                                <li><a href="/users/user_profile" class="dropdown-item" type="button"> <i class="fas fa-user-circle"></i> Edit Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="/logout" class="dropdown-item" type="button"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
<?php               }                                                                   ?>
                    </div>
                </div>
            </div>
        </header>
          <!-- Navbar End -->

        <div class="container p-5 heads mx-auto my-3">
            <!-- <a href="/products/products_page" type="button" class="btn btn-danger mb-3"><i class="far fa-arrow-alt-circle-left"></i> Back</a> -->
            <h1 class="display-5">Order Details</h1>
            <!-- order box -->

            <div class="container px-2 pt-2 pb-4 border">
                <div class="container d-flex justify-content-between p-0">
                    <p class="lead m-0 fs-4">Order <?=$details['id']?> </p>
                    <small class="fw-light rounded-pill text-secondary px-2 text-center d-flex justify-content-center align-items-center fst-italic"><?=$details['status']?></small>
                </div>
                <div class="container d-flex justify-content-between p-0">
                    <small class="text-muted d-block">Placed on <?=$details['order_date']?></small>
                    
                </div>
                
                <hr>
<?php       foreach($items as $item):?>
                <div class="row p-1 mt-1">
                    <div class="col-2">
                        <img src="<?=base_url('product_images/'.$item['image'])?>" alt="" height="120">
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <?=$item['name']?>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <span class="text-muted">Qty</span>: <?=$item['qty']?>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        ???<?=number_format($item['price'],2)?>
                    </div>
                </div>
<?php       endforeach;                                 ?>
                <div class="row pt-4 px-1 mt-2">
                    <div class="col-6">
                        <div class="row border-end border-bottom p-1">
                            <p class="m-0 lead">Shipping Address:</p>
                            <small class="ps-4"><?=$details['ship_fname']?>  <?=$details['ship_lname']?></small>
                            <small class="ps-4"><?=$details['ship_address']?> <?=$details['ship_city']?> <?=$details['ship_state']?>, <?=$details['ship_zipcode']?></small>
                            <small class="ps-4"><?= $this->session->userdata('user_email')?></small>
                        </div>
                        <div class="row border-end p-1">
                            <p class="m-0 lead">Billing Address:</p>
                            <small class="ps-4"l><?=$details['bill_fname']?>  <?=$details['bill_lname']?></small>
                            <small class="ps-4"><?=$details['bill_address']?> <?=$details['bill_city']?> <?=$details['bill_state']?>, <?=$details['bill_zipcode']?></small>
                            <small class="ps-4"><?= $this->session->userdata('user_email')?></small>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="lead">Total Summary:</p>
                        <div class=" d-flex justify-content-between p-0">
                            <small>Subtotal:</small>
                            <small>???<?=number_format($details['total'],2)?></small>
                        </div>
                        
                        <div class=" d-flex justify-content-between p-0">
                            <small>Shipping Fee: </small>
                            <small>???0.00</small>
                        </div>
                        
                        <hr>
                        <div class=" d-flex justify-content-between p-0">
                            <p>Total(VAT Incl.)</p>
                            <p class="fs-4">???<?=number_format($details['total'],2)?></p>
                        </div>
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
