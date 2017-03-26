<?php session_start()   ;
    include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author">
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>
    <script src="bower_components/jquery/jquery.min.js"></script>

    <title>Login</title>
    
        <script language="javascript">
        function validasi(form){
          if (form.TUser.value == ""){
            alert("Anda belum mengisikan Username.");
            form.TUser.focus();
            return (false);
          }
             
          if (form.TPass.value == ""){
            alert("Anda belum mengisikan Password.");
            form.TPass.focus();
            return (false);
          }
          return (true);
        }
        </script>
        <script type="text/javascript" src="ckeditor/style.js"> </script>
        <script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
</head>
<body>
<div class="ch-container">
    <div class="row">
    <div class="row">
        <div class="col-md-12 center login-header">
        	<img src="images/login-welcome.gif" />
            <h5><strong>Sistem Informasi Pendaftaran Siswa dan Transaksi 
            Pembayaran Keuangan Siswa</h5>
            <h5><strong>BKB PAUD ROSSELA</h5>
        </div>
    </div>
    <br><br><br><br>
    <div class="row">
        <div class="well col-md-5 center login-box">
         <?php 
                    if(isset($_GET['page'])){
                        $page=htmlentities($_GET['page']);
                    }else{
                        $page="";
                    }
                    
                    $file="$page.php";
                    $cek=strlen($page);
                    
                    if($cek>30 || !file_exists($file) || empty($page)){
                
                    }else{
                        include ($file);
                    }
                    ?>
                    
            <div class="alert alert-info">
                Silahkan masukkan username dan password anda.
            </div>
            <form class="form-horizontal" action="?page=login.action" method="POST" onSubmit="return validasi(this)">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="TUser">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="TPass">
                    </div>
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button class="btn btn-primary"  type="submit" class="btn btn-default" value="Login">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
