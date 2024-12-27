<?php
include("koneksi.php");
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'input':

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>

        <body>
            <form method="post" action="proses_dosen.php?proses=insert">
                <p>
                <h1>FORM REGISTER</h1>
                </p>
                <div class="container">
                    <table>
                        <tr>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nik</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" name="nik">
                                </div>

                        </tr>
                        <tr>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" name="nama_dosen">
                                </div>
                        </tr>
                        <tr>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" name="email">
                                </div>
                        </tr>
                        <tr>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Prodi id</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="prodi_id">
                                        <option value="">PILIH PRODI</option>
                                        <?php
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM prodi");
                                        while ($d = mysqli_fetch_array($tampil)) {
                                            echo "<option value='" . $d['id'] . "'>" . $d['nama_prodi'] . "</option>";
                                        }
                                        ?>

                                    </select>

                                </div>
                        </tr>
                        <tr>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">No HP</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputEmail3" name="nohp">
                                </div>
                        </tr>
                        <tr>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" name="alamat" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">ALAMAT</label>
                        </tr>
                        <tr>
                            <button name="kirim" class="btn btn-primary">KIRIM</button>
                        </tr>
                </div>

                </table>
                </div>
            </form>
        </body>

        </html>

    <?php
        break;
    case 'edit':

        $tm = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id='$_GET[id]'");
        $d = mysqli_fetch_array($tm);
    ?>

        <form method="post" action="proses_dosen.php?proses=edit&id=<?= $d['id'] ?>">
            <p>
            <h1>EDIT DOSEN</h1>
            </p>
            <div class="container">
                <table>
                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nik</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="nik" value="<?= $d['nik'] ?>">
                            </div>

                    </tr>
                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="nama_dosen" value="<?php echo $d['nama_dosen']; ?>">
                            </div>
                    </tr>
                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" name="email" value="<?= $d['email'] ?>">
                            </div>
                    </tr>
                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputEmail3" name="nohp" value="<?= $d['notelp'] ?>">
                            </div>
                    </tr>
                    <tr>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="alamat" style="height: 100px"><?= $d['alamat'] ?></textarea>
                            <label for="floatingTextarea2">ALAMAT</label>
                    </tr>
                    <tr>
                        <button name="kirim" class="btn btn-primary">KIRIM</button>
                    </tr>
            </div>

            </table>
            </div>
        </form>

    <?php
        break;
    case 'list':
        # code...

    ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">TABLE DOSEN</h1>
        </div>
        <a href="index.php?p=dosen&aksi=input" class="btn btn-primary">tambah dosen</a>

        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <td>NIK</td>
                    <td>NAMA</td>
                    <td>EMAIL</td>
                    <TD>PRODI</TD>
                    <td>NO HP</td>
                    <td>ALAMAT</td>
                    <td>AKSI</td>
                </tr>


                <?php
                $tampil = mysqli_query($koneksi, " SELECT *
FROM dosenn JOIN prodi ON prodi.id=dosenn.prodi_id ");

                while ($c = mysqli_fetch_array($tampil)) {
                ?>
                    <tr>
                        <td><?= $c['nip'] ?></td>
                        <td><?= $c['nama_dosen'] ?></td>
                        <td><?= $c['email'] ?></td>
                        <td><?= $c['nama_prodi'] ?></td>
                        <td><?= $c['notelp'] ?></td>
                        <td><?= $c['alamat'] ?></td>
                        <td><a href="index.php?p=dosen&aksi=edit&id=<?php echo $c['id'] ?>" class="btn btn-success">EDIT</a>
                            <a href="proses_dosen.php?proses=hapus&id=<?= $c['id'] ?>" class="btn btn-danger">HAPUS</a>
                        </td>


                    </tr>

                <?php
                }

                ?>
            </table>
        </div>
<?php
}
?>