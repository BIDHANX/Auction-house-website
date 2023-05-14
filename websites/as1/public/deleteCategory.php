<?php // opening PHP tag.
session_start();
include 'header.php';
include 'data-connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>
<body>
    <div class = "delete">
    <h1> Delete Category </h1> 
    <form action ="deleteCategory.php" method="POST"> 
        <input type="text" name="categoryId" id ="category" placeholder= 'Category Id'  />
        <!-- line break. -->
        <br>
        <br>
        <input type="submit" value="Submit" name="submit" />
        <br>
        	
        
    </form>
    <br>
    <!-- //button to go back -->
    <a href = "index.php"> <button> Go Back </button> </a> 
    </div>  
        
<?php
    //verifies the form's submission.
    if(isset($_POST['submit'])){
        $category_id =$_POST['categoryId'];
       // creates a DELETE statement based on the category's ID to delete it from the database.
        $remove =$connection->prepare("DELETE FROM category WHERE category_id=:category_id");
        $remove->bindParam(':category_id',$category_id);

        if($remove->execute()){ //carries out the prepared statement and determines whether it was successful.

            echo'Successful deletion of the category.'; //if category is deleted
        }
        else{
            echo 'While deleting the category, there was a mistake..'; //if category don't deleted
        }
    }

			require 'footer.php';
		
	?>
</body>
</html>