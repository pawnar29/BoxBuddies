<?php
    session_unset();
    Session_start();
    Session_destroy();
    header('Location: .');
?>