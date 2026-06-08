
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSTANT FOOD SHOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e5ecf3 60%, #f6f8fa 100%);
            min-height: 100vh;
        }
        .sidebar {
            background: linear-gradient(135deg, #4285f4 80%, #34a853 100%);
            min-height: 100vh;
            color: #fff;
            padding: 0;
        }
        .sidebar .nav-link {
            color: #fff;
            font-weight: 500;
            font-size: 1.1em;
            border-radius: 8px;
            margin: 6px 0;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.18);
            color: #fff;
        }
        .sidebar .nav-link i {
            width: 28px;
            text-align: center;
        }
        .brand-logo {
            font-size: 2.2rem;
            margin-bottom: 10px;
            color: #fff;
            text-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .sidebar .sidebar-footer {
            position: absolute;
            bottom: 24px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 0.95em;
            opacity: 0.85;
        }
        .main-content {
            min-height: 100vh;
            background: transparent;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 0 !important;
        }
        .products-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            margin-top: 0 !important;
            width: 100%;
        }
        .table-products th, .table-products td {
            vertical-align: middle !important;
        }
        .product-img-thumb {
            border-radius: 8px;
            border: 2px solid #e5ecf3;
            box-shadow: 0 2px 8px rgba(66,133,244,0.07);
        }
        .btn-action {
            margin: 2px 0;
        }
        .add-cart-btn {
            min-width: 120px;
        }
        .table-responsive {
            margin-bottom: 0;
        }
        .products-header {
            font-weight: bold;
            letter-spacing: 1px;
        }
        @media (max-width: 991px) {
            .sidebar {
                min-height: auto;
                padding-bottom: 24px;
            }
            .products-card {
                margin-top: 0 !important;
            }
            .main-content {
                padding-top: 0 !important;
            }
        }
        @media (max-width: 767px) {
            .sidebar {
                border-radius: 0 0 18px 18px;
            }
            .main-content {
                padding-top: 0 !important;
            }
            .products-card {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row min-vh-100">
        <nav class="col-lg-3 col-md-4 sidebar d-flex flex-column align-items-center py-4 position-relative animate__animated animate__fadeInLeft">
            <div class="brand-logo mb-2">
                <i class="fa-solid fa-bowl-food"></i>
            </div>
            <h3 class="mb-4 text-center">NusantaraInstan</h3>
            <ul class="nav flex-column w-100 px-2">
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='products'?'active':'' ?>" href="<?=site_url('products')?>">
                        <i class="fa-solid fa-store"></i> Produk
                    </a>
                </li>
                <?php if($this->session->userdata('usertype')=='Admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='categories'?'active':'' ?>" href="<?=site_url('categories')?>">
                        <i class="fa-solid fa-layer-group"></i> Kelola Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='users'?'active':'' ?>" href="<?=site_url('users')?>">
                        <i class="fa-solid fa-users-gear"></i> Kelola Users
                    </a>
                </li>
                <?php if($this->session->userdata('usertype')=='Customer') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='cart/view'?'active':'' ?>" href="<?=site_url('cart/view')?>">
                        <i class="fa-solid fa-cart-shopping"></i> Keranjang
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='order/report'?'active':'' ?>" href="<?=site_url('order/report')?>">
                        <i class="fa-solid fa-file-lines"></i> Order Report
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='users/profile'?'active':'' ?>" href="<?=site_url('users/profile')?>">
                        <i class="fa-solid fa-user"></i> Profil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('auth/logout')?>">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer mt-auto">
                <small>&copy; <?=date('Y')?> NusantaraInstan</small>
            </div>
        </nav>
        <main class="col-lg-9 col-md-8 main-content">
            <div class="products-card card shadow-lg w-100 animate__animated animate__fadeInRight p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h2 class="products-header mb-0"><i class="fa-solid fa-store"></i> PRODUCTS LIST</h2>
                        <small class="text-muted">INSTANT FOOD SHOP</small>
                    </div>
                    <div>
                        <a href="<?=base_url()?>" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-house"></i> HOME</a>
                        <?php if($this->session->userdata('usertype')=='Customer') { ?>
                        <a href="<?=site_url('cart/view')?>" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-cart-shopping"></i> Keranjang</a>
                        <?php } ?>
                        <?php if($this->session->userdata('usertype')=='Admin') { ?>
                        <a href="<?=site_url('products/add')?>" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-plus"></i> Tambah Produk</a>
                        <?php } ?>
                    </div>
                </div>
                <?=$this->session->flashdata('msg')?> 
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle table-products">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Name</th>  
                                <th>Gambar</th>
                                <th>Type</th>
                                <th>Stock</th>
                                <th>Price (Rp)</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = $i ?? 1; foreach($products as $product) { ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$product->name?></td>
                                <td>
                                    <?php
                                    $img = !empty($product->photo) ? $product->photo : 'default.png';
                                    ?>
                                    <img src="<?= base_url('uploads/products/'.$img) ?>" width="80" class="product-img-thumb">
                                </td>
                                <td><?=$product->type?></td>
                                <td><?=$product->stock?></td>
                                <td><?=number_format($product->price,0,',','.')?></td>
                                <td>
                                    <a href="<?=site_url('products/read/'.$product->id_product)?>" class="btn btn-info btn-sm btn-action">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </a>
                                </td>
                                <?php if($this->session->userdata('usertype')=='Admin') { ?>
                                <td>
                                    <a href="<?=site_url('products/edit/'.$product->id_product)?>" class="btn btn-warning btn-sm btn-action">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="<?=site_url('products/delete/'.$product->id_product)?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Are you sure?')">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>
                                </td>
                                <?php } ?>
                                <?php if($this->session->userdata('usertype')=='Customer') { ?>
                                <td>
                                    <form class="add-to-cart-form d-inline" action="<?=site_url('cart/add')?>" method="post">
                                        <input type="hidden" name="product_id" value="<?=$product->id_product?>">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" class="btn btn-success btn-sm add-cart-btn">
                                            <i class="fa-solid fa-cart-plus"></i> + Keranjang
                                        </button>
                                    </form>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <?=$this->pagination->create_links();?>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$('.add-to-cart-form').on('submit', function(e){
    e.preventDefault();
    var form = $(this);
    $.post(form.attr('action'), form.serialize(), function(response){
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: response,
            timer: 1500,
            showConfirmButton: false
        });
    });
});
</script>
</body>
</html>