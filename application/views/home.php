<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NusantaraInstan</title>
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
        .profile-img-home {
            border: 4px solid #4285f4;
            box-shadow: 0 2px 12px rgba(66,133,244,0.10);
            transition: transform 0.3s;
        }
        .profile-img-home:hover {
            transform: scale(1.07) rotate(-3deg);
        }
        .welcome-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            margin-top: 0 !important;
        }
        .welcome-title {
            font-weight: bold;
            letter-spacing: 1px;
        }
        .welcome-icon {
            font-size: 2.5rem;
            color: #4285f4;
            margin-bottom: 10px;
        }
        @media (max-width: 991px) {
            .sidebar {
                min-height: auto;
                padding-bottom: 24px;
            }
            .welcome-card {
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
            .profile-img-home {
                width: 90px !important;
                height: 90px !important;
            }
            .main-content {
                padding-top: 0 !important;
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
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='order/report'?'active':'' ?>" href="<?=site_url('order/report')?>">
                        <i class="fa-solid fa-file-lines"></i> Order Report
                    </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('usertype')=='Customer') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='cart/view'?'active':'' ?>" href="<?=site_url('cart/view')?>">
                        <i class="fa-solid fa-cart-shopping"></i> Keranjang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='order/my_orders'?'active':'' ?>" href="<?=site_url('order/my_orders')?>">
                        <i class="fa-solid fa-file-invoice"></i> Pesanan Saya
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
            <div class="welcome-card card shadow-lg w-100 animate__animated animate__fadeInRight">
                <div class="card-body text-center">
                    <?php
                    $photo = $this->session->userdata('photo');
                    $img = !empty($photo) ? $photo : 'default.png';
                    ?>
                    <img src="<?= base_url('uploads/users/'.$img) ?>" class="rounded-circle mb-3 profile-img-home" width="128" height="128" alt="Foto Profil">
                    <div class="welcome-icon animate__animated animate__bounceIn">
                        <i class="fa-solid fa-hand-sparkles"></i>
                    </div>
                    <h2 class="welcome-title mb-2">Selamat Datang!</h2>
                    <?php
                    if ($this->session->userdata('usertype') == 'Customer') {
                        echo '<h4 class="text-success animate__animated animate__fadeInLeft">Halo, <b>' . $this->session->userdata('fullname') . '</b>! Selamat berbelanja di NusantaraInstan.</h4>';
                    } else {
                        echo '<h4 class="text-primary animate__animated animate__fadeInRight">Welcome <b>' . $this->session->userdata('fullname') . '</b>, you are login as <b>' . $this->session->userdata('usertype') . '</b>.</h4>';
                    }
                    ?>
                    <hr>
                    <div class="row g-3 justify-content-center mt-2">
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="<?=site_url('products')?>" class="btn btn-outline-primary w-100 py-3 shadow-sm animate__animated animate__zoomIn">
                                <i class="fa-solid fa-store fa-2x mb-2"></i><br>Produk
                            </a>
                        </div>
                        <?php if($this->session->userdata('usertype')=='Admin') { ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="<?=site_url('categories')?>" class="btn btn-outline-success w-100 py-3 shadow-sm animate__animated animate__zoomIn">
                                <i class="fa-solid fa-layer-group fa-2x mb-2"></i><br>Categories
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="<?=site_url('users')?>" class="btn btn-outline-info w-100 py-3 shadow-sm animate__animated animate__zoomIn">
                                <i class="fa-solid fa-users-gear fa-2x mb-2"></i><br>Users
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="<?=site_url('order/report')?>" class="btn btn-outline-secondary w-100 py-3 shadow-sm animate__animated animate__zoomIn">
                                <i class="fa-solid fa-file-lines fa-2x mb-2"></i><br>Order Report
                            </a>
                        </div>
                        <?php } ?>
                        <?php if($this->session->userdata('usertype')=='Customer') { ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="<?=site_url('cart/view')?>" class="btn btn-outline-warning w-100 py-3 shadow-sm animate__animated animate__zoomIn">
                                <i class="fa-solid fa-cart-shopping fa-2x mb-2"></i><br>Keranjang
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="<?=site_url('order/my_orders')?>" class="btn btn-outline-info w-100 py-3 shadow-sm animate__animated animate__zoomIn">
                                <i class="fa-solid fa-file-invoice fa-2x mb-2"></i><br>Pesanan Saya
                            </a>
                        </div>
                        <?php } ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="<?=site_url('users/profile')?>" class="btn btn-outline-dark w-100 py-3 shadow-sm animate__animated animate__zoomIn">
                                <i class="fa-solid fa-user fa-2x mb-2"></i><br>Profil
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="<?=site_url('auth/logout')?>" class="btn btn-outline-danger w-100 py-3 shadow-sm animate__animated animate__zoomIn">
                                <i class="fa-solid fa-right-from-bracket fa-2x mb-2"></i><br>Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($this->session->flashdata('msg')): ?>
        Swal.fire({
            icon: 'info',
            title: 'Info',
            html: '<?= $this->session->flashdata('msg'); ?>',
            timer: 2500,
            showConfirmButton: false
        });
        <?php endif; ?>
    });
</script>
</body>
</html>