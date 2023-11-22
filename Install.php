<?php
include_once("connection.php");

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblBooks;
CREATE TABLE TblBooks (
    BookID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(17) NOT NULL,
    Title VARCHAR(255) NOT NULL,
    AuthorID INT(4) UNSIGNED NOT NULL
);");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
CREATE TABLE TblUsers (
    UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Gender VARCHAR(1) NOT NULL,
    Surname VARCHAR(30) NOT NULL,
    Forename VARCHAR(30) NOT NULL,
    Password VARCHAR(30) NOT NULL,
    Role INT(1) NOT NULL
);");
$stmt->execute();
$stmt->closeCursor();