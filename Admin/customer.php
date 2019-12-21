<!DOCTYPE html>
<html>
    <?php
        $table = 'Customer';
        $sqlAdd = " OR " . $table . "Name LIKE '%" . $_GET["search"] . "%'";
        include 'head.php';
    ?>
    <body>
        <?php 
            include 'edit.php';
        ?>
    </body>
</html>
