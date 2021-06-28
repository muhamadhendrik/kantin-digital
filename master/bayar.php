<?php
	error_reporting(1);
	if (isset($_POST['cari'])) {
		$_SESSION['Mejanya'] = $_POST['nMeja'];
		$sql = mysqli_query($con, "SELECT * FROM tb_pesanan WHERE no_meja = '$_POST[nMeja]' && status = '0'");
		$f=mysqli_fetch_array($sql);
	}
?>

<table>
	<tr>
		<td>Masukan No Meja</td>
		<td><input type="number" name="nMeja"></td>
		<td><input type="submit" name="cari" value="Cari"></td>
	</tr>
</table>
<table border="1">
	<tr>
		<th>Id Transaksi</th>
		<td><?php echo $f['id_transaksi']; ?></td>
	</tr>
	<tr>
		<th>Pesanan</th>
		<td></td>
	</tr>
	<tr>
		<th>Subtotal</th>
		<td><input type="text" name="subtotal" id="subtotal" readonly></td>
	</tr>
</table>
<table>
	<tr>
		<td>Bayar</td>
		<td><input type="number" name="bayar" id="bayar"></td>
	</tr>
	<tr>
		<td>Kembali</td>
		<td><input type="number" name="kembali" id="kembali"></td>
	</tr>
</table>