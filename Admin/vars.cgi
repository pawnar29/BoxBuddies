<?php
    include 'database.cgi';

    $thisPage = $_SERVER["PHP_SELF"];
    $rows = 0;
    $rowName = array();

    $sql = "SELECT COUNT(COLUMN_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        while($row = $result->fetch_assoc())
            $rows = $row['COUNT(COLUMN_NAME)'];

    $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        while($row = $result->fetch_assoc())
            array_push($rowName, $row['COLUMN_NAME']);
?>