<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration</title>
     <!-- Bootstrap core CSS -->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Userdefined CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/admin_registration.css">

  </head>
<body>
    <div class="container-fluid mx-auto p-0">
        <main class="form-signin w-50 my-4">
            <form action="/users/admin_register" method="POST" class="row g-3 hero-style mx-auto">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <h1 class="display-6">Seller Account Registration</h1>
                <div class="col-md-8">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="xyz@example.com">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="col-md-4">
                    <label for="contact_no" class="form-label">Contact No</label>
                    <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo set_value('contact_no'); ?>" placeholder="Ex: 09123456789">
                    <?php echo form_error('email'); ?>
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
        </main>
    </div>
</body>
</html>