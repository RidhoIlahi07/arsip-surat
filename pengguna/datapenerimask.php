<?php session_start();include "login/ceksession.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Surat Desa Digital</title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
      <link rel="shortcut icon" href="../img/icon.ico">
    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Profile and Sidebarmenu -->
        <?php
        include("sidebarmenu.php");
        ?>
        <!-- /Profile and Sidebarmenu -->
        
        <!-- top navigation -->
        <?php
        include("header.php");
        ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_right">
                <h2>Pengguna </h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Penerima Surat Keputusan </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  
                  <?php
                    include '../koneksi/koneksi.php';
                    $id		= mysqli_real_escape_string($db,$_GET['id_sk']); 
                    echo '<form action="proses/proses_exportpenerimask.php?id_sk='.$id.'" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">';
                  ?>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="bulan" class="select2_single form-control" tabindex="-1">
                            <option>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <input type="text" id="tahun" name="tahun" required="required"  placeholder="Masukkan Tahun" class="form-control col-md-7 col-xs-12">
                        </div>
                        <?php                          
                              $sql1  	= "SELECT * FROM penerima_sk WHERE id_sk=(SELECT id_sk FROM surat_sk WHERE id_sk='".$id."')";
                              $query1  	= mysqli_query($db, $sql1);
                              $total		= mysqli_num_rows($query1);
                              if ($total == 0) {
                                echo"<center><h2>Belum Ada Data Bagian</h2></center>";
                                echo'<a href=inputpenerimask.php?id_sk='.$id.'><button type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Penerima SK</button></a>';
                              }
                              else{?>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> Unduh Laporan Penerima SK</button></a>
                  <?php
                    echo'<a href=inputpenerimask.php?id_sk='.$id.'><button type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Tambah Penerima</button></a>';
                    ?>
                  </form>
                  <div class="x_content">
                             
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">Nama </th>
                          <th width="10%">Tempat Lahir </th>
                          <th width="10%">Tanggal Lahir</th>
                          <th width="20%">Pendidikan Terakhir </th>
                          <th width="15%">Jabatan Baru</th>
                          <th width="15%">Jabatan Lama</th>
                          <th width="15%">Akhir Masa SK</th>
                          <th width="15%">Ket</th>
                          <th width="15%">Aksi</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                            <?php
                            while($data = mysqli_fetch_array($query1)){
                              echo'<tr>
                              <td>	'. $data['nama_penerimask'].'		</td>
                              <td>	'. $data['tl_penerimask'].'	</td>
                              <td>	'. $data['tgl_penerimask'].'  		</td>
                              <td>	'. $data['pddk_terakhir'].'		</td> 
                              <td>	'. $data['jbtn_baru'].'		</td> 
                              <td>	'. $data['jbtn_lama'].'		</td> 
                              <td>	'. $data['akhir_penerimask'].'		</td> 
                              <td>	'. $data['ket_penerimask'].'		</td>
                              <td style="text-align:center;">
                              <a href=editpenerimask.php?id_penerima_sk='.$data['id_penerima_sk'].'><button type="button" title="Edit" class="btn btn-success btn-xs"><i class="fa  fa-edit"></i></button></a>
                              <a onclick="return konfirmasi()" href="proses/proses_hapus.php?id_penerima_sk='.$data['id_penerima_sk'].'"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a></td>
                              </tr>';
                            }
                            ?>
                      </tbody>
                    </table>
                  <?php } ?>
                  </div>
                  <div class="text-right">
                   <a href="datasuratSK.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>

        <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>
    	<script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
	  </script>
    <script type="text/javascript" language="JavaScript">
        function konfirmasi()
        {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
        else return false;
        }
    </script>

  </body>
</html>