<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
        min-height: 100vh;
    }
    .register-card {
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .register-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 16px 40px 0 rgba(31, 38, 135, 0.20);
    }
    .register-header {
        background: linear-gradient(90deg, #4f8cff 60%, #38b6ff 100%);
        color: #fff;
        padding: 32px 0 22px 0;
        text-align: center;
        border-bottom-left-radius: 40px 20px;
        border-bottom-right-radius: 40px 20px;
    }
    .register-header i {
        font-size: 2.7rem;
        margin-bottom: 10px;
        color: #fff;
    }
    .form-label {
        font-weight: 500;
        color: #4f8cff;
    }
    .btn-register {
        background: linear-gradient(90deg, #4f8cff 60%, #38b6ff 100%);
        border: none;
        font-weight: 600;
        letter-spacing: 1px;
        transition: background 0.2s;
    }
    .btn-register:hover {
        background: linear-gradient(90deg, #38b6ff 60%, #4f8cff 100%);
    }
    .login-link {
        display: block;
        text-align: center;
        margin-top: 18px;
        color: #4f8cff;
        text-decoration: none;
        font-size: 0.97rem;
        transition: color 0.2s;
    }
    .login-link:hover {
        color: #2563eb;
        text-decoration: underline;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card register-card">
                <div class="register-header">
                    <i class="fa-solid fa-user-plus"></i>
                    <h3 class="mb-0 mt-2">Register Akun Customer</h3>
                </div>
                <div class="card-body p-4">
                    <form action="<?=site_url('auth/register')?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="phone" class="form-control" placeholder="No. Telepon" pattern="[0-9]+" inputmode="numeric" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="address" class="form-control" placeholder="Alamat" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <i class="fa-solid fa-user-plus me-2"></i>
                            <input type="submit" name="register" class="btn btn-register w-100 mt-2" value="Daftar Akun">
                        </div>
                        <div class="text-danger mb-2"><?=validation_errors()?></div>
                        <?php if($this->session->flashdata('msg')): ?>
                            <div class="alert alert-info"><?= $this->session->flashdata('msg') ?></div>
                        <?php endif; ?>                                                                         1                                               
                    </form>
                    <a href="<?=site_url('auth/login')?>" class="login-link">
                        <i class="fa-solid fa-arrow-left"></i> Sudah punya akun? Login di sini
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>