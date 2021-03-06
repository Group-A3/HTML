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
			<section id = "main">
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
											<th>Id</th>
											<th>Album Cover</th>
											<th>Artist</th>
											<th>Album</th>
											<th>Song</th>
											<th>Price</th>
											<th>Genre</th>
											<th>Publisher</th>
											<th/>
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
											<button class = "basket" name = "add" type = "submit" onclick="itemAdded()">Add to Basket</button>
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
		</div>
		<?php include ('../jscript-and-php/footer.php'); ?>
	</body>
</html>