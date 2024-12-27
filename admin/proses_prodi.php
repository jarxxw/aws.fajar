<?php
include("koneksi.php");
if ($_GET['proses']=='insert') {
if (isset($_POST['kirim'])) {
    $in=mysqli_query($koneksi,"INSERT INTO prodi SET id='$_POST[aide]', nama_prodi='$_POST[nameprod]', jenjang='$_POST[jen]'");
    if ($in) {
        echo"<script>window.location.href='index.php?p=prodi'</script>";
    }
    
}
}
if ($_GET['proses'] == 'edit') {
    include("koneksi.php");
    if (isset($_POST['kirim'])) {
        // Periksa apakah 'id' ada di $_GET
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); // Amankan dengan intval untuk menghindari SQL Injection
            $ed = mysqli_query($koneksi, "UPDATE prodi SET nama_prodi='$_POST[nameprod]', jenjang='$_POST[jen]' WHERE id=$id");
            if ($ed) {
                echo "<script>window.location.href='index.php?p=prodi'</script>";
            } else {
                echo "Terjadi kesalahan saat memperbarui data.";
            }
        } else {
            echo "Parameter 'id' tidak ditemukan.";
        }
    }
}
if ($_GET['proses']=='hapus') {


$hp=mysqli_query($koneksi,"DELETE FROM prodi WHERE id=$_GET[id]");
if($hp)
{
    echo"<script>window.location.href='index.php?p=prodi'</script>";
}       
}
