<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['no_notulen'])) {

	$id = $_GET['no_notulen'];
    	

	$sql2  		= "SELECT * FROM notulen where no_notulen='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    	echo '<script>window.history.back()</script>';
	} else {
		$sql  		= "DELETE FROM notulen WHERE no_notulen='".$id."'";                        
		$query  	= mysqli_query($db, $sql);
            if ($query){
                echo "<Center><h2><br>Data telah Dihapus</h2></center>
				<meta http-equiv='refresh' content='2;url=../notulen.php'>";
            }		else{
			echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../notulen.php'>";
			}	
	}	
}elseif (isset($_GET['id_suratmasuk'])) {
	$id = $_GET['id_suratmasuk'];
	$sql2  		= "SELECT * FROM surat_masuk where id_suratmasuk='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    	echo '<script>window.history.back()</script>';
	} else {
		$sql  		= "DELETE FROM surat_masuk WHERE id_suratmasuk='".$id."'";                        
		$query  	= mysqli_query($db, $sql);
            if ($query){
                echo "<Center><h2><br>Data telah Dihapus</h2></center>
				<meta http-equiv='refresh' content='2;url=../datasuratmasuk.php'>";
            }		else{
			echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../datasuratmasuk.php'>";
			}	
	}
}elseif (isset($_GET['id_suratkeluar'])) {
	$id = $_GET['id_suratkeluar'];
	$sql  		= "SELECT * FROM surat_keluar where id_suratkeluar='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
    $total		= mysqli_num_rows($query);

	// cek hasil query
	if ($total == 0) {
    	echo '<script>window.history.back()</script>';
	} else {
		$sql1  		= "DELETE FROM surat_keluar WHERE id_suratkeluar='".$id."'";                        
		$query  	= mysqli_query($db, $sql1);
		if ($query){
			echo "<Center><h2><br>Data surat keluar telah Dihapus</h2></center>
			<meta http-equiv='refresh' content='2;url=../datasuratkeluar.php'>";
		}		else{
		echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
			<meta http-equiv='refresh' content='2;url=../datasuratkeluar.php'>";
		}	
	}
	
}elseif (isset($_GET['id_sk'])) {
	$id = $_GET['id_sk'];
	$sql  		= "SELECT * FROM surat_sk where id_sk='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
    $total		= mysqli_num_rows($query);

	// cek hasil query
	if ($total == 0) {
    	echo '<script>window.history.back()</script>';
	} else {
		$sql1  		= "DELETE FROM surat_sk WHERE id_sk='".$id."'";                        
		$query  	= mysqli_query($db, $sql1);
		if ($query){
			echo "<Center><h2><br>Data surat Keputusan telah Dihapus</h2></center>
			<meta http-equiv='refresh' content='2;url=../datasuratSK.php'>";
		}		else{
		echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
			<meta http-equiv='refresh' content='2;url=../datasuratSK.php'>";
		}	
	}
}elseif (isset($_GET['id_penerima_sk'])) {
	$id = $_GET['id_penerima_sk'];
	$sql  		= "SELECT * FROM penerima_sk where id_penerima_sk='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	$total		= mysqli_num_rows($query);
	
	$idpage=$data['id_sk'];

	// cek hasil query
	if ($total == 0) {
    	echo '<script>window.history.back()</script>';
	} else {
		$sql1  		= "DELETE FROM penerima_sk WHERE id_penerima_sk='".$id."'";                        
		$query  	= mysqli_query($db, $sql1);
		if ($query){
			echo "<Center><h2><br>Data telah Dihapus</h2></center>
			<meta http-equiv='refresh' content='2;url=../datapenerimask.php?id_sk=$idpage''>";
		}		else{
		echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
			<meta http-equiv='refresh' content='2;url=../datapenerimask.php?id_sk=$idpage''>";
		}	
	}
}

?>   