<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
     <!-- Bootstrap core CSS -->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Userdefined CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/admin_login.css">

  </head>
<body>
    <div class="container">
        <main class="form-signin">
            <form>
                <div class="d-flex justify-content-center">
                    <img class="mb-4 mx-auto" src="<?php base_url() ?>/assets/images/cover.png" alt="" width="300" >
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary w-50" value="Log In">
                </div>
               
                <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
            </form>
        </main>
    </div>
</body>
</html>