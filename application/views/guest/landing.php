<!-- HEADER -->
<header id="header" class="align-items-center d-flex text-white">
    <div class="border-gradient-header hilang"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="hilang-bawah">Selamat Datang</h3>
                <h1 class="hilang-bawah">Pantai Dulanga</h1>
                <hr class="my-lg-5 border-custom hilang-bawah">
                <img data-original="<?= base_url('assets/img/icon/logo-gorontalo.png') ?>" alt="Provinsi Gorontalo" class="img-fluid logo hilang-bawah lazy">
            </div>
        </div>
    </div>
</header>
<!-- END -->

<!-- Video -->
<section id="gallery" class="py-md-5 d-flex justify-content-center bg-dark">
    <div id="particle"></div>
    <iframe class="video hilang-atas" width="560" height="315" src="https://www.youtube.com/embed/sb3ENXnqF0E" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</section>
<!-- END -->

<!-- SEJARAH -->
<section id="sejarah" class="py-5">
    <div class="container py-sm-5">
        <div class="row py-sm-5">
            <div class="col-lg-4 d-flex justify-content-center order-2 my-5 offset-lg-2 hilang-kanan-rotate">
                <div class="sejarah-img">
                    <img data-original="<?= base_url('assets/img/section/bongo.jpg') ?>" alt="Desa Bongo" class="img-bongo shadow lazy">
                </div>
            </div>
            <div class="col-lg-6 order-1 mb-3 hilang-kiri-rotate">
                <h2 class="text-white">Sejarah Bongo</h2>
                <p class="text-sejarah">Desa Bongo adalaha sebuah desa kecil yang berada bagian selatan Kabupaten Gorontalo Provinsi Gorontalo. Kata “Bongo” adalah bahasa Gorontalo dari Buah Kelapa. Nah mendengar arti dari nama desa terebut pasti kita langsung berfikiran bahwa di desa tersebut kaya akan kelapa yang tumbuh dimana-mana. </p>
                <a href="<?= base_url('sejarah') ?>" class="btn btn-primary selengkapnya">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
<!-- END -->

<!-- KEGIATAN -->
<article id="kegiatan" class="pt-5 bg-dark">
    <div id="particle1"></div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-white hilang-atas">Kegiatan Pantai Dulanga</h2>
        </div>
        <div class="row pt-5 cari hilang-atas mb-4">
            <div class="col px-4">
                <form action="<?= base_url('kegiatan/cari') ?>" method="get">
                    <p class="form-group d-flex justify-content-center">
                        <input type="text" class="form-control col-lg-6 flex-grow-1 bd-highlight" placeholder="Cari" name="keyword">
                        <button class="btn btn-outline-success btn-cari col-lg-1 col-2 px-0 bd-highlight ml-2 d-inline">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </p>
                </form>
            </div>
        </div>
        <div class="row justify-content-center pb-2 pt-4 px-5">
            <?php 
                foreach($kegiatans as $row) { 
                $detail = strip_tags($row->detail);
            ?>
            <div class="px-0 bg-white shadow-lg blog mb-5 hilang">
                <img data-original="<?= base_url('assets/img/kegiatan/'.$row->foto) ?>" class="kegiatan-img lazy">
                <div class="container p-3">
                    <h5><?= $row->nama ?></h5>
                    <p class="author text-secondary pt-3">
                        <i class="fa fa-user" aria-hidden="true" class="mr-2"></i>
                        <?= $row->nama_operator ?>
                        <i class="fa fa-calendar-o ml-3" aria-hidden="true"></i>
                        <?= 
                        date_indo($row->tgl_kegiatan); ?></p>
                    <p class="text-justify"><?= substr($detail,0,100) ?></p>
                    <a href="<?= base_url('kegiatan/detail/'.$row->id_kegiatan) ?>" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row justify-content-center my-5 paging hilang">
            <?= $pagination ?>
        </div>
    </div>
    <div class="wave"></div>
</article>
<!-- END -->

<!-- TESTIMONI -->
<section id="testimoni" class="mt-5 p-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h3 class="caption hilang-atas">
                    <span class="caption-text d-none">"pantai ini sepertinya baru dikelola sebagai objek wisata, pantai lumayan bersih, ada objek foto2 juga diatas bukit disebelah pantai. recommended place to go."</span>
                    <span class="caption-text">"Dulangga beach pantai yg bagus bersih nyaman dan indah"</span>
                    <span class="caption-text d-none">"Spot wisata baru, pemandangan alamnya oke punya. Ada gazebonya juga tuk bersantai"</span>
                </h3>
                <div class="row justify-content-center image hilang">
                    <div class="col-lg-8 text-center mt-5 img-tinggi">
                        <img data-original="<?= base_url('assets/img/testimoni/img1.jpg') ?>" alt="Testimoni 1" class="lazy rounded-circle testimoni-img kecil">
                        <img data-original="<?= base_url('assets/img/testimoni/img2.jpg') ?>" alt="Testimoni 2" class="lazy rounded-circle testimoni-img besar mx-lg-5">
                        <img data-original="<?= base_url('assets/img/testimoni/img3.jpg') ?>" alt="Testimoni 3" class="lazy rounded-circle testimoni-img kecil">
                    </div>
                </div>
                <div class="desc hilang-bawah">
                    <div class="user d-none">
                        <p class="mt-3 mb-0 nama">farandika andiatma</p>
                        <span class="profesi">Pengunjung Lokal</span>
                    </div>
                    <div class="user">
                        <p class="mt-3 mb-0 nama">Opan Kamaru</p>
                        <span class="profesi">Pengunjung Lokal</span>
                    </div>
                    <div class="user d-none">
                        <p class="mt-3 mb-0 nama">Rian Puhulawa</p>
                        <span class="profesi">Pengunjung Lokal</span>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</section>
<!-- END -->