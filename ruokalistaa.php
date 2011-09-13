<!DOCTYPE HTML>
<html lang="fi-FI">
<head>
	<meta charset="UTF-8">
	<title>Ruokalista</title>
	<style type="text/css">
		.paiva{
			font-weight: bold;
		}
	</style>
</head>
<body>
<?php
	require "../funktiot.inc";

	$yhteys = AvaaTietokanta();


	$kysely = mysql_query("select * from ruokalista2", $yhteys) or die(mysql_error());

	$ruoka = mysql_fetch_assoc($kysely);

	print "<p><span class='paiva'>Maanantai</span>" . ":" . $ruoka["maanantai"] . "</p>";
	print "<p><span class='paiva'>Tiistai</span>" . ":" . $ruoka["tiistai"] . "</p>";
	print "<p><span class='paiva'>Keskiviikko</span>" . ":" . $ruoka["keskiviikko"] . "</p>";
	print "<p><span class='paiva'>Torstai</span>" . ":" . $ruoka["torstai"] . "</p>";
	print "<p><span class='paiva'>Perjantai</span>" . ":" . $ruoka["perjantai"] . "</p>";
	print "<p><span class='paiva'>Päivitetty: </span>" . $ruoka["paivitetty"] . "</p>";

	mysql_free_result($kysely);
?>
</body>
</html>