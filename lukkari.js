// jaksot-taulukko ja koodit-taulukko ladataan tiedostosta lukkariTaulukot.js

// rakentaa linkin josta lukkari löytyy
function haeJakso(x){
	alkupvm = jaksot[x][0].replace(/\./gi, "");
	loppupvm = jaksot[x][1].replace(/\./gi, "");
	var linkki = "http://www.rpkk.fi/lukkarit/lukkari_show.php?toiminto=luokka&jalku="+alkupvm+"&jloppu="+loppupvm+"&jjakso="+x+"&luokka=D3";

	//yritä ladata lukkari sivulle
	try {
	$("#lukkarinimet").load(linkki + " .lukkari_table2", function(){
		korvaa();
	});
	$("#lukkarikoodit").load(linkki + " .lukkari_table2");
	}
	catch(Err){
		alert ("Lukkarin latauksessa tapahtui virhe " + Err);
	}
}

// korvaa talukosta koodit nimillä
function korvaa() {
	$("#lukkarinimet td").each(function(){
	var text = $(this).html();
	for(i in koodit){
		text = text.replace(i, koodit[i]);
	}
	$(this).html(text);
	});
}

function ikkunankoko(){
	if($(window).width() < 1000)
	{
		$("#ruokalista").css("position", "relative");
		$("#ruokalista").css("right", "auto");
	}
	else
	{
		$("#ruokalista").css("position", "absolute");
		$("#ruokalista").css("right", "0%");
	}	
}

function nykyinenJakso()
{
	var nyt = Date.today();
	//var nyt = Date.parse(prompt("Anna testipäivämäärä")); //debug
	for (var i = 1; i <= 6; i++) {
		loppupvm_seuraava = Date.parse(jaksot[i+1][1]);
		alkupvm = Date.parse(jaksot[i][0]);
		loppupvm = Date.parse(jaksot[i][1]);
		if(nyt >= alkupvm && nyt <= loppupvm)
			return i;
		else if(nyt < loppupvm_seuraava && nyt >= loppupvm)
			return i+1;
		
	}
	if(nyt > jaksot[6][1])
		return 6;
	else
		return 1;
}

$(window).resize(function(){
	ikkunankoko();
});

$(document).ready(function(){

	ikkunankoko();
	
	haeJakso(nykyinenJakso());
	$("#jakso").val(nykyinenJakso());

	$("#ruokalista").load("ruokalistaa.php");
	
	$("#ok").click(function(){
		var jakso = $("#jakso").val();
		haeJakso(jakso);
	});

	//vaihtaa nimet koodeiksi ja toisinpäin
	$("#toggle").click(function(){
		$(".lukkari").toggle();
	});
});