<div class="row">
            <h2>Data Berita</h2>
            <div class="col-2">
                <a href="../admin/index.php?p=berita&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-file-plus"></i> Tambah Berita</a>
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
                include '../admin/koneksi.php';
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
                            <a href="../admin/index.php?p=berita&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pen-fill"></i> Edit</a>
                            <a href="../admin/proses_berita.php?proses=hapus&id=<?= $data['id'] ?>" class="btn btn-warning" onclick="return confirm('Yakin akan menghapus data?')"><i class="bi bi-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>