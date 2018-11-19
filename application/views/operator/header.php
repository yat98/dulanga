<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pantai Dulanga | Operator</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?= base_url('assets/css/fontastic.css') ?>">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?= base_url('assets/css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?= base_url('assets/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.default.css'); ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon/logo-gorontalo.png')?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
            <img src="<?= base_url('assets/img/icon/logo-gorontalo.png')?>" alt="person" class="img-fluid">
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>P</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="<?php if($beranda) echo 'active'; ?>"><a href="<?= base_url('operator') ?>"> <i class="fa fa-tachometer" aria-hidden="true"></i>Beranda</a></li>
            <li class="<?php if($kegiatan) echo 'active'; ?>"><a href="<?= base_url('operator/kegiatan') ?>"> <i class="fa fa-calendar" aria-hidden="true"></i>Kegiatan</a></li>
            <li class="<?php if($gallery) echo 'active'; ?>"><a href="<?= base_url('operator/gallery') ?>"> <i class="fa fa-picture-o" aria-hidden="true"></i>Gallery</a></li>
            <li class="<?php if($kritik) echo 'active'; ?>"><a href="<?= base_url('operator/kritik') ?>"> <i class="fa fa-envelope" aria-hidden="true"></i>Kritik & Saran</a></li>
            <li><a href="<?= base_url('operator/laporan') ?>"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Laporan</a></li>
            <li><a href="<?= base_url('logout') ?>"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>