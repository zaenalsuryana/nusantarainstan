<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #<?= isset($order->id_order) ? $order->id_order : '' ?></title>
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
        .invoice-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            width: 100%;
            max-width: 700px;
            padding: 2rem 2rem 1.5rem 2rem;
            position: relative;
        }
        .invoice-title {
            font-weight: bold;
            letter-spacing: 1px;
            color: #4285f4;
            margin-bottom: 0.5rem;
        }
        .table-invoice th, .table-invoice td {
            vertical-align: middle !important;
            font-size: 0.97em;
        }
        .btn-xs {
            padding: 0.15rem 0.5rem !important;
            font-size: 0.75em !important;
            line-height: 1.2 !important;
        }
        .status-btns {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }
        .proof-img {
            max-width: 220px;
            max-height: 220px;
            border-radius: 10px;
            border: 2px solid #e5ecf3;
            margin-bottom: 10px;
            box-shadow: 0 2px 12px rgba(66,133,244,0.10);
        }
        .proof-label {
            font-weight: 500;
            color: #34a853;
        }
        @media (max-width: 767px) {
            .main-content {
                padding-top: 0.5rem;
            }
            .invoice-card {
                padding: 0.5rem 0.2rem;
            }
            .status-btns {
                flex-direction: column;
                gap: 0.5rem;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>
<div class="main-content">
    <div class="invoice-card card shadow-lg w-100 animate__animated animate__fadeInRight">
        <h3 class="invoice-title mb-3"><i class="fa-solid fa-file-invoice"></i> Invoice #<?= isset($order->id_order) ? $order->id_order : '' ?></h3>
        <?php
            if (! $this->session->userdata('username')) {
                redirect('auth/login');
            }
            $usertype = $this->session->userdata('usertype');
            $from = $this->input->get('from');

            if ($usertype == 'Customer' || $from == 'cart') {
                echo '<a href="'.site_url('cart/view').'" class="btn btn-secondary btn-sm mb-2 me-1"><i class="fa-solid fa-cart-shopping"></i> Back to Cart</a> ';
                echo '<a href="'.site_url('products').'" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-store"></i> Back to Product List</a>';
            } else {
                echo '<a href="'.site_url('order/report').'" class="btn btn-secondary btn-sm mb-2"><i class="fa-solid fa-arrow-left"></i> Back to Report</a>';
            }
        ?>
        <div class="mt-3 mb-2">
            <p class="mb-1"><b>Tanggal:</b> <?= $order->order_date ?></p>
            <p class="mb-1"><b>Status:</b> <span id="order-status"><?= $order->status ?></span></p>
            <p class="mb-1"><b>Alamat:</b> <?= $order->shipping_address ?></p>
            <p class="mb-1"><b>No. HP:</b> <?= $order->shipping_phone ?></p>
            <p class="mb-1"><b>Metode Pembayaran:</b> <?= strtoupper($order->payment_method) ?></p>
        </div>
        <?php if (!empty($order->payment_proof)): ?>
            <div class="mb-3">
                <span class="proof-label"><i class="fa-solid fa-image"></i> Bukti Pembayaran:</span><br>
                <a href="<?= base_url('uploads/payment_proof/'.$order->payment_proof) ?>" target="_blank">
                    <img src="<?= base_url('uploads/payment_proof/'.$order->payment_proof) ?>" class="proof-img" alt="Bukti Pembayaran">
                </a>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle table-invoice small">
                <thead class="table-primary">
                    <tr>
                        <th>Produk</th> 
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $total = 0;
                foreach($order->items as $item): 
                    $total += $item->subtotal;
                ?>
                <tr>
                    <td><?=$item->product_id?></td>
                    <td><?=$item->qty?></td>
                    <td>Rp <?= number_format($item->price, 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($item->subtotal, 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" align="right" class="border-0"><b>Total</b></td>
                    <td class="border-0"><b>Rp <?= number_format($total, 0, ',', '.') ?></b></td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php if ($order->status == 'Pending' && $this->session->userdata('usertype') == 'Admin'): ?>
        <div class="status-btns">
            <form id="form-success" method="post" action="<?= site_url('order/update_status/'.$order->id_order) ?>" style="display:inline;">
                <input type="hidden" name="status" value="Dikirim">
                <button type="submit" class="btn btn-success" id="btn-success-order">
                    <i class="fa-solid fa-circle-check"></i> Tandai Pembayaran Berhasil & Pesanan Dikirim
                </button>
            </form>
            <form id="form-invalid" method="post" action="<?= site_url('order/update_status/'.$order->id_order) ?>" style="display:inline;">
                <input type="hidden" name="status" value="Pembayaran Tidak Valid">
                <button type="submit" class="btn btn-danger" id="btn-invalid-payment">
                    <i class="fa-solid fa-circle-xmark"></i> Tandai Pembayaran Tidak Valid
                </button>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if ($this->session->flashdata('msg')): ?>
    Swal.fire({
        icon: 'info',
        title: 'Info',
        html: '<?= $this->session->flashdata('msg'); ?>',
        timer: 2500,
        showConfirmButton: false
    });
    <?php endif; ?>
</script>
</body>
</html>