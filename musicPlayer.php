<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>modern music player</title>
	<link rel="stylesheet" href="style.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- where bx and zmdi pull their resourses -->
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.css'>
	<link rel='stylesheet' href='https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css'><link rel="stylesheet" href="./style.css">


</head>

<style>
    th{ 
		width: 80%;
	    height: 100%;
        cursor: pointer;
        color:#fff;
     }
     #d1{ /*-- scrowbar */
		width: 80%;
	    height: 100%;
        overflow:scroll;
        overflow-x:hidden;
     }
</style>

<body>

<?php

 require_once "config.php";

 print "scroll all the way down <br><br> Music table testing smh  <br><br>";

 $query = "SELECT * FROM music";
 foreach ($conn->query($query) as $row) {
	print "id: " .$row['id'] ."<br>";
	//print "name: " .$row['name']. "<br>";
	print "Artist: " .$row['artist']. "<br>";
	print "Album: " .$row['album']. "<br>";
	print "Genre: " .$row['genre']. "<br>";
	print "year: " .$row['yearReleased']. "<br>";
	print "<br>";
 }

	  /*

*/
?>


</p>
	<div class="main">
		
<!-- top bar-->
		<div class="top_bar">
			<button onclick="sidebar()"><i class='bx bx-chevron-right'></i></button> <!-- top left button brings nested buttuns-->
			<div class="options">
 					
				<div class= "volume">
					<i style="font-size:37px" class='bx bxs-volume-full' ></i></div>
				 <!-- class calls icons from ipi etc pres - or follow link to see icons available-->
				<div  class="slider_container">
      				<i class="fa fa-volume-down"></i>
      				<input type="range" min="1" max="100" value="99" class="volume_slider" onchange="setVolume()">
      				<i class="fa fa-volume-up"></i>
    				</div>

				<button name="editPlaylistBtn" onclick="open_playlist()"><i class='bx bx-edit-alt'></i></button>	<!-- add songs to current playlist-->			
				<button><i class='zmdi zmdi-account' ></i></button>			
			
				
			</div>
			<button name="playlistsBtn" onclick="open_playlists()"><i class='bx bxs-playlist' ></i></button>
		</div>

		<div class="playing_part"><div class="img"></div></div>

<!-- control part -->
		<div class="control_part">
			<div class="song_title"></div>
 			<div class="artist_name"></div>
			<div class="control_buttons">
				<div class="range_slider">
					<div class = "current_time">00:00</div>
					<input type="range" min="1" max="100" id="slider" class="seek_slider" value="0" onchange="seekTo()">
					<div class = "duration">00:00</div>
				</div>

				<div class="main_btns">
					<button id="loop"><i class='zmdi zmdi-repeat'onclick="toggleLoopSong()" ></i></button>
					<button onclick="playpauseTrack()" class = 'test'><i class='bx bx-play' ></i></button>
					<button id="next"><i class='bx bx-skip-next' onclick="nextTrack()"></i></button>
				</div>
			</div>
		</div>

<!-- playlist songs -->
		<div class="playlist">  <!-- change this to show only playlist names routed to the edit button-->
			
			<p style="font-size:x-large"  style="color:orangered;">:Current Paylist Name</p>	
			<div class = "row">
				<div class = "col"> 
					<div class = "card body">
						<input size="55" height="200" id = "searchBtn" class = "form control" type = "text" style="color: black;">
						<br><br>
					</div>
				</div>
			</div>	
			
			<div id = "d1">
				<table class="table table-striped" style="width: 120%;">
					<tr>
						<tbody id="myTable">
							
							
						<!-- formart used in script for entery (id="myTable") line 234			
							<div class="p_song active_song">
								<p id="p_title">song name</p>
								<p id="p_artist">artist name</p>
								<button ><i class='bx bx-minus' ></i></button>
							</div>
						-->
						<tbody>
					</tr>
				</table>
	
			</div>


			<div class="p_song active_song">   <!--last panel on playlit with back and add buttons-->
				<button onclick="open_playlist()"><i class='zmdi zmdi-arrow-back'></i></button>
				<button id="addToPlaylistBtn"><i class= 'bx bxs-plus-circle' ></i></button>
			</div>
		

				
		</div>

