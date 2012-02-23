// Jaksot-taulukko ja koodit-taulukko ladataan tiedostosta lukkariTaulukot.js

// Rakentaa linkin josta lukkari löytyy
function haeJakso(){
    x = nykyinenJakso();
    if (x != 4)
    {
        alkupvm = jaksot[x][0].replace(/\./gi, "");
        loppupvm = jaksot[x][1].replace(/\./gi, "");
        var linkki = "http://www.rpkk.fi/lukkarit/lukkari_show.php?toiminto=luokka&jalku="+alkupvm+"&jloppu="+loppupvm+"&jjakso="+x+"&luokka=D3";
        //var linkki = "jakso2.html";

        $("#lukkarinimet").load(linkki + " .lukkari_table2", function(){
            korvaa();
        });
        $("#lukkarikoodit").load(linkki + " .lukkari_table2");
    }
    else{
        var linkki = "img/toissa.jpg";
        $("#lukkarinimet").html("<img src='"+linkki+"'>");
        $("#lukkarikoodit").html("<img src='"+linkki+"'>");
    } 
	$("#jaksoNumero").text("Jakso " + x);
}

// Hakee nykyisen jakson päivämäärän perusteella
function nykyinenJakso(){
	var nyt = Date.today();
	//var nyt = Date.parse(prompt("Anna testipäivämäärä")); //debug

	for (var i = 1; i <= 6; i++){
		loppupvm_seuraava = Date.parse(jaksot[i+1][1]);
		alkupvm = Date.parse(jaksot[i][0]);
		loppupvm = Date.parse(jaksot[i][1]);

		// Tarkistaa onko nykyinen päivämäärä jonkun jakson sisällä ja palauttaa jakson
		if(nyt >= alkupvm && nyt <= loppupvm){
			return i;
		}
		// Tarkista onko jakso mennyt ohi mutta uusi ei ole vielä alkanut(viikonloput jaksojen välissä)
		// Ja palautaa uuden jakson
		else if(nyt < loppupvm_seuraava && nyt >= loppupvm)
			return i+1;
	}
	// Palauttaa viimeisen jakson jos koulu loppunut
	if(nyt > jaksot[6][1])
	return 6;
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
