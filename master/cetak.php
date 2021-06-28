<?php 
 	session_start();
 	include '../koneksi.php';
 	if($_SESSION['status'] != 'login'){
		echo "<script>alert('Silahkan Login Terlebih dahulu');document.location.href='index.php';</script>";
	} 
 ?>
 <body onload="window.print()">
 	<center>
 		<h1>KANTIN DIGITAL</h1>
 		<h3>Laporan Penjualan</h3>

 	<table border="1" cellpadding="5" cellspacing="0">
 		<tr>
 			<td>No.</td>
 			<td>ID Transaksi</td>
 			<td>Nama Menu</td>
 			<td>Jumlah</td>
 			<td>Tanggal Pesan</td>
 		</tr>
 		<?php 
 			$no=0;
 			$sql=mysqli_query($con, "SELECT * FROM qw_laporan WHERE tgl_pesan BETWEEN '$_SESSION[awal]' AND '$_SESSION[akhir]' AND status = '1'");
 			while ($r=mysqli_fetch_array($sql)) {
 				$no++;
 		?>
 		<tr>
 			<td><?php echo $no; ?></td>
 			<td><?php echo $r['id_transaksi']; ?></td>
 			<td><?php echo $r['nama_menu']; ?></td>
 			<td><?php echo $r['jumlah']; ?></td>
 			<td><?php echo $r['tgl_pesan']; ?></td>
 		</tr>
 			<?php } ?>

 		</table>
 	</center>
</body>