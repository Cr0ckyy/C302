<?php
include "dbFunctions.php";
$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "root";
$DB = "c302_p08";
$link = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DB) or
die(mysqli_connect_error());

$id = $_GET["id"];
$query = "SELECT * FROM addressbook WHERE id = '$id' ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
} else {
    $row = null;
    echo json_encode($row);
}
mysqli_close($link);
?>