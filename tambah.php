<?php
include 'cor/config.php';
if(isset($_POST['tambah'])){
    $jurusan = $_POST['jurusan'];
    $tambah = cread('mahasiswa', 'jurusan' ,"('', '$jurusan')");
    header('location : tampil.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'navebar.php'?>
    <a href="tampil.php">Lihat</a>
    <div>
        <form method="POST">
            <input type="text" name="jurusan">
            <input type="submit" name="tambah">
        </form>
    </div>
</body>
</html>