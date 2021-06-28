<?php
	session_start();
	include '../koneksi.php';
	if($_SESSION['status'] != 'login'){
		echo "<script>alert('Silahkan Login Terlebih dahulu');document.location.href='index.php';</script>";
	} 
?>
<html>
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	   <title>Kantin Digital | Master</title>
      <link rel="stylesheet" type="text/css" href="../css/admin.css">
      <style type="text/css">
      .ha3{
        padding-left: 435px;
      }
      </style>
  </head>
<form method="post" enctype="multipart/form-data">
  <body>
	<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Kantin Digital</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                   <a style="color:white" href="?menu=pengguna">Kelola Pengguna</a>
                </li>
                <li>
                     <a style="color:white" href="?menu=menu">Kelola Menu</a>
                </li>
                <li>
                     <a style="color:white" href="?menu=laporan">Laporan</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                  <a href="logout.php" class="article">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <h3 class="ha3"><?php echo " User : ".$_SESSION['nama'];?></h3>
                    </div>
              <div id="page-content-wrapper">
            <div class="container-fluid">
                  <?php  
        switch (@$_GET['menu']) { 
          case 'pengguna': 
              include 'pengguna.php'; 
              break; 
          case 'menu': 
            include 'menu.php'; 
              break; 
          case 'laporan': 
              include 'laporan.php'; 
              break; 
          default: 
              include 'pengguna.php'; 
              break; 
        } 
      ?>      
        </div>
    </div>
  </body>
  </form>
  </html>
  <script>
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
      </script>