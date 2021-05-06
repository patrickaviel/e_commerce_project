<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shoepify - Payment</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- User defined CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/checkout.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>

<body>

	<div class="container-fluid mx-auto p-0">

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
                                <li><a href="logout" class="dropdown-item" type="button"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
<?php               }                                                                   ?>
                    </div>
                </div>
            </div>
        </header>
            <!-- Navbar End -->

        <!-- PAYMENT -->
        <div class="container p-5 border border-primary rounded-3 my-5">
            <main>
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-pill">3</span>
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
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                        </li>
                        </ul>
                    </div>
                    
                    <div class="col-md-7 col-lg-8">
<?php               if($this->session->flashdata('success')){           ?>
                        <div class="alert alert-success text-center">
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
 <?php              }                                                   ?>
                        <form role="form" action="<?php echo base_url('handleStripePayment');?>" method="post"
                        class="form-validation" data-cc-on-file="false"
                        data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                        id="payment-form">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                        <h4 class="mb-3">Payment</h4>

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label>
                                    <input class='form-control' size='4' type='text'>
                                    <small class="text-muted">Full name as displayed on card</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class='form-group card required border-0'>
                                    <label class='control-label'>Card Number</label>
                                    <input autocomplete='off' class='form-control card-number'type='text'>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class='form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                        size='4' type='text'>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class='form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label>
                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class='form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 error form-group d-none'>
                                <div class='alert-danger alert'>Error occured while making the payment.</div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="btn btn-primary btn-lg w-100 mx-auto" type="submit">Pay (₱<?=number_format($total,2)?>)</button>
                        </form>
                    </div>
                </div>
            </main>
        </div> 
        <!-- PAYMENT END -->  
	</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
	$(function () {
		var $stripeForm = $(".form-validation");
		$('form.form-validation').bind('submit', function (e) {
			var $stripeForm = $(".form-validation"),
				inputSelector = ['input[type=email]', 'input[type=password]',
					'input[type=text]', 'input[type=file]',
					'textarea'
				].join(', '),
				$inputs = $stripeForm.find('.required').find(inputSelector),
				$errorMessage = $stripeForm.find('div.error'),
				valid = true;
			$errorMessage.addClass('d-none');

			$('.has-error').removeClass('has-error');
			$inputs.each(function (i, el) {
				var $input = $(el);
				if ($input.val() === '') {
					$input.parent().addClass('has-error');
					$errorMessage.removeClass('d-none');
					e.preventDefault();
				}
			});

			if (!$stripeForm.data('cc-on-file')) {
				e.preventDefault();
				Stripe.setPublishableKey($stripeForm.data('stripe-publishable-key'));
				Stripe.createToken({
					number: $('.card-number').val(),
					cvc: $('.card-cvc').val(),
					exp_month: $('.card-expiry-month').val(),
					exp_year: $('.card-expiry-year').val()
				}, stripeResponseHandler);
			}

		});

		function stripeResponseHandler(status, res) {
			if (res.error) {
				$('.error')
					.removeClass('d-none')
					.find('.alert')
					.text(res.error.message);
			} else {
				var token = res['id'];
				$stripeForm.find('input[type=text]').empty();
				$stripeForm.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
				$stripeForm.get(0).submit();
			}
		}

	});
</script>

</html>