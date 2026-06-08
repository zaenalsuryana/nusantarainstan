
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">
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
        .product-form-card {
            border-radius: 22px;
            background: #fff;
            box-shadow: 0 8px 36px rgba(66,133,244,0.13);
            margin-top: 0 !important;
            width: 100%;
            max-width: 950px;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }
        .product-form-card:before {
            content: "";
            position: absolute;
            top: -80px;
            right: -80px;
            width: 180px;
            height: 180px;
            background: linear-gradient(135deg, #4285f4 60%, #34a853 100%);
            opacity: 0.08;
            border-radius: 50%;
            z-index: 0;
        }
        .form-label {
            font-weight: 500;
        }
        .form-section-title {
            font-weight: bold;
            letter-spacing: 1px;
            color: #4285f4;
            margin-bottom: 0.5rem;
        }
        .img-preview {
            border-radius: 8px;
            border: 2px solid #e5ecf3;
            box-shadow: 0 2px 8px rgba(66,133,244,0.07);
            margin-top: 8px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #4285f4 70%, #34a853 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #34a853 70%, #4285f4 100%);
        }
        .btn-secondary {
            background: #e5ecf3;
            color: #333;
            border: none;
        }
        .btn-secondary:hover {
            background: #d1e3f8;
            color: #222;
        }
        .input-group-text {
            background: #f6f8fa;
            border: none;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4285f4;
            box-shadow: 0 0 0 2px #a3c2f7;
        }
        .icon-form {
            color: #4285f4;
        }
        .animate__fadeInRight {
            --animate-duration: 0.7s;
        }
        @media (max-width: 991px) {
            .sidebar {
                min-height: auto;
                padding-bottom: 24px;
            }
            .product-form-card {
                margin-top: 0 !important;
                max-width: 100%;
                padding: 1.2rem 0.5rem;
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
            .product-form-card {
                padding: 0.5rem 0.2rem;
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
            <div class="product-form-card card shadow-lg w-100 animate__animated animate__fadeInRight">
                <h2 class="form-section-title mb-3"><i class="fa-solid fa-pen-to-square"></i> PRODUCT FORM</h2>
                <hr>
                <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-info"><?= $this->session->flashdata('msg'); ?></div>
                <?php endif; ?>

                <?php 
                $name = $type = $stock = $price = $description = '';
                if (isset($product)) {
                    $name = $product->name ?? '';
                    $type = $product->type ?? '';
                    $stock = $product->stock ?? '';
                    $price = $product->price ?? '';
                    $description = $product->description ?? '';
                }
                ?>

                <form action="" method="post" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate>
                    <div class="col-md-7">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tag icon-form"></i></span>
                                <input type="text" name="name" value="<?= $name ?>" class="form-control" required>
                                <div class="invalid-feedback">Nama produk wajib diisi.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-layer-group icon-form"></i></span>
                                <select name="type" class="form-select" required>
                                    <option value="">Choose type</option>
                                    <?php foreach ($categories as $cate): ?>
                                        <option value="<?= $cate->cate_name ?>" <?= ($type == $cate->cate_name) ? 'selected' : '' ?>>
                                            <?= $cate->cate_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Tipe produk wajib dipilih.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-boxes-stacked icon-form"></i></span>
                                    <input type="number" name="stock" value="<?= $stock ?>" class="form-control" required min="0">
                                    <div class="invalid-feedback">Stok wajib diisi.</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price (Rp)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-money-bill-wave icon-form"></i></span>
                                    <input type="number" name="price" value="<?= $price ?>" class="form-control" required min="0">
                                    <div class="invalid-feedback">Harga wajib diisi.</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"><?= $description ?></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="submit" value="SAVE" name="submit" class="btn btn-primary">
                                <i class="fa-solid fa-floppy-disk"></i>
                            <a href="<?= site_url('products') ?>" class="btn btn-secondary">
                                <i class="fa-solid fa-xmark"></i> CANCEL
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex flex-column align-items-center justify-content-center">
                        <label class="form-label mb-2">Gambar Produk</label>
                        <input type="file" name="photo" class="form-control mb-2">
                        <?php if (!empty($product->photo)): ?>
                            <img src="<?= base_url('uploads/products/'.$product->photo) ?>" width="180" class="img-preview">
                        <?php else: ?>
                            <img src="<?= base_url('uploads/products/default.png') ?>" width="120" class="img-preview opacity-50">
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (() => {
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.from(forms).forEach(function(form){
        form.addEventListener('submit', function(event){
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })();

    <?php if ($this->session->flashdata('msg')): ?>
    Swal.fire({
        icon: 'info',
        title: 'Info',
        html: '<?= $this->session->flashdata('msg'); ?>',
        timer: 2500,
        showConfirmButton: false
    });
    <?php endif; ?>
</script>