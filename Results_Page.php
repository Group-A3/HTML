<!DOCTYPE html>
<html>
	<head>
		<link id = "pstyle" type="text/css" rel="stylesheet" href="../CSS/homestyle.css"/>
		<title>Music Zombie</title>
		<link rel="icon" href="zombies.ico"/>
		<!-- Only works when image is placed in same folder as html,
			it creates a hotbar icon beside the title so not currently working as the zombie.ico is in the images folder-->
	</head>
	<body>
		<?php include('../jscript-and-php/header.php'); ?> <!-- Header-->
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
					if(preg_match("/^[a-zA-Z]+/", $_POST['field']))
					{
						$field = $_POST['field'];
						
						$query = "SELECT * FROM music WHERE artist ILIKE '%" .$field . "%' OR album ILIKE '%" .$field . "%' OR genre ILIKE '%" .$field . "%' OR song ILIKE '%" .$field . "%' ";
						$result = pg_query($query) or die('Search failed: ' . pg_last_error());
						$numrows = pg_num_rows($result);
						echo "<p>" .$numrows . " results found for \"" . $field . "\"</p>";
						
						echo '
						<table>
								<thead>
									<tr>
										<th />
										<th />
										<th />
										<th />
										<th />
										<th />
										<th />
									</tr>
								</thead>
								<tbody>';
									
						while($row = pg_fetch_array($result, null, PGSQL_ASSOC))
						{
							$artist = $row['artist'];
							$album = $row['album'];
							$genre = $row['genre'];
							$song = $row['song'];
							$year = $row['year'];
							$publisher = $row['publisher'];
							$price = $row['price'];
							$image = substr($row['image'], 1);
							$id = $row['product_id'];

			
							echo 	'
								<tr>
									<td>
										' . $id . '
									</td>
									<td>
										<a href="Item_dPage.php?product='.$id.'"><img src="' . $image . '" alt="album art"></a>
									</td>
									<td>
										'.$artist.'
									</td>
									<td>
										'.$album.'
									</td>
									<td>
										'.$song.'
									</td>											
									<td>
										&euro;'.$price.'
									</td>
									<td>
										'.$genre.'
									</td>
									<td>
										'.$publisher.'
									</td>
									<td>
										<button name = "add" type = "submit" onclick="itemAdded()">Add to Basket</button>
									</td>
								</tr>
							';
								
						}
						
						echo 	'</tbody>
							</table>';
					}
					else
					{
						echo '<p> Please enter a search term </p>';
					}
				}
			?>
			<!-- Everything else goes in here somewhere, I have javascript to put in a slideshow of products when you are ready -->
		</div>
		<div style = "float:right; width-max:50%">
		</div>
		<?php include ('../jscript-and-php/footer.php'); ?>
		
		<script src="../jscript-and-php/notice.js"></script>
	</body>
</html>