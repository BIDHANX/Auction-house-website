<!-- For Data Connection -->
<?php
// bidhan is my username
$username='bidhan';
// its my password 
$password='assignmentphp';
// all my table is created in assignment1
$dbname='assignment1';
// mysql is my server
$server='mysql';
// this is used for connecting to a MySQL database
$connection =new PDO('mysql:dbname='.$dbname.';host='.$server,$username,$password);