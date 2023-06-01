<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>About Us</title>
	<link rel="stylesheet" href="stylesheets/st1.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>
	<header>
		<div class="container">
			<h1>About Us</h1>
			<nav>
				<ul>
				<li><a href="index.php">Main</a></li>
					<li><a href="#story">Overview</a></li>
					<li><a href="#mission"> Mission</a></li>
					<li><a href="#team">Team</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section id="story">
			<div class="container">
				<h2>Overview</h2>
				<p>Welcome to Game Store  the ultimate destination for gamers of all ages and skill levels. Our online store offers a vast selection of the latest games, consoles, and accessories, as well as exclusive deals and promotions that you won't find anywhere else.</p>
				<p>At Game Store we are passionate about gaming and committed to providing our customers with the best possible experience. Whether you're a casual player or a hardcore enthusiast, we have everything you need to take your gaming to the next level.</p>
			</section>
		<section id="mission">
			<div class="container">
				<h2> Mission</h2>
				<p>At Game Store our mission is to provide gamers of all ages and skill levels with a fun, safe, and inclusive gaming environment. We are dedicated to offering the latest games, consoles, and accessories at competitive prices, as well as providing expert advice and support to help our customers get the most out of their gaming experience.</p>
				<p>We believe that gaming is more than just a hobby it's a passion that brings people together and fosters community. We are committed to creating a welcoming and inclusive environment where all gamers feel valued and respected, regardless of their background or identity.</p>
			</div>
		</section>
		<section id="team">
			<div class="container">
				<h2>Our Team</h2>
                
				<div class="team-member">
                <img src="images/3.png" alt="naeeem">
					<h3>Na3em</h3>
					
				</div>
				<div class="team-member">
					<img src="images/3.png" alt="khalifah">
					<h3>khalifah</h3>
					
				</div>
				<div class="team-member">
					<img src="images/3.png" alt="Ahmed Al Arfaj">
					<h3>Ahmed </h3>
					
				</div>
				<div class="team-member">
					<img src="images/3.png" alt="abdulaziz">
					<h3>abdulaziz</h3>
					
				</div>
                <div class="team-member">
                <img src="images/3.png" alt="huss">
					<h3>hussin</h3>
					
				</div>
                <div class="team-member">
                <img src="images/3.png" alt="kh">
					<h3>khalid</h3>
					
				</div>
			</div>
		</section>
	</main>
	
</body>
<?php
    include('footer.php');
?>
</html>