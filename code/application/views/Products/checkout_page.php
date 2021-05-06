<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shoepify - My Cart</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/checkout_page.css">
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

</head>

<body>
    <!-- Main container -->
    <div class="container-fluid mx-auto p-0">
        <!-- Navbar -->
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/"
                        class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                        <img src="<?php base_url() ?>/assets/images/cover.png" class="" width="150px">
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

        <div class="container position-relative overflow-hidden bg-light banner-bgs p-1 my-5">
            <main class="p-5">
                <div class="items">
                    <h1>Your Cart</h1>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>

                            </tr>
                        </thead>
                        <tbody>
<?php                   $total = 0;
                        foreach($mycart as $item):          
                            $total = $total + $item['qty'] * $item['price'];    ?>
                            <tr>
                                <th scope="row"><?=$item['name']?></th>
                                <td>₱<?=number_format($item['price'],2)?></td>
                                <td><?=$item['qty']?> <a href="/products/remove_cart_item/<?= key($mycart); ?>"
                                        class="del "><i class="fas fa-trash-alt"></i></td>
                                <td>₱<?=number_format($item['qty'] * $item['price'],2)?></td>
                            </tr>
<?php                   endforeach;          ?>
                        </tbody>
                    </table>
                    <div class="container d-flex justify-content-end">
                        <a href="/products/products_page" class="btn btn-warning text-white">Continue Shopping</a>
                    </div>

                </div>

                <h2 class="py-5 text-center">Checkout form</h2>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Your cart</span>
                            <span class="badge bg-primary rounded-pill"><?=count($mycart);?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Product name</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Second product</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Third item</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (PHP)</span>
                                <strong>₱<?=number_format($total,2)?></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Shipping address</h4>
                        <form action="/checkouts/create_order" method="POST" class="needs-validation" novalidate>
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                            <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>">
                            <input type="hidden" name="total" value="<?=$total?>">
                            <div class="row g-3">

                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" name="shp_fname" class="form-control" id="firstName" placeholder="" value=""
                                        required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" name="shp_lname" class="form-control" id="lastName" placeholder="" value=""
                                        required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>



                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="shp_email" class="form-control" id="email" placeholder="you@example.com"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name=shp_address" class="form-control" id="address" placeholder="1234 Main St"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address2" class="form-label">Address 2 <span
                                            class="text-muted">(Optional)</span></label>
                                    <input type="text"  name="shp_address2" class="form-control" id="address2"
                                        placeholder="Apartment or suite">
                                </div>

                                <div class="col-md-5">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text"  name="shp_country" class="form-control" id="country"
                                        placeholder="Country" required>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text"  name="shp_state" class="form-control" id="state"
                                        placeholder="Country" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Zip</label>
                                    <input type="text" name="shp_zipcode" class="form-control" id="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Billing address</h4>

                            <div class="row g-3">

                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" name="bill_fname" class="form-control" id="firstName" placeholder="" value=""
                                        required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" name="bill_lname" class="form-control" id="lastName" placeholder="" value=""
                                        required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="bill_email" class="form-control" id="email" placeholder="you@example.com"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="bill_address" class="form-control" id="address" placeholder="1234 Main St"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address2" class="form-label">Address 2 <span
                                            class="text-muted">(Optional)</span></label>
                                    <input type="text" name="bill_address2" class="form-control" id="address2"
                                        placeholder="Apartment or suite">
                                </div>

                                <div class="col-md-5">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text"  name="bill_country" class="form-control" id="country"
                                        placeholder="Country" required>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" name="bill_state" class="form-control" id="country"
                                        placeholder="State" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Zip</label>
                                    <input type="text" name="bill_zipcode" class="form-control" id="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                                
                            </div>

                            <hr class="my-4">
<?php                   if(count($mycart)>0) {    ?>
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Proceed to payment</button>
<?php                   }else{    ?>
                            <button class="w-100 btn btn-primary btn-lg" type="submit" disabled>Proceed to payment</button>
<?php                   }   ?>
                        </form>
                    </div>
                </div>
            </main>
        </div>

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2021 Shoepify, Inc. &middot;</p>
        </footer>
    </div><!-- /.container -->

    </div>
    <!-- main container end -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>

    <script>
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    
</body>

</html>