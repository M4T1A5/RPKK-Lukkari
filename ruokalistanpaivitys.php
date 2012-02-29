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
						<a href="../lukkari/">Lukkari</a>
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
		<form  class="form-horizontal" action="ruokalistatallenna.php" method="post">
			<fieldset>
				<legend>Ruokalistan päivitys</legend>				
				<div class="control-group">
					<label class="control-label" for="maanantai">Maanantai</label>
					<div class="controls">
						<input type="text" class="span5" name="maanantai" id="maanantai">
						<p class="help-block" >Erota ruoat puolipisteellä (";")</p>
					</div>
				</div>
				<div class="control-group">
					<label class="" for="tiistai">Tiistai</label>
					<div class="controls">
						<input type="text" class="span5" name="tiistai" id="tiistai">
					</div>
				</div>
				<div class="control-group">
					<label class="" for="keskiviikko">Keskiviikko</label>
					<div class="controls">
						<input type="text" class="span5" name="keskiviikko" id="keskiviikko">
					</div>
				</div>
				<div class="control-group">
					<label class="" for="torstai">Torstai</label>
					<div class="controls">
						<input type="text" class="span5" name="torstai" id="torstai">
					</div>
				</div>
				<div class="control-group">
					<label class="" for="perjantai">Perjantai</label>
					<div class="controls">
						<input type="text" class="span5" name="perjantai" id="perjantai">
					</div>
				</div>
				<div class="control-group">
					<label class="" for="salasana">Salasana</label>
					<div class="controls">
						<input type="password" class="span2" name="salasana" id="salasana">
					</div>
				</div>
				<div class="form-actions">
					<button type="submit"  class="btn btn-primary">Tallenna</button>
					<button type="reset" class="btn">Peruuuta</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>
</form>
</body>
</html>
