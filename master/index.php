<?php
	session_start();
	include '../koneksi.php';
	if (isset($_POST['login'])){
		$pass = md5($_POST['password']);
		$sql = mysqli_query($con, "SELECT * FROM tb_pengguna WHERE username='$_POST[username]' && password='$pass'");
		$cek=mysqli_num_rows($sql);
		$f = mysqli_fetch_array($sql);
		$_SESSION['nama'] = $f['nama_pengguna'];
		if($cek > 0){
			if($f['level']=="Manager"){
				echo "<script>alert('Selamat Datang');document.location.href='manager.php';</script>";
				$_SESSION['status']='login';
			}else if($f['level'] == "Admin"){
				echo "<script>alert('Selamat Datang');document.location.href='admin.php';</script>";
				$_SESSION['status']='login';
			}else if($f['level']=="Kasir"){
				echo "<script>alert('Selamat Datang');document.location.href='kasir.php';</script>";
				$_SESSION['status']='login';
			}else{
				echo "<script>alert('Gagal Login');document.location.href='index.php';</script>";
				$_SESSION['status']='login';
			}

		}else{
			echo "<script>alert('Gagal Login');document.location.href='index.php';</script>";
			$_SESSION['status']='login';
		}
	}	
?>
<html>
    <head>
    	<style>
    		body {
	margin : 0;
	padding: 0;
	font-family: sans-serif;
	background: url(../image/bg.jpg) no-repeat;
	background-size: cover;
}
.login-box{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	color: white;
}
.textbox{
	width: 100%;
	overflow: hidden;
	font-size: 20px;
	padding: 8px 0;
	margin: 8px 0;
	border-bottom: 3px solid  #cdb79e;
}
.textbox input{
	border:none;
	outline: none;
	background: none;
	font-size: 20px;
	color: white;
	width: 80%;
	float: left;
	margin: 0 10px;
}
.btn{
	width: 100%;
	overflow: hidden;
	font-size: 20px;
	padding: 8px 0;
	margin: 8px 0;
	border: 3px solid #cdb79e;
	border-radius: 10px;
	background:transparent;
	color: white;
}
.btn:hover{
	color: black;
	background:#ffff;
	box-shadow: 0 0 15px 5px #ffff;
}
.kotak {
	width: 350px;
	height: 350px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	background:#133337;
	opacity: 90%;
	border: 5px solid #cdb79e;
	border-radius: 80px;
}
    	</style>
    	<meta charset="utf-8">
        <title>Halaman Login</title>
    </head>
    <form method="post">
        <body>
        	<div class="kotak">
        	<div class="login-box">
        		<h1>Selamat Datang</h1>
            	<div class="textbox">
            		<input type="text" name="username" placeholder="Username" required>
            	</div>
            	<div class="textbox">
            		<input type="password" name="password" placeholder="Kata Sadi" required>
            	</div>
            		<input type="submit" name="login" value="LOGIN" class="btn">
            </div>
        </div>
        </body>
    </form>
</html>