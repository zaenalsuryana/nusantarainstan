<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NusantaraInstan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
                <div class="card-body">
                    <h1 class="text-primary text-center mb-2 fw-bold"><i class="fa-solid fa-layer-group"></i> NusantaraInstan</h1>
                    <h3 class="text-secondary text-center mb-4">CATEGORIES LIST</h3>
                    <?php
                    if (! $this->session->userdata('username')) {
                        redirect('auth/login');
                    }?>
                    
                    <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-info text-center"><?= $this->session->flashdata('msg'); ?></div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-center mb-4 gap-2">
                        <a href="<?= base_url() ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-house"></i> Home
                        </a>
                        <a href="<?= site_url('categories/add') ?>" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i> Add New Category
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle shadow-sm">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>  
                                    <th scope="col">Description</th>
                                    <th scope="col" colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($categories as $category): ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="fw-semibold"><?= $category->cate_name ?></td>
                                    <td><?= $category->description ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('categories/edit/' . $category->id_cate) ?>" class="btn btn-sm btn-primary px-3">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= site_url('categories/delete/' . $category->id_cate) ?>" class="btn btn-sm btn-danger px-3" onclick="return confirm('Are you sure?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if (empty($categories)): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No categories found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle & FontAwesome CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<!-- Animate.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</body>
</html>