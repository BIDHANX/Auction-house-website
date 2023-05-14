<?php
session_start(); // start a session
include 'header.php'; // include header.php file
?>
 <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="ibuy.css"> <!-- link to stylesheet -->
     </head>
    <body>

 <div class= loginpage  >
<h1>Login</h1>

<form action="login.php" method="POST">
<label>user email</label><br>
<input type="text" name="email" id="" placeholder= EnterEmail><br> <!-- to create a email textbox -->
<label>password</label><br>
<input type="password" name="password" id="" placeholder=Enterpassword ><br> <!--  to create a password textbox -->


    <input name="submit" type="submit" value="Submit" />
    <p>Don't have account register</p>
    <table>  <!-- a table to display the registration options -->
  <tr>
   <!-- link to register for user -->
    <td><a href="register.php?userType=0">For User</a></td>
    <!-- link to register for admin -->
    <td><a href="addAdmin.php?userType=1">For Admin</a></td>
  </tr>
</table>

</form>
</div>
<!-- inserting data for login page -->
<?php 
include 'data-connection.php'; // include data-connection.php file
if(isset($_POST['submit'])){  // check if the submit button is clicked
   
  // create a select statement to verify the database's email and password.
 $stmt=$connection->prepare("SELECT * from register where email=:email AND password=:password");
$criteria=[
    'email'=>$_POST['email'],
    'password'=>$_POST['password'],
];
$stmt->execute($criteria); // execute the statement
$data = $stmt->fetch();
$rowCount = $stmt->rowCount();
if($rowCount >0){ // if there is a row in the result
        $_SESSION['email'] = $data['email'];//for email
        $_SESSION['password'] = $data['password'];//for password
        $_SESSION['userType'] = $data['isAdmin']; //for admin
        echo 'Logged in successfully <br/>'; 
        echo '<a href="index.php">Go to homepage</a>'; //  a link to the homepage
}
else {
   echo "Login not valid ";
}
    }


?>

<?php
			include 'footer.php';//include footer
			?>

</body>
<!-- closing html tag -->
</html>