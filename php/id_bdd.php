<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try
    {
        $db = mysqli_connect('localhost', 'root', 'root', 'gbaf', 3307);
        mysqli_set_charset($db, 'utf8mb4');
    }
    catch (Exception $e)
    {
            // die('Erreur : ' . $e->getMessage());
    }

?>