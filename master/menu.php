<?php
	if (isset($_POST['simpan'])) {
		$name = $_FILES['gambar']['name'];
		$file = $_FILES['gambar']['tmp_name'];
		move_uploaded_file($file, '../image/'.$name);

		$sql = mysqli_query($con,"INSERT INTO tb_menu VALUES('','$_POST[namaMenu]','$_POST[jenis]','$_POST[harga]','$name','$_POST[stok]')");
		if ($sql) {
			echo "<script>alert('Data berhasil disimpan');document.location.href='?menu=menu';</script>";
		}else{
			echo "<script>alert('Data gagal disimpan');document.location.href='?menu=menu';</script>";
		}
	}
if (isset($_GET['hapus'])){
		$sql = mysqli_query($con,"DELETE FROM tb_menu WHERE id_menu='$_GET[id_menu]'");
		if ($sql) {
			echo "<script>alert('Data berhasil dihapus');document.location.href='?menu=menu';</script>"; 
		}else{
			echo "<script>alert('Data Gagal dihapus');document.location.href='?menu=menu';</script>"; 
		}
	}
	if($_SESSION['status'] != 'login'){
		echo "<script>alert('Silahkan Login Terlebih dahulu');document.location.href='index.php';</script>";
	} 
?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/boots/css/bootstrap.min.css">
		<title></title>
	</head>
	<form method="post" enctype="multipart/form-data">
		<body>
			<table>
				<tr>
					<td>Nama Menu</td>
					<td>:</td>
					<td><input type="text" name="namaMenu" required></td>
				</tr>
				<tr>
					<td>Jenis</td>
					<td>:</td>
					<td>
						<select name="jenis" required>
							<option value="" disabled selected>--Pilih Jenis--</option>
							<option value="Makanan">Makanan</option>
							<option value="Minuman">Minuman</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>:</td>
					<td><input type="number" name="harga" required></td>
				</tr>
				<tr>
					<td>Foto</td>
					<td>:</td>
					<td><input type="file" name="gambar" required></td>
				</tr>
				<tr>
					<td>Stok</td>
					<td>:</td>
					<td><input type="number" name="stok" required></td>
				</tr>
				<tr>
					<td><input type="submit" name="simpan" value="SIMPAN"></td>
				</tr>
			</table>
			<table class="table table-bordered table-dark">
				<tr>
					<td>No.</td>
					<td>Nama Menu</td>
					<td>Jenis</td>
					<td>Harga</td>
					<td>Foto</td>
					<td>Stok</td>
					<td>Aksi</td>
				</tr>
				<?php
					$no = 0;
					$sql = mysqli_query($con,"SELECT * FROM tb_menu");
					while($r=mysqli_fetch_array($sql)){
						$no++;
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $r['nama_menu']; ?></td>
					<td><?php echo $r['jenis']; ?></td>
					<td><?php echo $r['harga']; ?></td>
					<td><img src="../image/<?php echo $r['foto']; ?>"width="100px"></td>
					<td><?php echo $r['stok']; ?></td>
					<td><a href="?menu=menu&hapus&id_menu=<?php echo $r['id_menu'] ?>" onClick = "return confirm('Anda Yakin?')">Hapus</a></td>
				</tr>
					<?php } ?>
			</table>
		</body>
	</form>
</html>