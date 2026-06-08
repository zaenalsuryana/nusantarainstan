
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Report - NusantaraInstan</title>
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
        .report-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            width: 100%;
            max-width: 1100px;
            padding: 2rem 2rem 1.5rem 2rem;
            position: relative;
        }
        .report-title {
            font-weight: bold;
            letter-spacing: 1px;
            color: #4285f4;
            margin-bottom: 0.5rem;
        }
        .table-report th, .table-report td {
            vertical-align: middle !important;
            font-size: 0.97em;
        }
        .btn-xs {
            padding: 0.15rem 0.5rem !important;
            font-size: 0.75em !important;
            line-height: 1.2 !important;
        }
        @media (max-width: 767px) {
            .main-content {
                padding-top: 0.5rem;
            }
            .report-card {
                padding: 0.5rem 0.2rem;
            }
        }
    </style>
</head>
<body>
<div class="main-content">
    <div class="report-card card shadow-lg w-100 animate__animated animate__fadeInRight">
        <h3 class="report-title mb-3"><i class="fa-solid fa-file-invoice"></i> Order Report</h3>
        <?php
            if (! $this->session->userdata('username')) {
                redirect('auth/login');
            }
        ?>
        <div class="mb-3 d-flex flex-wrap gap-2">
            <a href="<?= site_url('welcome') ?>" class="btn btn-secondary btn-sm"><i class="fa-solid fa-house"></i> Back to Home</a>
            <a href="<?= site_url('order/report_pdf?start_date='.$start_date.'&end_date='.$end_date) ?>" target="_blank" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-file-pdf"></i> Download PDF
            </a>
        </div>
        <form method="get" action="<?= site_url('order/report') ?>" class="row g-2 align-items-end mb-3">
            <div class="col-auto">
                <label class="form-label mb-0">Start Date</label>
                <input type="date" name="start_date" value="<?= $start_date ?>" class="form-control form-control-sm">
            </div>
            <div class="col-auto">
                <label class="form-label mb-0">End Date</label>
                <input type="date" name="end_date" value="<?= $end_date ?>" class="form-control form-control-sm">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-filter"></i> Filter</button>
                <a href="<?= site_url('order/report') ?>" class="btn btn-outline-secondary btn-sm">Reset</a>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle table-report small">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $total = 0;
                foreach($orders as $order): 
                    $total += $order->total_price;
                ?>
                <tr>
                    <td><?= $order->id_order ?></td>
                    <td><?= $order->fullname ?> <span class="text-muted small">(<?= $order->username ?>)</span></td>
                    <td><?= $order->shipping_address ?></td>
                    <td><?= $order->order_date ?></td>
                    <td><?= $order->status ?></td>
                    <td>Rp <?= number_format($order->total_price,0,',','.') ?></td>
                    <td>
                        <a href="<?= site_url('order/invoice/'.$order->id_order) ?>" class="btn btn-info btn-xs btn-sm">
                            <i class="fa-solid fa-eye"></i> View
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5" align="right" class="border-0"><b>Total Transaksi</b></td>
                    <td colspan="2" class="border-0"><b>Rp <?= number_format($total,0,',','.') ?></b></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>