<?php
include 'cor/config.php';
$id = $_GET['id'];
$hapus= delet('mahasiswa', 'jurusan','id_jurusan='.$id);
if($hapus){
    header('Location: index.php');
}
?>