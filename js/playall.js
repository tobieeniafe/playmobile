 var XML_PATH = "xml/mp3.xml"
			var aud;
			var XML;
			$(document).ready(function(){
				aud = document.getElementById("aud");				
				$.ajax({
					type: "GET",
					url: XML_PATH,
					dataType: "xml",
					success: function(xml) {
					XML = xml;
					$(XML).find('playerlist').each(function(){
			 		$(this).find('track').each(function(){					
					var container = document.getElementById("playerlistContent");
						 var url = $(this).find('url').text();
						 var title = $(this).find('title').text();
						 	container.innerHTML += '<li><a onclick="play(\'' + url + '\')" href="#">' +  title  + '</a></li>';
			  				});	
			  			});
						 
						$("#playerlistContent").listview("refresh");
					}
				});

			});
//The play function					
function play(url){
	  aud.setAttribute('src', url);
	  aud.play();
  }
  
function pause(){
	  if(this.aud.paused){
		this.setButton('pause');
		this.aud.play();
		document.getElementById('play').innerHTML = 'Pause'; // change the text when paused 
	}else{
		this.aud.pause();
		this.setButton('play');
		document.getElementById('play').innerHTML = 'Play'; // change the text when playing 
	}	
  }
  //Change the play and pause function dynamically
 function setButton(t) {
	var $button = $('.playmobile-playpause .ui-btn-right');
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

 