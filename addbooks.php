<?php
// header('Location: books.php'); // if it breaks, comment this line first

include_once("connection.php");

array_map("htmlspecialchars", $_POST);

echo("isbn: " . $_POST["isbn"]."<br>");
echo("title: " . $_POST["title"]."<br>");
echo("author: " . $_POST["author"]."<br>");

$author_name = $_POST["author"];
$stmt = $conn->prepare("SELECT AuthorID FROM TblAuthors WHERE Surname = $author_name");
$stmt->execute();
if($stmt->fetch(PDO::FETCH_ASSOC)){
    $author_id = $stmt->fetch(PDO::FETCH_ASSOC)["AuthorID"];
}
else{
    echo('no author with surname "' . $_POST["author"] . '"');
}

$stmt = $conn->prepare("INSERT INTO TblBooks (BookID,ISBN,Title,AuthorID)VALUES (null,:isbn,:title,:authorid)");
$stmt->bindParam(':isbn', $_POST["isbn"]);
$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':authorid', $author_id);
$stmt->execute();
$conn=null;
?>