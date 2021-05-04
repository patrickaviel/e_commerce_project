<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Brands</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/admin_brands.css">
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
          
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 px-2 justify-content-center mb-md-0">
                    <li><a href="/admin/dashboard" class="nav-link px-2 text-white">Orders</a></li>
                    <li><a href="/admin/brands" class="nav-link px-2 text-warning border rounded border-warning">Brand & Categories</a></li>
                    <li><a href="/admin/products" class="nav-link px-2 text-white ">Products</a></li>
                    <li><a href="/admin/users" class="nav-link px-2 text-white">Users</a></li>
                </ul>
          
                <div class="text-end">
                    <div class="dropdown d-inline">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <?= $this->session->userdata('user_first_name')?>!
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a href="/logout" class="dropdown-item" type="button">Edit Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="/logout" class="dropdown-item" type="button">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </header>
          <!-- Navbar End -->

        <!-- Modal for adding Brand-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-plus-square"></i> Add New Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/products/add_brand" method="POST">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                            <div class="mb-3">
                                <label for="brand" class="form-label">Brand Name: </label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="brand" placeholder="Brand Name">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add New Product">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Modal for adding Category -->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-plus-square"></i> Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/products/add_category" method="POST">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                            <div class="mb-3">
                                <label for="category" class="form-label">Category: </label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="category" placeholder="Category">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add New Product">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal 2 -->

        <div class="position-relative overflow-hidden bg-light banner-bgs min-vh-100">
        <div class="container dashboard-table p-5 my-5">
                <h1>Brands</h1>

                <form action="">
                    <div class="row">
                        <div class="col input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="col">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fas fa-plus-square"></i>
                                Add New Brand
                            </button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered border-dark table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php               foreach($brands as $brand):                 ?>
                        <tr>
                            <th scope="row"><?= $brand['id'] ?></th>
                            <td><?= $brand['brand'] ?></td>
                            <td class="text-center"><a href="">edit</a>|<a href="">delete</a></td>
                        </tr>
<?php               endforeach;                                 ?>
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="container dashboard-table p-5 my-5">
                <h1>Categories</h1>
                <form action="">
                    <div class="row">
                        <div class="col input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="col">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                <i class="fas fa-plus-square"></i>
                                Add New Category
                            </button>
                        </div>
                        
                      </div>
                      
                </form>

                <table class="table table-bordered border-dark table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php               foreach($categories as $category):                 ?>
                        <tr>
                            <th scope="row"><?= $category['id'] ?></th>
                            <td><?= $category['category'] ?></td>
                            <td class="text-center"><a href="">edit</a>|<a href="">delete</a></td>
                        </tr>
<?php               endforeach;                                 ?>
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <footer class="container-fluid mt-2 d-flex justify-content-center align-items-center">
                <p class="text-center">&copy; 2021 Shoepify, Inc. &middot;</p>
            </footer>
        </div>

        
    </div>
    <!-- main container end -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script>
        function setTwoNumberDecimal(event) {
            this.value = parseFloat(this.value).toFixed(2);
        }    
    </script>
</body>
</html>