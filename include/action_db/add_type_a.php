<?php

    include '../function.php';

    $valid = false;

    if(isset($_POST['name_type_a'])){
        if($_POST['name_type_a'] != ''){
            $valid = add_type_a($_POST['name_type_a']);
            header('Location: ../../index.php?page=2&add=TRUE&elmment='.$_POST['name_type_a']);
            exit();
        } else {
            header('Location: ../../index.php?page=2&add=FALSE');
            exit();
        }
    } else {

        header('Location: ../../index.php?page=2&add=FALSE');
        exit();
    }

