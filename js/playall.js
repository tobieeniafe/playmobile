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
	}else{
		this.aud.pause();
		this.setButton('play');
	}	
  }
  //Change the play and pause text dynamically
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