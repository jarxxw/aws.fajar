<?php
include("../admin/koneksi.php");

?>
<h1>TABLE KATEGORI</h1>
<div class="container">
<table id="ex" class="table table-bordered">
    <thead>
    <tr><td>ID</td>
        <td>NAMA</td>
        <td>KETERANGAN</td>
    </tr>
    </thead>
    <?php
    $tm=mysqli_query($koneksi,"SELECT * FROM kategori ");
    while($c=mysqli_fetch_array($tm)){
    ?>
    <tbody>
    <tr>
    <td><?php echo $c['id']?></td>
    <td><?php echo $c['nama_kategori']?></td>
    <td><?php echo $c['keterangan']?></td>



    </tr>
    </tbody>
    <?php
    }
    ?>
</table>
</div>

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

