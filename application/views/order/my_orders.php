<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-4">
    <h3>Pesanan Saya</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>No. Invoice</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $i => $order): ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $order->id_order ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($order->order_date)) ?></td>
                            <td>Rp<?= number_format($order->total_price,0,',','.') ?></td>
                            <td><?= $order->status ?></td>
                            <td>
                                <a href="<?= site_url('order/invoice/'.$order->id_order) ?>" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i> Lihat
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pesanan.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>