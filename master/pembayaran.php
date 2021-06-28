<?php
	error_log(0);
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<form method="post">
		<body>
			<table>
				<tr>
					<td><input class="form-control mr-sm-2" type="text" placeholder="Cari Nomor Meja" name="cari"></td>
					<td><input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="bcari" value="cari"></td>
				</tr>
			</table>
			 <table border="1" class="table">
                <tr>
                    <td colspan="7" align="center"><h3>Daftar Menu Yang dipesan</h3></td>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Meja</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
                <?php 

                if (isset($_POST['bcari'])) { ?>
                	<?php
                	$_SESSION['noMeja'] = $_POST['cari'];
                    $no=0;
                    $sql = mysqli_query($con, "SELECT * FROM qw_pesanan WHERE no_meja = '$_SESSION[noMeja]'");
                    while($r=mysqli_fetch_array($sql)){
                        $no++;  
                ?> 
                <tr>
                    <td scope="row"><?php echo $no; ?></td>
                    <td><?php echo $r['no_meja']; ?></td>
                    <td><?php echo $r['id_transaksi']; ?></td>
                    <td><?php echo $r['nama_menu']; ?></td>
                    <td><?php echo $r['harga']; ?></td>
                    <td><?php echo $r['jumlah']; ?></td>
                    <td><?php echo $r['jml']; ?></td>
                </tr>
                  <?php } ?>
                  	<?php }else{ ?>
                  		<tr>
                  			<td colspan="7" align="center">No Meja Belum Di Cari</td>
                  		</tr>
                  	<?php } ?>
                  <?php 
                   @$ssq = mysqli_query($con, "SELECT SUM(jml) AS sub FROM qw_pesanan WHERE no_meja = '$_SESSION[noMeja]'");
                    $f = mysqli_fetch_array($ssq);
                  ?>
                  <tr>
                        <td colspan="7" >Subtotal : <?php echo $f['sub']; ?></td>
                  </tr>
              </table>
              <table>
              	<tr>
              		<td>Bayar</td>
              		<td>:</td>
              		<td><input type="text" name="bayar"></td>
              		<td><button>Lunas</button></td>
              	</tr>
              	<tr>
              		<td>Kembalian</td>
              		<td>:</td>
              		<td><input type="text" name="kembalian" disabled=""></td>
              	</tr>
              	<tr>
              		<td><button>CETAK</button></td>
              	</tr>
              </table>
		</body>
	</form>
</html>