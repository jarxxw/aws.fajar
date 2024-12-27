<?php
include("koneksi.php");
if ($_GET['proses'] == 'hapus') {
    $h = mysqli_query($koneksi, "DELETE  FROM ruangan WHERE id='$_GET[id]'");
    if ($h) {
        echo "<script>window.location='index.php?p=ruangan'</script>";
        # code...
    }
    # code...
}
if ($_GET['proses'] == 'edit') {
    if (isset($_POST['kirim'])) {
        $k = mysqli_query($koneksi, "UPDATE ruangan SET kode_ruangan='$_POST[kode_ruangan]', nama_ruangan='$_POST[nama_ruangan]', gedung='$_POST[gedung]', lantai='$_POST[lantai]', jenis_ruangan='$_POST[jenis_ruangan]', kapasitas='$_POST[kapasitas]', keterangan='$_POST[keterangan]' WHERE id=$_GET[id]");
        if ($k) {
            echo "<script>window.location='index.php?p=ruangan'</script>";
        }
    }
    # code...
}
# code...
if ($_GET['proses'] == 'input') {
    if (isset($_POST['kirim'])) {
        $k = mysqli_query($koneksi, "INSERT INTO ruangan SET kode_ruangan='$_POST[kode_ruangan]', nama_ruangan='$_POST[nama_ruangan]', gedung='$_POST[gedung]', lantai='$_POST[lantai]', jenis_ruangan='$_POST[jenis_ruangan]', kapasitas='$_POST[kapasitas]', keterangan='$_POST[keterangan]'");

        if ($k) {
            # code...
            echo "<script>window.location='index.php?p=ruangan'</script>";
        }
        # code...
    }
}
