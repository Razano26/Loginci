<?php

    include '../function.php';

    $valid = false;

    if(isset($_POST['name_type_d'])){
        if($_POST['name_type_d'] != ''){
            $valid = add_type_d($_POST['name_type_d']);
            header('Location: ../../index.php?page=2&add=TRUE&elmment='.$_POST['name_type_d']);
            exit();
        } else {
            header('Location: ../../index.php?page=2&add=FALSE');
            exit();
        }
    } else {

        header('Location: ../../index.php?page=2&add=FALSE');
        exit();
    }


    