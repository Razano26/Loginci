<?php
    if(isset($_GET['id_att'])){
        $id_att = $_GET['id_att'];
    } else {
        header('Location: index.php');
        exit();
    }


    $incident = get_incident_by_id($id_att);
?>

<div class="row">
    <div class="col-11">
        <span class="align-middle">
           <h2>Incident #<?php echo($id_att); ?></h2>
        </span>
    </div>
</div>

<br><br>


<table id='tg-EiApK' class="table table-dark table-striped tg small">
    <thead>
        <tr>
        <th scope="col">Date</th>
        <th scope="col">Type</th>
        <th scope="col">Type de détection</th>
        <th scope="col">Qui/Quoi</th>
        <th scope="col">Résultat de l'attaque</th>
        <th scope="col">Description de l'attaque</th>
        <th scope="col">PPLS</th>
        <th scope="col">Actions prises</th>
        <th scope="col">Opérateur</th>
        <th scope="col">Etat</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo($incident['Att_Date']); ?></td>
            <td><?php echo(get_type_by_id($incident['ID_Type'])); ?></td>
            <td><?php echo(get_type_detect_by_id($incident['ID_Detection'])); ?></td>
            <td><?php echo($incident['Qui_Quoi']); ?></td>
            <td><?php echo(get_result_by_id($incident['ID_Results'])); ?></td>
            <?php
                switch ($incident['ID_Results']) {
                    case 1:
                        echo '<td class="text-warning">'.get_result_by_id($incident['ID_Results']).'</td>';
                        break;

                    case 2:
                        echo '<td class="text-success">'.get_result_by_id($incident['ID_Results']).'</td>';
                        break;

                    case 3:
                        echo '<td class="text-success">'.get_result_by_id($incident['ID_Results']).'</td>';
                        break;

                    case 4:
                        echo '<td class="text-danger">'.get_result_by_id($incident['ID_Results']).'</td>'; 
                        break;
                }
            ?>
            <td>
                <div class="card text-bg-secondary overflow-auto p-1" style="height: auto; width: auto; max-width: 30rem">
                    <p class="card-text"><?php echo($incident['Description']); ?></p>
                </div>
            </td>
            <td><input type="checkbox" class="form-check-input" id="ppls" name="ppls" disabled <?php if($incident['PPLS'] == 0){echo '>';} else {echo 'checked>';} ?></td>
            <td>
                <div class="card text-bg-secondary overflow-auto p-1" style="height: auto; width: 2rem;">
                    <p class="card-text"><?php echo($incident['React']); ?></p>
                </div> 
            </td>
            <td><?php echo(get_user_by_id($incident['ID_Utilisateur'])['Prenom']); ?></td>
            <td>
                <?php if($incident['ID_Etat'] == 1){ ?>
                        Cloturé
                    <?php } else { ?>
                        Non Cloturé
                    <?php } ?>
            </td>
        </tr>
    </tbody>
</table>


