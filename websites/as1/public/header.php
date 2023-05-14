<?php
include 'data-connection.php';?>
<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		<link rel="stylesheet" href="ibuy.css" /> <!-- importing stylesheet -->
	</head>

	<body>
		<header>
			<!--  to displaying the website's logo -->
			<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

			<form action="#">
				<input type="text" name="search" placeholder="Search for anything" />
				<input type="submit" name="submit" value="Search" />
				
			</form>
		</header>
		<nav>
			<ul>
				<?php
				// getting all categories from the database 
				
				$get_categories_query = $connection->prepare("SELECT * FROM category");
				$get_categories_query->execute();
				$categories = $get_categories_query->fetchAll();

				// printing after iterating through all categories
				foreach($categories as $category){
					echo '<li><a class="categoryLink" href="#">'.$category['name'].'</a></li>';
 }
				?>
			</ul>
		</nav>
		<img src="banners/1.jpg" alt="Banner" /> <!-- to displaying a banner image -->



