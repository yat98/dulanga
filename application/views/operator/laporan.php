<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        .body{
            padding:0;
            margin:0;
        }

        .text-center{
            text-align:center;
        }

        table{
            width:100%;
            margin-bottom:50px;
        }

        table,td,tr,th{
            border:1px solid black;
            border-spacing:none;
            border-collapse:collapse;
            padding:5px 0;
        }
        
        h1{
            padding-bottom:30px;
            border-bottom:1px solid black;
        }

        .t-head{
            font-weight: bold;
            text-align: center;
        }

        td{
            text-align:center;
        }

        img {
  display: -dompdf-image !important;
}
    </style>
</head>
<body class="text-center">
    <h1>LAPORAN SISTEM PANTAI DULANGA</h1>
    <!-- DATA KEGIATAN -->
    <h2 class="text-center">Data Kegiatan</h2>
    <table>
        <tr class="t-head">
            <td>No.</td>
            <td>Nama Kegiatan</td>
            <td>Tanggal Kegiatan</td>
        </tr>
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
    <!-- END -->

    <!-- DATA GALLERY -->
    <h2 class="text-center">Data Gallery</h1>
    <table>
        <tr class="t-head">
            <td>No.</td>
            <td>Nama</td>
            <td>Foto</td>
        </tr>
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
    <!-- END -->

    <!-- DATA KRITIK & SARAN -->
    <h2 class="text-center">Data Kritik & Saran</h2>
    <table>
        <tr class="t-head">
            <td>No.</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Komentar</td>
        </tr>
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
    <!-- END -->
</body>
</html>