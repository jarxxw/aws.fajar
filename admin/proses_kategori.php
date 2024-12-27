<?php
include("koneksi.php");
if ($_GET['proses'] == 'hapus') {
    $h = mysqli_query($koneksi, "DELETE  FROM kategori WHERE id='$_GET[id]'");
    if ($h) {
        echo "<script>window.location='index.php?p=kategori'</script>";
        # code...
    }
    # code...
}
if ($_GET['proses'] == 'editt') {
    if (isset($_POST['kirim'])) {
        $k = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$_POST[nama_kategori]', keterangan='$_POST[keterangan]' WHERE id=$_GET[id]");
        if ($k) {
            echo "<script>window.location='index.php?p=kategori'</script>";
        }
    }
    # code...
}
# code...
if ($_GET['proses']=='input') {
    if (isset($_POST['kirim'])) {
        $k=mysqli_query($koneksi,"INSERT INTO kategori SET nama_kategori='$_POST[nama_kategori]', keterangan='$_POST[keterangan]'");
        if ($k) {
            # code...
            echo"<script>window.location='index.php?p=kategori'</script>";
        }
        # code...
    }
}