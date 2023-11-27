<?php
header('Location: books.php'); // if it breaks, comment this line first

include_once("connection.php");

array_map("htmlspecialchars", $_POST);

echo("forename: " . $_POST["forename"]."<br>");
echo("surname: " . $_POST["surname"]."<br>");

$stmt = $conn->prepare("INSERT INTO TblAuthors (AuthorID,Forename,Surname)VALUES (null,:forename,:surname)");
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->execute();
$conn=null;
?>