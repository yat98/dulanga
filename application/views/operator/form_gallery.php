<div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand"></a>
          </div>
        </div>
      </nav>
    </header>
    <section class="mt-5">
        <div class="container-fluid">
          <div class="row p-3 bg-white shadow">
            <h1 class="mb-5 mt-2 ml-2"><?= $title ?> Gallery</h1>
            <div class="col-12">
            <form action="<?= base_url($action) ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <p><?= form_error('nama') ?></p>
                    <input type="text" placeholder="Nama Foto" class="form-control" name="nama" value="<?= $data->nama ?>">
                </div>
                <div class="form-group mb-5">
                    <label>Foto </label>
                    <?php
                        if(!empty($error)) echo '<p>'.$error.'</p>';
                    ?>
                    <input type="file" name="foto" class="form-control-file" name="foto">
                </div>
                <div class="form-group">       
                    <button type="submit" class="btn btn-primary"><?= $title ?></button>
                </div>
            </form>
            </div>
          </div>
        </div>
    </section>
    <script src="<?= base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>  
    <script>
        tinymce.init({
            selector:'textarea',
            theme: 'modern',
            mobile: { theme: 'mobile' }
        });
    </script>