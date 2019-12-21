<?php
    // Start the session
    session_start();

    $now = time();
    if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
        // this session has worn out its welcome; kill it and start a brand new one
        session_unset();
        session_destroy();
        session_start();
    }

    // either new or old, it should live at most for another hour
    $_SESSION['discard_after'] = $now + 300;

    // Set session variables
	if(!isset($_SESSION["user"])){
		$_SESSION["user"] = "Guest";
	}
	if(!isset($_SESSION["cart"])){
		$_SESSION["cart"] = array("Empty");
	}    
?>
