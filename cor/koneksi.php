<?php
function con($db){
    $con = mysqli_connect('localhost', 'root', '', $db);
    return $con;
}
?>