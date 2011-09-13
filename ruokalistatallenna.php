<!DOCTYPE HTML>
<html lang="fi-FI">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php
	require "funktiot.inc";
	$yhteys = AvaaTietokanta();
	
	$maanantai = "\n" . str_replace(";", "\n", $_POST['maanantai']);
	$tiistai = "\n" . str_replace(";", "\n", $_POST['tiistai']);
	$keskiviikko = "\n" . str_replace(";", "\n", $_POST['keskiviikko']);
	$torstai = "\n" . str_replace(";", "\n", $_POST['torstai']);
	$perjantai = "\n" . str_replace(";", "\n", $_POST['perjantai']);

	$maanantai = nl2br($maanantai);
	$tiistai = nl2br($tiistai);
	$keskiviikko = nl2br($keskiviikko);
	$torstai = nl2br($torstai);
	$perjantai = nl2br($perjantai);
	
	mysql_query("UPDATE ruokalista2 SET maanantai = '$maanantai'", $yhteys) OR die(mysql_error());
	mysql_query("UPDATE ruokalista2 SET tiistai = '$tiistai'", $yhteys) OR die(mysql_error());
	mysql_query("UPDATE ruokalista2 SET keskiviikko = '$keskiviikko'", $yhteys) OR die(mysql_error());
	mysql_query("UPDATE ruokalista2 SET torstai = '$torstai'", $yhteys) OR die(mysql_error());
	mysql_query("UPDATE ruokalista2 SET perjantai = '$perjantai'", $yhteys) OR die(mysql_error());
	mysql_query("UPDATE ruokalista2 SET paivitetty = '" . date("d.m.Y") ."'", $yhteys) OR die(mysql_error());

	print "Päivitys onnistui";
	print "<p><a href='ruokalistanpaivitys.php'>Takaisin ruokalistanpäivitykseen</a></p>";
	print "<p><a href='lukkari.html'>Takaisin lukkarisivulle</a></p>";
?>
</body>
</html>