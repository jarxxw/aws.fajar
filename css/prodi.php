<?php
include("../admin/koneksi.php");
?>
<h1>TABLE PRODI</h1>  
    <table id="ex" class="table table-bordered">
        <thead>
            <tr>
                <td>NO</td>
                <td>NAMA PRODI</td>
                <td>JENJANG</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM prodi");
            while ($d = mysqli_fetch_array($tampil)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama_prodi']; ?></td>
                <td><?php echo $d['jenjang']; ?></td>
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
