<!DOCTYPE html>
<html>
    <?php 
        include 'head.php';
        
        if (isset($_GET['search']))
        {
            $sql = "SELECT * FROM Product WHERE PType=" . "'" . $_GET['search'] . "'";
            //echo $sql;
        }else{
            $sql = "SELECT * FROM Product";
        }
    ?>
    <aside>
        <ul>
            <li><a href=".">All</a></li>
            <?php
                $result = $conn->query("SELECT DISTINCT(PType) FROM Product");
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<li><a href="?search=' . $row['PType'] . '">' . $row['PType'] . '</a></li>';
                    }
                }

            ?>
            <!--<li><a href="." onclick="MyFunction('Shirts');return false;">Shirts</a></li>
            <li><a href="?search=Shoes" onclick="MyFunction();return false;">Shoes</a></li>
            <li><a href="?search=Pants" onclick="MyFunction();return false;">Pants</a></li>
            <li><a href="?search=Socks" onclick="MyFunction();return false;">Socks</a></li>
            <li><a href="?search=Hats" onclick="MyFunction();return false;">Hats</a></li>-->
        </ul>
    </aside>
    <body>
        <div>
            <?php 
                //$sql = "SELECT * FROM Product";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        //echo "id: " . $row[0] . " - Name: " . $row[1] . " " . $row[2] . " " . $row[3] . "<br>";
                        if($row['Img']==''){
                            $src='src="error.png"';
                        }
                        else{
                            $src='src="data:image;base64,' . $row['Img'] . '"';
                        }
                        /*echo
                            '<form method="POST" action="."> 
                                <img width="175px" ' . $src . '">
                                <h3>Brand - ' . $row['PBrand'] . '</h3>
                                <h4>Clothing Type - ' . $row['PType'] . '</h4>
                                <h4>Cost - $' . number_format($row['Cost'], 2) . '</h4>
                                <input type="number" value="1" size="10"></input><br>
                                <input type="hidden" value="' . $row['ProductID'] . '" name="ID"/><br>
                                <button type="submit">Add to Cart</button>
                            </form>';*/
                        echo
                            '<a href="description.php?product=' . $row['ProductID'] . '"><div id="products"> 
                                <img width="175px" height="175px"' . $src . '">
                                <h3>' . $row['PBrand'] . " " . $row['PType'] . '</h3>
                                <h4>Cost - $' . number_format($row['Cost'], 2) . '</h4>
                            </div><a>';
                    }
                } else {
                    echo '<img src="error.png" alt="error">';
                }
            ?>
        </div>
    </body>
</html>
<?php $conn->close(); ?>
