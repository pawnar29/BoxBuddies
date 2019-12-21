<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    </head>
    <?php
        include 'session.cgi'; 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["Admin"] == "" && $_SESSION["AdminPass"]== "") {
            $_SESSION["Admin"] = $_POST["username"];
            $_SESSION["AdminPass"] = $_POST["password"];
        }
        $conn = new mysqli($servername, $_SESSION["Admin"], $_SESSION["AdminPass"], $dbname);
        // Check connection
        if ($conn->connect_error) {
            echo
                '<body>
                    <div id="login">
                        <form method="POST" action="." autocomplete="off"> 
                            <legend>Log in</legend>
                            <label for="input_username">Username:</label>
                            <input type="text" name="username" id="input_username" size="15"><br>
                            <label for="input_password">Password:</label>
                            <input type="password" name="password" id="input_password" size="15"><br>
                            <button type="submit">Login</button>
                        </form>
                    </div>
                </body>';
            die("<br><br><br>Connection failed: " . $conn->connect_error);
        }
        else {
            include 'head.php';
            //echo "Connected";
            $sql = "SELECT * FROM Product";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row[0] . " - Name: " . $row[1] . " " . $row[2] . " " . $row[3] . "<br>";
                    echo
                        '<div id="products">
                            <h3>' . $row['ProductID'] . '</h3> 
                            <h3>' . $row['PBrand'] . " " . $row['PType'] . '</h3>
                            <h4>Cost - $' . number_format($row['Cost'], 2) . '</h4>
                        </div>';
                }
            } else {
                echo "Error";
            }
        }
    ?>
</html>
<?php $conn->close(); ?>
