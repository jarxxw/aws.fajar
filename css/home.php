<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link ke Bootstrap untuk styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':

?>
<body>
   
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <?php
    include("../admin/koneksi.php");
    $tampil = mysqli_query($koneksi, "SELECT * FROM berita ");
    while ($c = mysqli_fetch_array($tampil)) {
        # code...

    ?>
        <div style="display:inline-flex;">
            <div class="card" style="width: 18rem; margin-left:20px; ">
                <img src="../uploads/<?php echo $c['file_upload'] ?>" class="card-img-top" style="width: 100%; height: 300px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $c['judul'] ?></h5>
                    <p class="card-text"><?php echo $c['isi_berita']?></p>
                    <a href="index.php?p=home&aksi=zoom&id=<?php echo $c['id']?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


    <!-- Link ke Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

<?php
case 'zoom':
include("../admin/koneksi.php");
$tm=mysqli_query($koneksi, "SELECT * FROM berita WHERE id='" . $_GET['id'] . "'");
while($d=mysqli_fetch_array($tm)) {
?>

<div style="display:flex; justify-content:center;">
            <div">
                <img src="../uploads/<?php echo $d['file_upload'] ?>" class="card-img-top" style="width: 100%; ">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d['judul'] ?></h5>
                    <p class="card-text"><?php echo $d['isi_berita']?></p>
                    <a href="index.php?p=home&aksi=list" class="btn btn-primary">back</a>
                </div>
            </div>
        </div>
   


<?php
}
?>
<?php
}
?>

</html>