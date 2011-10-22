// jaksot-taulukko ja koodit-taulukko ladataan tiedostosta lukkariTaulukot.js

//Spinneri plugin jQueryyn
$.fn.spin = function(opts) {
  this.each(function() {
    var $this = $(this),
        data = $this.data();

    if (data.spinner) {
      data.spinner.stop();
      delete data.spinner;
      return; //Muokattu funktiota jotta spinnerin saa pois päältä
    }
    if (opts !== false) {
      data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
    }
  });
  return this;
};

//Spinner options
var opts = {
  lines: 12, // The number of lines to draw
  length: 7, // The length of each line
  width: 4, // The line thickness
  radius: 10, // The radius of the inner circle
  color: '#000', // #rgb or #rrggbb
  speed: 1, // Rounds per second
  trail: 60, // Afterglow percentage
  shadow: false // Whether to render a shadow
};

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
	catch(ಠ_ಠ){
		alert ("Lukkarin latauksessa tapahtui virhe " + ಠ_ಠ);
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

//muuta ruokalistan asemointia jos ikkuna liian pieni
function ikkunankoko(){
	if($(window).width() < 1260)
	{
		$("#ruokalista").css("position", "relative");
		$("#ruokalista").css("right", "auto");
		$("#ruokalista").css("left", "1.5%");
		$("#sivu").css("min-height", "1900px");
		$("#ruokalista").remove().insertBefore($("#napit"));
	}
	else
	{
		$("#ruokalista").css("position", "absolute");
		$("#ruokalista").css("right", "12%");
		$("#ruokalista").css("left", "auto");
		$("#sivu").css("min-height", "1310px");
		$("#ruokalista").remove().insertAfter($("#napit"));
	}	
}

//Hakee nykyisen jakson päivämäärän perusteella
function nykyinenJakso()
{
	var nyt = Date.today();
	//var nyt = Date.parse(prompt("Anna testipäivämäärä")); //debug

	for (var i = 1; i <= 6; i++) {
		loppupvm_seuraava = Date.parse(jaksot[i+1][1]);
		alkupvm = Date.parse(jaksot[i][0]);
		loppupvm = Date.parse(jaksot[i][1]);

		//tarkistaa onko nykyinen päivämäärä jonkun jakson sisällä ja palauttaa jakson
		if(nyt >= alkupvm && nyt <= loppupvm)
			return i;
		//tarkista onko jakso mennyt ohi mutta uusi ei ole vielä alkanut(viikonloput jaksojen välissä)
		//ja palautaa uuden jakson
		else if(nyt < loppupvm_seuraava && nyt >= loppupvm)
			return i+1;
		
	}
	//palauttaa viimeisen jakson jos koulu loppunut
	if(nyt > jaksot[6][1])
		return 6;
}

$(window).resize(function(){
	ikkunankoko();
});

$(document).ready(function(){

	$("#loading")
	.ajaxStart(function(){
		$(this).spin(opts);
	})
	.ajaxStop(function(){
		$(this).spin();
	});

	ikkunankoko();
	
	//hae oikea jakso ja muuta jaksolistan vakioarvo samaksi
	haeJakso(nykyinenJakso());
	$("#jakso").val(nykyinenJakso());

	$("#ruokalista").load("ruokalistaa.php");
	
	//hakee valitun jakson nappia painettaessa
	$("#ok").click(function(){
		var jakso = $("#jakso").val();
		haeJakso(jakso);
	});

	//vaihtaa nimet koodeiksi ja toisinpäin
	$("#toggle").click(function(){
		$(".lukkari").toggle();
	});
});