
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna - NusantaraInstan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e5ecf3 60%, #f6f8fa 100%);
            min-height: 100vh;
        }
        .main-content {
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 2rem;
        }
        .profile-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            width: 100%;
            max-width: 600px;
            padding: 2rem 2rem 1.5rem 2rem;
            position: relative;
        }
        .profile-img {
            border-radius: 50%;
            border: 3px solid #e5ecf3;
            box-shadow: 0 2px 8px rgba(66,133,244,0.07);
            margin-bottom: 1rem;
        }
        .profile-table td {
            padding: 6px 10px 6px 0;
            font-size: 1.05em;
        }
        .profile-actions a {
            margin-right: 10px;
            font-size: 0.95em;
        }
        .profile-title {
            font-weight: bold;
            letter-spacing: 1px;
            color: #4285f4;
            margin-bottom: 0.5rem;
        }
        @media (max-width: 767px) {
            .main-content {
                padding-top: 0.5rem;
            }
            .profile-card {
                padding: 0.5rem 0.2rem;
            }
        }
    </style>
</head>
<body>
<div class="main-content">
    <div class="profile-card card shadow-lg w-100 animate__animated animate__fadeInRight">
        <h2 class="profile-title mb-3"><i class="fa-solid fa-user"></i> Profil Pengguna</h2>
        <?php
            if (! $this->session->userdata('username')) {
                redirect('auth/login');
            }
            $img = !empty($user->photo) ? $user->photo : 'default.png';
        ?>
        <div class="text-center">
            <img src="<?= base_url('uploads/users/'.$img) ?>" width="128" height="128" alt="Foto Profil" class="profile-img mb-2">
        </div>
        <table class="profile-table mb-3 mx-auto">
            <tr><td>Nama Lengkap</td><td>: <?= $user->fullname ?></td></tr>
            <tr><td>Username</td><td>: <?= $user->username ?></td></tr>
            <tr><td>Email</td><td>: <?= $user->email ?></td></tr>
            <tr><td>Alamat</td><td>: <?= $user->address ?></td></tr>
            <tr><td>No. HP</td><td>: <?= $user->phone ?></td></tr>
            <tr><td>Tipe User</td><td>: <?= $user->usertype ?></td></tr>
        </table>
        <div class="profile-actions mb-2">
            <a href="<?= site_url('auth/changephoto') ?>" class="btn btn-outline-primary btn-sm mb-1"><i class="fa-solid fa-image"></i> Ganti Foto</a>
            <a href="<?= site_url('auth/changepass') ?>" class="btn btn-outline-warning btn-sm mb-1"><i class="fa-solid fa-key"></i> Ganti Password</a>
            <a href="<?= site_url('users/edit/'.$user->userid) ?>" class="btn btn-outline-success btn-sm mb-1"><i class="fa-solid fa-pen"></i> Edit Profil</a>
            <a href="<?= site_url() ?>" class="btn btn-outline-secondary btn-sm mb-1"><i class="fa-solid fa-house"></i> Kembali ke Home</a>
        </div>
    </div>
</div>
<script src=