<!-- similar design for iterating for [music Library but with filtering options + search bar]-->

		<div class="playlists">

			<div class="p_song active_song">
				<p id="p_title">playlist name</p>
				<button><i class='bx bx-minus' ></i></button>
				
			</div>

			
			<div class="p_song active_song">
				<p id="p_title">playlist name</p>
				<button><i class='bx bx-minus' ></i></button>
				
			</div>

			
			<div class="p_song active_song">
				<p id="p_title">playlist name</p>
				<button><i class= 'bx bx-minus' ></i></button>
			</div>
		

			<div class="p_song active_song">
				<button onclick="open_playlists()"><i class='zmdi zmdi-arrow-back'></i></button>
				<button><i class= 'bx bxs-plus-circle' ></i></button>

			</div>
		</div>
						
	</div>

<!--  javascript switching pages -->

	   <script>
		let playlist = document.querySelector('.playlist');
		let playlists = document.querySelector('.playlists');
		let options = document.querySelector('.options');

		function open_playlist(){

			playlist.classList.toggle('active');
	
			//document.getElementById("playlistsBtn").disabled = true;
		}

		function open_playlists(){
			//playlist.classList.toggle('active');
			playlists.classList.toggle('active3');
		
		
		
		}

		function open_removeSong(index){

			console.log('------------------song removed:')
			currPlaylistArray.splice(index,1)
			buildTable(currPlaylistArray)
		}

		function sidebar(){
			options.classList.toggle('active2');
		}


	//<!--  javascript a particular playlist -->

	
		var currPlaylistArray = [
			{'name':'aad', 'artist':'Michael','album':'BadAlbum','genre':'POP', 'year':'1989'},
			{'name':'baw', 'artist':'Royce','album':'chart','genre':'Hip Hop', 'year':'2010'},
			{'name':'cad', 'artist':'Michael','album':'BadAlbum','genre':'POP', 'year':'1989'},
			{'name':'daw', 'artist':'Royce','album':'chart','genre':'Hip Hop', 'year':'2010'},
			{'name':'ead', 'artist':'Michael','album':'BadAlbum','genre':'POP', 'year':'1989'},
			{'name':'faw', 'artist':'Royce','album':'chart','genre':'Hip Hop', 'year':'2010'},
			{'name':'Bad', 'artist':'Michael','album':'BadAlbum','genre':'POP', 'year':'1989'},
			{'name':'Raw', 'artist':'Royce','album':'chart','genre':'Hip Hop', 'year':'2010'},
		 
		]
		
		
		$('#searchBtn').on('keyup', function(){
			
			var value = $(this).val()
			console.log('value:', value)
			var data = searchTable(value, currPlaylistArray)
			buildTable(data)
		
		
		})
		
		buildTable(currPlaylistArray)
		
		function searchTable(value, data){
			var filterData = []
			for(var i = 0; i < data.length; i++){
		
				value = value.toLowerCase()
				var name = data[i].name.toLowerCase()
			  
				if(name.includes(value)){
					filterData.push(data[i])         
				}
			}
			return filterData
		}
			
		function buildTable(data){ //the table build it will be updated when an event is invoked etc searching table
			var table = document.getElementById('myTable')
			table.innerHTML = ''
			for (var i = 0; i < data.length; i++){

				/*basically html code in javascript variable automates records  addToPlaylistBtn deletes an element form array passes index to fumction */
				var row ='<div class="p_song active_song">'+
								'<p id="p_title">' + data[i].name +'</p>'+
								'<p id="p_artist">'+ "Artist : " + data[i].artist +'</p>'+
								'<p id="p_album">' + "Album : "  + data[i].album  +'</p>'+
								'<p id="p_genre">' + "Genre : "          + data[i].genre  +'</p>'+
								'<p id="p_year">'  + ""          + data[i].year   +'</p>'+
								'<button id="addToPlaylistBtn" onclick="open_removeSong('+i+')">' + '<i class="bx bx-minus" ></i></button>'+
						 '</div>';

						 
				table.innerHTML += row
			}
		}
		
		</script>
	<script src="music.js"></script>
</body>
</html>
