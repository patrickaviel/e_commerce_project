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
    <div class="container-fluid mx-auto p-0">
        <!-- Navbar -->
        <header class="p-3 bg-dark text-white">
            <div class="container-fluid">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="<?php base_url(); ?>" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
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

        <div class="container w-50">
        <div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
    <div class="text-uppercase">
        <p>Order detail</p>
    </div>
    <div class="h4">Thursday, July 24, 2017</div>
    <div class="pt-1">
        <p>Order #12615 is currently<b class="text-dark"> processing</b></p>
    </div>
    <div class="btn close text-white"> &times; </div>
</div>
<div class="wrapper bg-white">
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr class="text-uppercase text-muted">
                    <th scope="col">product</th>
                    <th scope="col" class="text-right">total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Babyblends: 1meal/day</th>
                    <td class="text-right"><b>$69.86</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-start align-items-center list py-1">
        <div><b>1px</b></div>
        <div class="mx-3"> <img src="https://images.pexels.com/photos/206959/pexels-photo-206959.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="apple" class="rounded-circle" width="30" height="30"> </div>
        <div class="order-item">Apple</div>
    </div>
    <div class="d-flex justify-content-start align-items-center list my-2 py-1">
        <div><b>4px</b></div>
        <div class="mx-3"> <img src="https://images.unsplash.com/photo-1602081593819-65e7a8cee0dd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="apple" class="rounded-circle" width="30" height="30"> </div>
        <div class="order-item">Mango</div>
    </div>
    <div class="d-flex justify-content-start align-items-center list my-2 py-1">
        <div><b>2px</b></div>
        <div class="mx-3"> <img src="https://images.unsplash.com/photo-1584183187885-071d53d42531?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="apple" class="rounded-circle" width="30" height="30"> </div>
        <div class="order-item">Carrot Apple Ginger</div>
    </div>
    <div class="d-flex justify-content-start align-items-center list my-2 py-1">
        <div><b>3px</b></div>
        <div class="mx-3"> <img src="https://images.unsplash.com/photo-1602096934878-5028bf10ca50?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="apple" class="rounded-circle" width="30" height="30"> </div>
        <div class="order-item">Pear</div>
    </div>
    <div class="pt-2 border-bottom mb-3"></div>
    <div class="d-flex justify-content-start align-items-center pl-3">
        <div class="text-muted">Payment Method</div>
        <div class="ml-auto"> <img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png" alt="" width="30" height="30"> <label>Mastercard ******5342</label> </div>
    </div>
    <div class="d-flex justify-content-start align-items-center py-1 pl-3">
        <div class="text-muted">Shipping</div>
        <div class="ml-auto"> <label>Free</label> </div>
    </div>
    <div class="d-flex justify-content-start align-items-center pb-4 pl-3 border-bottom">
        <div class="text-muted"> <button class="text-white btn">50% Discount</button> </div>
        <div class="ml-auto price"> -$34.94 </div>
    </div>
    <div class="d-flex justify-content-start align-items-center pl-3 py-3 mb-4 border-bottom">
        <div class="text-muted"> Today's Total </div>
        <div class="ml-auto h5"> $34.94 </div>
    </div>
    <div class="row border rounded p-1 my-3">
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Billing Address</b>
                <p class="text-justify pt-2">James Thompson, 356 Jonathon Apt.220,</p>
                <p class="text-justify">New York</p>
            </div>
        </div>
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Shipping Address</b>
                <p class="text-justify pt-2">James Thompson, 356 Jonathon Apt.220,</p>
                <p class="text-justify">New York</p>
            </div>
        </div>
    </div>
    <div class="pl-3 font-weight-bold">Related Subsriptions</div>
    <div class="d-sm-flex justify-content-between rounded my-3 subscriptions">
        <div> <b>#9632</b> </div>
        <div>May 22, 2017</div>
        <div>Status: Processing</div>
        <div> Total: <b> $68.8 for 10 items</b> </div>
    </div>
</div>

        </div>
        
        <footer class="container-fluid mt-2">
            <p class="text-center mb-0">&copy; 2021 E-Shoepify, Inc. &middot;</p>
        </footer>
    </div>
    <!-- main container end -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
