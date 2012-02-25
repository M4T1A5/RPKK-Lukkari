// Jaksot-taulukko ja koodit-taulukko ladataan tiedostosta lukkariTaulukot.js

// Rakentaa linkin josta lukkari löytyy
function haeJakso(x){
	$("#lukkarinimet").html("");
	$("#lukkarikoodit").html("");
	var linkki = "";
	if (typeof x == "undefined")
		x = nykyinenJakso();
	if (x != 4 && x != 5)
	{
		alkupvm = jaksot[x][0].replace(/\./gi, "");
		loppupvm = jaksot[x][1].replace(/\./gi, "");
		if (x == 5)
		linkki = "http://www.rpkk.fi/lukkarit/lukkari_show.php?toiminto=luokka&jalku="+alkupvm+"&jloppu="+loppupvm+"&jjakso=5a&luokka=D3";
		else if (x == 6)
		linkki = "http://www.rpkk.fi/lukkarit/lukkari_show.php?toiminto=luokka&jalku="+alkupvm+"&jloppu="+loppupvm+"&jjakso=5b&luokka=D3";
		else if (x == 7)
		linkki = "http://www.rpkk.fi/lukkarit/lukkari_show.php?toiminto=luokka&jalku="+alkupvm+"&jloppu="+loppupvm+"&jjakso=6&luokka=D3";
		else
		linkki = "http://www.rpkk.fi/lukkarit/lukkari_show.php?toiminto=luokka&jalku="+alkupvm+"&jloppu="+loppupvm+"&jjakso="+x+"&luokka=D3";
		//var linkki = "jakso2.html"; // debug

		$("#lukkarinimet").load(linkki + " .lukkari_table2", function(){
			korvaa();
		});
		$("#lukkarikoodit").load(linkki + " .lukkari_table2");
	}
	else{
		linkki = "img/toissa.jpg";
		$("#lukkarinimet").html("<img src='"+linkki+"'>");
		$("#lukkarikoodit").html("<img src='"+linkki+"'>");
	}
	$("#jaksoNumero").text($("#"+x).text());
}

// Hakee nykyisen jakson päivämäärän perusteella
function nykyinenJakso(){
	var nyt = Date.today();
	//var nyt = Date.parse(prompt("Anna testipäivämäärä")); //debug

	for (var i = 1; i <= 7; i++){
		loppupvm_seuraava = Date.parse(jaksot[i+1][1]);
		alkupvm = Date.parse(jaksot[i][0]);
		loppupvm = Date.parse(jaksot[i][1]);

		console.log(i);

		// Tarkistaa onko nykyinen päivämäärä jonkun jakson sisällä ja palauttaa jakson
		if(nyt >= alkupvm && nyt <= loppupvm)
			return i;
		// Tarkista onko jakso mennyt ohi mutta uusi ei ole vielä alkanut(viikonloput jaksojen välissä)
		// Ja palautaa uuden jakson
		else if(nyt < loppupvm_seuraava && nyt >= loppupvm)
			return i+1;
	}
	// Palauttaa viimeisen jakson jos koulu loppunut
	return 7;
}

// Korvaa talukosta koodit nimillä
function korvaa(){
	$("#lukkarinimet td").each(function(){
		var text = $(this).html(), i;
		for(i in koodit){
			text = text.replace(i, koodit[i]);
		}
		$(this).html(text);
	});
}

$(document).ready(function(){

	// Hae oikea jakso ja muuta jaksolistan vakioarvo samaksi
	haeJakso();

	$("#ruokalista").load("ruokalistaa.php");

	$(".jakso").click(function(){
		haeJakso($(this).attr("id"));
	});

	// Vaihtaa nimet koodeiksi ja toisinpäin
	$("#toggle").click(function(){
		$(".lukkari").toggle();
	});
});
