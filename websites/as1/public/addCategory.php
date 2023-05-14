<?php 
include 'header.php';
include 'data-connection.php'
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>addCategory</title>
        <link rel="stylesheet" href="ibuy.css">
     </head>
    <body>
<!-- div class name -->
 <div class= addCategory > 
<h1>addCategory</h1>

<form action="addCategory.php" method="POST">
<label>Name:</label><br>
<input type="name" name="name" id="" ><br>

    
    <input name="submit" type="submit" value="Submit" />
    <br>
</form>
<br>
<!-- to go back to index.php -->
    <a href = "index.php"> <button> Go Back </button> </a> 
<?php



// statement check
if (isset($_POST['submit'])) {
    //insert query
    $stmt=$connection->prepare('insert into category(name)
values(:itname)');

$values=[
 'itname'=>$_POST['name'],
 

];
// getting all the categories from database 
				
$get_categories_query = $connection->prepare("SELECT * FROM category");//select query from category table
$get_categories_query->execute();
$categories = $get_categories_query->fetchAll();

$stmt->execute($values);//execute values
  if($stmt)
  {
     echo '<p> your categories has been added</p>';//if categories added
    echo '<a href="index.php">Go to the index page</a>';//if not
  }
  
}
?>


<?php
			include 'footer.php';
			?>