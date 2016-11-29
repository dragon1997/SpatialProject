<?php
$servername = "localhost";
//$username = "root";
//$password = "iiit123";
$dbname = "spatialproject";
$username = $_POST['adminid'];
$password = $_POST['pswd'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	//header("refresh:0; url=wronglogin.html");
	header("Location: wronglogin.html");
    //die("Connection failed: " . mysqli_connect_error());
}
else
{
// header("refresh:1; url=indexevent.html");
header("Location: insert.html");
die();
//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";


}
mysqli_close($conn);
?>

