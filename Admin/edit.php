<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "UPDATE " . $table . " SET ";
        for ($x = 1; $x < $rows; $x++){
            $sql .= $rowName[$x] . '=\'' . $_POST[$rowName[$x]] . '\'';
            if($x != $rows-1)
                $sql .= ',';
        }
        $sql .= " WHERE " . $table . "ID=" . $_POST[ID];
        $conn->query($sql);
        header("Location: " . strtolower($table) . ".php");
    }

    if(isset($_GET['edit']) && !empty($_GET['edit'])) {
        $sql = "SELECT * FROM $table WHERE " . $table . "ID=" . $_GET['edit'];

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<form action="' . $thispage . '" method="POST" id="edit">';
            while($row = $result->fetch_assoc())
                for ($x = 0; $x < $rows; $x++){
                    echo '<label for="' . $rowName[$x] . '">' . $rowName[$x] . '</label>';
                    if($rowName[$x] == 'Img')
                        if(empty($row[$rowName[$x]]))
                            echo '<input type="file" name="' . $rowName[$x] . '">';
                        else
                            echo 
                            '<img width="50px" height="50px" src="data:image;base64,' . $row[$rowName[$x]] . '">';
                            //<input type="file" name="' . $rowName[$x] . '" value="' . $row[$rowName[$x]] . '">';
                    else
                        if($rowName[$x] == $table . 'ID')
                            echo '<input type="hidden" name="ID" value="' . $row[$rowName[$x]] . '">' . $row[$rowName[$x]] . '</input>';
                        else
                            echo '<input type="text" name="' . $rowName[$x] . '" value="' . $row[$rowName[$x]] . '" required>';
                    echo '<br>';
                }
            echo '<input type="submit" value="Remove" name="remove" style="background-color: red; color: white;">';
            echo '<input type="submit" value="Update">';
            echo '</form>';
        }
        else 
            echo "<h2>No data</h2>";
    }
    else 
        include 'table.php';
?>