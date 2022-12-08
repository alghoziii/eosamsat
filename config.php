<?php
$config = mysqli_connect("localhost","root","","eosamsat_2209");
if (!$config){
    die ('Gagal terhubung ke MySQLi: '.mysqli_connect_error());
}

?>