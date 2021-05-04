<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Products</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/stylesheets/admin_products.css">
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
                    <li><a href="/admin/brands" class="nav-link px-2 text-white">Brand & Categories</a></li>
                    <li><a href="/admin/products" class="nav-link px-2 text-warning border rounded border-warning">Products</a></li>
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

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-plus-square"></i> Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/products/add_new_item" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <select class="form-select" aria-label="Default select example" name="brand">
<?php                       foreach($brands as $brand):                 ?>
                                <option value="<?= $brand['id'] ?>"><?= $brand['brand'] ?></option>
<?php                       endforeach;                                 ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Product Name">
                            <?php echo form_error('name'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="description" placeholder="Enter Description">
                            <?php echo form_error('description'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example" name="category">
<?php                       foreach($categories as $category):                 ?>
                                <option value="<?= $category['id'] ?>"><?= $category['category'] ?></option>
<?php                       endforeach;                                 ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1">
                            <?php echo form_error('quantity'); ?>
                        </div>
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="price">₱</span>
                            <input type="number" class="form-control" name="price" onchange="setTwoNumberDecimal" min="0" step="0.25" value="0.00" />
                            <?php echo form_error('price'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
<?php                   if ($this->session->flashdata('image_error')) { ?>
                            <div class="alert alert-danger"> <?= $this->session->flashdata('image_error') ?> </div>
<?php                   } ?>
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

        <div class="position-relative overflow-hidden bg-light banner-bgs min-vh-100">
            
            <div class="container dashboard-table p-5 my-5">
<?php if ($this->session->flashdata('error')) { ?>
             <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('success')) { ?>
             <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
<?php } ?>
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
                                Add New Product
                            </button>
                        </div>
                        
                      </div>
                      
                </form>

                <table class="table table-bordered border-dark table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Picture</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Inventory Count</th>
                            <th scope="col">Quantity Sold</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php               foreach($items as $item):               ?>
                        <tr>
                            <td><img src="<?=base_url('product_images/'.$item['image'])?>" class="rounded mx-auto d-block" alt="" height="55"></td>
                            <th class="align-middle" scope="row"><?= $item['id'] ?></th>
                            <td class="align-middle"><?= $item['name'] ?></td>
                            <td class="align-middle"><?= $item['qty'] ?></td>
                            <td class="align-middle">0</td>
                            <td class="text-center align-middle"><a href="">edit</a>|<a href="">delete</a></td>
                        </tr>
<?php               endforeach;                               ?>
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