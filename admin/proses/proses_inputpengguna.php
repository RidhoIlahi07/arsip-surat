<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nama_pengguna	        = mysqli_real_escape_string($db,$_POST['nama_pengguna']);
	$full_name			= mysqli_real_escape_string($db,$_POST['full_name']);
	$username_pengguna		= mysqli_real_escape_string($db,$_POST['username_pengguna']);
	$password_pengguna 	= mysqli_real_escape_string($db,md5($_POST['password_pengguna']));
	
	$nama_file_lengkap 		= $_FILES['gambar']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['gambar']['type'];
	$ukuran_file 	= $_FILES['gambar']['size'];
	$tmp_file 		= $_FILES['gambar']['tmp_name'];
	
	
	if (!($nama_pengguna=='') and !($full_name=='') and !($username_pengguna=='') and !($password_pengguna =='')and 
		($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){		
		
		$nama_baru = $username_pengguna. $ext_file;
		$path = "../images/pengguna/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_pengguna(nama_pengguna, full_name, username_pengguna, password_pengguna, foto_pengguna)
				values ('$nama_pengguna', '$full_name', '$username_pengguna', '$password_pengguna','$nama_baru')";
		$execute = mysqli_query($db, $sql);
		
		echo "<Center><h2><br>Terima Kasih<br>Pengguna Telah Didaftarkan ke Sistem</h2></center>
			<meta http-equiv='refresh' content='2;url=../dataPengguna.php'>";
	}
	else{
		echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../inputpengguna.php'>";
	}
	
?>
	