<?php  
 session_start(); 
 include '../koneksi.php';
 if(@$_SESSION['nama']==""){
  echo "<script>alert('Silahkan Login Terlebih Dahulu !');document.location.href='index.php'</script>";
} 
 ?> 
<html> 
    <head> 
          <title>Kantin Digital | Kasir</title> 
          <link rel="stylesheet" href="../css/boots/css/bootstrap.min.css">
    </head> 
    <form method="post" enctype="multipart/form-data"> 
        <body> 
          <h1 align="center" class="ngaran"><?php echo "Selamat Datang ".$_SESSION['nama']; ?></h1>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" href="?menu=pesanan">Pesanan</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="?menu=pembayaran">Pembayaran</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
          </div>
        </nav>      
        <?php  
            switch (@$_GET['menu']) { 
          case 'pesanan': 
              include 'pesanan.php'; 
              break; 
          case 'pembayaran': 
              include 'pembayaran.php'; 
              break;
          default:
              include 'pesanan.php';
              break;
          } 
      ?> 
  </body> 
 </form> 
</html> 