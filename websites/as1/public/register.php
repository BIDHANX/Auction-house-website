<?php //opening php tag
include 'header.php';//including header
include 'data-connection.php'//connecting data

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="ibuy.css">
     </head>
    <body>
        <div class= registerpage  >
            <h1>  Create Account  </h1>

<form action="register.php" method="post">
  <!-- to give name -->
    <input type="text" name="name" id="" placeholder=name>
    <!-- br is to break line -->
    <br>
    <br>
    <!-- to give contact -->
    <input type="text" name="contact" id="" placeholder=contact>
<br>
<br>
  <!-- for email -->
    <input type="text" name="email" id="" placeholder= email>
    <br><br>
<!-- for password -->
    <input type="password" name="hide" id="" placeholder=password >
    
    <br><br>

    
    </select>
    <!-- to give submit -->
    <input type="submit" value="submit" name="submit">
  
    
  </form> 
 

</div>



  <!-- inserting data for register form -->
  <?php
if (isset($_POST['submit'])) {
  //  insert query from register
  $stmt=$connection->prepare('insert into register(name,contact,email,password,isAdmin)
values(:itemname,:itcontact,:itemail,:itpassword,:user)');//giving their values

$values=[//and giving their values name
   'itemname'=>$_POST['name'],
   'itcontact'=>$_POST['contact'],
   'itemail'=>$_POST['email'],
   'itpassword'=>$_POST['hide'],
    'user'=>0,
];
$stmt->execute($values);//if executed print values

if($stmt)
{
  if($stmt)
  { echo "Your account has been created.";//if account is created
    echo '<a href = "index.php"> <button> Go Back </button> </a>';
    }
    
}
}
?>

<?php
			include 'footer.php';
			?>

</body>
</html>