<br><br>
<hr>
<br><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-8" style="padding-right: 30px;">
            <div class="row">
                <?php if($incident['ID_Etat'] == 1){ ?>
                    <p class="text-start">
                        <h2>Actions menées</h2>
                    </p>
                    <div class="text-end">
                        <a type="button" class="btn btn-outline-warning" href="include/action_db/update_incident.php?Wdo=open&ID_attaque=<?php echo($id_att);?>">Rouvrir</a>
                <?php } else { ?>
                    <p class="text-start">
                        <h2>Actions menées</h2>
                    </p>
                    <div class="text-end">
                        <div class="btn-group">
                            <a type="button" class="btn btn-outline-warning" href="mailto:<?php echo($incident['Qui_Quoi']); ?>?subject=[Mail de Phishing]<?php echo($incident['Description']); ?> !&body=Bonjour, %0D%0A%0D%0A Le mail ci-dessous est potentiellement un phishing :%0D%0A%0D%0A Merci de me faire suivre le mail en pièce jointe pour vérification et le mettre à la poubelle. Merci aussi de revenir vers moi si le lien a été suivit ou une pièce jointe ouverte ? %0D%0A%0D%0A Cordialement,">
                                Notifier l'utilisateur
                            </a>
                            <a type="button" class="btn btn-outline-warning" href="include/action_db/add_action.php?id_att=<?php echo($id_att);?>&Description=Notification des utilisateurs">
                                <i class="bi bi-check2-square"></i>  
                            </a>
                        </div>
                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" <?php if(get_user_by_id($_SESSION['ID'])['Privilege'] == 1){echo'data-bs-target="#add_action"';}else{echo'disabled';} ?>>
                            Ajouter une action
                        </button>
                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" <?php if(get_user_by_id($_SESSION['ID'])['Privilege'] == 1){echo'data-bs-target="#close"';}else{echo'disabled';} ?>>
                            Cloturer
                        </button>
                <?php } ?>
                        <a type="button" class="btn btn-outline-warning" href="index.php?page=0">Terminer</a>
                </div>
            </div>
                
                <br>
                
            <?php 
                $actions = get_actions_by_id_att($id_att);
            ?>
        
            <div class="row">
                <table class="table table-dark table-striped tg">
                    <thead>
                        <th>Date-Heure</th>
                        <th>Opérateur</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($actions as $action){
                                echo("<tr>");
                                echo("<td>".$action['react_date']."</td>");
                                echo("<td>".get_user_by_id($action['ID_Utilisateur'])['Prenom']."</td>");
                                echo("<td>
                                <div class='card text-bg-secondary overflow-auto p-1' style='height: auto; width: auto; max-width: 45rem'>
                                <p class='card-text'>".$action['Reaction']."</p>
                                </div>
                                </td>");
                                echo("</tr>");
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php 
            $files = get_file_by_id_att($id_att);
        ?>

        <div class="col-4" style="border-left: solid #565A5D 1px;">
            <h2>Pièces jointes</h2>
            
            <div class="card text-bg-secondary overflow-auto p-4 m-1" style='height: auto; width: auto; min-height: 4em; max-height: 20em'>
                <!-- Ajouter les fichier -->
                <?php 
                    if(count($files) == 0){
                        echo("Il n'y a aucune pièce jointe pour cet incident.");
                    } else {
                        echo ('
                            <table class="table text-light table-sm">
                                <tbody">
                            ');
                                        foreach($files as $file){
                                            echo('
                                                <tr>
                                                    <td class="text-center" style="width: 1.5em; line-height: 40px;"><i class="bi bi-filetype-pdf"></i></td>
                                                    <td class="text-center" style="width: 1.5em; line-height: 40px;">-</td>
                                                    <td style="line-height: 40px;">'.$file['file_path'].'</td>
                                                    <td class="text-center" style="width: 8em; line-height: 40px;">
                                                        <div class="btn-group">
                                                            <a type="button" class="btn btn-outline-warning" href=Files/Upload/'.$file['file_path'].' download><i class="bi bi-file-earmark-arrow-down"></i></a>
                                                            <a type="button" class="btn btn-outline-danger" href="include/action_db/del_file.php?file='.$file['file_path'].'&id_att='.$id_att.'&id_file='.$file['ID_file'].'"><i class="bi bi-file-earmark-x"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            ');
                                        }

                        echo ('
                                </tbody>
                            </table>
                        ');
                    }
                ?>

            </div>

            <form enctype="multipart/form-data" action="/include/filesupload.php" method="POST">
                <input type="hidden" name="id_att" value="<?php echo($id_att);?>" />
                <div class="row g-2">
                    <div class="col-auto"><input class="form-control form-control-sm m-1" type="file" name="pj"></div>
                    <div class="col-auto"><input class="btn btn-sm btn-outline-warning m-1" type="submit" value="Upload"></div>              
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Fenettre modal -->

<div class="modal fade" id="add_action" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add_action" aria-hidden="true">
    <div class="modal-dialog text-dark modal-dialog-centered modal-mg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enregister une action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            <form action="include/action_db/add_action.php" method="GET">
                <input type="hidden" name="id_att" value="<?php echo($id_att);?>">
                <div class="row">
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control" id="Description" name="Description" rows="4"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="close" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="close" aria-hidden="true">
    <div class="modal-dialog text-dark modal-dialog-centered modal-mg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cloturer l'incident</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            <form action="include/action_db/update_incident.php" method="GET">
                <div class="row">
                    <div class="mb-3">
                        <input type="hidden" name="Wdo" value="close">
                        <input type="hidden" name="ID_attaque" value="<?php echo($id_att);?>">
                        <label for="result" class="form-label">Résultat de l'attaque</label>
                            <select class="form-select" id="result" name="result">
                                <option selected>-- Selectionner --</option>
                                <?php
                                    $alltype = get_result();
                                    foreach ($alltype as $onetype) {
                                        echo '<option value="'.$onetype['ID_Results'].'">'.$onetype['Name_Results'].'</option>';
                                    }
                                ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>

        </div>
    </div>
</div>