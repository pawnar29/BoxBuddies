<!DOCTYPE html>
<html>
    <?php include 'head.php';?>
    <body>
        <?php 
            if (!isset($_GET['product'])){
                header("Location: .");
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //$_SESSION["cart"] =  $_POST["ID"];
                array_push($_SESSION["cart"], [$_POST["ID"] => $_POST["quantity"]]);
                echo $_SESSION["cart"];
                echo $_POST["ID"];
            }

            $sql = "SELECT * FROM Product WHERE ProductID=" . $_GET['product'];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                
                while($row = $result->fetch_assoc()) {
                    if($row['Img']==''){
                        $src='src="error.png"';
                    }
                    else{
                        $src='src="data:image;base64,' . $row['Img'] . '"';
                    }
                    echo
                        '<form method="POST" action="' . $_SERVER["PHP_SELF"] . '"> 
                            <h1>' . $row['PBrand'] . " " . $row['PType'] . '</h1>
                            <img width="500px" height="500px" ' . $src . '">
                            <h3>Cost - $' . number_format($row['Cost'], 2) . '</h3>
                            <h4>Quantity <input type="number" value="1" name="quantity" size="3"></input></h4><br>
                            <input type="hidden" value="' . $row['ProductID'] . '" name="ID"/><br>
                            <button type="submit">Add to Cart</button>
                        </form>';
                }
            } else {
                echo '<img src="error.png" alt="error">';
            }
        ?>
    </body>
</html>
