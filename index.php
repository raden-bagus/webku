<?php
@session_start();
include "inc/koneksi.php";
if (@$_SESSION['admin'] || @$_SESSION['operator']){
?>

<!DOCTYPE html>
<html>
<head>
	<title>mobil</title>
<style type="text/css">
body{
	font-family: arial;
	font-size: 14px;

}
#canvas{
	width: 960px;
	margin: 0 auto;
 	box-shadow: 0 0 10px;
}

#header{
	font-size: 20px;
}

#header img{
	margin-bottom: -6px;
}
#menu{
	background-color: #0066ff;
}
#menu ul{
	list-style: none;
	margin: 0;
	padding: 0;
}
#menu ul li.utama{
	display: inline-table;
}
#menu ul li:hover{
	background-color: #0033cc;

}
#menu ul li a{
	display: block;
	text-decoration: none;
	line-height: 40px;
	padding: 0 10px;
	color: #fff;
}
.utama ul{
	display: none;
	position: absolute;
	z-index: 2;
}
.utama:hover ul{
	display: block;
}
.utama ul li{
	display: block;
	background-color: #6cf;
	width: 140px;
}
.right{
	float: right;
}

#isi{
	min-height: 400px;
	padding: 20px;
}

#footer{
	text-align: center;
	padding: 20px;
	background-color: #ccc;
}
</style>
</head>
<body>

<div id="canvas">
	<div id="header">
		<center><h2>BAGOES BLOG</h2></center>
	</div> 

	<div id="menu">
		<ul>
			<li class="utama"><a href="/webku">Beranda</a></li>
			<li class="utama"><a href="">Mobil</a>
				<ul>
					<li><a href="?page=mobil">Lihat Isi</a></li>
					<li><a href="?page=mobil&action=tambah">Tambah Isi</a></li>
				</ul>
			</li>
			</li>
			<li class="utama right" style="background-color: #f60;" ><a href="inc/logout.php">Logout</a></li>
			<li class="utama right" >
				<?php
				if (@$_SESSION['admin']) {
					$user_terlogin =@$_SESSION['admin'];
				} else if (@$_SESSION['operator']) {
					$user_terlogin =@$_SESSION['operator'];
				}

				?>
				<a>Selamat Datang <?php echo $user_terlogin; ?></a>
			</li>
		</ul>
	</div>

	<div id="isi">
	<?php
	$page = @$_GET['page'];
	$action = @$_GET['action'];
	if($page == "mobil"){
		if ($action == "") {
			include "inc/mobil.php";
		} else if ($action == "tambah") {
			include "inc/tambah_mobil.php"; 
		} else if ($action == "edit") {
			include "inc/edit_mobil.php"; 
		} else if ($action == "hapus") {
			include "inc/hapus_mobil.php"; 
		}
	} else if ($page == "") {
		echo "Selamat datang di halaman utama";
	} else {
		echo "404! Halaman tidak ditemukan";
	}

	?>
	</div>

	<div id="footer">
		Copyright 2020 - Bagus Suryo Radityo
	</div>
</div>

</body>
</html>

<?php
}else{
	header("location: login.php");
}
?>