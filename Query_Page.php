<!DOCTYPE html>
<html>
	<head>
		<link id = "pstyle" type="text/css" rel="stylesheet" href="../CSS/homestyle.css"/>
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
			<section id="sidebar">
				<h1>Advanced Search</h1>
				<h2>Sort By</h2>
				<form action="Query_Page.php" method="post">
					<select>
						<option value="genre">Genre</option>
						<option value="price">Price</option>
						<option value="artist">Artist</option>
						<option value="product_id">Id</option>
						<input type="submit" name="submit" value="submit"/>
					</select>
				</form>
				<h2>Search In</h2>
				<h3>Genre</h3>
				<form action="Query_Page.php" method="post">
					<input type="radio" name="filter" value="genre">Pop<br>
					<input type="radio" name="filter" value="genre">Rock<br>
					<input type="submit" name="submit" value="submit"/>
				</form>
				<h3>Price</h3>
				<form action="Query_Page.php" method="post">
					<select>
						<option value="greater">Greater than</option>
						<option value="less">Less than</option>
					</select>
					<input type="text" name="price"><br>
					<input type="submit" name="submit" value="submit"/>
				</form>
		</section>
		<div id = "wrapper">
			<section id = "main">

					<!-- Everything else goes in here somewhere, I have javascript to put in a slideshow of products when you are ready -->
			</section>
		</div>
		<?php include ('../jscript-and-php/footer.php'); ?>
	</body>
</html>