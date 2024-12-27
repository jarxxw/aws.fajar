<?php
include("koneksi.php");
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
        <a href="index.php?p=ruangan&aksi=input" class="btn btn-primary">Tambah data ruangan</a>


        <table class="table table-bordered">
            <h1>DATA RUANGAN</h1>
            <tr>
                <td>kode ruangan</td>
                <td>nama ruangan</td>
                <td>gedung</td>
                <td>lantai</td>
                <td>jenis ruangan</td>
                <td>kapasitas</td>
                <td>keterangan</td>
                <td>aksi</td>

            </tr>
            <tr>
                <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM ruangan ");
                while ($c = mysqli_fetch_array($tampil)) {
                ?>

                    <td><?= $c['kode_ruangan'] ?></td>
                    <td><?= $c['nama_ruangan'] ?></td>

                    <td><?= $c['gedung'] ?></td>

                    <td><?= $c['lantai'] ?></td>

                    <td><?= $c['jenis_ruangan'] ?></td>

                    <td><?= $c['kapasitas'] ?></td>

                    <td><?= $c['keterangan'] ?></td>
                    <td>
                        <a href="proses_ruangan.php?proses=hapus&id=<?= $c['id'] ?>" class="btn btn-danger">HAPUS</a>
                        <a href="index.php?p=ruangan&aksi=edit&id=<?= $c['id'] ?>" class="btn btn-success">EDIT</a>
                    </td>
            </tr>


        <?php
                }
        ?>


    <?php
        break;

    case 'input':
    ?>
        <form method="post" action="proses_ruangan.php?proses=input">
            <table>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kode ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="kode_ruangan">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="nama_ruangan">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Gedung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="gedung">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Lantai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail3" name="lantai">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="jenis_ruangan">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kapasitas</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail3" name="kapasitas">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="keterangan">
                        </div>

                </tr>
                <button class="btn btn-primary" name="kirim">Kirim</button>
            </table>

        </form>

    <?php
        break;
    case 'edit':
    ?>
        <?php
        include("koneksi.php");
        $tx = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE id='$_GET[id]'");
        $d = mysqli_fetch_array($tx);
        ?>
        <form method="post" action="proses_ruangan.php?proses=edit&id=<?php echo $d['id'] ?>">
            <table>
                <h1>EDIT RUANGAN</h1>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kode ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="kode_ruangan" value="<?= $d['kode_ruangan'] ?>">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="nama_ruangan" value="<?= $d['nama_ruangan'] ?>">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Gedung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="gedung" value="<?= $d['gedung'] ?>">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Lantai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail3" name="lantai" value="<?= $d['lantai'] ?>">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="jenis_ruangan" value="<?= $d['jenis_ruangan'] ?>">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kapasitas</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail3" name="kapasitas" value="<?= $d['kapasitas'] ?>">
                        </div>

                </tr>
                <tr>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="keterangan" value="<?= $d['keterangan'] ?>">
                        </div>

                </tr>
                <button class="btn btn-primary" name="kirim">Kirim</button>
            </table>
    <?php
}
    ?>