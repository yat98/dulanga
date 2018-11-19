<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon/logo-gorontalo.png') ?>" type="image/x-icon">
    <title>Pantai Dulanga</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- FONT GOOGLE KAUSHAN -->
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <!-- FONT GOOGLE ARVO -->
    <link href="https://fonts.googleapis.com/css?family=Arvo:700" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row login-container justify-content-center">
            <div class="login col-lg-5 mx-2 text-center py-5 text-white shadow">
                <a href="">
                    <img src="assets/img/icon/logo-gorontalo.png" class="logo mb-3">
                </a>
                <h3 class="mb-5 mb-4">LOG IN</h3>
                <form action="<?= base_url('login') ?>" class="d-flex justify-content-center flex-column" method="post">
                    <div class="form-container col-9 text-left d-flex m-auto my-5">
                        <i class="fa fa-user mr-4 login-icon" aria-hidden="true"></i>
                        <input type="text" class="control-form w-100" placeholder="Username" name="username" autocomplete="off" value="<?= $data->username ?>">
                    </div>
                    <div class="form-container col-9 text-left d-flex mx-auto my-5">
                        <i class="fa fa-lock mr-4 login-icon" aria-hidden="true"></i>
                        <input type="password" class="control-form" placeholder="Password" name="password" value="<?= $data->password ?>">
                        
                    </div>
                    <button class="btn btn-light col-3 m-auto login-button">Login</button>
                </form>
            </div>
        </div>
    </div>

     <!-- JQUERY -->
     <script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
     <!-- BOOTSTRAP JS -->
     <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
     <!-- POPPER -->
     <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
     <!-- LAZYLOAD JS -->
     <script src="<?= base_url('assets/js/jquery.lazyload.min.js') ?>"></script>
     <!-- SWEET ALERT JS -->
     <script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>
     <script>
        <?php $pesan_error = $this->session->flashdata('pesan_error')?>
        <?php if(!empty($pesan_error)) {?>
            $(window).on('load',function(){
                let pesan = "<?= $pesan_error ?>";  
                swal("Oops!", pesan , "error");
            });
        <?php } ?>
        <?php 
            $username = form_error('username'); 
            $password = form_error('password'); 
        ?>
        <?php if(!empty($username) || !empty($password)){?>
            let pesan_error = "<?= strip_tags($username) ?> \n <?= strip_tags($password) ?>";
            swal("Oops!", pesan_error , "error");
        <?php } ?>
     </script>
     <!-- SCRIPT JS -->
     <script src="<?= base_url('assets/js/script.js') ?>"></script>
 </body>
 </html>