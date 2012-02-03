<!DOCTYPE HTML>
<html lang="fi-FI">
<head>
	<meta charset="UTF-8">
	<title>Ruokalistan päivitys</title>
	<meta name="description" content="Ruokalistan päivityssivu">
	<meta name="author" content="Matias Kangasjärvelä">

	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le styles -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<style type="text/css">
		body {
			padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		}
		.ruoka{
			width: 500px;
		}
	</style>
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">Ruokalistan päivitys</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li>
						<a href="lukkari.html">Lukkari</a>
					</li>
					<li class="active">
						<a href="ruokalistanpaivitys.php">Ruokalistan päivitys</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<p>Erota ruoat puolipisteellä (";")</p>
		<p>
		<form action="ruokalistatallenna.php" method="post">
			Maanantai: <input type="text" class="ruoka" name="maanantai" id="maanantai"><p>
			Tiistai: <input type="text" class="ruoka" name="tiistai" id="tiistai"><p>
			Keskiviikko: <input type="text" class="ruoka" name="keskiviikko" id="keskiviikko"><p>
			Torstai: <input type="text" class="ruoka" name="torstai" id="torstai"><p>
			Perjantai: <input type="text" class="ruoka" name="perjantai" id="perjantai"><p>
			<p>Salasana: <input type="password" width="200px" name="salasana" id="salasana"></p>
			<p><input type="submit" value="Tallenna"></p>
		</form>
		</p>
	</div>
</div>
</form>
</body>
</html>
