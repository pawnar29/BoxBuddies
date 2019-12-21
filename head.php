<?php 
    include 'session.cgi';
    include 'database.cgi'; 
?>
<head>
    <title>Box Buddies Clothing Store</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <link rel="icon" href="favicon.png" />
</head>
<header>
    <h1><a href=".">Box Buddies</a></h1>
</header>
<?php echo 'Hello ' . $_SESSION["user"];?>
<nav>
    <ul>
        <li><a href=".">Shop</a></li>
        <!--<li><a href="index.html">Shoes</a></li>-->
        <li style="float: right;"><a href="./cart.php"><img src="cart.png" alt="Shopping Cart"></a></li>
    </ul>
</nav>