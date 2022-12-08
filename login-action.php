<?php
session_start();
include("config.php");

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

$sql = "SELECT user_nama FROM user
         WHERE user_nama='$username'
         AND user_password='$password'";

$hasil = mysqli_query($config, $sql) or exit("Error query: <b>".$sql."</b>.");

 if(mysqli_num_rows($hasil)>0){
    $data = mysqli_fetch_array($hasil);
    $_SESSION['username'] = $data['user_nama'];
    header("Location: tambah.php");
} else { 
    echo" 
    <script>
    alert('Username atau Password anda salah');
    document.location.href = 'Login.php';
    </script>
    ";
}