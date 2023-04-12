<?php 
    require_once 'config/connet.php';
    session_destroy();

    header("location: admin.php?admin=login");
?>