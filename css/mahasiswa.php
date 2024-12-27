<h2>DATA SISWA</h2>
<?php
include("../admin/koneksi.php");

?>
<table id="ex" class="table table-bordered" >
    <thead>
        <tr>
        <td>NO</td>

        <td>NIM</td>
        <td>NAMA</td>
        <td>EMAIL</td>
        <td>NO HP</td>
        <td>ALAMAT</td>
        </tr>




    </thead>
    <tbody>
        <?php
        $NO= 1;
        $ambil = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
        while($c = mysqli_fetch_array($ambil)){
        ?>
        <tr>
            <td><?php echo $NO++;?></td>
            <td><?php echo $c['nim']?></td>
            <td><?php echo $c['nama']?></td>
            <td><?php echo $c['email']?></td>
            <td><?php echo $c['nohp']?></td>
            <td><?php echo $c['alamat']?></td>
           
        </tr>

    </tbody>
    <?php
        }
        ?>
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