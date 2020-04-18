<!-- jadi ini proses buat nyari data berdasarkan inputan sesuatu, bisa dari nik atau nama, terus nanti dicari di database username sama
password yang sesuai sama nik ini, tinggal ganti aja query $sql nya -->
<?php
include 'koneksi.php';
session_start();

if(isset($_POST['search'])){

$id_petugas = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];

$sql = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas' AND nama_petugas='$nama_petugas' ");
$count = mysqli_affected_rows($koneksi);
$res = mysqli_fetch_assoc($sql);                               

// $session itu buat nyimpen data yang udah di dapet buat ditampilin ke user
if($count == 1){
       header("Location:berhasil.php");
       $_SESSION['username'] = $res['username'];
       $_SESSION['password'] = $res['password'];
}
else{

    header("Location:gagal.html");
}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
<!--===============================================================================================-->
</head>
<body>
    

    <!-- ini gambarnya -->
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic">
					<img src="images/login.jpg" alt="IMG">
				</div>
<!--===============================================================================================-->

                <!-- ini judulnya -->
				<form method="post" action="">
					<span class="login100-form-title">   
                        Find Your Account!
                    </span>
<!--===============================================================================================-->

                    <!-- ini kolom username, yang atas -->
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="nama_petugas" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user" aria-hidden="true"></i>
						</span>
                    </div>
<!--===============================================================================================-->

                    <!-- ini kolom password -->
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="id_petugas" placeholder="ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
<!--===============================================================================================-->                    
                    
                    <!-- ini tombolnya -->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="search">
							SEARCH
						</button>
                    </div>
<!--===============================================================================================-->                    

                        <!-- ini tulisan kecil yang dibawah -->
					<div class="text-center p-t-12">
						<a class="txt2" href="index.html">
							Login
						</a>
                    </div>
<!--===============================================================================================-->                    

					<!-- <div class="text-center p-t-136">   ini tombol buat create account, tapi nggak tak pakek
						<a class="txt2" href="#">
							Create your Account
						</a>
                    </div> -->
<!--===============================================================================================-->                    
				</form>
			</div>
		</div>
	</div>
	
	

<!-- ini udah dari sononya	 -->
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>