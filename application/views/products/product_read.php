
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk - NusantaraInstan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background: linear-gradient(120deg, #e5ecf3 60%, #f6f8fa 100%);
            min-height: 100vh;
        }
        .product-detail-card {
            border-radius: 22px;
            background: #fff;
            box-shadow: 0 8px 40px rgba(66,133,244,0.13);
            max-width: 540px;
            margin: 3rem auto;
            padding: 2.5rem 2.5rem 2rem 2.5rem;
            position: relative;
            overflow: hidden;
        }
        .product-img {
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(66,133,244,0.10);
            margin-bottom: 1.5rem;
            width: 220px;
            height: 220px;
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 4px solid #e5ecf3;
            background: #f6f8fa;
        }
        .product-title {
            font-weight: bold;
            color: #4285f4;
            margin-bottom: 1.2rem;
            text-align: center;
            letter-spacing: 1px;
            font-size: 2rem;
        }
        .product-info-list {
            list-style: none;
            padding: 0;
            margin: 0 0 1.5rem 0;
        }
        .product-info-list li {
            margin-bottom: 0.7rem;
            font-size: 1.08rem;
        }
        .product-info-list b {
            min-width: 90px;
            display: inline-block;
            color: #34a853;
        }
        .desc-box {
            background: #f6f8fa;
            border-radius: 10px;
            padding: 1rem 1.2rem;
            font-size: 1.05rem;
            color: #444;
            margin-bottom: 1.5rem;
        }
        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .badge-stock {
            font-size: 0.95em;
            padding: 0.4em 0.8em;
            border-radius: 8px;
        }
        .price-tag {
            font-size: 1.25rem;
            font-weight: bold;
            color: #e67e22;
            letter-spacing: 1px;
        }
        .product-detail-card::before {
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
    </style>
</head>
<body>
<div class="container">
    <div class="product-detail-card animate__animated animate__fadeInDown">
        <h3 class="product-title"><i class="fa-solid fa-box"></i> Detail Produk</h3>
        <?php
            if (! $this->session->userdata('username')) {
                redirect('auth/login');
            }
            $img = !empty($product->photo) ? $product->photo : 'default.png';
        ?>
        <img src="<?= base_url('uploads/products/'.$img) ?>" class="product-img" alt="<?= $product->name ?>">
        <ul class="product-info-list">
            <li><b>Nama</b> : <?= $product->name ?></li>
            <li><b>Kategori</b> : <?= $product->type ?></li>
            <li>
                <b>Stok</b> : 
                <?php if ($product->stock > 0): ?>
                    <span class="badge bg-success badge-stock"><?= $product->stock ?> tersedia</span>
                <?php else: ?>
                    <span class="badge bg-danger badge-stock">Habis</span>
                <?php endif; ?>
            </li>
            <li>
                <b>Harga</b> : <span class="price-tag">Rp <?= number_format($product->price,0,',','.') ?></span>
            </li>
        </ul>
        <div class="desc-box">
            <b>Deskripsi:</b><br>
            <?= nl2br($product->description) ?>
        </div>
        <a href="<?=site_url('products')?>" class="btn btn-outline-primary back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Produk
        </a>
    </div>
</div>
<script src=