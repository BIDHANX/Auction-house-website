<?php
session_start(); //initiates a new session or picks up where it left off.
	include 'header.php';  // includes the header.php
	include 'data-connection.php'; // Include the 'data-connection.php' file
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ibuy auction</title>
	</head>

	<body>
	
		<?php
		// if user is logged in
		if(isset($_SESSION['userType'])){
			echo '<a href = "addAuction.php"> <button>addAuction</button></a>';
		
			// now if the user is admin 
			if($_SESSION['userType']===1){
				?>
					<span class="dropdown">
						<!-- this is only for admin to perform following task  -->
		<button>Admin</button> 
		<div class="dropdown-options">   
		     <!-- to deleteCategory -->
			<a href="deleteCategory.php"><button>delete-Categories<button></a>  
			<!-- to addCategory -->
			<a href="addCategory.php"><button>Add-Categories<button></a>
			<!-- to editCategory -->
			<a href="editCategory.php"><button>edit-Categories<button></a>
		</div>
		</div>
	</span>
				<?php
		}
			echo '<a href = "logout.php"> <button>logout</button></a>'; //link to logout
			

	}//if user is not logged in
			else{
      	echo '<p><a href = "login.php"> <button>login</button></a></p>';	
	}	?>
		
			<main>

				<h1>Latest Listings / Search Results / Category listing</h1>
					<?php
					// Retrieve the latest 10 auctions
					$get_products_query = $connection->prepare("SELECT * FROM auction ORDER BY auction_id DESC LIMIT 10");
					$get_products_query->execute();
					$auctionData = $get_products_query->fetchAll();
            // Display each auction
			foreach($auctionData as $auction){
			echo '<ul class="productList">';
			echo '<li>';
			echo '<img src="product.png" alt="product name">';
			echo '<article>';
			echo '<h2'.$auction['title'].'</h2>';
			echo '<h3>'.$auction['title'].'</h3>';
			echo '<p>'.$auction['description'].'</p>';
			echo '<p class="price">Current bid: $'.$auction['bid'].'</p>';
			// Display a "More" link to participate in the auction if the user is logged in.
			if(isset($_SESSION['userType'])){
				echo '<a href="bidAuction.php?productID='.$auction['auction_id'].'" class="more auctionLink">More &gt;&gt;</a>';
			}
			
			echo '</article>';
			echo '</li>';
			echo '</ul>';
			echo '<hr />';
						}
			?>



					
				

<?php
	include 'footer.php'; // Include the 'footer.php' file
?>



	</body>
</html>

