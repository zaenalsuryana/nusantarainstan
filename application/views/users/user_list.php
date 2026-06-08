
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NusantaraInstan - Users List</title>
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
        .users-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            margin-top: 0 !important;
            width: 100%;
            max-width: 1100px;
            padding: 2rem 2rem 1.5rem 2rem;
            position: relative;
        }
        .users-header {
            font-weight: bold;
            letter-spacing: 1px;
            color: #4285f4;
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
        .table-users th, .table-users td {
            vertical-align: middle !important;
        }
        .table-users th {
            white-space: nowrap;
        }
        .table-users td {
            word-break: break-word;
        }
        .btn-xs {
            padding: 0.15rem 0.5rem !important;
            font-size: 0.75em !important;
            line-height: 1.2 !important;
        }
        @media (max-width: 991px) {
            .sidebar {
                min-height: auto;
                padding-bottom: 24px;
            }
            .users-card {
                margin-top: 0 !important;
                max-width: 100vw;
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
            .users-card {
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
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='categories'?'active':'' ?>" href="<?=site_url('categories')?>">
                        <i class="fa-solid fa-layer-group"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= uri_string()=='users'?'active':'' ?>" href="<?=site_url('users')?>">
                        <i class="fa-solid fa-users-gear"></i> Users
                    </a>
                </li>
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
            <div class="users-card card shadow-lg w-100 animate__animated animate__fadeInRight">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h2 class="users-header mb-0"><i class="fa-solid fa-users"></i> USERS LIST</h2>
                        <small class="text-muted">Daftar seluruh user aplikasi</small>
                    </div>
                    <div>
                        <a href="<?=base_url()?>" class="btn btn-secondary btn-sm"><i class="fa-solid fa-house"></i> HOME</a>
                        <a href="<?=site_url('users/add')?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-user-plus"></i> Add New User</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle table-users small">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Username</th>  
                                <th>Usertype</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>No. Telepon</th>
                                <th>Alamat</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($users as $user) { ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$user->username?></td>
                            <td><?=$user->usertype?></td>
                            <td><?=$user->fullname?></td>
                            <td><?=$user->email?></td>
                            <td><?=$user->phone?></td>
                            <td><?=$user->address?></td>
                            <td>
                                <a href="<?=site_url('users/edit/'.$user->userid)?>" class="btn btn-warning btn-xs btn-sm">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                            </td>
                            <td>
                                <a href="<?=site_url('users/delete/'.$user->userid)?>" class="btn btn-danger btn-xs btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                            <td>
                                <a href="<?=site_url('auth/resetpass/'.$user->username)?>" class="btn btn-info btn-xs btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fa-solid fa-key"></i> Reset Password
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
<script src=