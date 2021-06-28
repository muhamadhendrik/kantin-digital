<?php
	session_start();

	session_destroy();
	echo "<script>alert('Anda Telah Logout');document.location.href='index.php'</script>";
?>