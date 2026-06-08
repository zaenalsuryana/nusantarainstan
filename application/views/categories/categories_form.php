
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NusantaraInstan - Category Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- FontAwesome -->
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
        .category-form-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            margin-top: 0 !important;
            width: 100%;
            max-width: 500px;
            padding: 2rem 2rem 1.5rem 2rem;
            position: relative;
        }
        .form-section-title {
            font-weight: bold;
            letter-spacing: 1px;
            color: #4285f4;
            margin-bottom: 0.5rem;
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
        .form-label {
            font-weight: 500;
        }
        .input-group-text {
            background: #f6f8fa;
            border: none;
        }
        .form-control:focus, .form-select:focus, textarea:focus {
            border-color: #4285f4;
            box-shadow: 0 0 0 2px #a3c2f7;
        }
        .icon-form {
            color: #4285f4;
        }
        @media (max-width: 991px) {
            .sidebar {
                min-height: auto;
                padding-bottom: 24px;
            }
            .category-form-card {
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
            .category-form-card {
                padding: 0.5rem 0.2rem;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Sidebar -->
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
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='categories'?'active':'' ?>" href="<?=site_url('categories')?>">
                        <i class="fa-solid fa-layer-group"></i> Categories
                    </a>
                </li>
                <?php if($this->session->userdata('usertype')=='Admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='users'?'active':'' ?>" href="<?=site_url('users')?>">
                        <i class="fa-solid fa-users-gear"></i> Users
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
        <!-- Main Content -->
        <main class="col-lg-9 col-md-8 main-content">
            <div class="category-form-card card shadow-lg w-100 animate__animated animate__fadeInRight">
                <h2 class="form-section-title mb-3"><i class="fa-solid fa-layer-group"></i> CATEGORIES FORM</h2>
                <hr>
                <?php
                    $name = '';
                    $description = '';
                    if(isset($categories)) {
                        $name = $categories->cate_name;
                        $description = $categories->description;
                    }
                ?>
                <form action="" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-tag icon-form"></i></span>
                            <input type="text" name="cate_name" value="<?=$name?>" class="form-control" required>
                            <div class="invalid-feedback">Nama kategori wajib diisi.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" required rows="3"><?=$description?></textarea>
                        <div class="invalid-feedback">Deskripsi wajib diisi.</div>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="submit" class="btn btn-primary" name="submit" value="SAVE">
                        <a href="<?= site_url('categories') ?>" class="btn btn-secondary">
                            <i class="fa-solid fa-xmark"></i> CANCEL
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Bootstrap validation
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
</script>