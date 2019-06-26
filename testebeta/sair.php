<?php
    session_start();
    session_destroy();
    $home_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';
    header('Location: ' . $home_url);
?>