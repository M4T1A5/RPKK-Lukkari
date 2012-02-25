<!DOCTYPE HTML>
<html lang="fi-FI">
<head>
    <meta charset="UTF-8">
    <title>Tallennus</title>
    <meta name="description" content="RPKK Lukkarisivu D3 luokalle">
    <meta name="author" content="Matias Kangasjärvelä">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            <a class="brand" href="#">Tallennus</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li>
                        <a href="index.html">Lukkari</a>
                    </li>
                    <li>
                        <a href="ruokalistanpaivitys.php">Ruokalistan päivitys</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
<?php
    require "../funktiot.inc";
    $yhteys = AvaaTietokanta();
    if($_POST['salasana'] == $salasana)
    {
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
    
        print "<h1>Päivitys onnistui<h1>";
    }
    else
    {
        print "<h1>Salasana väärin :(</h1>";
    }
?>
</div>
</body>
</html>
