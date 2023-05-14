<?php 
include 'header.php';// include header file
include 'data-connection.php'// include database connection file
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>addAuction</title>
        <link rel="stylesheet" href="ibuy.css">
     </head>
    <body>
<!-- div class for css -->
 <div class= addAuction > 
<h1>addAuction</h1>

<form action="addAuction.php" method="POST">
<label>Title:</label><br>
<!-- text box for product name -->
<input type="text" name="title" id="" ><br> 
<!-- for description -->
<label>Description:</label><br>
<textarea name="itemdetail" id="" cols="40" rows="10"></textarea><br>
<!-- to choose options from following category -->
<label>Category:</label><br>
<select name="itemtype" id="">
        <option value="Electronics">Electronics</option>
        <option value="Fashion">Fashion</option>
        <option value="Sport">Sport</option>
        <option value="Toys">Toys</option>
        <option value="Motors"> Motors</option>
        <option value="Health"> Health</option>
    </select>
    <br>
    <!-- for bid -->
    <label>Current bid:</label><br>
    <input type="bid" name="bid" id=""><br>
    <!-- to give date  -->
    <label>End Date:</label><br>
    <input type="date" name="date" id="" ><br>
    <!-- submition -->
    <input name="submit" type="submit" value="Submit" />

</form>
</div>
<!-- inserting data for register form -->
<?php



if (isset($_POST['submit'])) {
  // Create the SQL statement that will be used to add auction data to the database.
    $stmt=$connection->prepare('insert into auction(title,description,category,endDate,bid)
values(:ittitle,:itdescription,:itcategoryId,:itendDate,:itbid)');
//Set the prepared statement's values in this code.
$values=[
 'ittitle'=>$_POST['title'],
 'itdescription'=>$_POST['itemdetail'],
 'itcategoryId'=>$_POST['itemtype'],
 'itendDate'=>$_POST['date'],
 'itbid'=>$_POST['bid'],

];
// executeing the prepared statement
$stmt->execute($values);
  if($stmt)// if the execution was successfu
  {
     echo '<p> your auction has been added</p>';
    echo '<a href="index.php">Go to the index page</a>';
  }
  
}
?>

<?php
include 'footer.php';// including footer file
?>

</body>
</html>