<!DOCTYPE html>
<html>
	<head>
		<link id="pstyle" type="text/css" rel="stylesheet" href="../CSS/homestyle.css"/>
		<title>Music Zombie</title>
		<link rel="icon" href="zombie.ico"/>
		<!-- Only works when image is placed in same folder as html,
			it creates a hotbar icon beside the title so not currently working as the zombie.ico is in the images folder-->
	</head>
	<body>
		<?php include ('../jscript-and-php/header.php'); ?>
		<section id = "secondhead">
			<nav>
				<ul>
					<!-- The searchbar, login button, basket button etc.. will go in here, this has no css yet -->
				</ul>
			</nav>
		</section>
		<div id = "wrapper">
			<section id="main">
			<?php
				include('config.php');
				$product = $_GET['product'];
				
				$query = "SELECT * FROM music WHERE \"product_id\" = ".$product;
				$result = pg_query($query) or die('Search failed: ' . pg_last_error());
				$row = pg_fetch_array($result, null, PGSQL_ASSOC);
				
				
				$artist = $row['artist'];
				$album = $row['album'];
				$genre = $row['genre'];
				$song = $row['song'];
				$year = $row['year'];
				$publisher = $row['publisher'];
				$price = $row['price'];
				$image = substr($row['image'], 1);
				
				echo 	'<div class = "cover">
							<a href="Item_dPage.php?product='.$product.'"><img src="' . $image . '" alt="album art"></a>
						</div>
						<div class = "info">
							<h2>'.$song.'</h2>
							<ul>
								<li>ARTIST:'.$artist.'</li>
								<li>ALBUM:'.$album.'</li>
								<li>GENRE:'.$genre.'</li>
								<li>RELEASED:'.$year.'</li>
							</ul>';
						
						//This is where the add to basket button might go
						echo'
						<h3>&euro;'.$price.'</h3>
						<button class="basket" name = "add" type = "submit" onclick="itemAdded()">Add to Basket</button>';
						
						//This is the paragraph about the product
						echo '
							<p>'.$song.' by '.$artist.' was released in '.$year.' under '.$publisher.'.</p> 
							<p>It is from the album '.$album.', and it is a '.$genre.' song.</p>
					</div>
				';
			
			?>
			<!-- Everything else goes in here somewhere, I have javascript to put in a slideshow of products when you are ready -->
			</section>
		</div>
		<?php include ('../jscript-and-php/footer.php'); ?>
		
		<script src="../jscript-and-php/notice.js"></script>
	</body>
</html>