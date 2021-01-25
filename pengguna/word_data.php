<?php
session_start();
include "login/ceksession.php";

?>

<!DOCTYPE html>
<html>
<head>
        <style type="text/css">
            table {
                background: #fff;
                padding: 5px;
                border: solid white !important;
            }
            tr, td {
                border: solid white !important;
            }
            tr,td {
                vertical-align: top!important;
            }
            #right {
                border-right: none !important;
            }
            #left {
                border-left: none !important;
            }
            .isi {
                height: 300px!important;
            }
            .disp {
                text-align: center;
                padding: 1.4rem 0;
                margin-bottom: .5rem;
            }
            .logodisp {
                float: left;
                position: relative;
                padding-top:40px;
                width: 110px;
                height: 110px;
                margin: 0 0 0 1rem;
            }
            #lead {
                width: auto;
                position: relative;
                margin: 25px 0 0 75%;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }
            .tgh {
                text-align: center;
                
            }
            #nama {
                font-size: 2.1rem;
                margin-bottom: -1rem;
            }
            #alamat {
                font-size: 16px;
            }
            .up {
                text-transform: uppercase;
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            .status {
                margin: 0;
                font-size: 1.3rem;
                margin-bottom: .5rem;
            }
            #lbr {
                font-size: 20px;
                font-weight: bold;
            }
            .separator {
                border-bottom: 2px solid #616161;
                margin: -1.3rem 0 1.5rem;
            }
            .header-h2{
                text-align: center;
                padding-left:80px;
                line-height: 0.1px;
            }
            .header-jln{
                padding-left:120px;
                line-height: 0.1px;
            }
            .hasil{
                padding-left:60px;
            }
            
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                nav {
                    display: none;
                }
                table {
                    width: 100%;
                    font-size: 12px;
                    color: #212121;
                }
                tr, td {
                    border: table-cell;
                    border: 1px  solid #444;
                    padding: 8px!important;
                }
                tr,td {
                    vertical-align: top!important;
                }
                #lbr {
                    font-size: 20px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    width: 55px;
                    height: 60px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    width: auto;
                    position: relative;
                    margin: 15px 0 0 75%;
                }
                .lead {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: -10px;
                }
                #nama {
                    font-size: 20px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin: -10px 0 -20px 0;
                }
                .up {
                    font-size: 17px!important;
                    font-weight: normal;
                }
                .status {
                    font-size: 17px!important;
                    font-weight: normal;
                    margin-bottom: -.1rem;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 13px;
                }
                #lbr {
                    font-size: 17px;
                    font-weight: bold;
                }
                .separator {
                    border-bottom: 2px solid #616161;
                    margin: -1rem 0 1rem;
                }
            }
        </style>
</head>
<body onload="window.print()">

            <div id="colres">
            <img class="logodisp" src="../img/lombok_timur.png">
                <div class="disp">';
                    <h4 style="line-height: 0.3px;">PEMERINTAH KABUPATEN LOMBOK TIMUR</h4> 
                    <h3 style="line-height: 0.3px;">KECAMATAN PRINGGASELA</h3>
                    <h4 class="header-h2">DESA JURIT BARU</h4>
                    <p class="header-jln" style="line-height: 0.3px;">Jln.Jurusan Jurit-Banok KM.7 Kode Pos: 83665, Email : Desajuritbaru@gmail.com </p>
                </div>
                <?php include '../koneksi/koneksi.php';
                     $id		= mysqli_real_escape_string($db,$_GET['no_notulen']);
                     $sql  		= "SELECT * FROM notulen where no_notulen='".$id."'";                        
                     $query  	= mysqli_query($db, $sql);
                     $data 		= mysqli_fetch_array($query);?>
                <div class="separator" style="line-height: 0px;"></div>
                <h2 style="text-align:center; text-decoration:underline;line-height: 0px;">NOTULEN RAPAT</h2>
                <p style="text-align:center;line-height: 0px;" >Nomor Surat : <?php echo $data['no_suratnotulen']?></p>
                <br><br>

                <table style="border-style: none;">
                    <tr>
                        <td>Hari/Tanggal</td>
                        <td>:  <?php echo $data['tanggal_notulen']?></td>
                    </tr>
                    <tr>
                        <td>Tempat</td>
                        <td>: <?php echo $data['tempat_notulen']?></td>
                    </tr>
                    <tr>
                        <td>Pemimpin Rapat</td>
                        <td> : <?php echo $data['pemimpin_notulen']?></td>
                    </tr>
                    <tr>
                        <td>Agenda Rapat</td>
                        <td>: <?php echo $data['agenda_notulen']?></td>
                    </tr>
                </table>
                <br><br>
                <table>
                <tr>
                <td style="text-align:left;line-height: 5.3px;" >Hasil		: </td>
                </tr>
                </table>
                <p class="hasil"><?php echo $data['hasil_notulen']?></p>
                <br>
                

            <div id="lead">
                <p>Jurit Baru, <?php echo $data['tanggal_notulen']?> </p>
                <p>Kepala Desa Jurit Baru</p>
                <br><br><br><br>
                <p> <b> <u> ATHAR JUNAIDI </u></b></p>
            </div>
        </div>
        <div class="jarak2"></div>
    <!-- Container END -->

</body>
</html>