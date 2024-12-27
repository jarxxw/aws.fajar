<?php
include("koneksi.php");

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['kirim'])) {
        $file_upload = $_FILES['file_upload']['name'];
        $tmp_file = $_FILES['file_upload']['tmp_name'];
        $upload_dir = '../uploads/';
        move_uploaded_file($tmp_file, $upload_dir . $file_upload);

        $g = mysqli_query($koneksi, "INSERT INTO berita SET file_upload='$file_upload', kategori_id='$_POST[kategori_id]', judul='$_POST[judul]', isi_berita='$_POST[isi_berita]'");
        if ($g) {
            echo "<script>window.location='index.php?p=berita'</script>";
        }
    }
}

if ($_GET['proses'] == 'hapus') {
    $id = $_GET['id'];
    $g = mysqli_query($koneksi, "DELETE FROM berita WHERE id='$id'");
    if ($g) {
        echo "<script>window.location='index.php?p=berita'</script>";
    }
}

if ($_GET['proses'] == 'edit') {
        if (isset($_POST['kirim'])) {
            $file_upload = $_FILES['file_upload']['name'];
            $tmp_file = $_FILES['file_upload']['tmp_name'];
            $upload_dir = '../uploads/';
            
            // Cek apakah file di-upload atau tidak
            if (!empty($file_upload)) {
                // Coba pindahkan file ke folder uploads
                if (move_uploaded_file($tmp_file, $upload_dir . $file_upload)) {
                    // Jika berhasil meng-upload, update dengan file yang baru
                    $g = mysqli_query($koneksi, "UPDATE berita SET 
                        file_upload='$file_upload', 
                        kategori_id='$_POST[kategori_id]', 
                        judul='$_POST[judul]', 
                        isi_berita='$_POST[isi_berita]' 
                        WHERE id='$_GET[id]'");
                } else {
                    // Jika upload gagal
                    echo "Gagal meng-upload file.";
                    $g = false;
                }
            } else {
                // Jika tidak ada file yang di-upload, update hanya data teks
                $g = mysqli_query($koneksi, "UPDATE berita SET 
                    kategori_id='$_POST[kategori_id]', 
                    judul='$_POST[judul]', 
                    isi_berita='$_POST[isi_berita]' 
                    WHERE id='$_GET[id]'");
            }
            
            // Jika query berhasil, redirect
            if ($g) {
                echo "<script>window.location='../css/index.php?p=home'</script>";
            } else {
                echo "Gagal meng-update data.";
            }
        }
    }
    

?>
