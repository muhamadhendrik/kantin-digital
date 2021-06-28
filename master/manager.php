 <?php
	session_start();
	include '../koneksi.php';
	if($_SESSION['status'] != 'login'){
		echo "<script>alert('Silahkan Login Terlebih dahulu');document.location.href='index.php';</script>";
	} 
?>
<html>
<head>
	<title>Kantin Digital | Master</title>
</head>
<form method="post" enctype="multipart/form-data">
	<body>
		<h1><?php echo "Selamat Datang ".$_SESSION['nama'];?></h1>
		<ul class="menu">
			<li><a href="?menu=pengguna">Kelola Pengguna</a></li>
			<li><a href="?menu=menu">Kelola Menu</a></li>
			<li><a href="?menu=laporan">Laporan</a></li> 
    		<li><a href="logout.php">Logout</a></li> 
		</ul>
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
	</body>
</form>
</html>