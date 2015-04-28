<!DOCTYPE html>
<html>
<head>
<link id = "pstyle" type="text/css" rel="stylesheet" href="../CSS/homestyle.css"/>
<title>Music Zombie</title>
<link rel="icon" href="zombies.ico"/><!-- Only works when image is placed in same folder as html,
it creates a hotbar icon beside the title so not currently working as the zombie.ico is in the images folder-->
</head>
<body>
<?php include('../jscript-and-php/header.php'); ?>

<section id = "secondhead">
<nav>
<ul>
 
<!-- The searchbar, login button, basket button etc.. will go in here, this has no css yet -->
</ul>
</nav>
</section>
<div id="sidebar">
            <h1>Sidebar</h1>
</div>
<div id = "wrapper">
	
	<?php
	include('config.php');

	if(isset($_POST['submit']))
	{
		#if(isset($_GET['go']))
		{
			if(preg_match("/^[a-zA-Z]+/", $_POST['field']))
			{
				$field = $_POST['field'];
				echo $field;
				echo "\n";
				echo "\n";
				
				
				$query = "SELECT * FROM music WHERE artist ILIKE '%" .$field . "%' OR album ILIKE '%" .$field . "%' OR genre ILIKE '%" .$field . "%' OR song ILIKE '%" .$field . "%' ";
				$result = pg_query($query) or die('Search failed: ' . pg_last_error());
				$numrows = pg_num_rows($result);
				echo "<p>" .$numrows . " results found for " . $field . "</p>";
				while($row = pg_fetch_array($result, null, PGSQL_ASSOC))
				{
					$artist = $row['artist'];
					$album = $row['album'];
					$genre = $row['genre'];
					$song = $row['song'];
					$year = $row['year'];
					$publisher = $row['publisher'];
					$price = preg_replace("[^0-9]", "", $row['price']);
					$image = substr($row['image'], 1);
					echo " ";
					echo "<br />";
					echo $artist;
					echo " ";
					echo "<br />";
					echo $song;
					echo " ";
					echo "<br />";
					echo $album;
					echo " ";
					echo "<br />";
					echo $genre;
					echo "<br />";
					echo " &euro;";					
					echo $price;
					echo "<br />";
					echo " ";
					echo '<img src="' . $image . '" alt="error">';
					echo "<br />";


				}
			}
			else
			{
				echo "<p> Please enter a search term </p>";
			}
		}
	}
	echo "done";
?>
<!-- Everything else goes in here somewhere, I have javascript to put in a slideshow of products when you are ready -->
</section>
</div>
<div style = "float:right; width-max:50%">

</div>
<footer
<!-- Footer needs to have alot more -->
<p>&#169; Team A3</p>
<br>
<p> About Us </p>
<p> Contact info </p>
<p> T & C </p>
<p> Help </p>
</footer>
</body>
</html>