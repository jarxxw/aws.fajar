<?php
include("koneksi.php");
$tampil=mysqli_query($koneksi,"SELECT * FROM prodi");

?>

<?php
 $aksi=isset($_GET['aksi']) ? $_GET['aksi']: 'list';
 switch ($aksi) {
     case 'list':
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">TABLE PRODI</h1>  
    </div>
    <div class="container">
        <a href="index.php?p=prodi&aksi=input" class="btn btn-primary">tambah prodi</a>
        <a href="index.php?p=mhs&aksi=input" class="btn btn-primary"> tambah data</a>

    <table class="table table-bordered">
        <tr>
            <td>NO</td>
            <td>NAMA PRODI</td>
            <td>JENJANG</td>
            <td>AKSI</td>
        </tr>
        <?php
        $no=1;
        while ($d=mysqli_fetch_array($tampil)) {
            ?>

        <tr>
            
            <td><?php echo $no++;?></td>
            <td><?php echo $d['nama_prodi'];?></td>
            <td><?php echo $d['jenjang'];?></td>
            <td><a href="proses_prodi.php?proses=hapus&id=<?php echo $d['id']?>" class="btn btn-danger">HAPUS</a>
            <a href="index.php?p=prodi&aksi=edit&id=<?php echo $d['id']?>" class="btn btn-success">EDIT</a></td>
            <?php   
               }
             ?>
            
        </tr>

    </table>
    </div>

</body>
</html>

<?php
        break;
    case 'input':
?>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1{text-align: center;}
    </style>
<body>
    <form method="post" action="proses_prodi.php?proses=insert">
        <p><h1>FORM PRODI</h1></p>
        <div class="container">
        <table>
           
        <tr>
            <div class="row mb-3">
            <label  class="col-sm-2 col-form-label">Nama Prodi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control"  name="nameprod">
            </div>
        </tr>
        <tr>
            <div class="row mb-3">
            <label  class="col-sm-2 col-form-label">Jenjang</label>
            <div class="col-sm-10">
            <select name="jen">
            <option value="D3"> D3</option>
                <option value="D4"> D4</option>
                <option value="S1"> S1</option>
                <option value="S2"> S2</option>


            </select>
            </div>
        </tr>
        <tr>
            <button name="kirim" class="btn btn-primary">kirim</button>
        </tr>
        </table>
    </form>
</body>


<?php
        break;
        
        case 'edit':
          
 ?>
 <?php
 include("koneksi.php");
   $tampil=mysqli_query($koneksi,"SELECT * FROM prodi WHERE id='$_GET[id]'");
   $xa = mysqli_fetch_array($tampil);
 ?>
 <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1{text-align: center;}
    </style>
<body>
    <form method="post" action="proses_prodi.php?proses=edit&id=<?php echo $xa ['id'] ?>">
        <p><h1>FORM EDIT PRODI</h1></p>
        <div class="container">
        <table>
       
        <tr>
            <div class="row mb-3">
            <label  class="col-sm-2 col-form-label">Nama Prodi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control"  name="nameprod"  value="<?php echo $xa ['nama_prodi']?>">
            </div>
        </tr>
        <tr>
            <div class="row mb-3">
            <label  class="col-sm-2 col-form-label">Jenjang</label>
            <div class="col-sm-10">
            <select name="jen">
                <option value="D3"> D3</option>
                <option value="D4"> D4</option>
                <option value="S1"> S1</option>
                <option value="S2"> S2</option>


            </select>
            </div>
        </tr>
        <tr>
            <button name="kirim" class="btn btn-primary">kirim</button>
        </tr>
        </table>
        </div>
    </form>
</body>
 <?php
 break;      
}
?>