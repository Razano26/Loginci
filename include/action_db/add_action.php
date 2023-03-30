<?php

    session_start();

    include '../function.php';

    $Description = str_replace("'","''",$_GET['Description']);

    add_action($_GET['id_att'],$_SESSION['ID'],$Description);

    header('Location: ../../index.php?page=3&id_att='.$_GET['id_att']);
    exit();