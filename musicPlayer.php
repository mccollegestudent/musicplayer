<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
	$username = $_SESSION["username"];
}

$current_playlist = $_SESSION["last_playlist"];

if($current_playlist = Null){
	
         
}

function updatePlaylist($input){
	global $current_playlist;
	$current_playlist = $input;
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
			//include "config.php";

			$globalvar = "Put global in front";


			function playlistname($conn){
				GLOBAL $globalvar;
				GLOBAL $current_playlist;
				GLOBAL $playlist_name;

				$query = "SELECT * FROM playlist WHERE Playlist_Id = '$current_playlist'";
				foreach ($conn->query($query) as $result) {
					$playlist_name = $result['Playlist_Name'];
				}

				echo "Playlistname: ".$playlist_name;
			}
			//PHP Function to print songs in current playlist
			function printSelectedPlaylist($conn){
				//echo $_SESSION["last_playlist"];
				//echo "<br>";
				//echo $_SESSION["last_song"];

			    GLOBAL $globalvar;
				$essionVar = $_SESSION["username"] ;

				//echo "global variable:".$globalvar;
				//echo"<br>";
				

				//echo "Local variable:  ".$essionVar;
				//echo "<br>";

				$name = "music";
				$id = 1;

				GLOBAL $current_playlist;
				$current_playlist = $_SESSION['last_playlist'];
				//$query = "SELECT * FROM $name";
				
				$query = "SELECT * FROM music M, playlist_contents C, playlist P WHERE M.id=C.Song_Id AND C.Playlist_Id=P.Playlist_Id AND C.Playlist_Id= '$current_playlist' AND P.user = '$essionVar'";
				
				//$query = "SELECT * FROM music S, playlist_contents C, playlist P  WHERE S.id=C.Song_Id AND C.Playlist_Id=P.Playlist_Id AND P.User = $username ";
				//$query = "SELECT * FROM music S, playlist_contents C  WHERE S.id=C.Song_Id AND C.Playlist_Id= $id";

				//$stmt = $dbh->prepare("SELECT * FROM music S, playlist_contents C, playlist P  WHERE S.id=C.Song_Id AND C.Playlist_Id=P.Playlist_Id AND P.User = ?")
				//$stmt->bindParam(s, $username);
				
				//$stmt = $pdo->prepare($query);
				//$stmt->execute([$username]);

				

				foreach ($conn->query($query) as $row) {
					$index = $row['id'];

					print'<form action = "updateDB.php" method = "post">';
						print '
							<div class="p_song active_song">'.						
									'<p id="p_title">    '.$row['name'].'   </p>'.
									'<p id="p_artist">    '.$row['artist'].' </p>'.
									'<p id="p_album">    '.$row['album'].'  </p>'.
									'<p id="p_genre">   '.$row['genre'].'   </p>'.
									'<p id="p_year">    '.$row['yearReleased'].'</p>'.

									'<input type = "hidden" name = "table" value ="music"/>'.
									'<input type = "hidden" name = "index" value ="'.$index.'"/>'.
									'<button name = "deleteBtn'.$index.'"'.'><i class='."'".'bx bx-minus'."'".' ></i></button>'.
							'</div>		
							';							
					print'</form >';  
				}   
			}
			//PHP Function for displaying playlists of the user
			function printPlaylists($conn){
				//echo "This is the playlist";
				$essionVar = $_SESSION["username"] ;

				require_once "config.php";
				//$query = "SELECT * FROM music";
				//$query = "SELECT * FROM music S, playlist_contents C, playlist P  WHERE S.id=C.Song_Id AND C.Playlist_Id=P.Playlist_Id AND P.User = 'username'";
				//$query = "SELECT * FROM music S, playlist_contents C  WHERE S.id=C.Song_Id AND C.Playlist_Id= 1";
				$query = "SELECT * FROM playlist WHERE User = '$essionVar'";

				

				foreach ($conn->query($query) as $row) {
                   // echo 1;
					$index = $row['Playlist_Id'];
					$p_id_set = $row['Playlist_Id'];



                    print'<form action = "updateDB.php" method = "post">';
                        print '
                            <div class="p_song active_song" >'.
                                    '<p id="p_title">    '.$row['Playlist_Name'].' </p>'.

                                    '<input type = "hidden" name = "table" value ="music"/>'.
                                    '<input type = "hidden" name = "index" value ="'.$index.'"/>'.
                                    '<button name = "updatePlaylist'.$index.'"'.'"><i class='."'".'bx bx-minus'."'".' ></i></button>'.
                            '</div>
                            ';
                    print'</form >';
					
                }   
			}
			//PHP Function for displaying all songs in database
			function printSongs($conn){
				
				
				
				GLOBAL $current_playlist;
				$query = "SELECT * FROM music";
				

				foreach ($conn->query($query) as $row) {
					$index = $row['id'];

					print'<form action = "updateDB.php" method = "post">';
						print '
							<div class="p_song active_song">'.						
									'<p id="p_title">    '.$row['name'].'   </p>'.
									'<p id="p_artist">    '.$row['artist'].' </p>'.
									'<p id="p_album">    '.$row['album'].'  </p>'.
									'<p id="p_genre">   '.$row['genre'].'   </p>'.
									'<p id="p_year">    '.$row['yearReleased'].'</p>'.

									'<input type = "hidden" name = "table" value ="music"/>'.
									'<input type = "hidden" name = "index" value ="'.$index.'"/>'.
									'<button name = "addBtn'.$index.'"'.'><i class='."'".'bx bxs-plus-circle'."'".' ></i></button>'.
							'</div>		
							';							
					print'</form >';  
				}   
			}
	?>




	<div class="main">
		<!--<?php
		echo '<br>';
		echo $current_playlist;
		?>-->

		<!-- top bar-->
				<div class="top_bar">



					<button onclick="sidebar()"><i class='bx bx-chevron-right'></i></button> <!-- top left button brings nested buttuns-->
					<div class="options">

						<div class= "volume"><i style="font-size:37px" class='bx bxs-volume-full' ></i></div>
						<div  class="slider_container">
							<i class="fa fa-volume-down"></i>
      						<input type="range" min="1" max="100" value="99" class="volume_slider" onchange="setVolume()">
      						<i class="fa fa-volume-up"></i>
    					</div>
						<button name="editPlaylistBtn" onclick="open_playlist()"><i class='bx bx-edit-alt'></i></button>	<!-- add songs to current playlist-->			
						<a href="logout.php"><button><i class='zmdi zmdi-account'></i></button></a>			
					
						
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
					
					<p style="font-size:x-large"  style="color:orangered;"> <?php playlistname($conn) ?></p>	
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
								<tbody >												
									<?php
											//echo "This is the new one";
											printSelectedPlaylist($conn);
										
									?>	
								<tbody>
							</tr>
						</table>
			
					</div>


					<div class="p_song active_song">   <!--last panel on playlit with back and add buttons-->
						<button onclick="open_playlist()"><i class='zmdi zmdi-arrow-back'></i></button>
						<button id="addToPlaylistBtn"  onclick="open_musiclist()"><i class= 'bx bxs-plus-circle' ></i></button>
					</div>
				

						
				</div>

			<!-- playlist songs -->


			<div class="playlists"> <!-- change this to show only playlist names routed to the edit button-->
					
				<p style="font-size:x-large"  style="color:orangered;">playlists</p>	
				<div class = "row">
					<div class = "col"> 
						<div class = "card body">
							<!-- TODO - Implement Drop Down-->
							<input size="55" height="200" id = "searchBtn" class = "form control" type = "text" style="color: black;">
							<br><br>
						</div>
					</div>
				</div>	
				
				<div id = "d1" >
					<table class="table table-striped" style="width: 120%; ">
						<tr>
							<tbody>
								
								<?php
										printPlaylists($conn);
									
								?>

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
						<button onclick="open_playlists()"><i class='zmdi zmdi-arrow-back'></i> </button>
						<button id="addToPlaylistBtn"  onclick="open_musiclist()"><i class= 'bx bxs-plus-circle' ></i></button>

				</div>
						
			</div>

			<!-- music Library songs -->

			<div class="musiclist"> 
					
					<p style="font-size:x-large"  style="color:orangered;">musiclist</p>	
					<div class = "row">
						<div class = "col"> 
							<div class = "card body">
								<input size="55" height="200" id = "searchBtn" class = "form control" type = "text" style="color: black;">
								<br><br>
							</div>
						</div>
					</div>	
					
					<div id = "d1" >
						<table class="table table-striped" style="width: 120%; ">
							<tr>
							<tbody>
						
							<!--<table class="table table-striped" style="width: 120%; ">-->
								
								<?php
										printSongs($conn);
									
								?>

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
	
							</tr>
						</table>
	
					</div>
	
					<div class="p_song active_song">   <!--last panel on playlit with back and add buttons-->
							<button onclick="location.href='musicPlayer.php'"><i class='zmdi zmdi-arrow-back'></i> </button>
							<button id="addToPlaylistBtn"  onclick="open_musiclist()"><i class= 'bx bxs-plus-circle' ></i></button>
	
					</div>
							
			</div>
	</div>
			
		<!--  javascript switching pages -->

			<script>

				let musiclist = document.querySelector('.musiclist');
				let playlist = document.querySelector('.playlist');
				let playlists = document.querySelector('.playlists');
				let options = document.querySelector('.options');

				function open_playlist(){

				
					playlist.classList.toggle('active');
					//clearTable();
			
					//document.getElementById("playlistsBtn").disabled = true;
				}

				function open_playlists(){
					//playlist.classList.toggle('active');
					playlists.classList.toggle('active');
				
				
				
				}

				function open_musiclist(){
					musiclist.classList.toggle('active');
			
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

			
let track_list = [
    {
      name: "Test1",
      artist: "test1",
      image: "https://images.pexels.com/photos/2264753/pexels-photo-2264753.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
      path: "test.mp3"
    },
    {
      name: "test2",
      artist: "test2",
      image: "https://images.pexels.com/photos/2264753/pexels-photo-2264753.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
      path: ""
    },
    {
      name: "test3",
      artist: "test3",
      image: "https://images.pexels.com/photos/2264753/pexels-photo-2264753.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
      path: "",
    },
  ];

				
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

				function clearTable(){
					var table = document.getElementById('myTable')
					table.innerHTML = ''		
				}
					
				function buildTable(data){ //the table build it will be updated when an event is invoked etc searching table
					var table = document.getElementById('myTable')
					table.innerHTML = ''
					
					for (var i = 0; i < data.length; i++){

					
						// basically html code in javascript variable automates records  addToPlaylistBtn deletes an element form array passes index to fumction 
						var row ='<div class="p_song active_song">'+
										'<p id="p_title"> Playlists </p>'+
										//'<p id="p_title">' + data[i].name +'</p>'+
										//'<p id="p_artist">'+ "Artist : " + data[i].artist +'</p>'+
										//'<p id="p_album">' + "Album : "  + data[i].album  +'</p>'+
									//	'<p id="p_genre">' + "Genre : "  + data[i].genre  +'</p>'+
									//	'<p id="p_year">'  + ""          + data[i].year   +'</p>'+
									//	'<button id="addToPlaylistBtn" onclick="open_removeSong('+i+')">' + '<i class="bx bx-minus" ></i></button>'+
								'</div>';

								
					table.innerHTML += row
					}
				}
				
				
				
				</script>
		<script src = "music.js"></script>
	</body>
</html>
