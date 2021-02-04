<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	if(strlen(isset($_POST['no_suratnotulen']))>0){
		$no_suratnotulen			    = mysqli_real_escape_string($db,$_POST['no_suratnotulen']);
		$pemimpin_notulen			    = mysqli_real_escape_string($db,$_POST['pemimpin_notulen']);
		$tanggal_notulen		        = mysqli_real_escape_string($db,$_POST['tanggal_notulen']);
		$tempat_notulen 	        	= mysqli_real_escape_string($db,$_POST['tempat_notulen']);
		$agenda_notulen	        		= mysqli_real_escape_string($db,$_POST['agenda_notulen']);
		$pengirim_notulen        		= mysqli_real_escape_string($db,$_POST['pengirim_notulen']);
		$penerima_notulen				= mysqli_real_escape_string($db,$_POST['penerima_notulen']);
		$hasil_notulen					= mysqli_real_escape_string($db,$_POST['hasil_notulen']);
		
			date_default_timezone_set('Asia/Jakarta'); 
			$tanggal_entry  			= date("Y-m-d H:i:s");
			$thnNow 					= date("Y");
			$tgl			            = date('Y-m-d H:i:s', strtotime($tanggal_notulen));
			
			$sql = "INSERT INTO notulen(no_suratnotulen,pemimpin_notulen, tanggal_notulen, tempat_notulen, agenda_notulen, pengirim_notulen,penerima_notulen,hasil_notulen)
					values ('$no_suratnotulen','$pemimpin_notulen', '$tgl', '$tempat_notulen', '$agenda_notulen','$pengirim_notulen','$penerima_notulen','$hasil_notulen')";
			$execute = mysqli_query($db, $sql);
			
			echo "<Center><h2><br>Terima Kasih<br>Telah Didaftarkan ke Sistem </h2></center>
			<meta http-equiv='refresh' content='2;url=../../notulen.php'>";
	}elseif (strlen(isset($_POST['tgl_suratmasuk']))>0) {
		$tgl_suratmasuk			    = mysqli_real_escape_string($db,$_POST['tgl_suratmasuk']);
		$no_suratmasuk		        = mysqli_real_escape_string($db,$_POST['no_suratmasuk']);
		$isi_suratmasuk 	        = mysqli_real_escape_string($db,$_POST['isi_suratmasuk']);
		$perihal_suratmasuk	        = mysqli_real_escape_string($db,$_POST['perihal_suratmasuk']);
		$penerima_suratmasuk        = mysqli_real_escape_string($db,$_POST['penerima_suratmasuk']);
		$pengirim_suratmasuk		= mysqli_real_escape_string($db,$_POST['pengirim_suratmasuk']);
		
			date_default_timezone_set('Asia/Jakarta'); 
			$tanggal_entry  			= date("Y-m-d H:i:s");
			$thnNow 					= date("Y");
			$tgl_keluar                 = date('Y-m-d H:i:s', strtotime($tgl_suratmasuk));
			
			$sql = "INSERT INTO surat_masuk(tgl_suratmasuk, no_suratmasuk, isi_suratmasuk, perihal_suratmasuk, penerima_suratmasuk,pengirim_suratmasuk)
					values ('$tgl_keluar', '$no_suratmasuk', '$isi_suratmasuk', '$perihal_suratmasuk','$penerima_suratmasuk','$pengirim_suratmasuk')";
			$execute = mysqli_query($db, $sql);
			
			echo "<Center><h2><br>Terima Kasih<br>Telah Didaftarkan ke Sistem</h2></center>
				<meta http-equiv='refresh' content='2;url=../datasuratmasuk.php'>";
	}elseif (strlen(isset($_POST['tgl_suratkeluar']))>0) {
		$tgl_suratkeluar			= mysqli_real_escape_string($db,$_POST['tgl_suratkeluar']);
		$no_suratkeluar		        = mysqli_real_escape_string($db,$_POST['no_suratkeluar']);
		$isi_suratkeluar 	        = mysqli_real_escape_string($db,$_POST['isi_suratkeluar']);
		$perihal_suratkeluar	    = mysqli_real_escape_string($db,$_POST['perihal_suratkeluar']);
		$penerima_suratkeluar       = mysqli_real_escape_string($db,$_POST['penerima_suratkeluar']);
		$pengirim_suratkeluar		= mysqli_real_escape_string($db,$_POST['pengirim_suratkeluar']);
		
			date_default_timezone_set('Asia/Jakarta'); 
			$tanggal_entry  			= date("Y-m-d H:i:s");
			$thnNow 					= date("Y");
			$tgl_keluar                 = date('Y-m-d H:i:s', strtotime($tgl_suratkeluar));
			
			$sql = "INSERT INTO surat_keluar(tgl_suratkeluar, no_suratkeluar, isi_suratkeluar, perihal_suratkeluar, penerima_suratkeluar,pengirim_suratkeluar)
					values ('$tgl_keluar', '$no_suratkeluar', '$isi_suratkeluar', '$perihal_suratkeluar','$penerima_suratkeluar','$pengirim_suratkeluar')";
			$execute = mysqli_query($db, $sql);
			
			echo "<Center><h2><br>Terima Kasih<br>Telah Didaftarkan ke Sistem</h2></center>
				<meta http-equiv='refresh' content='2;url=../datasuratkeluar.php'>";
	}elseif(strlen(isset($_POST['no_sk']))>0){
		
		$no_sk			    	= mysqli_real_escape_string($db,$_POST['no_sk']);
		$tentang_sk		        = mysqli_real_escape_string($db,$_POST['tentang_sk']);
		$tanggal_sk 	        = mysqli_real_escape_string($db,$_POST['tanggal_sk']);
		$penerbit_sk	        = mysqli_real_escape_string($db,$_POST['penerbit_sk']);
		$keputusan_sk        	= mysqli_real_escape_string($db,$_POST['keputusan_sk']);
		$keterangan_sk			= mysqli_real_escape_string($db,$_POST['keterangan_sk']);
		
			date_default_timezone_set('Asia/Jakarta'); 
			$tanggal_entry  			= date("Y-m-d H:i:s");
			$thnNow 					= date("Y");
			$tgl_sk		                 = date('Y-m-d H:i:s', strtotime($tanggal_sk));
			
			$sql = "INSERT INTO surat_sk(no_sk, tentang_sk, tanggal_sk, penerbit_sk, keputusan_sk,keterangan_sk)
					values ('$no_sk', '$tentang_sk', '$tgl_sk', '$penerbit_sk','$keputusan_sk','$keterangan_sk')";
			$execute = mysqli_query($db, $sql);
			
			echo "<Center><h2><br>Terima Kasih<br>Telah Didaftarkan ke Sistem, </h2></center>
				<meta http-equiv='refresh' content='2;url=../datasuratSK.php'>";
	}elseif (strlen(isset($_POST['nama_penerimask']))>0) {
		$nama			    	= mysqli_real_escape_string($db,$_POST['nama_penerimask']);
		$tempat			        = mysqli_real_escape_string($db,$_POST['tl_penerimask']);
		$tanggal	 	        = mysqli_real_escape_string($db,$_POST['tgl_penerimask']);
		$pendidikan	 		    = mysqli_real_escape_string($db,$_POST['pddk_terakhir']);
		$jbtn_baru		       	= mysqli_real_escape_string($db,$_POST['jbtn_baru']);
		$jbtn_lama				= mysqli_real_escape_string($db,$_POST['jbtn_lama']);
		$akhir					= mysqli_real_escape_string($db,$_POST['akhir_penerimask']);
		$keterangan				= mysqli_real_escape_string($db,$_POST['ket_penerimask']);
		$id_sk					= mysqli_real_escape_string($db,$_POST['id_sk']);
		
		
			date_default_timezone_set('Asia/Jakarta'); 
			$tanggal_entry  			= date("Y-m-d H:i:s");
			$thnNow 					= date("Y");
			$tgl_sk		                 = date('Y-m-d H:i:s', strtotime($tanggal));
			
			$sql = "INSERT INTO penerima_sk(nama_penerimask, tl_penerimask, tgl_penerimask, pddk_terakhir, jbtn_baru,jbtn_lama,akhir_penerimask,ket_penerimask,id_sk)
					values ('$nama', '$tempat', '$tgl_sk', '$pendidikan','$jbtn_baru','$jbtn_lama','$akhir','$keterangan','$id_sk')";
			$execute = mysqli_query($db, $sql);
			
			echo "<Center><h2><br>Terima Kasih<br>Telah Didaftarkan ke Sistem, $sql </h2></center>
			<meta http-equiv='refresh' content='2;url=../datapenerimask.php?id_sk=$id_sk'>";
	}
?>
	

