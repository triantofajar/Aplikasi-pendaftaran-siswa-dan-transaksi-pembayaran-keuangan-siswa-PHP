<!DOCTYPE html>
<html>
<head>
     

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="chart/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <script src="chart/assets/js/ie-emulation-modes-warning.js"></script>


</head>
<body>
<ul class="breadcrumb">
            <h4>Laporan Keuangan Paud Rosella</h4>
    </ul>

<br><br>

            <center><h4>Grafik Keuangan Paud Rosella</h4></center>
    <center><h5>Tahun 2016 / 2017</h5></center>

    <?php 
    include "../config/koneksi.php";
    include "config/fungsi_rupiah.php";

      

            
           
            $sql6 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='7' AND confirm = '1' ");
            
            $row6 = mysql_fetch_array($sql6);

            $sql7 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='8' AND confirm = '1' ");
            
            $row7 = mysql_fetch_array($sql7);

            $sql8 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='9' AND confirm = '1' ");
            
            $row8 = mysql_fetch_array($sql8);

            $sql9 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='10' AND confirm = '1' ");
            
            $row9 = mysql_fetch_array($sql9);

            $sql10 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='11' AND confirm = '1' ");
            
            $row10 = mysql_fetch_array($sql10);

            $sql11 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='12' AND confirm = '1' ");
            
            $row11 = mysql_fetch_array($sql11);

            $sql = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='1' AND confirm = '1' ");
            
            $row = mysql_fetch_array($sql);

            $sql1 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='2' AND confirm = '1' ");
            
            $row1 = mysql_fetch_array($sql1);

            $sql2 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='3' AND confirm = '1' ");
            
            $row2 = mysql_fetch_array($sql2);

            $sql3 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='4' AND confirm = '1' ");
            
            $row3 = mysql_fetch_array($sql3);

            $sql4 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='5' AND confirm = '1' ");
            
            $row4 = mysql_fetch_array($sql4);

            $sql5 = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE MONTH(tgl)='6' AND confirm = '1' ");
            $row5 = mysql_fetch_array($sql5);

            

            
            ?>
<table id="TableKeuangan" class="table table-bordered" border="0" align="center" cellpadding="10">
               
                <tr>

                <th>Bulan</th>
                
                <th>Jul</th>
                <th>Ags</th>
                <th>Sep</th>
                <th>Okt</th>
                <th>Nov</th>
                <th>Des</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
                <th>Mei</th>
                <th>Jun</th>
                </tr>
            
                <tr>
                <td>Pemasukan</td>
               
                <td><?php echo format_rupiah($row6['masuk']);?></td>
                <td><?php echo format_rupiah($row7['masuk']);?></td>
                <td><?php echo format_rupiah($row8['masuk']);?></td>
                <td><?php echo format_rupiah($row9['masuk']);?></td>
                <td><?php echo format_rupiah($row10['masuk']);?></td>
                <td><?php echo format_rupiah($row11['masuk']);?></td>
                <td><?php echo format_rupiah($row['masuk']);?></td>
                <td><?php echo format_rupiah($row1['masuk']);?></td>
                <td><?php echo format_rupiah($row2['masuk']);?></td>
                <td><?php echo format_rupiah($row3['masuk']);?></td>
                <td><?php echo format_rupiah($row4['masuk']);?></td>
                <td><?php echo format_rupiah($row5['masuk']);?></td>
                </tr>
                

                <?php
                
               
                $tmp6 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='7' AND konfirmasi = '1' ");
                $data6 = mysql_fetch_array($tmp6);

               
                $tmp7 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='8' AND konfirmasi = '1' ");
                $data7 = mysql_fetch_array($tmp7);

               
                $tmp8 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='9' AND konfirmasi = '1' ");
                $data8 = mysql_fetch_array($tmp8);

               
                $tmp9 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='10' AND konfirmasi = '1' ");
                $data9 = mysql_fetch_array($tmp9);

               
                $tmp10 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='11' AND konfirmasi = '1' ");
                $data10 = mysql_fetch_array($tmp10);

               
                $tmp11 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='12' AND konfirmasi = '1' ");
                $data11 = mysql_fetch_array($tmp11);

                $tmp = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='1' AND konfirmasi = '1' ");
                $data = mysql_fetch_array($tmp);


                $tmp1 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='2' AND konfirmasi = '1' ");
                $data1 = mysql_fetch_array($tmp1);

               
                $tmp2 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='3' AND konfirmasi = '1' ");
                $data2 = mysql_fetch_array($tmp2);

               
                $tmp3 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='4' AND konfirmasi = '1' ");
                $data3 = mysql_fetch_array($tmp3);

               
                $tmp4 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='5' AND konfirmasi = '1' ");
                $data4 = mysql_fetch_array($tmp4);

               
                $tmp5 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE MONTH(tgl_keluar)='6' AND konfirmasi = '1' ");
                $data5 = mysql_fetch_array($tmp5);


                ?>

                <tr>
                <td>Pengeluaran</td>
               
                <td><?php echo format_rupiah($data6['keluar']);?></td>
                <td><?php echo format_rupiah($data7['keluar']);?></td>
                <td><?php echo format_rupiah($data8['keluar']);?></td>
                <td><?php echo format_rupiah($data9['keluar']);?></td>
                <td><?php echo format_rupiah($data10['keluar']);?></td>
                <td><?php echo format_rupiah($data11['keluar']);?></td>
                <td><?php echo format_rupiah($data['keluar']);?></td>
                <td><?php echo format_rupiah($data1['keluar']);?></td>
                <td><?php echo format_rupiah($data2['keluar']);?></td>
                <td><?php echo format_rupiah($data3['keluar']);?></td>
                <td><?php echo format_rupiah($data4['keluar']);?></td>
                <td><?php echo format_rupiah($data5['keluar']);?></td>
                </tr> 
               
        </table>


        <table class="table table-bordered">

        <?php
        //pemasukan
        $sql = mysql_query("SELECT SUM(total) AS masuk FROM tbl_bayar WHERE confirm = '1' ");
        
        $row = mysql_fetch_array($sql);

        $masuk = $row['masuk'];

        

        //pengeluaran
        $sql2 = mysql_query("SELECT SUM(total) AS keluar FROM tbl_pengeluaran WHERE konfirmasi = '1' ");
        $data = mysql_fetch_array($sql2);

        $keluar =$data['keluar'];
      

        //jumlah uang
        $keuangan = $masuk - $keluar;

        ?>
            
        <tr>
            <th colspan="3">Jumlah Keuangan Paud</th>
            <td colspan="3"><b><?php echo 'Rp. '.format_rupiah($keuangan); ?></b></td>
            
        </tr>
        
        </table>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="chart/dist/js/jquery-1.4.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>-->
    <script type="text/javascript" src="chart/dist/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="chart/dist/js/jquery.fusioncharts.js"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="chart/assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <!--LOAD HTML KE JQUERY FUSION CHART BERDASARKAN ID TABLE-->
<script>
    $('#TableKeuangan').convertToFusionCharts({
        swfPath: "chart/Charts/",
        type: "MSColumn3D",
        data: "#TableSiswa",
        width: "975",
        height: "350",
        dataFormat: "HTMLTable",
        renderAt: "chart-container",
        dataOption:{
            chartAttributes:{
                caption: "Annual Stock Graph",
                xAxisName: "Month",
                yAxisName: "Qty Stock",
                decimalPrecision: "0"
            }
        }
    });

        </script>

</body>
</html>