<?php

include 'function.php';

if(isset($_POST['id_att'])){

    $id_att = $_POST['id_att'];

    $nomOrigine = $_FILES['pj']['name'];
    $elementsChemin = pathinfo($nomOrigine);
    $extensionFichier = $elementsChemin['extension'];
    // Copie dans le repertoire du script avec un nom
    // incluant l'heure a la seconde pres 
    $repertoireDestination = dirname(__FILE__)."/../Files/Upload/";
    $nomDestination = str_replace(" ","_",$nomOrigine);

    if (move_uploaded_file($_FILES["pj"]["tmp_name"],$repertoireDestination.$nomDestination)) {
        add_file($nomDestination,$id_att);
        header('Location: ../../index.php?page=3&id_att='.$id_att);
    } else {
        header('Location: ../../index.php?page=3&id_att='.$id_att);
    }
}