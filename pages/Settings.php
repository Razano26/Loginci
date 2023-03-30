<?php

    if(isset($_GET['add'])){
        if($_GET['add'] == 'TRUE'){
            echo'<script>
                    confirm("La modalité '.$_GET['elmment'].' a été ajouter")
                </script>'; 
        } else {
            echo'<script>
                    confirm("Il s\'avère qu\'il y a eu une erreur")
                </script>';
        }
    }

?>



<div class="text-light mt-3">
    Settings
    <div class="container-fluid m-3">

        Synchronisation avec l'AD : <a href="include/action_db/AD_synchro.php" class="btn btn-warning m-2">Start</a>

        <hr class="text-light">

        Modification des types de detection : <button type="button" class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#add_type_d_modal">Ajouter</button>
        <br/><br/>
        Modification des types d'incident : <button type="button" class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#add_type_a_modal">Ajouter</button>
        <br/><br/>
        Modification des résultat d'attaque : <button type="button" class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#add_result_a_modal">Ajouter</button>

        <hr class="text-light">

        <form action="include/action_db/update_anonymisation.php" method="GET">
            <div class="row g-3">
                <div class="col-auto">
                    Délai d'anonymisation des données (en jour) : 
                </div>
                <div class="col-auto">
                    <input class="form-control" type="number" name="data" id="data" value="<?php echo(get_dellai_anonymisation()); ?>">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-warning"><i class='bi bi-arrow-repeat'></i></button>
                </div>
            </div>
        </form>

    </div>
</div>



<!-- Modal -->
    <div class="modal fade" id="add_type_d_modal" tabindex="-1" aria-labelledby="add_type_d_modal" aria-hidden="true">
        <div class="modal-dialog text-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_type_d_Label">Ajouter un type de detection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="include/action_db/add_type_d.php" method="POST">
                    <label for="name_type_d" class="form-label">Veuiller entrer le nom de votre nouveau type de detection</label>
                    <input class="form-control" type="text" name="name_type_d" id="name_type_d">
                    <div id="name_type_d_help" class="form-text">L'action est définitive.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulé</button>
                    <input type="submit" value="Ajouter" class="btn btn-primary"></form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_type_a_modal" tabindex="-1" aria-labelledby="add_type_a_modal" aria-hidden="true">
        <div class="modal-dialog text-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_type_a_Label">Ajouter un type d'incident</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="include/action_db/add_type_a.php" method="POST">
                    <label for="name_type_a" class="form-label">Veuiller entrer le nom de votre nouveau type d'incident</label>
                    <input class="form-control" type="text" name="name_type_a" id="name_type_a">
                    <div id="name_type_a_help" class="form-text">L'action est définitive.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulé</button>
                    <input type="submit" value="Ajouter" class="btn btn-primary"></form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_result_a_modal" tabindex="-1" aria-labelledby="add_result_a_modal" aria-hidden="true">
        <div class="modal-dialog text-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_result_a_Label">Ajouter un résultat d'attaquet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="include/action_db/add_result_a.php" method="POST">
                    <label for="name_result_a" class="form-label">Veuiller entrer le nom de votre nouveau résultat d'attaque</label>
                    <input class="form-control" type="text" name="name_result_a" id="name_result_a">
                    <div id="name_result_a_help" class="form-text">L'action est définitive.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulé</button>
                    <input type="submit" value="Ajouter" class="btn btn-primary"></form>
                </div>
            </div>
        </div>
    </div>

    