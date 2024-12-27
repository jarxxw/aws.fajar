<?php
include("koneksi.php");
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

            <title>DATA MAHASISWA</title>
           
        </head>

        <body>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">TABLE MAHASISWA</h1>  
    </div>
            <div class="container">
                <a href="index.php?p=mhs&aksi=input" class="btn btn-primary"> tambah data</a>
                <a href="index.php?p=prodi&aksi=input" class="btn btn-primary">tambah prodi</a>
                <table class="table table-bordered">
                    <tr>
                        <td>NAMA</td>
                        <td>NIM</td>
                        <td>EMAIL</td>
                        <td>NO HP</td>
                        <td>ALAMAT</td>
                        <td>AKSI</td>

                    </tr>
                    <?php
                    $ambil = mysqli_query($koneksi, "SELECT * FROM mahasiswa ");
                    while ($d = mysqli_fetch_array($ambil)) {
                    ?>
                        <tr>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['nim'] ?></td>
                            <td><?php echo $d['email'] ?></td>
                            <td><?php echo $d['nohp'] ?></td>
                            <td><?php echo $d['alamat'] ?></td>
                            <td><a href="proses_mahsiswa.php?p=mhs&proses=delete&nim=<?php echo $d['nim'] ?>" class="btn btn-danger" onclick="return confirm('kamu yakin?')">HAPUS</a>
                                <a href="index.php?p=mhs&aksi=update&nim=<?php echo $d['nim'] ?> " class="btn btn-success">EDIT</a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>

            </div>

        </body>

        </html>



    <?php
        break;
    case 'input':
    ?>
        <form method="post" action="proses_mahsiswa.php?proses=insert">
            <p>
            <h1>FORM REGISTER</h1>
            </p>
            <div class="container">
                <table>
                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="nama">
                            </div>

                    </tr>
                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputEmail3" name="nim">
                            </div>
                    </tr>

                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal lahir</label>
                            <div class="col-sm-10">
                                <select name="tgl" class="form-select">
                                    <option></option>
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        # code...
                                        echo "<option value=" . $i . ">" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </tr>

                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <select name="bln" class="form-select">
                                    <option></option>

                                    <?php
                                    $namabln = [1 => 'januari', 'februari', 'march', 'april', 'may', 'june', 'july', 'agustus', 'sept', 'okt', 'nov', 'dec'];
                                    foreach ($namabln  as $c => $nmbln) {
                                        echo "<option value=" . $c . ">" . $nmbln . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>


                    </tr>
                    <div class="row mb-3">

                        <label class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">

                            <select name="thn" class="form-select">
                                <option></option>

                                <?php
                                for ($i = 2024; $i >= 1956; $i--) {
                                    # code...
                                    echo "<option value=" . $i . ">" . $i . "</option>";
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    </tr>

                    <tr>
                        <td>
                            <div class="row mb-3">

                                <label class="col-sm-4 col-form-label">Jenis kelamin</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenisk" value="P">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    PEREMPUAN
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenisk" value="L">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    LAKI-LAKI
                                </label>
                        </td>
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
                <td>Hobby</td>
                <td>
                    <input type="checkbox" name="hobby[]" value="Membaca" class="form-check-input"> Membaca
                    <input type="checkbox" name="hobby[]" value="Olahraga" class="form-check-input"> Olahraga
                    <input type="checkbox" name="hobby[]" value="Musik" class="form-check-input"> Musik
                    <input type="checkbox" name="hobby[]" value="Menulis" class="form-check-input"> Menulis
                </td>
            </tr>

            <!-- No. HP/Telepon -->
            <tr>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputEmail3" name="nohp">
                    </div>
            </tr>

            <!-- Alamat -->
            <tr>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="alamat" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">ALAMAT</label>
                </div>
            </tr>


            <tr>
                <td><input type="submit" value="kirim aja" name="kirim" class="btn btn-secondary">
                    <input type="reset" value="hapus ah" class="btn btn-danger">
                </td>
            </tr>
            </table>
            </div>
        </form>


    <?php
        break;
    case 'update';
    ?>
        <?php
        include("koneksi.php");
        $tambil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
        $xa = mysqli_fetch_array($tambil);

        ?>
        <form method="post" action="proses_mahsiswa.php?proses=update&nim=<?php echo $xa['nim']?>">
            <p>
            <h1>FORM EDIT</h1>
            </p>
            <div class="container">
                <table>
                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="<?php echo $xa['nama']; ?>">
                            </div>

                    </tr>
                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputEmail3" name="nim" value="<?php echo $xa['nim']; ?>">
                            </div>
                    </tr>

                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal lahir</label>
                            <div class="col-sm-10">
                                <select name="tgl" class="form-select">
                                    <option></option>
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        # code...
                                        echo "<option value=" . $i . ">" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </tr>

                    <tr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-10">
                                <select name="bln" class="form-select">
                                    <option></option>

                                    <?php
                                    $namabln = [1 => 'januari', 'februari', 'march', 'april', 'may', 'june', 'july', 'agustus', 'sept', 'okt', 'nov', 'dec'];
                                    foreach ($namabln  as $c => $nmbln) {
                                        echo "<option value=" . $c . "$selected>" . $nmbln . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>


                    </tr>
                    <div class="row mb-3">

                        <label class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">

                            <select name="thn" class="form-select">
                                <option></option>

                                <?php
                                for ($i = 2024; $i >= 1956; $i--) {
                                    # code...
                                    echo "<option value=" . $i . ">" . $i . "</option>";
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    </tr>

                    <tr>
                        <td>
                            <div class="row mb-3">

                                <label class="col-sm-4 col-form-label">Jenis kelamin</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenisk" value="P" <?php echo ($xa['jenis_kelamin'] == 'P') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    PEREMPUAN
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenisk" value="L" <?php echo ($xa['jenis_kelamin'] == 'L') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    LAKI-LAKI
                                </label>
                        </td>
            </div>
            </tr>

            <tr>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" name="email" value="<?php echo $xa['email']; ?>">
                    </div>
            </tr>
            <tr>
                <td>Hobby</td>
                <td>
                    <input type="checkbox" name="hobby[]" value="Membaca" class="form-check-input"> Membaca
                    <input type="checkbox" name="hobby[]" value="Olahraga" class="form-check-input"> Olahraga
                    <input type="checkbox" name="hobby[]" value="Musik" class="form-check-input"> Musik
                    <input type="checkbox" name="hobby[]" value="Menulis" class="form-check-input"> Menulis
                </td>
            </tr>

            <!-- No. HP/Telepon -->
            <tr>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputEmail3" name="nohp" value="<?php echo $xa['nohp']; ?>">
                    </div>
            </tr>

            <!-- Alamat -->
            <tr>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="alamat" style="height: 100px"><?php echo $xa['alamat']; ?></textarea>
                    <label for="floatingTextarea2">ALAMAT</label>
                </div>
            </tr>


            <tr>
                <td><input type="submit" value="kirim aja" name="kirim" class="btn btn-secondary">
                    <input type="reset" value="hapus ah" class="btn btn-danger">
                </td>
            </tr>
            </table>
            </div>
        </form>


<?php
        break;
}
?>