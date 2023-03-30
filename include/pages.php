<div class="container-fluid p-4 text-light">
    <?php
        if (!empty($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 0;
        }

        switch ($page) {
            /*
            * Personnes
            */
            case 0:
                // inclure ici la page accueil photo
                include('pages/Data.php');
                break;

            case 1:
                // inclure ici la page insertion nouvelle personne
                include("pages/Stat.php");
                break;

            case 2:
                // inclure ici la page liste des personnes
                include('pages/Settings.php');
                break;

            case 3:
                // inclure ici la page liste des personnes
                include('pages/incident.php');
                break;

            default:
                include('pages/Data.php');
        }
        
    ?>
</div>