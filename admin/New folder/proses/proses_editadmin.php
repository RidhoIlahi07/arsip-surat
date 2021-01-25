<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				            = mysqli_real_escape_string($db,$_POST['id_admin']);
    $nama_admin	            = mysqli_real_escape_string($db,$_POST['nama_admin']);
	$username_admin		= mysqli_real_escape_string($db,$_POST['username_admin']);
	$password_admin 	        = mysqli_real_escape_string($db,sha1($_POST['password_admin']));
	$gambar			            = $_FILES['gambar']['name'];
	
	$sql  		= "SELECT * FROM tb_admin where id_admin='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($gambar == ''){
		$ext			= substr($data['foto_admin'], strripos($data['foto_admin'], '.'));	
		$nama_b  		= $username_admin . $ext;
		rename("../images/".$data['foto_admin'], "../images/".$nama_b);
		$sql = "UPDATE tb_admin set 
						nama_admin		    = '$nama_admin',
						username_admin		= '$username_admin',
						password_admin 		= '$password_admin',
						foto_admin			= '$nama_b' 
				where id_admin = $id";
				
		$execute = mysqli_query($db, $sql);			
						
		echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../dataAdmin.php'>";
	}	
	else{
		
		$tipe_file 		= $_FILES['gambar']['type'];
		$ukuran_file 	= $_FILES['gambar']['size'];
		if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){	
			unlink("../images/".$data['foto_admin']);
			$ext_file		= substr($gambar, strripos($gambar, '.'));			
			$tmp_file 		= $_FILES['gambar']['tmp_name'];
			
			$nama_baru = $username_admin . $ext_file;
			$path = "../images/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$sql = "UPDATE tb_admin set 
						nama_admin		    = '$nama_admin',
						username_admin		= '$username_admin',
						password_admin 		= '$password_admin ',
						foto_admin			= '$nama_baru' 
				where id_admin = $id";
				
			$execute = mysqli_query($db, $sql);			
		
			echo "<Center><h2><br>Data Bagian telah terubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../dataAdmin.php'>";			
		}
		else{
			echo "<Center><h2><br>Gambar yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editbagian.php?id_admin=".$id."'>";
		}
	
	}
	?>
	