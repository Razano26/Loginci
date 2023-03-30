<?php

    include '../function.php';

    $id_att = $_GET['id_att'];
    $id_file = $_GET['id_file'];
    $file = $_GET['file'];

    del_file($id_file);

    $fichier = '../../Files/Upload/'.$file;

    unlink($fichier);

    header('Location: ../../index.php?page=3&id_att='.$id_att);