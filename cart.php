<!DOCTYPE html>
<html>
    <?php include 'head.php';?>
    <body>
        <?php 
		print_r($_SESSION["cart"]);
		//echo $_SESSION["cart"];
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			if (empty($_POST["firstname"]) || empty($_POST["lastname"])) {
    				echo "Name is required";
  			} else {
    				$_SESSION["user"] = $_POST["firstname"] . ' ' . $_POST["lastname"];
				header("Refresh:0");
		 	}
		}
	?>
	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
		First name:<br>
  		<input type="text" name="firstname"><br>
		Last name:<br>
  		<input type="text" name="lastname"><br><br>
		<input type="submit">
	</form>
    </body>
</html>
