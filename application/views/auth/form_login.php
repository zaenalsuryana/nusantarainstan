<?php
 defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NusantaraInstan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #f6f8fa, #e5ecf3);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.13);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-direction: row;
        }
        .login-image {
            background: linear-gradient(135deg, #4285f4 60%, #34a853 100%);
            color: #fff;
            flex: 1 1 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .login-image i {
            font-size: 5rem;
            margin-bottom: 18px;
            color: #fff;
            text-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .login-image h2 {
            font-weight: bold;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        .login-image p {
            font-size: 1.1em;
            opacity: 0.9;
        }
        .login-form-section {
            flex: 1 1 0;
            padding: 48px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-form-section h1 {
            text-align: center;
            color: #333;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .login-form-section h3 {
            text-align: center;
            color: #555;
            margin-bottom: 24px;
        }
        .msg {
            text-align: center;
            color: #d32f2f;
            margin-bottom: 10px;
        }
        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
                max-width: 95vw;
            }
            .login-image, .login-form-section {
                padding: 32px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-image text-center">
            <i class="fa-solid fa-bowl-food"></i>
            <h2>NusantaraInstan</h2>
            <p>Selamat datang di aplikasi belanja makanan instan Nusantara.<br>
            <i class="fa-solid fa-mug-hot"></i> <i class="fa-solid fa-utensils"></i> <i class="fa-solid fa-pepper-hot"></i>
            </p>
        </div>
        <div class="login-form-section">
            <h1><i class="fa-solid fa-right-to-bracket text-primary"></i></h1>
            <h3>LOGIN PAGE</h3>
            <hr>
            <div class="msg"><?= $this->session->flashdata('msg') ?></div>
            <div class="text-danger text-center mb-2"><?= validation_errors() ?></div>
            <form action="" method="post" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user-astronaut"></i></span>
                        <input type="text" name="username" class="form-control" required autofocus placeholder="Masukkan username">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Masukkan password">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword" tabindex="-1" title="Show/Hide Password">
                            <i class="fa-solid fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary w-100" value="LOGIN" name="login"> <i class="fa-solid fa-arrow-right-to-bracket"></i></td>
            </form>
            <p class="text-center mt-3">Belum punya akun? <a href="<?= site_url('auth/register') ?>"><i class="fa-solid fa-user-plus"></i> Daftar di sini</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
       <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>