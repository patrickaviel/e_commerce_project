<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/user_registration.css">
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
                    <a href="/" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                        <img src="<?php base_url() ?>/assets/images/cover.png" class="" width="150px" >
                    </a>
            
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <!-- <li><a href="#" class="nav-link px-2 text-white">Orders</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Products</a></li> -->
                    </ul>
            
                    <div class="text-end">
                        <a href="login" type="button" class="btn btn-outline-light me-2">Login</a>
                        <a href="register" type="button" class="btn btn-warning">Sign-up</a>
                    </div>
                </div>
            </div>
        </header>
          <!-- Navbar End -->

        <!-- Form -->
        
        <div class="position-relative overflow-hidden bg-light banner-bgs">
            <form action="users/register" method="POST" class="row g-3 hero-style w-50 mx-auto p-4 m-4">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <h1 class="display-6">Register Account</h1>
                <div class="col-md-8">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="xyz@example.com">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="col-md-4">
                    <label for="contact_no" class="form-label">Contact No</label>
                    <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo set_value('contact_no'); ?>" placeholder="Ex: 09123456789">
                    <?php echo form_error('contact_no'); ?>
                </div>
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="Juan">
                    <?php echo form_error('first_name'); ?>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Dela Cruz">
                    <?php echo form_error('last_name'); ?>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    <?php echo form_error('password'); ?>
                </div>
                <div class="col-md-6">
                    <label for="c_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Enter your password">
                    <?php echo form_error('c_password'); ?>
                </div>
                <div class="col-2">
                    <label for="house_no" class="form-label">House No</label>
                    <input type="text" class="form-control" id="house_no" name="house_no" value="<?php echo set_value('house_no'); ?>" placeholder="1234">
                    <?php echo form_error('house_no'); ?>
                </div>
                <div class="col-5">
                    <label for="barangay" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="barangay" name="barangay" value="<?php echo set_value('barangay'); ?>" placeholder="Main St">
                    <?php echo form_error('barangay'); ?>
                </div>
                <div class="col-md-5">
                    <label for="municipality" class="form-label">Municipality</label>
                    <input type="text" class="form-control" id="municipality" name="municipality" value="<?php echo set_value('municipality'); ?>" placeholder="Ex: San Fabian">
                    <?php echo form_error('municipality'); ?>
                </div>
                <div class="col-md-10">
                    <label for="province" class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" name="province" value="<?php echo set_value('province'); ?>" placeholder="Ex: Pangasinan">
                    <?php echo form_error('province'); ?>
                </div>
                <div class="col-md-2">
                    <label for="zip" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" id="zip" name="zip" value="<?php echo set_value('zip'); ?>" placeholder="Code">
                    <?php echo form_error('zip'); ?>
                </div>
                <div class="col-12">
                <input type="submit" class="btn btn-primary mt-3" value="Create Account">
                </div>
            </form>
            <footer class="container-fluid mt-2 d-flex justify-content-center align-items-center">
                <p class="text-center">&copy; 2021 Shoepify, Inc. &middot;</p>
            </footer>
        </div>
        <!-- End Form -->
        
    </div>
    <!-- main container end -->

    <!-- Bootstrap jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>