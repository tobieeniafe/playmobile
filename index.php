<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PlayMobile - Jquerymobile MP3 Player</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
        <script src="js/playmobile.js"></script>
	</head>
	<body>
    	<!--The homepage listing all the categories-->
		<div data-role="page" id="Home">
			<div data-role="header" data-theme="b"> 
				<a href="#aboutPage" data-role="button" data-icon="info">About</a>
				<h1>PlayMobile</h1> 
				<a onclick="pause()" href="#" class="playmobile-playpause ui-btn-right" data-role="button">pause</a>
			</div>
            <div data-role="content" >
				<ul id="songlist" data-role="listview" data-inset="true">
				</ul>
            </div>
            <!--Start footer section-->
			<div data-role="footer" data-position="fixed" data-id="footernav">
				<div data-role="navbar">
					<ul>
						<li><a href="#Home" class="ui-btn-active ui-state-persist">Home</a></li>
						<li><a href="playerlist.php" rel="external" id="listTracks">Play All</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
			</div>
			<!--End footer section-->
		</div>
        <!--The Page for list category playerlist-->
		<div data-role="page" id="listPage" data-add-back-btn="true">
			<div data-role="header" data-theme="b">
				<a href="#Home" data-role="button" data-icon="home">Home</a>
				<h1 id="catHeader"></h1>
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
						<li><a href="#Home" class="ui-btn-active ui-state-persist">Home</a></li>
						<li><a href="playerlist.php" rel="external" id="listTracks">Play All</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
			</div>
			<!--End footer section-->
		</div>  
        
        <!--The about us page-->
		<div data-role="page" id="aboutPage">
			<div data-role="header" data-theme="b"> 
				<a href="#Home" data-role="button" data-icon="home">Home</a>
				<h1>About PlayMobile</h1> 
				<a onclick="pause()" href="#" class="playmobile-playpause ui-btn-right" data-role="button">Pause</a>
			</div>
			<p>PlayMobile is a jquerymobile audio player for playing files from an xml list. You can use it as a standalone project or application.</p>
		</div>
         <!--Start footer section-->
		<div data-role="footer" data-position="fixed" data-id="footernav">
				<div data-role="navbar">
					<ul>
						<li><a href="#Home">Home</a></li>
						<li><a href="playerlist.php" rel="external" id="listTracks">Play All</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
			</div>
			<!--End footer section-->
            
        <!--HTML5 audio player tag.-->
		<audio id="aud"></audio>
	</body>
</html>