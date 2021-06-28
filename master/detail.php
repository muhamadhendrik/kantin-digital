<?php
	session_start();
	include '../koneksi.php';
	if (isset($_POST['proses'])) {
		$sqlnya = mysqli_query($con, "UPDATE tb_pesanan SET stat_pesanan = '1' WHERE no_meja = '$_GET[id]'");
		if ($sqlnya) {
			echo "<script>
					alert('Pesanan Diproses');
					document.location.href='kasir.php'
				</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/boots/css/bootstrap.min.css">
		<title>Kantin Digital | Detail Pesanan</title>
	</head>
	<form method="post">
		<body>
			<center>
				<h2><?php echo "Pesanan Meja No: ".$_GET['id']; ?></h2>		
				<table border="1" cellpadding="5" cellspacing="0" class="table">
					<tr>
						<th colspan="3" scope="col">Detail Pesanan</th>
					</tr>
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Menu</th>
						<th scope="col">Jumlah</th>
					</tr>
					<?php 
						$no = 0;
						$sql = mysqli_query($con, "SELECT * FROM qw_pesanan WHERE no_meja = '$_GET[id]'");
						while ($r=mysqli_fetch_array($sql)){ $no++;
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r['nama_menu']; ?></td>
						<td><?php echo $r['jumlah']; ?></td>
					</tr>
				<?php } ?>
					<tr>
						<td colspan="3"><input type="submit" name="proses" value="Proses"></td>
					</tr>
				</table>
			</center>
		</body>
	</form>
</html>