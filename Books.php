<!DOCTYPE html>
<html>
    <head>
        <title>Books</title>
    </head>
    <body>
        <a href="index.html">back to the homepage</a><br><br>
        <!-- form for adding books -->
        <form action="addbooks.php" method = "post">
            ISBN:<input type="text" name="isbn"><br>
            Title:<input type="text" name="title"><br>
            Author:<select name="author">
                <?php
                include_once('connection.php');
                $stmt = $conn->prepare("SELECT * FROM TblAuthors ORDER BY Surname ASC");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo('<option value='.$row["AuthorID"].'>'.$row["Forename"].' '.$row["Surname"].'</option>');
                }
                ?>
            </select><br>
            Type:<input type="text" name="type"><br>
            <input type="submit" value="Add Book">
        </form>

        <!-- show all books -->
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblBooks");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $stmt2 = $conn->prepare("SELECT * FROM TblAuthors WHERE AuthorID = " . $row['AuthorID']);
            $stmt2->execute();
            $AuthAssoc = $stmt2->fetch(PDO::FETCH_ASSOC);
            echo('"' . $row["Title"] . '", ' . $AuthAssoc['Forename'] . ' ' . $AuthAssoc['Surname'] . ', (' . $row["ISBN"] . ', ' . $row["Type"] . ')' . '<br>');
        }
        ?>
    </body>
</html>