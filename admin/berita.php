<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':
?>

        <div class="row">
            <h2>Data Berita</h2>
            <div class="col-2">
                <a href="index.php?p=berita&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-file-plus"></i> Tambah Berita</a>
            </div>

            <table class="table table-border">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>User</th>
                    <th>Kategori</th>
                    <th>Date</th>
                </tr>

                <?php
                include 'koneksi.php';
                $ambil = mysqli_query($koneksi, "SELECT * FROM berita");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {
                ?>

                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?= $data['judul'] ?></td>
                        <td><?= $data['user_id'] ?></td>
                        <td><?= $data['kategori_id'] ?></td>
                        <td><?= $data['data_created'] ?></td>
                        <td>
                            <a href="index.php?p=berita&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pen-fill"></i> Edit</a>
                            <a href="proses_berita.php?proses=hapus&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="bi bi-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>

    <?php
        break;



        /// Input
    case 'input':
    ?>

        <h2>MASUKKAN BERITA</h2>
        <a href="index.php?p=berita&aksi=list" class="btn btn-primary mb-3">Data Berita</a>

        <form action="proses_berita.php?proses=insert" method="POST" enctype="multipart/form-data">
            <table>

                <label class="col-sm-2 col-form-label">judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul">
                </div>



                <label class="col-sm-2 col-form-label">kategori</label>
                <br>
                <select class="form-select" name="kategori_id">
                    <?php
                    include("koneksi.php");
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while ($d = mysqli_fetch_array($tampil)) {
                        echo "<option value='" . $d['id'] . "'>" . $d['nama_kategori'] . "</option>";
                    }
                    ?>



                </select>
                <br>
                <label class="col-sm-2 col-form-label">File Upload</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_upload">
                </div>


                <label class="col-sm-2 col-form-label">isi berita</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="isi_berita"></textarea>
                    <br>

                    <button type="submit" name="kirim" class="btn btn-danger">Proses</button> &nbsp
                    <button type="reset" class="btn btn-primary"> Reset</button>

            </table>
        </form>

    <?php

        break;

    case 'edit':
        include('koneksi.php');

        // Ambil data kategori berdasarkan id
        $ambil = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$_GET[id]'");
        $data_kategori = mysqli_fetch_array($ambil);
    ?>

        <div class="row">
            <div class="col-6">
                <h2>Edit Data Kategori</h2>
                <div class="col-2">
                    <a href="index.php?p=kategori" class="btn btn-primary mb-3">Data Kategori</a>
                </div>
                <table>
                    <form action="../admin/proses_berita.php?proses=edit&id=<?= $data_kategori['id'] ?>" method="POST">
                        <label class="col-sm-2 col-form-label">judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" value="<?= $data_kategori['judul']; ?>">
                        </div>
                        <label class="col-sm-2 col-form-label">kategori</label>
                        <br>
                        <select class="form-select" name="kategori_id">
                            <?php
                            include("koneksi.php");
                            $tampil = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($d = mysqli_fetch_array($tampil)) {
                                echo "<option value='" . $d['id'] . "'>" . $d['nama_kategori'] . "</option>";
                            }
                            ?>

                        </select>


                        <br>
                        <label class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file_upload" value="<?= $data_kategori['file_upload'] ?>">
                        </div>



                        <label class="col-sm-2 col-form-label">isi berita</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="isi_berita"><?php echo $data_kategori['isi_berita'] ?></textarea>
                            <br>

                            <button type="submit" name="kirim" class="btn btn-danger">Proses</button> &nbsp
                            <button type="reset" class="btn btn-primary"> Reset</button>

                    </form>
                </table>
            </div>
        </div>
<?php

}
