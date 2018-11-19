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
            <div class="row p-3 shadow bg-white mt-3">
                <div class="col-12">
                    <h2 class="mt-5 mb-5">Data Gallery</h2>
                    <a href="<?= base_url('operator/gallery/tambah') ?>" class="mb-5 btn btn-primary">Tambah Gallery</a>
                    <table class="w-100 table">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th colspan="2" class="text-center">Action</th>
                        <?php
                          $i=1;
                          foreach($gallerys as $row){
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row->nama ?></td>
                            <td><img src="<?= base_url('assets/img/gallery/'.$row->foto) ?>" class="img-fluid img-responsive" style="width:100px;height:100px;"></td>
                            <td class="text-center">
                              <a href="<?= base_url('operator/gallery/edit/'.$row->id_gallery) ?>" class="btn btn-warning">Edit</a>
                            </td>
                            <td class="text-center">
                            <?= form_open('operator/deleteGallery',['name'=>'myForm']) ?>
                              <?= form_hidden('id',$row->id_gallery) ?>
                              <?= form_button(['type'=>'submit','content'=>'Hapus','class'=>'btn btn-danger','id'=>'hapus']) ?>
                            <?= form_close() ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
          </div>
        </div>
    </section>  