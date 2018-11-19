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
            <div class="col-12">
              <h2 class="mt-5 mb-5">Data Kegiatan</h2>
              <a href="<?= base_url('operator/kegiatan/tambah') ?>" class="mb-5 btn btn-primary">Tambah Kegiatan</a>
              <table class="w-100 table">
                <th>No.</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th colspan="2" class="text-center">Action</th>
                <?php
                  $i = 1;
                  foreach($kegiatans as $row ) {
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->tgl_kegiatan ?></td>
                    <td class="text-center">
                      <a href="<?= base_url('operator/kegiatan/edit/'.$row->id_kegiatan) ?>" class="btn btn-warning">Edit</a>
                    </td>
                    <td class="text-center">
                      <?= form_open('operator/deleteKegiatan',['name'=>'myForm']) ?>
                        <?= form_hidden('id',$row->id_kegiatan) ?>
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