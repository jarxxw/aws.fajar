<table class="table table-bordered">
 <h1>DATA RUANGAN</h1>
<tr>
    <td>kode ruangan</td>
    <td>nama ruangan</td>
    <td>gedung</td>
    <td>lantai</td>
    <td>jenis ruangan</td>
    <td>kapasitas</td>
    <td>keterangan</td>

</tr>
<tr>
    <?php
    include("../admin/koneksi.php");
    $tampil = mysqli_query($koneksi, "SELECT * FROM ruangan ");
    while ($c = mysqli_fetch_array($tampil)) {
    ?>

        <td><?= $c['kode_ruangan'] ?></td>
        <td><?= $c['nama_ruangan'] ?></td>

        <td><?= $c['gedung'] ?></td>

        <td><?= $c['lantai'] ?></td>

        <td><?= $c['jenis_ruangan'] ?></td>

        <td><?= $c['kapasitas'] ?></td>

        <td><?= $c['keterangan'] ?></td>
        
</tr>


<?php
    }
?>
