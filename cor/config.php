<?php

include 'koneksi.php';

function read($db,$tabel,$condisi){
    $con = con($db);
    $tampil = mysqli_query($con, "SELECT * FROM $tabel $condisi");
    return $tampil;
}
function cread($db,$tabel,$value){
    $con = con($db);
    $buat = mysqli_query($con, "INSERT INTO $tabel VALUES $value");
    return $buat;
}
function delet($db,$tabel,$condisi){
    $con = con($db);
    $hapus = mysqli_query($con, "DELETE FROM $tabel WHERE $condisi");
    return $hapus;
}
function update($db,$tabel,$condisi){
    $con = con($db);
    $edit = mysqli_query($con, "UPDATE $tabel SET $condisi");
    return $edit;
}
?>