<?php    
    echo 
        '<form action="' . $thispage . '" method="POST">
            <table class="AdminTable">
                <tbody>';
                
    echo '<tr>';
    for ($x = 0; $x < $rows; $x++)
        if ($rowName[$x] != 'Passwd') 
            echo '<th>' . $rowName[$x] . '</th>';
    echo '<th>Options</th>';
    echo '</tr>';
    
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["search"])) 
        $sql = "SELECT * FROM $table WHERE " . $table . "ID=" . $_GET["search"] . $sqlAdd;
    else 
        $sql = "SELECT * FROM $table";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            for ($x = 0; $x < $rows; $x++)
                if($rowName[$x] == 'Cost')
                    echo '<td>' . number_format($row[$rowName[$x]], 2) . '</td>';
                elseif($rowName[$x] == 'Passwd')
                    echo '';
                elseif($rowName[$x] == 'Img' && !empty($row[$rowName[$x]]))
                    echo '<td><img width="50px" height="50px" src="data:image;base64,' . $row[$rowName[$x]] . '"></td>';
                else
                    echo '<td>' . $row[$rowName[$x]] . '</td>';
            echo '<td><a href="' . $_SERVER["PHP_SELF"] . '?edit=' . $row[$rowName[0]] . '">Edit</a></td>';
            echo '</tr>';
        }
    else 
        echo "<h2>No data</h2>";

    if (empty($_GET["search"])){
        echo '<tr>';
        for ($x = 0; $x < $rows; $x++)
            switch ($x) {
                case 0:
                    echo '<td>New Row</td>';
                break;
                case $rowName[$x]=='PBrand':
                    echo 
                        '<td>
                            <input list="browsers" name="browser" size="10">
                            <datalist id="browsers">
                                <option value="Internet Explorer">
                                <option value="Firefox">
                                <option value="Chrome">
                                <option value="Opera">
                                <option value="Safari">
                            </datalist>
                        </td>';
                break;
                case $rowName[$x]=='Img':
                    echo '<td><input type="file" name="file" size="3"></td>';
                break;
                case $rowName[$x]=='Passwd':
                    echo '';
                break;
                default:
                    echo '<td contenteditable="true"></td>';
            }
        echo '
                <td><input type="submit" value="Save"></td> 
            </tr>
            </tbody>';
    }
    echo 
            '</table>
        </form>
        <form action="' . $thisPage . '" method="GET">
            <label for="search">Search: </label>
            <input type="text" name="search">
            <input type="submit" value="Search">
        </form>';
?>
    