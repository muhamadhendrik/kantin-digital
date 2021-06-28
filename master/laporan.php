<?php
	if (isset($_POST['cetak'])) {
		echo "<script>document.location.href='cetak.php'</script>";
	}
	if($_SESSION['status'] != 'login'){
		echo "<script>alert('Silahkan Login Terlebih dahulu');document.location.href='index.php';</script>";
	} 
?>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/boots/css/bootstrap.min.css">
</head>
<body>
	<table>
		<tr>
			<td>Dari</td>
			<td>:</td>
			<td><input type="date" name="awal"></td>
			<td>-</td>
			<td>Sampai</td>
			<td>:</td>
			<td><input type="date" name="akhir"></td>
			<td><input type="submit" name="cari" value="cari"></td>
		</tr>
	</table>
	<table class="table table-bordered table-dark">
		<tr>
			<td>No.</td>
			<td>ID Transaksi</td>
			<td>Nama Menu</td>
			<td>Jumlah</td>
			<td>Tanggal Pesan</td>
		</tr>
		<?php if (isset($_POST['cari'])) { ?>
		<?php
				$_SESSION['awal'] = $_POST['awal'];
				$_SESSION['akhir'] = $_POST['akhir'];
				$no=0;
			$sql = mysqli_query($con, "SELECT * FROM qw_laporan WHERE tgl_pesan BETWEEN '$_POST[awal]' AND '$_POST[akhir]' AND status = '1'");
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
	<?php }else{ ?>
		<tr>
			<td colspan="5">Tanggal Belum di input</td>
		</tr>
	<?php } ?>
	</table>
	<br>
	<input type="submit" name="cetak" value="CETAK">
</body>