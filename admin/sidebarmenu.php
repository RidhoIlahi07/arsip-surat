<?php 
	 include '../koneksi/koneksi.php';
			$sql  		= "SELECT * FROM tb_admin where id_admin='".$_SESSION['id']."'";                        
			$query  	= mysqli_query($db, $sql);
			$data 		= mysqli_fetch_array($query);
?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-institution"></i> <span> Arsip Surat</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/<?php echo $data['foto_admin']; ?>" height="55" width="55" alt="" class="img-circle profile_img">
                <h3><?php
                  echo $sql;
                ?></h3>
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $_SESSION['nama'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dataAdmin.php"><i class="fa  fa-user"></i>Admin</a></li>
                  <li><a href="dataPengguna.php"><i class="fa fa-send"></i>Pengguna</a></li>
                </ul> 
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
