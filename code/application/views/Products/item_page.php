<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shoepify - <?=$item['name']?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
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
                    <a href="/products/products_page"
                        class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                        <img src="<?php base_url() ?>/assets/images/cover.png" class="" width="150px">
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <!-- <li><a href="#" class="nav-link px-2 text-white">Products</a></li> -->
                    </ul>

                    <div class="text-end">
                        <?php           if(is_null($this->session->userdata('user_id'))){   ?>
                        <a href="/login" type="button" class="btn btn-outline-light me-2">Login</a>
                        <a href="/register" type="button" class="btn btn-warning">Sign-up</a>
                        <?php           }else{                                              ?>
                        <!-- <p class="d-inline"></p> -->
                        <a href="/products/checkout" class="p-3 carts"><i class="fas fa-shopping-cart"></i> My Cart
                            (<?=count($this->cart->contents())?>)</a>
                        <!-- <a href="logout" type="button" class="btn btn-warning">Logout</a> -->
                        <div class="dropdown d-inline">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, <?= $this->session->userdata('user_first_name')?>!
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a href="logout" class="dropdown-item" type="button"> <i
                                            class="fas fa-clipboard-list"></i> My Orders</a></li>
                                <li><a href="/users/user_profile" class="dropdown-item" type="button"> <i
                                            class="fas fa-user-circle"></i> Edit Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a href="/logout" class="dropdown-item" type="button"> <i
                                            class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
                        <?php           }                                                   ?>
                    </div>
                </div>
            </div>
        </header>
        <!-- Navbar End -->

        <div class="container bg-light p-1 my-5">
        <a href="/products/products_page" type="button" class="btn btn-danger mb-3"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
            <div class="card">
                <div class="row">
                    <aside class="col-sm-5 border-right">
                        <article class="gallery-wrap p-5">
                            <div class="img-big-wrap d-flex">
                                <img src="<?=base_url('product_images/'.$item['image'])?>" class="mx-auto">
                            </div>
                        </article>
                    </aside>
                    <aside class="col-sm-7">
                        <article class="card-body p-5">
                            <form action="/products/add_to_cart" method="POST">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                <input type="hidden" name="prod_id" value="<?=$item['id']?>">
                                <input type="hidden" name="name" value="<?=$item['name']?>">
                                <input type="hidden" name="price" value="<?=$item['price']?>">
                                <h1 class="mb-3 display-6"><?=$item['name']?></h1>
                                <p class="price-detail-wrap">
                                    <span class="price h3 text-warning">
                                        <span class="currency">PHP ₱</span><span
                                            class="num"><?=number_format($item['price'],2)?></span>
                                    </span>
                                </p>
                                <dl class="item-property">
                                    <dt>Description</dt>
                                    <dd>
                                        <p><?=$item['description']?></p>
                                    </dd>
                                </dl>
                                <dl class="param param-feature">
                                    <dt>Brand</dt>
                                    <dd><?=$item['brand']?></dd>
                                </dl> <!-- item-property-hor .// -->
                                <dl class="param param-feature">
                                    <dt>Delivery</dt>
                                    <dd>Philippines</dd>
                                </dl> <!-- item-property-hor .// -->

                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <dl class="param param-inline">
                                            <dt>Quantity: </dt>
                                            <dd>
                                                <input type="number" id="quantity" name="quantity" min="1"
                                                    max="<?=$item['qty']?>" class="p-2 fw-light" value="1">
                                                    <!-- <small class="text-muted"> *Out of stock</small> -->
                                            </dd>
                                        </dl> <!-- item-property .// -->
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                                <div class="container d-flex justify-content-center mt-3">
<?php              if(is_null($this->session->userdata('user_id'))){   ?>
                                    <a class="buy-now" onclick=alertME()>Buy Now</a>
                                    <a class="add-to-cart" onclick=alertME()>Add To Cart</a>
<?php               }else{                                              ?>
                                    <!-- <a href="/products/add_to_cart" class="buy-now">Buy Now</a> -->
                                    <input type="submit" class="add-to-cart" value="Add To Cart">
<?php               }                                                   ?>
                                </div>
<?php if ($this->session->flashdata('success')) { ?>
             <div class="alert alert-success mt-3"> <?= $this->session->flashdata('success') ?> </div>
<?php } ?>
                            </form>
                        </article> <!-- card-body.// -->
                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
                <div class="border-top mt-5 w-75 mx-auto"></div>
                <div class="similar mt-5 p-3">
                    <p class="fs-5">You might also like</p>
                    <div class="row row-cols-1 row-cols-md-5 mb-3 text-left">
                        <!-- card -->
                        <div class="col mb-3">
                            <div class="card rounded-3 shadow-sm cardss">
                                <div class="card-body">
                                    <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9f5962a5-6eb6-46d4-b538-130e70618576/downshifter-10-running-shoe-CrpbbD.png"
                                        class="rounded mx-auto d-block" alt="" width="100">
                                    <ul class="list-unstyled mt-3">
                                        <li class="lead">Nike Support IV</li>
                                        <li class="fw-bold">$19.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div> <!-- card.// -->
        </div>

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2021 Shoepify, Inc. &middot;</p>
        </footer>
    </div>
    <!-- main container end -->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <script>
        function alertME(){
            alert('Please login first!');
        }
    </script>
</body>

</html>