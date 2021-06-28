<link rel="stylesheet" href="../css/boots/css/bootstrap.min.css">
<table border="1" cellpadding="5" cellspacing="5" class="table">
		<tr>
			<td colspan="3" align="center"><strong>Daftar Pesanan</strong></td>
		</tr>
		<tr>
			<th scope="col">No Meja</th>
			<th scope="col">Id Transaksi</th>
			<th scope="col">Aksi</th>
		</tr>
		<?php
			$sql = mysqli_query($con, "SELECT * FROM tb_pesanan group by no_meja");
			while ($r=mysqli_fetch_array($sql)) { ?>
				<tr>
					<td><?php echo $r['no_meja']; ?></td>
					<td><?php echo $r['id_transaksi']; ?></td>

					<?php
						if ($r['stat_pesanan'] == 0) { ?>
						 	
							<td><a href="detail.php?id=<?php echo $r['no_meja'] ?>">lihat detail</a></td>
						<?php } else { ?>
							<td>Diproses</td>
						 <?php } ?>
				</tr>
			<?php } ?>
</table>