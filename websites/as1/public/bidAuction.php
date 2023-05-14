<?php
session_start();
include 'header.php';
include 'data-connection.php';?>

<?php
// to get the product id from the URL
if(isset($_GET['productID'])) {
    $productId = $_GET['productID'];
} else {
    echo "Product ID not found in URL."; //display if product ID dont found
    exit();
}

// query database for product information
$get_product_query = $connection->prepare("SELECT * FROM auction WHERE auction_id = :productId");
$get_product_query->bindParam(':productId', $productId);
$get_product_query->execute();
$productData = $get_product_query->fetch();

//If the form was submitted, then 
if(isset($_POST['submit'])) {
    //  to get bid amount and end date from form data
    $bid = $_POST['bid'];//for bid
    $endDate = $_POST['endDate'];
    $description = $_POST['description'];
    $description = isset($_POST['description']) ? $_POST['description'] : ''; //is to set and not null
    
    // update the bid amount and end date in the database
    try {
    $update_product_query = $connection->prepare("UPDATE auction SET bid = :bid, endDate = :endDate,description= :description WHERE auction_id = :productId");
    $update_product_query->bindParam(':bid', $bid);
    $update_product_query->bindParam(':endDate', $endDate);
    $update_product_query->bindParam(':description', $description);
    $update_product_query->bindParam(':productId', $productId);
    $update_product_query->execute();
    
} catch (PDOException $e) {
    echo "Update query error: " . $e->getMessage();
    exit();
    // header("Location: product.php?productID=$productId");
    // exit();
}
}
// display the product information
echo '<h1>Product Page</h1>';
echo '<article class="product">';
echo '<img src="product.png" alt="product name">';
echo '<section class="details">';
echo '<h2>'.$productData['title'].'</h2>';
echo '<h3>'.$productData['category'].'</h3>';
// echo '<p>Auction created by <a href="#">'.$productData['seller_name'].'</a></p>';
echo '<p class="price">Current bid: $'.$productData['bid'].'</p>';
echo '<time>Time left: 8 hours 3 minutes</time>';
echo '<form action="#" class="bid" method="POST">';
echo '<input type="text" name="bid" placeholder="Enter bid amount" />';
echo '<label>End Date:</label>';
echo '<input type="date" name="endDate" value="'.$productData['endDate'].'"><br>';
echo '<label>Description:</label>';
echo '<textarea name="description">'.$productData['description'].'</textarea>';
echo '<input type="submit" name="submit" value="submit" />';
echo '</form>';
echo '<a href = "index.php"> <button> Go Back </button> </a>';
echo '</section>';
echo '<section class="description">';
echo '<p>'.$productData['description'].'</p>';
echo '</section>';

?>	

<?php
    include 'footer.php';
?>


