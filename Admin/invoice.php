<!DOCTYPE html>
<html>
    <?php 
        $table = 'Invoice';
        $sqlAdd = " OR CustomerID=" . $_GET["search"];
        include 'head.php';
    ?>
    <body>
        <?php 
            include 'edit.php';
        ?>
    </body>
</html>
