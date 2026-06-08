<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - NusantaraInstan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background: linear-gradient(120deg, #e5ecf3 60%, #f6f8fa 100%);
            min-height: 100vh;
        }
        .checkout-card {
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 6px 32px rgba(66,133,244,0.10);
            max-width: 480px;
            margin: 3rem auto;
            padding: 2rem 2rem 1.5rem 2rem;
        }
        .checkout-title {
            font-weight: bold;
            color: #4285f4;
            margin-bottom: 1.2rem;
            text-align: center;
            letter-spacing: 1px;
            font-size: 2rem;
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
        .bank-ref {
            display: none;
            margin-top: 10px;
        }
        .bank-ref .alert {
            margin-bottom: 0;
        }
        .upload-proof {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="checkout-card animate__animated animate__fadeInDown">
        <h3 class="checkout-title"><i class="fa-solid fa-cash-register"></i> Checkout</h3>
        <div class="mb-3">
            <div><b>Nama:</b> <?= $user->fullname ?></div>
            <div><b>Alamat:</b> <?= $user->address ?></div>
            <div><b>No. Telepon:</b> <?= $user->phone ?></div>
            <div><b>Email:</b> <?= $user->email ?></div>
        </div>
        <form action="<?=site_url('order/checkout')?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="mb-3">
                <label class="form-label">Pilih Metode Pembayaran:</label>
                <select name="payment_method" id="payment_method" class="form-select" required>
                    <option value="">--Pilih--</option>
                    <option value="bca">BCA</option>
                    <option value="bni">BNI</option>
                    <option value="bri">BRI</option>
                    <option value="mandiri">Mandiri</option>
                    <option value="dana">DANA</option>
                    <option value="ovo">OVO</option>
                    <option value="gopay">GoPay</option>
                    <option value="cod">COD</option>
                </select>
                <div class="invalid-feedback">Pilih metode pembayaran.</div>
            </div>
            <div id="ref_bca" class="bank-ref">
                <div class="alert alert-info">
                    <b>BCA</b> - No. Rekening: <b>1234567890</b><br>
                    Kode Referal: <span class="badge bg-primary">BCA-<?= date('ymd') ?>-<?= rand(100,999) ?></span>
                </div>
            </div>
            <div id="ref_bni" class="bank-ref">
                <div class="alert alert-info">
                    <b>BNI</b> - No. Rekening: <b>9876543210</b><br>
                    Kode Referal: <span class="badge bg-primary">BNI-<?= date('ymd') ?>-<?= rand(100,999) ?></span>
                </div>
            </div>
            <div id="ref_bri" class="bank-ref">
                <div class="alert alert-info">
                    <b>BRI</b> - No. Rekening: <b>1122334455</b><br>
                    Kode Referal: <span class="badge bg-primary">BRI-<?= date('ymd') ?>-<?= rand(100,999) ?></span>
                </div>
            </div>
            <div id="ref_mandiri" class="bank-ref">
                <div class="alert alert-info">
                    <b>Mandiri</b> - No. Rekening: <b>5566778899</b><br>
                    Kode Referal: <span class="badge bg-primary">MANDIRI-<?= date('ymd') ?>-<?= rand(100,999) ?></span>
                </div>
            </div>
            <div id="ref_dana" class="bank-ref">
                <div class="alert alert-info">
                    <b>DANA</b> - No. HP: <b>081234567890</b><br>
                    Kode Referal: <span class="badge bg-primary">DANA-<?= date('ymd') ?>-<?= rand(100,999) ?></span>
                </div>
            </div>
            <div id="ref_ovo" class="bank-ref">
                <div class="alert alert-info">
                    <b>OVO</b> - No. HP: <b>081298765432</b><br>
                    Kode Referal: <span class="badge bg-primary">OVO-<?= date('ymd') ?>-<?= rand(100,999) ?></span>
                </div>
            </div>
            <div id="ref_gopay" class="bank-ref">
                <div class="alert alert-info">
                    <b>GoPay</b> - No. HP: <b>081212345678</b><br>
                    Kode Referal: <span class="badge bg-primary">GOPAY-<?= date('ymd') ?>-<?= rand(100,999) ?></span>
                </div>
            </div>
            <div id="ref_cod" class="bank-ref">
                <div class="alert alert-success">
                    <b>COD (Bayar di Tempat)</b> - Tidak perlu transfer, silakan siapkan uang pas saat barang diterima.
                </div>
            </div>
            <div id="upload-proof" class="upload-proof">
                <label class="form-label mt-2">Upload Bukti Pembayaran:</label>
                <input type="file" name="payment_proof" class="form-control" accept="image/*" required>
                <div class="form-text">Upload foto/screenshot bukti transfer ke rekening/metode yang dipilih.</div>
            </div>
           <div class="d-grid mt-3">
                <input type="submit" class="btn btn-primary" value="Buat Pesanan">
            </div>
            </div>
        </form>
        <div class="alert alert-warning mt-4" style="font-size:0.97em;">
            <b>Petunjuk Validasi Pembayaran:</b><br>
            Setelah melakukan pembayaran, upload bukti transfer pada form di atas. Admin akan memvalidasi pembayaran Anda sebelum pesanan diproses.<br>
            Untuk pembayaran COD, Anda tidak perlu upload bukti pembayaran.
        </div>
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

    document.addEventListener('DOMContentLoaded', function() {
        const refs = [
            'bca','bni','bri','mandiri','dana','ovo','gopay','cod'
        ];
        const select = document.getElementById('payment_method');
        const uploadProof = document.getElementById('upload-proof');
        select.addEventListener('change', function() {
            refs.forEach(function(ref) {
                document.getElementById('ref_' + ref).style.display = 'none';
            });
            if (select.value && refs.includes(select.value)) {
                document.getElementById('ref_' + select.value).style.display = 'block';
            }
            if (select.value && select.value !== 'cod') {
                uploadProof.style.display = 'block';
                uploadProof.querySelector('input').required = true;
            } else {
                uploadProof.style.display = 'none';
                uploadProof.querySelector('input').required = false;
            }
        });
    });
</script>
</body>
</html>