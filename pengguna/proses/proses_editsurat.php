<?php
	session_start();
    include '../../koneksi/koneksi.php';

    if(strlen(isset($_POST['id_suratmasuk']))>0){
		$suratmasuk 				= mysqli_real_escape_string($db,$_POST['id_suratmasuk']);
        $tgl_surat		            = mysqli_real_escape_string($db,$_POST['tgl_suratmasuk']);
        $no_surat	            	= mysqli_real_escape_string($db,$_POST['no_suratmasuk']);
        $isi_surat					= mysqli_real_escape_string($db,$_POST['isi_suratmasuk']);
        $perihal_surat	 	        = mysqli_real_escape_string($db,$_POST['perihal_suratmasuk']);
        $penerima_surat 	        = mysqli_real_escape_string($db,$_POST['penerima_suratmasuk']);
        $pengirim_surat 	        = mysqli_real_escape_string($db,$_POST['pengirim_suratmasuk']);        

        $sql  		= "SELECT * FROM surat_masuk where id_suratmasuk='".$suratmasuk."'";                        
        $query  	= mysqli_query($db, $sql);
        $data 		= mysqli_fetch_array($query);
        $total		= mysqli_num_rows($query);

            date_default_timezone_set('Asia/Jakarta'); 
			$tanggal_entry  			= date("Y-m-d H:i:s");
			$thnNow 					= date("Y");
			$tgl_masuk                 = date('Y-m-d H:i:s', strtotime($tgl_surat));

        if ($total>0){
            $sql=" UPDATE surat_masuk set 
                        tgl_suratmasuk 		= '$tgl_masuk',
                        no_suratmasuk		= '$no_surat',
                        isi_suratmasuk		= '$isi_surat',	
                        perihal_suratmasuk	= '$perihal_surat',
                        penerima_suratmasuk	= '$penerima_surat',
                        pengirim_suratmasuk	= '$pengirim_surat'
                where id_suratmasuk = $suratmasuk";
        
            $execute=mysqli_query($db,$sql);
            echo "<Center><h2><br>Terimakasih Data Telah di Ubah</h2></center>
            <meta http-equiv='refresh' content='2;url=../datasuratmasuk.php'>";
        }else{
            echo "<Center><h2><br>error boy </h2></center>";
            echo "<Center><h2><br>data, $suratmasuk</h2></center>";
        }
    }elseif(strlen(isset($_POST['id_suratkeluar']))>0){
		$suratkeluar 				= mysqli_real_escape_string($db,$_POST['id_suratkeluar']);
        $tgl_surat		            = mysqli_real_escape_string($db,$_POST['tgl_suratkeluar']);
        $no_surat	            	= mysqli_real_escape_string($db,$_POST['no_suratkeluar']);
        $isi_surat					= mysqli_real_escape_string($db,$_POST['isi_suratkeluar']);
        $perihal_surat	 	        = mysqli_real_escape_string($db,$_POST['perihal_suratkeluar']);
        $penerima_surat 	        = mysqli_real_escape_string($db,$_POST['penerima_suratkeluar']);
        $pengirim_surat 	        = mysqli_real_escape_string($db,$_POST['pengirim_suratkeluar']);        

        $sql  		= "SELECT * FROM surat_keluar where id_suratkeluar='".$suratkeluar."'";                        
        $query  	= mysqli_query($db, $sql);
        $data 		= mysqli_fetch_array($query);
        $total		= mysqli_num_rows($query);

        date_default_timezone_set('Asia/Jakarta'); 
        $tanggal_entry  			= date("Y-m-d H:i:s");
        $thnNow 					= date("Y");
        $tgl_keluar                 = date('Y-m-d H:i:s', strtotime($tgl_surat));

        if ($total>0){
            $sql=" UPDATE surat_keluar set 
                        tgl_suratkeluar 	= '$tgl_keluar',
                        no_suratkeluar		= '$no_surat',
                        isi_suratkeluar		= '$isi_surat',	
                        perihal_suratkeluar	= '$perihal_surat',
                        penerima_suratkeluar	= '$penerima_surat',
                        pengirim_suratkeluar	= '$pengirim_surat'
                where id_suratkeluar = $suratkeluar";
        
            $execute=mysqli_query($db,$sql);
            echo "<Center><h2><br>Terimakasih Data Surat Keluar Telah di Ubah</h2></center>
            <meta http-equiv='refresh' content='2;url=../datasuratkeluar.php'>";
        }else{
            echo "<Center><h2><br>error boy </h2></center>";
            echo "<Center><h2><br>data, $suratmasuk</h2></center>";
        }
    }elseif(strlen(isset($_POST['no_notulen']))>0){
		$id_notulen 				= mysqli_real_escape_string($db,$_POST['no_notulen']);
        $no_surat		            = mysqli_real_escape_string($db,$_POST['no_suratnotulen']);
        $pemimpin	            	= mysqli_real_escape_string($db,$_POST['pemimpin_notulen']);
        $tgl						= mysqli_real_escape_string($db,$_POST['tanggal_notulen']);
        $tempat			 	        = mysqli_real_escape_string($db,$_POST['tempat_notulen']);
        $agenda			 	        = mysqli_real_escape_string($db,$_POST['agenda_notulen']);
		$pengirim			        = mysqli_real_escape_string($db,$_POST['pengirim_notulen']);        
		$penerima			        = mysqli_real_escape_string($db,$_POST['penerima_notulen']);
		$hasil			 	        = mysqli_real_escape_string($db,$_POST['hasil_notulen']);

        $sql  		= "SELECT * FROM notulen where no_notulen='".$id_notulen."'";                        
        $query  	= mysqli_query($db, $sql);
        $data 		= mysqli_fetch_array($query);
        $total		= mysqli_num_rows($query);

        date_default_timezone_set('Asia/Jakarta'); 
        $tanggal_entry  			= date("Y-m-d H:i:s");
        $thnNow 					= date("Y");
        $tgl_notulen		    = date('Y-m-d H:i:s', strtotime($tgl));

        if ($total>0){
            $sql=" UPDATE notulen set 
						no_suratnotulen		= '$no_surat',
						pemimpin_notulen	= '$pemimpin',
                        tanggal_notulen 	= '$tgl_notulen',
                        tempat_notulen		= '$tempat',
                        agenda_notulen		= '$agenda',
                        pengirim_notulen	= '$pengirim',
                        penerima_notulen	= '$penerima',
						hasil_notulen		= '$hasil'
                where no_notulen = $id_notulen";
        
            $execute=mysqli_query($db,$sql);
			echo "<Center><h2><br>Terimakasih Data Notulen Telah di Ubah, $sql</h2></center>
			<meta http-equiv='refresh' content='2;url=../notulen.php'>";
		
		}else{
			echo "<Center><h2><br>error boy </h2></center>";
			echo "<Center><h2><br>data, $id_notulen</h2></center>";
        }
        
	}elseif(strlen(isset($_POST['id_pengguna']))>0){
        $id 	 		= mysqli_real_escape_string($db,$_POST['id_pengguna']);
        $nama	 		= mysqli_real_escape_string($db,$_POST['nama_pengguna']);
        $full           = mysqli_real_escape_string($db,$_POST['full_name']);
        $username		= mysqli_real_escape_string($db,$_POST['username_pengguna']);
        $password   	= mysqli_real_escape_string($db,md5($_POST['password_pengguna']));
        $gambar			= $_FILES['gambar']['name'];
        
        $sql  		= "SELECT * FROM tb_pengguna where id_pengguna='".$_SESSION['id']."'";                        
        $query  	= mysqli_query($db, $sql);
        $data 		= mysqli_fetch_array($query);
        
        if ($gambar == ''){
            $ext			= substr($data['foto_pengguna'], strripos($data['foto_pengguna'], '.'));	
            $nama_b  		= $username . $ext;
            rename("../../admin/images/pengguna/".$data['foto_pengguna'], "../../admin/images/pengguna/".$nama_b);
            $sql = "UPDATE tb_pengguna set 
                            nama_pengguna		= '$nama',
                            full_name           = '$full',
                            username_pengguna   = '$username',
                            password_pengguna	= '$password',
                            foto_pengguna		= '$nama_b' 
                    where id_pengguna = $id";
                    
            $execute = mysqli_query($db, $sql);			
            
            $_SESSION['nama'] = $nama;
            $_SESSION['username']= $username;
                            
            echo "<Center><h2><br>Data Profil anda telah terubah</h2></center>
            <meta http-equiv='refresh' content='2;url=../profile.php'>";
        }	
        else{
            
            $tipe_file 		= $_FILES['gambar']['type'];
            $ukuran_file 	= $_FILES['gambar']['size'];
            if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){	
                unlink("../../admin/images/pengguna/".$data['foto_pengguna']);
                $ext_file		= substr($gambar, strripos($gambar, '.'));			
                $tmp_file 		= $_FILES['gambar']['tmp_name'];
                
                $nama_baru = $username . $ext_file;
                $path = "../../admin/images/pengguna/".$nama_baru;
                move_uploaded_file($tmp_file, $path);
                
                $sql = "UPDATE tb_pengguna set 
                            nama_pengguna		= '$nama',
                            full_name           = '$full',
                            username_pengguna   = '$username',
                            password_pengguna	= '$password',
                            foto_pengguna		= '$nama_baru' 
                    where id_pengguna = $id";
                    
                $execute = mysqli_query($db, $sql);			
            
                $_SESSION['nama'] = $nama;
                $_SESSION['username']= $username;
                            
                echo "<Center><h2><br>Data Profil anda telah terubah</h2></center>
                <meta http-equiv='refresh' content='2;url=../profile.php'>";			
            }
            else{
                echo "<Center><h2><br>Gambar yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
                    <meta http-equiv='refresh' content='2;url=../editprofile.php'>";
            }
        
        }
    
    }elseif (strlen(isset($_POST['id_penerima_sk']))>0) {
        $id 				    = mysqli_real_escape_string($db,$_POST['id_penerima_sk']);
        $nama		            = mysqli_real_escape_string($db,$_POST['nama_penerimask']);
        $tempat	            	= mysqli_real_escape_string($db,$_POST['tl_penerimask']);
        $tgl					= mysqli_real_escape_string($db,$_POST['tgl_penerimask']);
        $pddk		 	        = mysqli_real_escape_string($db,$_POST['pddk_terakhir']);
        $jbtn_baru		 	    = mysqli_real_escape_string($db,$_POST['jbtn_baru']);
        $jbtn_lama			    = mysqli_real_escape_string($db,$_POST['jbtn_lama']);
        $akhir			        = mysqli_real_escape_string($db,$_POST['akhir_penerimask']);
        $keterangan			    = mysqli_real_escape_string($db,$_POST['ket_penerimask']);
        $id_sk			        = mysqli_real_escape_string($db,$_POST['id_sk']);
        
        $sql  		= "SELECT * FROM penerima_sk where id_penerima_sk='".$id."'";                        
        $query  	= mysqli_query($db, $sql);
        $data 		= mysqli_fetch_array($query);
        $total		= mysqli_num_rows($query);

        date_default_timezone_set('Asia/Jakarta'); 
        $tanggal_entry  			= date("Y-m-d H:i:s");
        $thnNow 					= date("Y");
        $tgl_penerima_sk		                 = date('Y-m-d H:i:s', strtotime($tgl));

        if ($total>0){
            $sql=" UPDATE penerima_sk set 
						nama_penerimask		= '$nama',
						tl_penerimask	    = '$tempat',
                        tgl_penerimask 	    = '$tgl_penerima_sk',
                        pddk_terakhir		= '$pddk',
                        jbtn_baru	        = '$jbtn_baru',
                        jbtn_lama	        = '$jbtn_lama',
                        akhir_penerimask	= '$akhir',
                        ket_penerimask	    = '$keterangan',
                        id_sk	            = '$id_sk'
                where id_penerima_sk = $id";
        
            $execute=mysqli_query($db,$sql);
			echo "<Center><h2><br>Terimakasih Data Penerima SK Telah di Ubah, $sql</h2></center>
            <meta http-equiv='refresh' content='2;url=../datapenerimask.php?id_sk=$id_sk''>";
		
		}else{
			echo "<Center><h2><br>error boy </h2></center>";
			echo "<Center><h2><br>data, $id_penerima_sk</h2></center>";
        }
    }elseif (strlen(isset($_POST['id_sk']))>0) {
        $id 				        = mysqli_real_escape_string($db,$_POST['id_sk']);
        $no_surat		            = mysqli_real_escape_string($db,$_POST['no_sk']);
        $tentang	            	= mysqli_real_escape_string($db,$_POST['tentang_sk']);
        $tgl						= mysqli_real_escape_string($db,$_POST['tanggal_sk']);
        $penerbit		 	        = mysqli_real_escape_string($db,$_POST['penerbit_sk']);
        $keputusan		 	        = mysqli_real_escape_string($db,$_POST['keputusan_sk']);
		$keterangan			        = mysqli_real_escape_string($db,$_POST['keterangan_sk']);        

        $sql  		= "SELECT * FROM surat_sk where id_sk='".$id."'";                        
        $query  	= mysqli_query($db, $sql);
        $data 		= mysqli_fetch_array($query);
        $total		= mysqli_num_rows($query);

        date_default_timezone_set('Asia/Jakarta'); 
        $tanggal_entry  			= date("Y-m-d H:i:s");
        $thnNow 					= date("Y");
        $tgl_sk		                 = date('Y-m-d H:i:s', strtotime($tgl));

        if ($total>0){
            $sql=" UPDATE surat_sk set 
						no_sk		    = '$no_surat',
						tentang_sk	    = '$tentang',
                        tanggal_sk 	    = '$tgl_sk',
                        penerbit_sk		= '$penerbit',
                        keputusan_sk	= '$keputusan',
                        keterangan_sk	= '$keterangan'
                where id_sk = $id";
        
            $execute=mysqli_query($db,$sql);
			echo "<Center><h2><br>Terimakasih Data Surat Keputusan Telah di Ubah</h2></center>
            <meta http-equiv='refresh' content='2;url=../datasuratSK.php'>";
		
		}else{
			echo "<Center><h2><br>error boy </h2></center>";
			echo "<Center><h2><br>data, $id_sk</h2></center>";
        }
    }
	
?>
	