<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['id_pengguna'])) {

	$id = $_GET['id_pengguna'];
    	

	$sql2  		= "SELECT * FROM tb_pengguna where id_pengguna='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    echo '<script>window.history.back()</script>';
	    } else 
            {
             $sql  		= "DELETE FROM tb_pengguna WHERE id_pengguna='".$id."'";                        
	         $query  	= mysqli_query($db, $sql);


            if ($query){
                unlink("../images/pengguna/".$data2['foto_pengguna']);
                echo "<Center><h2><br>Data Admin telah Dihapus</h2></center>
				<meta http-equiv='refresh' content='2;url=../dataPengguna.php'>";
            }		else{
			echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../dataPengguna.php'>";
	}	
}	
}						
?>   