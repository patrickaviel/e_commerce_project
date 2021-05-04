<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Personal CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/item_page.css">
</head>
<body>
    <!-- Main container -->
    <div class="container-fluid mx-auto p-0">
        <!-- Navbar -->
        <header class="p-3 bg-dark text-white">
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<?php base_url(); ?>" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                    <img src="<?php base_url() ?>/assets/images/cover.png" class="" width="150px" >
                </a>
          
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                  <!-- <li><a href="#" class="nav-link px-2 text-white">Products</a></li> -->
                </ul>

                <div class="text-end">
<?php           if(is_null($this->session->userdata('user_id'))){   ?>
                    <a href="login" type="button" class="btn btn-outline-light me-2">Login</a>
                    <a href="register" type="button" class="btn btn-warning">Sign-up</a>
<?php           }else{                                              ?>
                    <!-- <p class="d-inline"></p> -->
                    <a href="checkout_page.html" class="p-3 carts"><i class="fas fa-shopping-cart"></i> My Cart (0)</a>
                    <!-- <a href="logout" type="button" class="btn btn-warning">Logout</a> -->
                    <div class="dropdown d-inline">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Hello, <?= $this->session->userdata('user_first_name')?>!
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a href="logout" class="dropdown-item" type="button"> <i class="fas fa-clipboard-list"></i> My Orders</a></li>
                            <li><a href="/users/user_profile" class="dropdown-item" type="button"> <i class="fas fa-user-circle"></i> Edit Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="/logout" class="dropdown-item" type="button"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
<?php           }                                                   ?>
                </div>
              </div>
            </div>
        </header>
        <!-- Navbar End -->

        <div class="container position-relative overflow-hidden bg-light banner-bgs p-1 my-5">
            <div class="col-md-5 p-lg-5  w-100">
                <a href="" type="button" class="btn btn-danger mb-3"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
                <h1 class="display-4 fw-normal">Product No #1</h1>
                <p class="fw-bold fs-1 price">₱1999.00</p>
                <div class="products d-flex">
                    <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/b1587e5f-bab7-4893-958c-241a91283453/precision-4-basketball-shoe-JVhRs8.png" alt="" width="400" height="400">
                    <p class="lead p-3">Players who go all out, every play, in every game deserve something special for their effort. The Nike Fly.By Mid provides court-ready cushioning, support and traction for the game's constant multidirectional movements.
                        <span class="d-block mt-5"><label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="5">
                    </span>
                    </p>
                </div>
                <div class="container d-flex justify-content-center mt-3">
                    <a href="" class="buy-now">Buy Now</a>
                    <a href="" class="add-to-cart">Add To Cart</a>
                </div>
                <div class="similar mt-5">
                    <p class="fs-5">You might also like</p>
                    
                    <div class="row row-cols-1 row-cols-md-5 mb-3 text-left">
                        <!-- card -->
                        <div class="col mb-3">
                          <div class="card rounded-3 shadow-sm cardss">
                            <div class="card-body">
                                <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9f5962a5-6eb6-46d4-b538-130e70618576/downshifter-10-running-shoe-CrpbbD.png" class="rounded mx-auto d-block" alt="" width="100">
                                <ul class="list-unstyled mt-3">
                                    <li class="lead">Nike Support IV</li>
                                    <li class="fw-bold">$19.00</li>
                                </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col mb-3">
                            <div class="card rounded-3 shadow-sm cardss">
                              <div class="card-body">
                                <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9f5962a5-6eb6-46d4-b538-130e70618576/downshifter-10-running-shoe-CrpbbD.png" class="rounded mx-auto d-block" alt="" width="100">
                                <ul class="list-unstyled mt-3">
                                    <li class="lead">Nike Support IV</li>
                                    <li class="fw-bold">$19.00</li>
                                </ul>
                              </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="card rounded-3 shadow-sm cardss">
                              <div class="card-body">
                                  <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9f5962a5-6eb6-46d4-b538-130e70618576/downshifter-10-running-shoe-CrpbbD.png" class="rounded mx-auto d-block" alt="" width="100">
                                  <ul class="list-unstyled mt-3">
                                      <li class="lead">Nike Support IV</li>
                                      <li class="fw-bold">$19.00</li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col mb-3">
                              <div class="card rounded-3 shadow-sm cardss">
                                <div class="card-body">
                                  <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9f5962a5-6eb6-46d4-b538-130e70618576/downshifter-10-running-shoe-CrpbbD.png" class="rounded mx-auto d-block" alt="" width="100">
                                  <ul class="list-unstyled mt-3">
                                      <li class="lead">Nike Support IV</li>
                                      <li class="fw-bold">$19.00</li>
                                  </ul>
                                </div>
                              </div>
                          </div>
                          <div class="col mb-3">
                            <div class="card rounded-3 shadow-sm cardss">
                              <div class="card-body">
                                <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9f5962a5-6eb6-46d4-b538-130e70618576/downshifter-10-running-shoe-CrpbbD.png" class="rounded mx-auto d-block" alt="" width="100">
                                <ul class="list-unstyled mt-3">
                                    <li class="lead">Nike Support IV</li>
                                    <li class="fw-bold">$19.00</li>
                                </ul>
                              </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2021 Shoepify, Inc. &middot;</p>
        </footer>
    </div><!-- /.container -->

    </div>
    <!-- main container end -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>