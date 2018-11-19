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
                <h2 class="mt-5 mb-5">Kritik Dan Saran</h2>
                <table class="w-100 table">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Komentar</th>
                    <th>Action</th>
                    <?php 
                        $i = 1;
                        foreach($kritiks as $row) {
                    ?>
                    <tr>
                        <td><?= $i++.'.' ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->komentar ?></td>
                        <td>
                            <?= form_open('operator/hapus_kritik',['name'=>'myForm']) ?>
                            <?= form_hidden('id',$row->id_kritik) ?>
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