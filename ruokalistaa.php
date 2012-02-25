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
	require "../../funktiot.inc";

	$yhteys = AvaaTietokanta();


	$kysely = mysql_query("select * from ruokalista2", $yhteys) or die(mysql_error());

	$ruoka = mysql_fetch_assoc($kysely);

	print "<table class='table'>";
	print "<thead><th>Ruokalista</th></thead>";
	print "<tr><td><span class='paiva'>Maanantai:</span>" . $ruoka["maanantai"] . "</td></tr>";
	print "<tr><td><span class='paiva'>Tiistai:</span>" . $ruoka["tiistai"] . "</td></tr>";
	print "<tr><td><span class='paiva'>Keskiviikko:</span>" . $ruoka["keskiviikko"] . "</td></tr>";
	print "<tr><td><span class='paiva'>Torstai:</span>" . $ruoka["torstai"] . "</td></tr>";
	print "<tr><td><span class='paiva'>Perjantai:</span>" . $ruoka["perjantai"] . "</td></tr>";
	print "<tr><td><span class='paiva'>Päivitetty: </span>" . $ruoka["paivitetty"] . "</td></tr>";
	print "</table>";

	mysql_free_result($kysely);
?>
</body>
</html>