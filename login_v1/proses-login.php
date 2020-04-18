<!-- proses pengolahan data -->
<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","db_perpus");

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password' ";
    $res = mysqli_query($koneksi,$sql);

    $count = mysqli_affected_rows($koneksi);
    $data_login = mysqli_fetch_assoc($res);

    if($count == 1){

        $_SESSION['id'] = $data_login['id_petugas'];
        //nilainya digunakan untuk waktu insert peminjaman

        $_SESSION['nama'] = $data_login['nama_petugas'];
        //nilainya bisa digunakan di navbar,mis.'hai,[nama_petugas]'


        header("Location:../index.php");

        
    }else{

        header("Location:index.html");

    }
}
?>