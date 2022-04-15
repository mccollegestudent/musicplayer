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
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Material Music Player</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.css'>
<link rel='stylesheet' href='https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<div class="hero__backgorund owl-carousel">
		<div class="item" style="background: #3F51B5"></div>
		<div class="item" style="background: #8BC34A"></div>
		<div class="item" style="background: #673AB7"></div>
		<div class="item" style="background: #E91E63"></div>
</div>



	<div class="main__container">
		<div class="contain__wrapper">
			<div class="music__wrapper">
				<div class="left__panel">
					<div class="cover owl-carousel">
					    <div class="item">
					    	<img src="http://cdn.pikoff.com/wp-content/uploads/2016/05/02/Ai-Pink-and-purple-abstract-background-vector-free-download-350x350.jpg" alt="">
					    </div>
					    <div class="item">
					    	<img src="http://cdn.pikoff.com/wp-content/uploads/2016/05/02/Ai-Pink-and-orange-abstract-background-vector-free-download-350x350.jpg" alt="">
					    </div>
					    <div class="item">
					    	<img src="http://cdn.pikoff.com/wp-content/uploads/2016/05/02/Ai-Blue-abstract-background-vector-free-download-350x350.jpg" alt="">
					    </div>
					    <div class="item">
					    	<img src="http://cdn.pikoff.com/wp-content/uploads/2016/05/02/Ai-Yellow-and-green-abstract-background-vector-free-download-350x350.jpg" alt="">
					    </div>
					</div>
				</div>

				<div class="right__panel">
					<div class="music__info__wrapper">
						<div class="header">
							<div class="icon__wrapper">
								
								<span class="icon-right"><i class="zmdi zmdi-apps"></i></span>
								<div class="title owl-carousel">
								    <div class="item">
										<div class="song__name">Sorry The Movement</div>
										<p class="album__name">Justin Bieber</p>
								    </div>
								    <div class="item">
										<div class="song__name">Passenger Let Her Go</div>
										<p class="album__name">Passenger</p>
								    </div>
								    <div class="item">
										<div class="song__name">Counting Stars...</div>
										<p class="album__name">OneRepublic</p>
								    </div>
								    <div class="item">
										<div class="song__name">Waiting For Love</div>
										<p class="album__name">Avicii</p>
								    </div>
								</div>
								
							</div>
						</div>

						<div class="music__control">
							<div class="music__button">
								<span class="button__prev"><i class="zmdi zmdi-fast-rewind"></i></span>
								<span class="button__pause"><i class="zmdi zmdi-pause"></i></span>
								<span class="button__next"><i class="zmdi zmdi-fast-forward"></i></span>
								<div>
									<input type="range" min="0" max="50" value="10" step="1" />	
								</div>
								
							</div>
						</div>
					</div>
					<div class="music__menu">
						<span class="icon-right"><i class="zmdi zmdi-close"></i></span>
						<span class="menu_list"><i class="zmdi zmdi-favorite"></i>Faverate</span>
						<span class="menu_list"><i class="zmdi zmdi-audio"></i>Music</span>
						<span class="menu_list"><i class="zmdi zmdi-view-carousel"></i>Album</span>
						<span class="menu_list"><i class="zmdi zmdi-time-restore"></i>History</span>
						<span class="menu_list"><i class="zmdi zmdi-shopping-cart"></i>Cart</span>
						<a href="logout.php"><span class="menu_list"><i class="zmdi zmdi-settings"></i>logout</span></a>
					</div>

				</div>
			</div>
		</div>
	</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js'></script><script  src="./script.js"></script>

</body>
</html>