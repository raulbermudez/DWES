<?php
    
    session_start();
    session_unset();
    session_destroy();
    session_regenerate_id();
    header('location: ./ej2.php');