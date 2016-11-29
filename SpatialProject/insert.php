<?php
$servername = "localhost";
$username = "root";
$password = "iiit123";
$dbname = "spatialproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$Event_Name = $_POST['EventName'];
$Event_Location = $_POST['hidden1'];
$Event_lat = $_POST['hidden2'];
$Event_lng = $_POST['hidden3'];
$Event_Date = $_POST['EventDate'];
$Event_Time = $_POST['EventTime'];
$Event_Type = $_POST['EventType'];

$sql = "INSERT INTO spatialtable (Event_Name,Event_Location,Event_Date,Event_Time,Event_Lat,Event_lng,Event_Type) VALUES
			('$Event_Name' ,'$Event_Location','$Event_Date','$Event_Time','$Event_lat','$Event_lng','$Event_Type')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("refresh:2; url=index.html");
mysqli_close($conn);
?>
