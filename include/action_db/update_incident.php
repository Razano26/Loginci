<?php 

    include '../function.php';


    if(isset($_GET['ppls'])){
        $ppls = 1;
    } else {
        $ppls = 0;
    }

    if(isset($_GET['etat'])){
        $etat = 1;
    } else {
        $etat = 2;
    }

    if(isset($_GET['Wdo'])){

        if($_GET['Wdo'] == 'open'){
            open_incident($_GET['ID_attaque']);
            header('Location: ../../index.php?page=3&id_att='.$_GET['ID_attaque']);
            exit();
        }

        if($_GET['Wdo'] == 'close'){
            close_incident($_GET['ID_attaque'],$_GET['result']);
            header('Location: ../../index.php?page=3&id_att='.$_GET['ID_attaque']);
            exit();
        }


        if($_GET['Wdo'] == 'edit'){
            update_incident(str_replace("'","''",$_GET['qui/quoi']),$_GET['result_a'],str_replace("'","''",$_GET['description']),$ppls,$_GET['ID_attaque']);
            header('Location: ../../index.php?page=0');
            exit();
        }
    }