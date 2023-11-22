<?php
header('Location: users.php'); // if it breaks, comment this line first

include_once("connection.php");

array_map("htmlspecialchars", $_POST);

switch($_POST["role"]){
    case "NotAdmin":
        $role=0;
        break;
	case "Admin":
		$role=1;
		break;
}

echo("gender: " . $_POST["gender"]."<br>");
echo("forename: " . $_POST["forename"]."<br>");
echo("surname: " . $_POST["surname"]."<br>");
echo("passwd: " . $_POST["passwd"]."<br>");
echo("role: " . $_POST["role"]."<br>");

$stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Gender,Surname,Forename,Password,Role)VALUES (null,:gender,:surname,:forename,:password,:role)");
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':password', $_POST["passwd"]);
$stmt->bindParam(':gender', $_POST["gender"]);
$stmt->bindParam(':role', $role);
$stmt->execute();
$conn=null;
?>