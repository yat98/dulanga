<!-- GALLERY -->
<article id="gallery-foto" class="mt-5">
    <div class="container py-5 tz-gallery mt-5">
        <h2 class="my-5">Gallery</h2>
        <div class="row">
            <?php foreach($gallerys as $row) { ?>
                <a class="col-lg-4 foto-container mb-5" href="<?= base_url('assets/img/gallery/'.$row->foto); ?>">
                    <img data-original="<?= base_url('assets/img/gallery/'.$row->foto); ?>" class="foto lazy shadow-md">
                </a>
            <?php } ?>
        </div>
        <div class="row justify-content-center paging">
            <?= $pagination ?>
        </div>
    </div>
</article>
<!-- END -->