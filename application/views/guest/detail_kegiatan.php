<!-- DETAIL KEGIATAN -->
<article id="detail-kegiatan" class="m-atas my-5">
    <div class="container">
        <div class="row">
            <div class="col mr-3 radius-10 shadow py-5">
                <h2><?= $kegiatan->nama ?></h2>
                <p class="author text-secondary pt-3">
                    <i class="fa fa-user" aria-hidden="true" class="mr-2"></i>
                    <?= $kegiatan->nama_operator ?>
                    <i class="fa fa-calendar-o ml-3" aria-hidden="true"></i>                            
                    <?= date_indo($kegiatan->tgl_kegiatan);?>
                </p>
                <hr>
                <img data-original="<?= base_url('assets/img/kegiatan/'.$kegiatan->foto) ?>" class="img-fluid img-resposive my-5 lazy w-100" style="height:auto">
                <p class="text-justify">
                    <?= $kegiatan->detail ?>
                </p>
            </div>
        </div>
    </div>
</article>
<!-- END -->