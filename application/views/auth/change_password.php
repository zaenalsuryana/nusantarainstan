<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password - NusantaraInstan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e5ecf3 60%, #f6f8fa 100%);
            min-height: 100vh;
        }
        .changepass-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .changepass-card {
            border-radius: 22px;
            background: #fff;
            box-shadow: 0 8px 40px rgba(66,133,244,0.13);
            max-width: 420px;
            width: 100%;
            padding: 2.5rem 2.5rem 2rem 2.5rem;
            position: relative;
            overflow: hidden;
        }
        .changepass-card::before {
            content: '';
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
        .changepass-title {
            font-weight: bold;
            color: #4285f4;
            margin-bottom: 1.2rem;
            text-align: center;
            letter-spacing: 1px;
            font-size: 2rem;
        }
        .changepass-subtitle {
            text-align: center;
            color: #34a853;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        .form-label {
            font-weight: 500;
            color: #4285f4;
        }
        .btn-primary {
            background: linear-gradient(90deg, #4285f4 70%, #34a853 100%);
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #34a853 70%, #4285f4 100%);
        }
        .back-link {
            display: block;
            margin-top: 1.5rem;
            text-align: center;
            color: #4285f4;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: #34a853;
            text-decoration: underline;
        }
        .icon-circle {
            background: linear-gradient(135deg, #4285f4 60%, #34a853 100%);
            color: #fff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.2rem auto;
            box-shadow: 0 2px 12px rgba(66,133,244,0.13);
        }
    </style>
</head>
<body>
<div class="changepass-wrapper">
    <div class="changepass-card animate__animated animate__fadeInDown">
        <div class="icon-circle mb-2">
            <i class="fa-solid fa-key"></i>
        </div>
        <div class="changepass-title">NusantaraInstan</div>
        <div class="changepass-subtitle">Change Your Password</div>
        <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-info"><?= $this->session->flashdata('msg') ?></div>
        <?php endif; ?>
        <?php if(validation_errors()): ?>
            <div class="alert alert-danger"><?= validation_errors() ?></div>
        <?php endif; ?>
        <form action="" method="post" class="needs-validation" novalidate autocomplete="off">
            <div class="mb-3">
                <label class="form-label">Old Password</label>
                <input type="password" name="oldpassword" class="form-control" required autocomplete="current-password">
                <div class="invalid-feedback">Masukkan password lama Anda.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="newpassword" class="form-control" required autocomplete="new-password">
                <div class="invalid-feedback">Masukkan password baru.</div>
            </div>
            <div class="d-grid">
                <input type="submit" class="btn btn-primary" name="change" value="Change Password">
            </div>
        </form>
        <a href="<?=base_url()?>" class="back-link mt-3">
            <i class="fa-solid fa-arrow-left"></i> Back to Home
        </a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>