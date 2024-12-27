<?php
include("koneksi.php");
if ($_GET['proses'] == 'insert') {
    if (isset($_POST['kirim'])) {
        # code...
        $hobb = implode(",", $_POST['hobby']);
        $tgl_layia = $_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];


        $kirim = mysqli_query($koneksi, "INSERT INTO mahasiswa SET nama='$_POST[nama]', nim='$_POST[nim]', tgl_lahir='$tgl_layia',jenis_kelamin='$_POST[jenisk]', hobi='$hobb', nohp='$_POST[nohp]', alamat='$_POST[alamat]',email='$_POST[email]'");

        if ($kirim) {
            echo "<script>window.location='index.php?p=mhs'</script>";
        }
    }
}
if ($_GET['proses'] == 'update') {
    # code...
    if (isset($_POST['kirim'])) {
        $hobb = implode(",", $_POST['hobby']);
        $tgl_layia = $_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];
        $up = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$_POST[nama]', tgl_lahir='$tgl_layia',jenis_kelamin='$_POST[jenisk]', hobi='$hobb', nohp='$_POST[nohp]', alamat='$_POST[alamat]',email='$_POST[email]' WHERE nim='$_POST[nim]'");
        # code...
        if ($up) {
            # code...
            echo "<script>window.location.href='index.php?p=mhs'</script>";
        }
    }
}
if ($_GET['proses'] == 'delete') {
    # code...
    $hp = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$_GET[nim]'");
    if ($hp) {
        echo "<script>window.location.href='../css/index.php?p=mhs'</script>";
    }
}
