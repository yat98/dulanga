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
              <table class="w-100 table">
                <th>No.</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <?php
                  $i = 1;
                  foreach($kegiatans as $row ) {
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->tgl_kegiatan ?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>

          <div class="row p-3 shadow bg-white mt-3">
            <div class="col-12">
              <h2 class="mt-5 mb-5">Data Gallery</h2>
              <table class="w-100 table">
                <th>No.</th>
                <th>Nama</th>
                <th>Foto</th>
                <?php
                  $i=1;
                  foreach($gallerys as $row){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row->nama ?></td>
                    <td><img src="<?= base_url('assets/img/gallery/'.$row->foto) ?>" class="img-fluid img-responsive" style="width:100px;height:100px;"></td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>

          <div class="row p-3 shadow bg-white mt-3">
            <div class="col-12">
              <h2 class="mt-5 mb-5">Kritik Dan Saran</h2>
              <table class="w-100 table">
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Komentar</th>
                <?php 
                  $i = 1;
                  foreach($kritiks as $row) {
                ?>
                <tr>
                  <td><?= $i++.'.' ?></td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->email ?></td>
                  <td><?= $row->komentar ?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
    </section>  