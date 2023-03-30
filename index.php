<?php
    session_start();

    if(isset($_GET['logout'])){
        if($_GET['logout'] == 1){
            session_destroy();
            header('Location: index.php');
            exit();
        }
    }

    include 'include/function.php';

    if(get_nb_user() == 1){
        header('Location: include/action_db/AD_synchro.php');
        exit();
    }

    if(isset($_POST['user']) and isset($_POST['pass'])){
        $result = get_user($_POST['user']);

        if($_POST['pass'] != ''){

            if($result != false){
                $server = ""; //LDAP server
                $ds = ldap_connect($server);
                $r = ldap_bind($ds, $_POST['user']."@ad.lan" , $_POST['pass']);
                
                if($r){
                    $_SESSION['Valide'] = 1;
                    $_SESSION['ID'] = $result['ID_Utilisateur'];
                    // echo 'Valid';
                } else {
                    $_SESSION['Valide'] = 0;
                    //echo 'Pas valid';
                }
            }
        } else {
            $_SESSION['Valide'] = 0;
            //echo 'Pas valid';
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loginci</title>
    <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
    <link rel="stylesheet" href="include/CSS/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="include/JS/Filtre.js"></script>
</head>
<body class="bg-dark">


    
        <?php
            if (!isset($_SESSION['Valide'])) { 

                echo('<div>') ;

                    include 'pages/login.php';

            } else {

                if($_SESSION['Valide'] == 0){

                    echo('<div>') ;

                    include 'pages/login.php';

                }

                if($_SESSION['Valide'] == 1){
                
                echo('<div class="container-fluid bg-dark">') ;
                
                    // Site pour utilisateur
                
                include 'pages/header.php';

                echo '<hr class="text-light">';

                include 'include/pages.php';

                }
            }
        ?>
    </div>
</body>