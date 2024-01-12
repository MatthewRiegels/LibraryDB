<!DOCTYPE html>
<html>
    <head>
        <title>Loans</title>
    </head>
    <body>
        <a href="index.html">back to the homepage</a><br><br>
        <form action="addloans.php" method = "post">
            Book:<select name="book">
                <?php
                include_once('connection.php');
                $stmt = $conn->prepare("SELECT * FROM TblBooks");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $stmt2 = $conn->prepare("SELECT * FROM TblAuthors WHERE AuthorID = " . $row['AuthorID']);
                    $stmt2->execute();
                    $AuthAssoc = $stmt2->fetch(PDO::FETCH_ASSOC);
                    echo('<option value=' . $row["BookID"] . '>' . $row["Title"] . ', ' . $AuthAssoc['Forename'] . ' ' . $AuthAssoc['Surname'] . '<br>');
                }
                ?>
            </select><br>
            User:<select name="user">
                <?php
                include_once('connection.php');
                $stmt = $conn->prepare("SELECT * FROM TblUsers");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo('<option value=' . $row["UserID"] . '>' . $row["Title"] . ' ' . $row["Forename"] . ' ' . $row["Surname"] . '</option>');
                }
                ?>
            </select><br>
            <input type="submit" value="Loan Book">
        </form>

        <!-- show all loans -->
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblLoans");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $stmt2 = $conn->prepare("SELECT * FROM TblBooks WHERE BookID = " . $row["BookID"]);
            $stmt2->execute();
            $booktitle = $stmt2->fetch(PDO::FETCH_ASSOC)["Title"];

            $stmt3 = $conn->prepare("SELECT * FROM TblUsers WHERE UserID = " . $row["UserID"]);
            $stmt3->execute();
            $arr = $stmt3->fetch(PDO::FETCH_ASSOC);
            $username = $arr["Forename"] . ' ' . $arr["Surname"];
            echo($username . ', ' . $booktitle);
        }
        ?>
    </body>
</html>