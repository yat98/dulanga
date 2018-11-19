    <!-- FOOTER -->
    <footer id="footer">
        <div class="wave footer-rotate"></div>
        <div class="container">
            <div class="row py-5">
                <div class="col-lg mb-5 profil  <?php if($landing){echo 'hilang-kiri';}else{echo 'muncul-kiri';}?>">
                    <img data-original="<?= base_url('assets/img/icon/logo-gorontalo.png') ?>" alt="Logo" class="logo img-fluid lazy">
                    <h3 class="mt-4">Pantai Dulanga</h3>
                    <p class="my-4">Bongo, Batudaa Pantai, Gorontalo, 96132</p>
                    <p>
                        <i class="icon-hov fa fa-phone-square mr-3" aria-hidden="true"></i>
                        0822-9136-3692
                    </p>
                </div>
                <div class="col-lg offset-lg-1 mb-5 fast-link <?php if($landing){echo 'hilang';}else{echo 'muncul';}?>">
                    <h5 class="border-bottom-custom">Tentang Kami</h5>
                    <p><a class="text-dark" href="<?= base_url('sejarah') ?>">Sejarah</a></p>
                    <p><a class="text-dark" href="<?= base_url('kegiatan') ?>">Kegiatan</a></p>
                    <p><a class="text-dark" href="<?= base_url('gallery') ?>">Gallery</a></p>
                </div>
                <div class="col-lg-4 kritik <?php if($landing){echo 'hilang-kanan';}else{echo 'muncul-kanan';}?>">
                    <h5 class="border-bottom-custom">Kritik & Saran</h5>
                    <form action="<?= base_url('kritik') ?>" method="post">
                        <p class="form-group text-left">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $data->nama; ?>">
                            <?= form_error('nama') ?>
                        </p>
                        <p class="form-group text-left">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= $data->email; ?>">
                            <?= form_error('email') ?>
                        </p>
                        <p class="form-group text-left">
                            <label for="komentar">Komentar</label>
                            <textarea name="komentar" id="komentar" rows="5" class="form-control"><?= $data->komentar; ?></textarea>
                            <?= form_error('komentar') ?>
                        </p>
                        <button type="submit" class="btn-primary btn">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer-last">
            <div class="container">
                <div class="row pt-4 justify-content-center">
                    <p class="copyright <?php if($landing){ echo 'hilang'; }else{ echo 'muncul';}?>">&copy;Copyright 2018 Hidayat Chandra</p>
                </div>
            </div>
        </footer>
    </footer>
    <!-- END -->

    <!-- SCROLL UP -->
    <div class="scroll-up px-4 py-3 shadow hilang-bawah" scroll-target="#home">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </div>
    <!-- END -->

    <!-- JQUERY -->
    <script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
    <!-- BOOTSTRAP JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- POPPER -->
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <!-- PARTICLE JS -->
    <?php if($landing){ ?>
    <script src="<?= base_url('assets/js/particles.min.js') ?>"></script>
    <!-- PARTICLE CUSTOM JS -->
    <script src="<?= base_url('assets/js/particle-custom.js') ?>"></script>
    <?php } ?>
    <!-- LAZYLOAD JS -->
    <script src="<?= base_url('assets/js/jquery.lazyload.min.js') ?>"></script>
    <!-- SCRIPT JS -->
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <!-- SWEET ALERT JS -->
    <script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>
    <script>
        <?php if(!empty($this->session->flashdata('kritikBerhasil'))) {?>
            $(window).on('load',function(){
                swal("Terima Kasih", "Kritik & Saran Telah Kami Terima", "success");
            });
        <?php } ?>
        <?php
            $gagalCari = $this->session->flashdata('cariGagal');
            if(!empty($gagalCari)){
        ?>
            $(window).on('load',function(){
                let pesan = "<?= $gagalCari ?>";
                swal("Oops!", pesan, "error");
            });
        <?php } ?>
    </script>
    <?php if($gallery){ ?>
    <!-- BAGUETTE BOX JS -->
    <script src="<?= base_url('assets/js/baguetteBox.min.js') ?>"></script>
    <!-- SCRIPT INLINE -->
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
    <?php } ?>
</body>
</html>