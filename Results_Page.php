<!DOCTYPE html>
<html>
<head>
<link id = "pstyle" type="text/css" rel="stylesheet" href="../CSS/homestyle.css"/>
<title>Music Zombie</title>
<link rel="icon" href="zombies.ico"/><!-- Only works when image is placed in same folder as html,
it creates a hotbar icon beside the title so not currently working as the zombie.ico is in the images folder-->
</head>
<body>
include('config.php');

	if(isset($_POST['submit']))
	{
		if(isset($_GET['go']))
		{
			if(preg_match("/^[a-zA-Z]+/", $_POST['field']))
			{
				$field = $_POST['field'];
				$query = 'SELECT * FROM music WHERE artist LIKE '%" .$field . "%' OR album LIKE '%" .$field . "%' OR genre LIKE '%" .$field . "%' OR song LIKE '%" .$field . "%' ';
				$result = pg_query($query) or die('Search failed: ' . pg_last_error());
				$numrows = pg_num_rows($result);
				echo "<p>" .$numrows . " results found for " . $field . "</p>";
				while($row = pg_fetch_array($result, null, PGSQL_ASSOC))
				{
					$artist = $row['artist'];
					$album = $row['album'];
					$genre = $row['genre'];
					$song = $row['song'];
					echo "";
					echo $artist;
					echo $song;
					echo $album;
					echo $genre;
				}
			}
			else
			{
				echo "<p> Please enter a search term </p>";
			}
		}
	}
	pg_free_result($result);
	pg_close($db);
<header>
<!-- Main header and navigation bar with drop down menus -->
<nav>
<ul class = "menu">
<li>
<a href = "homepage.html"><img src = "../Images/zombie.png"/></a>
<a href = "homepage.html">Music Zombies</a>
</li>
<li>
<a href="#">Music</a><!-- Drop down menu title-->
<ul>
<!-- Drop down menu links -->
<li>
<a href = "#">CD's</a><!-- # is placeholder-->
</li>
<li>
<a href = "#">Digital</a><!-- # is placeholder-->
</li>
</ul>
</li>
<li>
<a href="#">Merchandise &nbsp; &nbsp; </a><!-- Drop down menu title-->
<ul>
<!-- Drop down menu links -->
<li>
<a href = "#">T-Shirts</a><!-- # is placeholder-->
</li>
<li>
<a href = "#">Cups</a><!-- # is placeholder-->
</li>
<li>
<a href = "#">Posters</a><!-- # is placeholder-->
</li>
</ul>
</li>
<li>
<a href="#">Sign Up</a>
</li>
</ul>
<br>
<form action="demo_form.asp">
  Hamza & Jeanette 5eva <input type="text" name="fname">
  <input type="submit" value="Submit">
</form> 
</nav>
</header>

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



<div align ="center" id = "wrapper">

</script>
<!-- Everything else goes in here somewhere, I have javascript to put in a slideshow of products when you are ready -->
</section>
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