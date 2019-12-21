<?php 
    include 'session.cgi';
    include 'vars.cgi';
    if ($_SESSION["Admin"] == "" &&  $_SESSION["AdminPass"] == "")
        header('Location: .');
?>
<head>
    <title>Box Buddies Admin</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />  
</head>
<header>
    <h1><a href=".">Box Buddies Admin</a></h1>
</header>
<?php echo 'Hello ' . $_SESSION["Admin"];?>
<nav>
    <ul>
        <li><a href=".">Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="customer.php">Customers</a></li>
        <li><a href="invoice.php">Invoices</a></li>
        <!--<li><a href=".">Products</a></li>-->
        <li style="float: right;"><a href="./logout.php">Logout</a></li>
    </ul>
</nav>