<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
    </head>
    <body>
        <a href="index.html">back to the homepage</a><br><br>
        <!-- form for adding users -->
        <form action="addusers.php" method = "post">
            First name:<input type="text" name="forename"><br>
            Last name:<input type="text" name="surname"><br>
            Password:<input type="password" name="passwd"><br> <!-- add confirm password -->
            Title:<select name="title">
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Ms">Ms</option>
                <option value="Miss">Miss</option>
                <option value="Dr">Dr</option>
                <option value="Mme">Mme</option>
                <option value="Sir">Sir</option>
                <option value="Dame">Dame</option>
                <option value="Lady">Lady</option>
                <option value="Rev.">Rev.</option>
                <option value="LCpl">LCpl</option>
                <option value="Pope">Pope</option>
                <option value="Viscount">Viscount</option>
                <option value="Her Ladyship">Her Ladyship</option>
                <option value="Supreme Leader">Supreme Leader</option>
                <option value="His Omnipotence">His Omnipotence</option>
            </select><br>
            Admin:<br>
            <!--Next 3 lines create a radio button which we can use to select the user role-->
            <input type="radio" name="role" value="NotAdmin" checked>No<br>
            <input type="radio" name="role" value="Admin">Yes<br>
            <input type="submit" value="Add User">
        </form>

        <!-- show all users -->
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblUsers");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            switch($row["Role"]){
                case 0:
                    $role="";
                    break;
                case 1:
                    $role=" (Admin)";
                    break;
                }
            echo($row["Title"] . " " . $row["Forename"] . ' ' . $row["Surname"] . $role . "<br>");
        }
        ?>
    </body>
</html>