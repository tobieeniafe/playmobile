<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PlayMobile - Jquerymobile MP3 Player</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 		
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
		<script type="text/javascript" src="js/playall.js"></script>
</head>
<body>
  <!--The Page for list all playerlist-->
		<div data-role="page" id="listTracks" data-add-back-btn="true">
			<div data-role="header" data-theme="b">
				<h1 id="catHeader">PlayMobile</h1>
				<a onclick="pause()" href="#" class="playmobile-playpause ui-btn-right" data-role="button">Pause</a>
			</div>
			<div data-role="content">			
				<ul id="playerlistContent" data-role="listview" data-inset="true">
				</ul>
			</div>
             <!--Start footer section-->
			<div data-role="footer" data-position="fixed" data-id="footernav">
				<div data-role="navbar">
					<ul>
						<li><a href="index.php" rel="external">Home</a></li>
						<li><a href="#listTracks" class="ui-btn-active ui-state-persist">Play All</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
			</div>
			<!--End footer section-->
		</div>
       <audio id="aud"></audio>
	</body>
</html>