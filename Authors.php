<!DOCTYPE html>
<html>
    <head>
        <title>Authors</title>
    </head>
    <body>
        <a href="index.html">back to the homepage</a><br><br>
        <!-- form for adding authors -->
        <form action="addauthors.php" method = "post">
            Forename:<input type="text" name="forename"><br>
            Surname:<input type="text" name="surname"><br>
            <input type="submit" value="Add Author">
        </form>

        <!-- show all authors -->
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblAuthors ORDER BY surname ASC");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo($row["Forename"] . ' ' . $row["Surname"] . "<br>");
        }
        ?>
    </body>
</html>