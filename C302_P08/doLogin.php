<?php
include 'dbFunctions.php';
$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "root";
$DB = "c302_p08";
$link = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DB) or
die(mysqli_connect_error());

//$username = $_POST['username'];
//$password = $_POST['password'];
$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT id, apikey FROM credentials WHERE username='$username' and password=sha1('$password')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if (mysqli_num_rows($result) == 1) {
    //$row contains "id" and "apikey"
    $row = mysqli_fetch_assoc($result);
    $row["authenticated"] = true;
} else {
    $row["authenticated"] = false;
}
echo json_encode($row);
?>