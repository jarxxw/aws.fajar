<?php
include("koneksi.php");
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
<a href="index.php?p=kategori&aksi=input" class="btn btn-primary">TAMBAH DATA</a>
        <h1>TABLE KATEGORI</h1>
        <div class="container">
            <table id="ex" class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>NAMA</td>
                        <td>KETERANGAN</td>
                        <TD>AKSI</TD>
                    </tr>
                </thead>
                <?php
                $tm = mysqli_query($koneksi, "SELECT * FROM kategori ");
                while ($c = mysqli_fetch_array($tm)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $c['id'] ?></td>
                            <td><?php echo $c['nama_kategori'] ?></td>
                            <td><?php echo $c['keterangan'] ?></td>
                            <td>
                                <a class="btn btn-danger" href="proses_kategori.php?proses=hapus&id=<?= $c['id'] ?>">HAPUS</a>
                                <a class="btn btn-success" href="index.php?p=kategori&aksi=edit&id=<?= $c['id'] ?>">EDIT</a>
                            </td>



                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    <?php
        break;
    case 'edit':
        
        $tcm = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$_GET[id]'");
        $d = mysqli_fetch_array($tcm);

    ?>

        <div class="row mb-3">
            <form method="post" action="proses_kategori.php?proses=editt&id=<?=$d['id']?>">
                <tr>
                    <label class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_kategori" value="<?= $d['nama_kategori'];?>">
                    </div>
                </tr>
                <tr>
                    <label class="col-sm-2 col-form-label">KETERANGAN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keterangan" value="<?= $d['keterangan'];?>">
                    </div>
                </tr>
                <tr>
                    <br>
                    <div class="col-sm-10">
                        <button class="btn btn-primary" name="kirim">KIRIM</button>
                </tr>
            </form>
        </div>

        </table>

      <?php
        break;
        case 'input':
        
        ?>
        <table>
         <form method="post" action="proses_kategori.php?proses=input">
                <tr>
                    <label class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_kategori">
                    </div>
                </tr>
                <tr>
                    <label class="col-sm-2 col-form-label">KETERANGAN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keterangan">
                    </div>
                </tr>
                <tr>
                    <br>
                    <div class="col-sm-10">
                        <button class="btn btn-primary" name="kirim">KIRIM</button>
                </tr>
            </form>
    </table>
<?php
}
?>