<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon/logo-gorontalo.png')?>" type="image/x-icon">
    <title>Pantai Dulanga</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- FONT GOOGLE KAUSHAN -->
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <!-- FONT GOOGLE ARVO -->
    <link href="https://fonts.googleapis.com/css?family=Arvo:700" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
    <?php if($gallery) {?>
    <!-- BAGGUETE BOX -->
    <link rel="stylesheet" href="<?= base_url('assets/css/baguetteBox.min.css'); ?>">
    <?php } ?>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body id="home">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-blue sticky-top py-3 shadow <?php if($landing) {echo 'hilang-atas navbar-landing';}else{ echo 'muncul-atas';} ?>">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">Dulanga</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link mx-lg-2 page-scroll home-scroll <?php if($landing) echo 'active'; ?>" href="<?php if($landing) {echo '#home';}else{ echo base_url();} ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link mx-lg-2 page-scroll sejarah-scroll <?php if($sejarah) echo 'active'; ?>" href="<?php if($landing) {echo '#sejarah';}else{ echo base_url('sejarah');} ?>">Sejarah</a>
                <a class="nav-item nav-link mx-lg-2 page-scroll kegiatan-scroll" href="<?php if($landing) {echo '#kegiatan';}else{ echo base_url('kegiatan');} ?>">Kegiatan</a>
                <a class="nav-item nav-link mx-lg-2 <?php if($gallery) echo 'active'; ?> page-scroll" href="<?= base_url('gallery') ?>">Gallery</a>
                <a class="nav-item nav-link mx-lg-2 page-scroll footer-scroll" href="#footer">Kontak</a>
                <a class="nav-item btn btn-success ml-lg-2 btn-login" href="<?= base_url('login') ?>">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Login
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- END -->
