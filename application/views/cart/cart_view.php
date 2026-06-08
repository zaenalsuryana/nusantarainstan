
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart - NusantaraInstan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background: linear-gradient(120deg, #e5ecf3 60%, #f6f8fa 100%);
            min-height: 100vh;
        }
        .cart-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            max-width: 700px;
            margin: 3rem auto;
            padding: 2rem 2rem 1.5rem 2rem;
        }
        .cart-title {
            font-weight: bold;
            color: #4285f4;
            margin-bottom: 1.2rem;
            text-align: center;
            letter-spacing: 1px;
            font-size: 2rem;
        }
        .cart-actions {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }
        .cart-empty {
            text-align: center;
            color: #888;
            font-size: 1.1rem;
            margin: 2rem 0;
        }
        .btn-xs {
            padding: 0.15rem 0.5rem !important;
            font-size: 0.75em !important;
            line-height: 1.2 !important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="cart-card animate__animated animate__fadeInDown">
        <div class="cart-title"><i class="fa-solid fa-cart-shopping"></i> Shopping Cart</div>
        <?php
        if (! $this->session->userdata('username')) {
            redirect('auth/login');
        }?>
        <div class="mb-3">
            <a href="<?= site_url('products') ?>" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left"></i> Back to Products
            </a>
        </div>
        <hr>
        <?php if (empty($cart)) : ?>
            <div class="cart-empty">
                <i class="fa-regular fa-face-frown fa-2x mb-2"></i><br>
                Your cart is empty.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; $total=0; foreach($cart as $item): 
                        $subtotal = $item['qty'] * $item['price'];
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td>Rp <?= number_format($item['price'],0,',','.') ?></td>
                        <td>Rp <?= number_format($subtotal,0,',','.') ?></td>
                        <td>
                            <a href="<?= site_url('cart/remove/'.$item['product_id']) ?>" class="btn btn-danger btn-xs btn-sm" onclick="return confirm('Remove this item?')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" align="right"><b>Total</b></td>
                        <td colspan="2"><b>Rp <?= number_format($total,0,',','.') ?></b></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart-actions">
                <a href="<?= site_url('cart/clear') ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Clear all items?')">
                    <i class="fa-solid fa-trash-can"></i> Clear Cart
                </a>
                <a href="<?= site_url('order/checkout') ?>" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-cash-register"></i> Checkout
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<script src=