<?php
include 'cor/config.php';
function jurusan_asc(){
    read('mahasiswa', 'jurusan', ' ORDER by nama_jurusan ASC');
}
?>