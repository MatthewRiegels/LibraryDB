<?php
//header('Location: books.php'); // if it breaks, comment this line first

include_once("connection.php");

array_map("htmlspecialchars", $_POST);

echo("book: " . $_POST["book"]."<br>");
echo("user: " . $_POST["user"]."<br>");
$dateborrow= new DateTime(date("Y-m-d"));
$loanduration = new DateInterval("P14D");
$datereturn=date_add($loanduration,$dateborrow);// broken
$stmt = $conn->prepare("INSERT INTO TblLoans (BookID,UserID,IssueDate,ReturnDate)VALUES (:book,:user,:issuedate,:returndate)");
$stmt->bindParam(':book', $_POST["book"]);
$stmt->bindParam(':user', $_POST["user"]);
$stmt->bindParam(':issuedate', $dateborrow);
$stmt->bindParam(':returndate', $datereturn);
$stmt->execute();
$conn=null;