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
            Author:<input type="text" name="author"><br>
            <input type="submit" value="Add Book">
        </form>

        <!-- show all books -->
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblBooks");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo('"' . $row["Title"] . '"' . ', ' . $row["AuthorID"] . " (" . $row["ISBN"] . " )" . "<br>");
        }
        ?>
    </body>
</html>