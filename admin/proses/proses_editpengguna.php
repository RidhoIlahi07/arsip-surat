<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				            = mysqli_real_escape_string($db,$_POST['id_pengguna']);
	$nama_pengguna	            = mysqli_real_escape_string($db,$_POST['nama_pengguna']);
	$full_name	            	= mysqli_real_escape_string($db,$_POST['full_name']);
	$username_pengguna			= mysqli_real_escape_string($db,$_POST['username_pengguna']);
	$password_pengguna 	        = mysqli_real_escape_string($db,md5($_POST['password_pengguna']));
	$gambar			            = $_FILES['gambar']['name'];
	
	$sql  		= "SELECT * FROM tb_pengguna where id_pengguna='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($gambar == ''){
		$ext			= substr($data['foto_pengguna'], strripos($data['foto_pengguna'], '.'));	
		$nama_b  		= $username_pengguna . $ext;
		rename("../images/pengguna/".$data['foto_pengguna'], "../images/pengguna/".$nama_b);
		$sql = "UPDATE tb_pengguna set 
						nama_pengguna		    = '$nama_pengguna',
						full_name				= '$full_name',
						username_pengguna		= '$username_pengguna',
						password_pengguna 		= '$password_pengguna',
						foto_pengguna			= '$nama_b' 
				where id_pengguna = $id";
				
		$execute = mysqli_query($db, $sql);			
						
		echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../dataPengguna.php'>";
	}	
	else{
		
		$tipe_file 		= $_FILES['gambar']['type'];
		$ukuran_file 	= $_FILES['gambar']['size'];
		if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){	
			unlink("../images/pengguna/".$data['foto_pengguna']);
			$ext_file		= substr($gambar, strripos($gambar, '.'));			
			$tmp_file 		= $_FILES['gambar']['tmp_name'];
			
			$nama_baru = $username_pengguna . $ext_file;
			$path = "../images/pengguna/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$sql = "UPDATE tb_pengguna set 
						nama_pengguna		    = '$nama_pengguna',
						full_name				= '$full_name',
						username_pengguna		= '$username_pengguna',
						password_pengguna 		= '$password_pengguna ',
						foto_pengguna			= '$nama_baru' 
				where id_pengguna = $id";
				
			$execute = mysqli_query($db, $sql);			
		
			echo "<Center><h2><br>Data Bagian telah terubah2</h2></center>
				<meta http-equiv='refresh' content='2;url=../dataPengguna.php'>";			
		}
		else{
			echo "<Center><h2><br>Gambar yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editPengguna.php?id_pengguna=".$id."'>";
		}
	}
	?>
	