<?php
include("../admin/koneksi.php");
?>
<h1>TABLE DOSEN</h1>
<table id="ex" class="table table-bordered">
    <thead>
        <tr>
            <td>NIK</td>
            <td>NAMA</td>
            <td>NO HP</td>
            <td>ALAMAT</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $tampil = mysqli_query($koneksi, "SELECT * FROM dosenn");
        while($c = mysqli_fetch_array($tampil)) {
        ?>
        <tr>
            <td><?=$c['nip']?></td>
            <td><?=$c['nama_dosen']?></td>
            <td><?=$c['notelp']?></td>
            <td><?=$c['alamat']?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Inisialisasi DataTables -->
<script>
$(document).ready(function() {
    $('#ex').DataTable();
});
</script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
