<?php
session_start();
include_once "lib/class-ff.php";
include_once "lib/class-db.php";
include_once "lib/cart.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>resto</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
  <link rel="Stylesheet" href="../plugins/dataTables.net-bs/css/dataTables.bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="../plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="../plugins/css/datepicker.min.css">
	 <style>
  	.jumbotron{

    height : 700px;
    background-image: url(images/cover.jpg);
    background-attachment: scroll;
    background-position:center center;
    background-size: cover;
    overflow: hidden;
    }
  </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav" style="background-color: #667789">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active px-lg-4">
					<a class="nav-link text-uppercase text-expanded" href="index.php">Home<span class="sr-only"></span></a>
				</li>
				<li class="nav-item active px-lg-4">
					<a class="nav-link text-uppercase text-expanded" href="#">About</a><span class="sr-only"></span>
				</li>

				<?php
					if(!isset($_SESSION['username'])){
				?>
				<li class="nav-item active px-lg-4">
					<a class="nav-link text-uppercase text-expanded" href="pages/login.php">Login<span class="sr-only"></span></a>
				</li>
				<?php
					} else{
				?>
				
				<li>
      <a href="pages/daftar_pesanan.php" class="menu-link">    
        <?php
        $jumlah = 0;
        if (! empty($_SESSION['basket'])) {
          foreach ($_SESSION['basket'] as $key => $value) {
            $jumlah=$jumlah+$value;
          }
        }
        ?>Daftar_pesanan<?=$jumlah?></a>
        </li>
				<li class="nav-item active px-lg-4">
					<a class="nav-link text-uppercase text-expanded" href="pages/logout.php">Logout</a><span class="sr-only"></span>
				<?php
				}
				?>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      		</form>
      	</div>
    </nav>
    <div class="jumbotron">
    	<h1 class="site-heading text-white d-none d-lg-block" style="color: #0000;">
      	<span class="site-heading-upper text-primary mb-3">RESTAURANT</span>
   		</h1>
	</div>
	<CENTER><h1 style="color: #00000;">NEW MENU</h1></CENTER>
	<div class="card-deck">
          <?php
          $r=$odb->select("tb_masakan order by id_masakan desc limit 3");
          while($a=$r->fetch()){
            ?>
            <div class="card">
            	<img src="images/<?php echo $a['foto'];?>" class="card-img-top" width="100%" height="300">
              	<div class="card-body">
              		<h4><?=$a['nama_masakan']?></h4>
             	    	<p class="card-text"><b>Harga: <?=$a['harga'];?></b></p>
              		<a href="?aksi=add&id=<?=$a['id_masakan'];?>&jml=1" class="btn btn-primary">Pesan</a>
           		 </div>
            </div>
            <?php
          }
          ?>
	</div>
	<footer class="py-3" style="background-color: #667789">
    <div class="container">
      <p class="m-0 text-center text-white">@Copyright2019</p>
    </div>
</footer>
</body>
</html>
<script type="text/javascript" src="../plugins/jquery.js"></script>
<script type="text/javascript" src="bootstrap4/dist/js/bootstrap.min.js"></script>
