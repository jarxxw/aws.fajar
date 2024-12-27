<?php
include("koneksi.php");
if($_GET['proses']=='insert'){
    if (isset($_POST['kirim'])) {
        $hp=mysqli_query($koneksi,"INSERT INTO dosen  SET nik='$_POST[nik]', nama_dosen='$_POST[nama_dosen]', notelp='$_POST[nohp]', email='$_POST[email]', alamat='$_POST[alamat]', prodi_id='$_POST[prodi_id]'");
    if ($hp) {
        echo"<script>window.location='index.php?p=dosen'</script>";
        # code...
    }
    }

}
if($_GET['proses']=='edit'){
    if (isset($_POST['kirim'])) {
        $hp=mysqli_query($koneksi,"UPDATE dosen SET nik='$_POST[nik]', nama_dosen='$_POST[nama_dosen]', notelp='$_POST[nohp]', email='$_POST[email]', alamat='$_POST[alamat]' WHERE id='$_GET[id]'");
        if ($hp) {
            echo"<script>window.location='index.php?p=dosen'</script>";
        }
    }
}
if($_GET['proses']=='hapus'){
    $p=mysqli_query($koneksi,"DELETE FROM dosen WHERE id='$_GET[id]'");
    if ($p) {
        echo"<script>window.location='index.php?p=dosen'</script>";
    }
}
?>