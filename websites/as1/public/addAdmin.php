<?php //opening php tag
// Including the data-connection and header files
include 'header.php';
include 'data-connection.php'

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="ibuy.css">
     </head>
    <body>
        <!-- creating div for css -->
        <div class= addAdminpage  > 
            <h1>  Create Account for Admin  </h1>

<form action="addAdmin.php" method="post">
    <!-- to give name -->
    <input type="text" name="iname" id="" placeholder=name>
    <br>
    <br>
    <!-- to give contact -->
    <input type="text" name="icontact" id="" placeholder=contact>
<br>
<br>
   <!-- for email -->
    <input type="text" name="iemail" id="" placeholder= email>
    <br><br>
   <!-- for password -->
    <input type="password" name="hide" id="" placeholder=password >
    
    <br><br>

    
    </select>
    <!-- to submit -->
    <input type="submit" value="submit" name="submit">
    
  </form> 
 

</div>



  <!-- inserting data for addAdmin form -->
  <?php
  // Insert the information into the database if the submit button is pressed.
if (isset($_POST['submit'])) {

 //insert query from register
      $stmt=$connection->prepare('insert into register(name,contact,email,password,isAdmin)
      values(:name,:contact,:email,:password,:admin)');//giving values to query
$values=[
   'email'=>$_POST['iemail'],
   'password'=>$_POST['hide'],
   'name'=>$_POST['iname'],
   'contact'=>$_POST['icontact'],
   'admin'=>1,

];
$stmt->execute($values);//if execute dispaly values


        echo "Your account for admin has been created.";//if admin user is created
        echo '<a href = "index.php"> <button>Home</button></a>';//to go back index page
        
    }
    

?>

<?php
			include 'footer.php';//including footer page
			?>

</body>
</html>