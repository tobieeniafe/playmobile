var aud;
var XML;
$(document).ready(function(){
	aud = document.getElementById("aud");
	$.ajax({
		type: "GET",
		url: "xml/mp3.xml",
		dataType: "xml",
		success: function(xml) {
			XML = xml;
			var container = document.getElementById("songlist");
			$(xml).find('playerlist').each(function(){
				var playerlist = document.createElement("li");
				var category = $(this).find('category').text();
				var description = $(this).find('description').text();
				var tracks = "";
				$(this).find('track').each(function(){
					tracks = tracks + $(this).find('title').text() + "<br>";
				});							
				playerlist.innerHTML = '<a onclick="buildPlayerlist(\'' + category + '\')" href="#listPage">' + category + '<br>' + '<p>' + description + '</p>' + '</a>';
				container.appendChild(playerlist);
			});
			$("#songlist").listview("refresh");
		}
	});
});

function buildPlayerlist(category){
	var playerlistContent = document.getElementById("playerlistContent");
	$(XML).find('playerlist').each(function(){
		var cata = $(this).find('category').text();
		if(cata == category){
			var catHeader = document.getElementById("catHeader");
			var description = $(this).find('description').text();
			var tracks = "";
			$(this).find('track').each(function(){
				tracks = tracks + '<li><a onclick="play(\'' + $(this).find('url').text() + '\')" href="#">' + $(this).find('title').text() + '</a></li>';
			});
			playerlistContent.innerHTML = tracks;
			$("#playerlistContent").listview("refresh");
		}
	});
}

function play(url){
	aud.setAttribute('src', url);
	aud.play();
}

function pause(){
	  if(this.aud.paused){
		this.setButton('pause');
		document.getElementById('play').innerHTML = 'Pause'; // change the text when paused 
		this.aud.play();
	}else{
		this.aud.pause();
		this.setButton('play');
		document.getElementById('play').innerHTML = 'Play'; // change the text when playing
	}	
 }
  
 function setButton(t) {
	var $button = $('.playmobile-playpause .ui-btn-text');
	switch(t){
		case 'pause':
			$button.text('Pause');
		break;
		case 'play':
			$button.text('Play');
		break;	
	}
	return this;
  }