<?php
header('Location: books.php'); // if it breaks, comment this line first

include_once("connection.php");

array_map("htmlspecialchars", $_POST);

echo("isbn: " . $_POST["isbn"]."<br>");
echo("title: " . $_POST["title"]."<br>");
echo("author: " . $_POST["author"]."<br>");
echo("type: " . $_POST["type"]."<br>");

$stmt = $conn->prepare("INSERT INTO TblBooks (BookID,ISBN,Title,AuthorID,Type)VALUES (null,:isbn,:title,:authorid,:type)");
$stmt->bindParam(':isbn', $_POST["isbn"]);
$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':authorid', $_POST["author"]);
$stmt->bindParam(':type', $_POST["type"]);
$stmt->execute();
$conn=null;