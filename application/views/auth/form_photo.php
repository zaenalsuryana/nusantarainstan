<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NusantaraInstan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .photo-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            padding: 2rem 2.5rem;
            min-width: 340px;
            max-width: 400px;
        }
        .photo-card h1 {
            font-size: 1.7rem;
            color: #4f8cff;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .photo-card h3 {
            font-size: 1.2rem;
            color: #222;
            margin-bottom: 1.5rem;
        }
        .current-photo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        .current-photo img {
            border-radius: 50%;
            border: 2px solid #e0e7ff;
            box-shadow: 0 2px 12px rgba(66,133,244,0.10);
        }
        .form-label {
            font-weight: 500;
            color: #4f8cff;
        }
        .btn-upload {
            background: linear-gradient(90deg, #4f8cff 60%, #38b6ff 100%);
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-upload:hover {
            background: linear-gradient(90deg, #38b6ff 60%, #4f8cff 100%);
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #4f8cff;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: #2563eb;
            text-decoration: underline;
        }
        .msg {
            margin-bottom: 1rem;
        }
    </style>
    <?php
    if (! $this->session->userdata('username')) {
        redirect('auth/login');}?>
</head>
<body>
    <div class="photo-card">
        <h1><i class="fa-solid fa-bowl-food"></i> NusantaraInstan</h1>
        <h3><i class="fa-solid fa-image"></i> Change Photo</h3>

        <?php if ($this->session->flashdata('msg')): ?>
            <div class="alert alert-info msg"><?= $this->session->flashdata('msg') ?></div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger msg"><?= $error ?></div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 current-photo">
                <span class="form-label">Current Photo:</span>
                <?php 
                    $photo = $this->session->userdata('photo');
                    $img = !empty($photo) ? $photo : 'default.png';
                ?>
                <img src="<?= base_url('uploads/users/'.$img) ?>" width="90" height="90" />
            </div>
            <div class="mb-3">
                <label class="form-label">New Photo</label>
                <input type="file" name="photo" class="form-control" required>
            </div>
            <div class="d-grid">
                <input type="submit" name="upload" class="btn btn-upload" value="Upload Photo">
            </div>
        </form>
        <a href="<?= base_url() ?>" class="back-link"><i class="fa-solid fa-arrow-left"></i> Back to Home</a>
    </div>