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
		<?php include ('../jscript-and-php/header.php'); include('config.php'); ?>
		<section id = "secondhead">
			<nav>
				<ul>
					<!-- The searchbar, login button, basket button etc.. will go in here, this has no css yet -->
				</ul>
			</nav>
		</section>
		<div id="wrapper">
		<section id = "cart1">
			<h1>Shopping Basket</h1>
			<?php
				$_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : '';
				$product_id = isset($_GET['id']) ? $_GET['id'] : ''; //the product id from the URL
				$action = isset($_GET['action']) ? $_GET['action'] : ''; //the action from the URL

				//if there is an product_id and that product_id doesn't exist display an error message
				if($product_id && !productExists($product_id)) {
					die("Error. Product Doesn't Exist");
				}

				switch($action) { //decide what to do

					case "add":
					if(!isset($_SESSION['cart'][$product_id])) $_SESSION['cart'][$product_id] = 1;
					else $_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id
					break;

					case "remove":
					if(!isset($_SESSION['cart'][$product_id]) || $_SESSION['cart'][$product_id] <= 0) break;
					else if($_SESSION['cart'][$product_id] == 1) unset($_SESSION['cart'][$product_id]);
					else $_SESSION['cart'][$product_id]--;
					break;

					case "empty":
					unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart.
					break;

				}
				?>
				<?php
				if(isset($_SESSION['cart']) && $_SESSION['cart']) { //if the cart isn't empty
				//show the cart

					echo "<table class=\"mainbasket\">"; //format the cart using a HTML table

					//iterate through the cart, the $product_id is the key and $quantity is the value
					
					$total = 0;
					foreach($_SESSION['cart'] as $product_id => $quantity) {
						$sql = sprintf("SELECT song, artist, price FROM music WHERE product_id = %d;", $product_id);

						$result = pg_query($sql);

						//Only display the row if there is a product (though there should always be as we have already checked)
						if(pg_num_rows($result) > 0) {

							
							list($name, $description, $price) = pg_fetch_row($result);

							$line_cost = $price * $quantity; //work out the line cost
							$total = $total + $line_cost; //add to the total cost

							echo "<tr>";
							//show this information in table cells
							echo "<td align=\"center\">$name</td>";
							//along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
							echo "<td align=\"center\">$quantity <a href=\"$_SERVER[PHP_SELF]?action=remove&id=$product_id\">X</a></td>";
							echo "<td align=\"center\">$line_cost</td>";

							echo "</tr>";

						}

					}

					//show the total
					echo "<tr>";
					echo "<td colspan=\"2\" align=\"right\">Total</td>";
					echo "<td align=\"right\">$total</td>";
					echo "</tr>";

					//show the empty cart link - which links to this page, but with an action of empty. A simple bit of javascript in the onlick event of the link asks the user for confirmation
					echo "<tr>";
					echo "<td colspan=\"3\" align=\"right\"><a href=\"$_SERVER[PHP_SELF]?action=empty\" onclick=\"return confirm('Are you sure?');\">Empty Cart</a></td>";
					echo "</tr>";
					echo "</table>";



					}else{
					//otherwise tell the user they have no items in their cart
					echo "You have no items in your shopping cart.";

				}
				
				
				
				function productExists($product_id) {
				//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
				$sql = sprintf("SELECT * FROM music WHERE product_id = %d;", $product_id);
				return pg_num_rows(pg_query($sql)) > 0;
				}
			?>
			</section>
			<!-- Everything else goes in here somewhere, I have javascript to put in a slideshow of products when you are ready -->
			
		</div>
		<?php include ('../jscript-and-php/footer.php'); ?>
	</body>
</html>