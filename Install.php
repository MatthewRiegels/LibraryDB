<?php
include_once("connection.php");

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblBooks;
CREATE TABLE TblBooks (
    BookID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(17) NOT NULL,
    Title VARCHAR(255) NOT NULL,
    AuthorID INT(4) UNSIGNED NOT NULL,
    Type VARCHAR(10) NOT NULL
);");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblGenres;
CREATE TABLE TblGenres (
    GenreID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    GenreName VARCHAR(20) NOT NULL
);");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblGenreLookup;
CREATE TABLE TblGenreLookup (
    GenreID INT(4),
    BookID INT(4)
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

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblLoans;
CREATE TABLE TblLoans (
    BookID INT(4),
    StudentID INT(4),
    IssueDate DATE,
    ReturnDate DATE
);");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblAuthors;
CREATE TABLE TblAuthors (
    AuthorID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Forename VARCHAR(30) NOT NULL,
    Surname VARCHAR(30) NOT NULL
);");
$stmt->execute();
$stmt->closeCursor();