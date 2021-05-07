<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/admin_dashboard.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            $.get('/Admins/index_html', function(res) {
                
                $('#orders').html(res);
            });
            $(document).on('submit', 'form', function(){
                // alert('here');
                console.log($(this).val());
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('#users').html(res);
                });
                return false;
            });
            $(document).on('change', 'select', function(){
                // alert('here');
                // console.log($(this).val());
                // $.post($(this).attr('action'), $(this).serialize(), function(res) {
                //     $('#users').html(res);
                // });
                // return false;
                $(this).parent().submit();
                alert('Order updated!');
            });
            // $('#my_form').change(function(){
            //     $.post($(this).attr('action'), $(this).serialize(), function(res) {
            //         $('#users').html(res);
            //     });
            //     return false;
            // });
        });
    </script>
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
          
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 px-2 justify-content-center mb-md-0">
                <li><a href="/admin/dashboard" class="nav-link px-2 text-warning border rounded border-warning">Orders</a></li>
                    <li><a href="/admin/brands" class="nav-link px-2 text-white">Brand & Categories</a></li>
                    <li><a href="/admin/products" class="nav-link px-2 text-white">Products</a></li>
                    <!-- <li><a href="#" class="nav-link px-2 text-white">Users</a></li> -->
                </ul>
          
                <div class="text-end">
                    <div class="dropdown d-inline">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <?= $this->session->userdata('user_first_name')?>!
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a href="/users/user_profile" class="dropdown-item" type="button">Edit Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="/logout" class="dropdown-item" type="button">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
          <!-- Navbar End -->

        <div class="position-relative overflow-hidden bg-light banner-bgs min-vh-100">
        <!-- cards dashboard -->
        <div class="container card-group d-flex justify-content-between p-3">
            <div class="card rounded border border-dark mb-3" style="max-width: 18rem; min-height:11rem;">
                <div class="card-body">
                    <h1 class="display-5 card-title fw-bold"><?=$order_count['total_orders']?></h1>
                    <p class="card-text lead">Total Orders</p>
                </div>
                <div class="card-footer d-flex justify-content-start align-items-center">
                    <p class="m-0 p-0">More info <i class="fas fa-arrow-circle-right"></i></p>
                </div>
            </div>
            <div class="card rounded border border-dark mb-3" style="max-width: 18rem; min-height:11rem;">
                <div class="card-body">
                    <h1 class="display-5 card-title fw-bold"><?=$item_count['total_items']?></h1>
                    <p class="card-text lead">Items</p>
                </div>
                <div class="card-footer d-flex justify-content-center align-items-center">
                    <p class="m-0 p-0">More info <i class="fas fa-arrow-circle-right"></i></p>
                </div>
            </div>
            <div class="card rounded border border-dark mb-3" style="max-width: 18rem; min-height:11rem;">
                <div class="card-body">
                    <h1 class="display-5 card-title fw-bold"><?=$user_count['total_users']?></h1>
                    <p class="card-text lead">User Registrations</p>
                </div>
                <div class="card-footer d-flex justify-content-center align-items-center">
                    <p class="m-0 p-0">More info <i class="fas fa-arrow-circle-right"></i></p>
                </div>
            </div>
        </div>
        <!-- end cards dashboard -->

            <div class="container dashboard-table p-5 mt-2 mb-5">
                <h2>Orders</h2>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="col">
                            <select class="form-select w-25 select" aria-label="Default select example" >
                                <option selected>Show All</option>
                                <option value="1">Order In Process</option>
                                <option value="2">Shipped</option>
                                <option value="3">Cancelled</option>
                            </select>
                        </div>
                      </div>
                </form>
                <!-- START TABLE -->
                <div class="container mt-2">
                    <table class="table table-borderless main">
                        <thead>
                            <tr class="head">
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Created</th>
                                <th scope="col">Billing Address</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody  id="orders">

                        </tbody>
                    </table>
                </div>
                <!-- END TABLE -->
            </div>
            <footer class="container-fluid mt-2 d-flex justify-content-center align-items-center">
                <p class="text-center">&copy; 2021 E-Shoepify, Inc. &middot;</p>
            </footer>
        </div>

        
    </div>
    <!-- main container end -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>