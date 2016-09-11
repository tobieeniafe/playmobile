<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PlayMobile - Jquerymobile MP3 Player</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 		
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script type="text/javascript" src="js/playall.js"></script>

</head>
<body>
  <!--The Page for list all playerlist-->
		<div data-role="page" id="listTracks" data-add-back-btn="true">
			<div data-role="header" data-theme="b">
				<h1 id="catHeader">PlayMobile</h1>
				<a onclick="pause();" href="#" class="playmobile-playpause ui-btn-right" data-role="button" id="play">Pause</a>

			</div> 
			<div data-role="content">			
				<ul id="playerlistContent" data-role="listview" data-inset="true">
				</ul>
			</div>
             <!--Start footer section-->
			<div data-role="footer" data-position="fixed" data-id="footernav" data-theme="b">
				<div data-role="navbar">
					<ul>
						<li><a href="index.php" rel="external" data-icon='home' data-role='button'>Home</a></li>
						<li><a href="#listTracks" class="ui-btn-active ui-state-persist" data-icon='audio' data-role='button'>Play All</a></li>
						<li><a href="#" data-icon='user' data-role='button'>Contact</a></li>
					</ul>
				</div>
			</div>
			<!--End footer section-->
		</div>
       <audio id="aud"></audio>
	</body>
</html>
