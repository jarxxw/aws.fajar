<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemograman form</title>
</head>
<body>
    <form method="post">
        <label>NAMA</label><br>
        <input type="text" name="nama"><br>
        <input type="submit" name="kirim" value="kirim ah">
    </form>
    <?php
    if(isset($_POST['kirim']))
    {
    echo" nama ku $_POST[nama]";
    }
    else{
        echo"error";
    }
    ?>
</body>
</html>