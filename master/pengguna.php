<?php
	include '../koneksi.php';
	if(isset($_POST['simpan'])){
		$pas=md5($_POST['password']);
		$sql = mysqli_query($con, "INSERT INTO tb_pengguna  
   				VALUES('','$_POST[nama]','$_POST[jabatan]', 
				   '$_POST[username]', '$pas')");
		if ($sql) {
		 	echo "<script>alert('Data berhasil disimpan');document.location.href='?menu=pengguna';</script>";
		 }else{
		 	echo "<script>alert('Data Gagal disimpan');document.location.href='?menu=menu';</script>";
		 }
	}

	if (isset($_GET['hapus'])){
		$sql = mysqli_query($con,"DELETE FROM tb_pengguna WHERE id_pengguna='$_GET[id_pengguna]'");
		if ($sql) {
			echo "<script>alert('Data berhasil dihapus');document.location.href='?menu=pengguna';</script>"; 
		}else{
			echo "<script>alert('Data Gagal dihapus');document.location.href='?menu=pengguna';</script>"; 
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
	<form method="post">
		<body>
			<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
</style>
</head>
<body>
<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">    	
        </div>
        <div class="form-group">
			<input type="text" name="nama" required class="form-control" placeholder="Nama Penguna" required="required">
        </div>
		<div class="form-group">
           <select name="jabatan" required class="form-control">
							<option value="" disabled selected>--Pilih Jabatan--</option>
							<option value="Admin">Admin</option>
							<option value="Manager">Manager</option>
							<option value="Kasir">Kasir</option>
			</select>
        </div>
		<div class="form-group">
           <input type="text" name="username" required placeholder="Username" required class="form-control">
        </div>
        <div class="form-group">
           <input type="password" name="password" required placeholder="Password" required class="form-control">
        </div>          	
		<div class="form-group">
            <button type="submit" name="simpan" class="btn btn-success btn-lg btn-block">Simpan</button>
        </div>
    </form>
</div>                            
			<table border="1" cellpadding="5" cellspacing="0" class="table table-sm table-dark">
				<tr>
					<td>No.</td>
					<td>Nama Pengguna</td>
					<td>Jabatan</td>
					<td>Username</td>
					<td>Password</td>
					<td colspan="2">Aksi</td>
				</tr>
				<?php
					$no=0;
					$sql=mysqli_query($con,"SELECT * FROM tb_pengguna");
					while ($r=mysqli_fetch_array($sql)) {
						$no++; ?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $r['nama_pengguna']; ?></td> 
     						<td><?php echo $r['level']; ?></td> 
     						<td><?php echo $r['username']; ?></td> 
     						<td><?php echo $r['password']; ?></td> 
     						<td><a href="?menu=pengguna&hapus&id_pengguna=<?php echo $r['id_pengguna'] ?>" onClick="return confirm('Anda Yakin')">Hapus</a></td> 
						</tr>
					<?php } ?>
			</table>
		</body>
	</form>
</html>