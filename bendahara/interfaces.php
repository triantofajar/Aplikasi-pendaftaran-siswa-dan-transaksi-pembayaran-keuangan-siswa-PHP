<?php session_start();
    
if(isset($_SESSION['TUser'])){    
    include "../config/koneksi.php";
    include "../config/tanggal.php";
    include "../config/inc.tanggal.php";

	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bendahara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap interfaces template.">
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">


    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="ckeditor/style.js"> </script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">

            <a class="navbar-Sbrand" > <img  src="img/logo.png" width="740px" height="100px" class="hiDdden-xs"/>
                </a>
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                   <a href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar ?')" class="btn btn-danger"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
            </div>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-3">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">
                    </div>
                    <ul>
                        <img src="../media/images/logo paud.png" / width="200px" height="200px">
                    </ul>

                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Menu Bendahara &nbsp; Username : <?php echo $_SESSION['nama']; ?></li>
                        <li><a class="ajax-link"  href="interfaces.php"><i class="glyphicon glyphicon-home"></i><span> Beranda</span></a>
                        </li>

						
                        <li><a href="interfaces.php?page=konfirmasi"><i class="glyphicon glyphicon-folder-open"></i>  <span>Konfirmasi Pembayaran</span></a></li>
                        <li class="accordion"><a href="#"><i class="glyphicon glyphicon-list-alt"></i>  <span>Transaksi Pengeluaran</span></a>

                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="interfaces.php?page=pengeluaran.form"><i class="glyphicon glyphicon-list-alt"></i> Form Pengeluaran</a></li>
                                
                            </ul>



                        </li>
      
      
                        <li><a href="interfaces.php?page=bantuan"><i class="glyphicon glyphicon-off"></i> <span>Bantuan</span></a></li>
      
						
                    </ul>

                </div>

            </div>
            <br>
              
        </div>

        <div id="content" class="col-lg-9 col-sm-9">

		<?php
				if(isset($_GET['page'])){
					$page=htmlentities($_GET['page']);
				}else{
					$page="welcome";
				}

				$file="$page.php";
				$cek=strlen($page);

				if($cek>30 || !file_exists($file) || empty($page)){
					include ("welcome.php");
				}else{
					include ($file);
				}
				?>
       
		<br><br><br><br>
      </div>

      
       

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<script src='js/jquery.dataTables.min.js'></script>
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<script src="js/jquery.noty.js"></script>
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<script src="js/jquery.raty.min.js"></script>
<script src="js/jquery.iphone.toggle.js"></script>
<script src="js/jquery.autogrow-textarea.js"></script>
<script src="js/jquery.uploadify-3.1.min.js"></script>
<script src="js/jquery.history.js"></script>
<script src="js/charisma.js"></script>

</body>
</html>
<?php
}else{
    header("location:../index.php");
}
?>
