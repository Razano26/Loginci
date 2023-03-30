<?php

    session_start();

    include '../function.php';

    $date = "curdate()";

    $Description = str_replace("'","''",$_POST['Description']);

    $qui_quoi = str_replace("'","''",$_POST['qui_quoi']);

    if(isset($_POST['ppls'])){
        $ppls = 1;
    } else {
        $ppls = 0;
    }

    add_incident($date,$qui_quoi,$Description,$ppls,$_POST['result'],$_POST['detect'],$_POST['Type'],$_SESSION['ID']);

    header('Location: ../../index.php');
    exit();