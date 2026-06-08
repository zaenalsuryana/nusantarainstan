<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h3>Order Report</h3>
<?php
    if (! $this->session->userdata('username')) {
        redirect('auth/login');}?>
<p>
    <?php if($start_date && $end_date): ?>
        Periode: <?= $start_date ?> s/d <?= $end_date ?>
    <?php else: ?>
        Semua Data Transaksi
    <?php endif; ?>
</p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Alamat</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Total</th>
    </tr>
    <?php foreach($orders as $order): ?>
    <tr>
        <td><?= $order->id_order ?></td>
        <td><?= $order->fullname ?> (<?= $order->username ?>)</td>
        <td><?= $order->shipping_address ?></td>
        <td><?= $order->order_date ?></td>
        <td><?= $order->status ?></td>
        <td><?= number_format($order->total_price,0,',','.') ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="5" align="right"><b>Total Transaksi</b></td>
        <td><b>Rp <?= number_format($total,0,',','.') ?></b></td>
    </tr>
</table>