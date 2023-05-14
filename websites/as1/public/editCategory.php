<?php
session_start();
include 'header.php';
include 'data-connection.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EditCategory</title>
  <link rel="stylesheet" href="ibuy.css" />
</head>
<body>

    <div class = "categoryedit">


    <h1> Edit Category</h1>
    <!-- // building a form that posts information to the editCategory.php file -->

        <form action="editCategory.php" method = "POST">
               
            <input type="text" name="category" id="catid" placeholder= 'Category Name' /> 
            <!-- to create a line break-->
             <br>    
             <br>
             <input type="text" name="category_id" id ="category_id" placeholder= 'Category_id' required />
             <br>
             <br>
             <input type="submit" value="Submit" name="submit" />	
   
           </form>
           <br>
             <a href = "index.php"> <button> Go Back </button> </a>
       </div>
       <?php
    
    if (isset ($_POST['submit'])){ //evaluating whether the form was submitted
      $changedCategory = $_POST['category'];// storing the new category name
      $categoryId = $_POST['category_id']; //keeping the category ID in memory

      // setting up a SQL query to change the category name
      $updateCategory = $connection->prepare("UPDATE category SET name = :changedCategory WHERE category_id = :categoryId");
      $updateCategory->bindParam(':changedCategory', $changedCategory);// binding the changed category name parameter
      $updateCategory->bindParam(':categoryId', $categoryId);// binding the category ID parameter
      
      if($updateCategory->execute()){ // putting the update query to use and determining whether it was successful.
          echo 'The category name has been updated successfully.';
      }
      else{
          echo 'Some error has occurred while updating the category name.';
      }
  }
  
  

?>

   
       <?php
         require 'footer.php'; //to display footer
         ?>
         </body>
         </html>