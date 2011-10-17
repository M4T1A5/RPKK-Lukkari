<!DOCTYPE HTML>
<html lang="fi-FI">
<head>
	<meta charset="UTF-8">
	<title>Ruokalistan päivitys</title>
	<style type="text/css">
		.ruoka{
			width: 500px;
		}
	</style>
</head>
<body>
<p>Erota ruoat puolipisteellä (";")</p>
<form action="ruokalistatallenna.php" method="post">
	Maanantai: <input type="text" class="ruoka" name="maanantai" id="maanantai"><p>
	Tiistai: <input type="text" class="ruoka" name="tiistai" id="tiistai"><p>
	Keskiviikko: <input type="text" class="ruoka" name="keskiviikko" id="keskiviikko"><p>
	Torstai: <input type="text" class="ruoka" name="torstai" id="torstai"><p>
	Perjantai: <input type="text" class="ruoka" name="perjantai" id="perjantai"><p>
	<p>Salasana: <input type="password" width="200px" name="salasana" id="salasana"></p>
	<p><input type="submit" value="Tallenna"></p>
</form>
</body>
</html>