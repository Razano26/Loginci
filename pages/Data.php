<!-- Trie du tableau -->

<style>
    .tg-sort-header::-moz-selection{background:0 0}
    .tg-sort-header::selection{background:0 0}.tg-sort-header{cursor:pointer}
    .tg-sort-header:after{content:'';float:right;margin-top:7px;border-width:0 5px 5px;border-style:solid;
    border-color:#404040 transparent;visibility:hidden}
    .tg-sort-header:hover:after{visibility:visible}
    .tg-sort-asc:after,.tg-sort-asc:hover:after,.tg-sort-desc:after{visibility:visible;opacity:.4}
    .tg-sort-desc:after{border-bottom:none;border-width:5px 5px 0}
</style>
<script charset="utf-8">var TGSort=window.TGSort||function(n){"use strict";function r(n){return n?n.length:0}function t(n,t,e,o=0){for(e=r(n);o<e;++o)t(n[o],o)}function e(n){return n.split("").reverse().join("")}function o(n){var e=n[0];return t(n,function(n){for(;!n.startsWith(e);)e=e.substring(0,r(e)-1)}),r(e)}function u(n,r,e=[]){return t(n,function(n){r(n)&&e.push(n)}),e}var a=parseFloat;function i(n,r){return function(t){var e="";return t.replace(n,function(n,t,o){return e=t.replace(r,"")+"."+(o||"").substring(1)}),a(e)}}var s=i(/^(?:\s*)([+-]?(?:\d+)(?:,\d{3})*)(\.\d*)?$/g,/,/g),c=i(/^(?:\s*)([+-]?(?:\d+)(?:\.\d{3})*)(,\d*)?$/g,/\./g);function f(n){var t=a(n);return!isNaN(t)&&r(""+t)+1>=r(n)?t:NaN}function d(n){var e=[],o=n;return t([f,s,c],function(u){var a=[],i=[];t(n,function(n,r){r=u(n),a.push(r),r||i.push(n)}),r(i)<r(o)&&(o=i,e=a)}),r(u(o,function(n){return n==o[0]}))==r(o)?e:[]}function v(n){if("TABLE"==n.nodeName){for(var a=function(r){var e,o,u=[],a=[];return function n(r,e){e(r),t(r.childNodes,function(r){n(r,e)})}(n,function(n){"TR"==(o=n.nodeName)?(e=[],u.push(e),a.push(n)):"TD"!=o&&"TH"!=o||e.push(n)}),[u,a]}(),i=a[0],s=a[1],c=r(i),f=c>1&&r(i[0])<r(i[1])?1:0,v=f+1,p=i[f],h=r(p),l=[],g=[],N=[],m=v;m<c;++m){for(var T=0;T<h;++T){r(g)<h&&g.push([]);var C=i[m][T],L=C.textContent||C.innerText||"";g[T].push(L.trim())}N.push(m-v)}t(p,function(n,t){l[t]=0;var a=n.classList;a.add("tg-sort-header"),n.addEventListener("click",function(){var n=l[t];!function(){for(var n=0;n<h;++n){var r=p[n].classList;r.remove("tg-sort-asc"),r.remove("tg-sort-desc"),l[n]=0}}(),(n=1==n?-1:+!n)&&a.add(n>0?"tg-sort-asc":"tg-sort-desc"),l[t]=n;var i,f=g[t],m=function(r,t){return n*f[r].localeCompare(f[t])||n*(r-t)},T=function(n){var t=d(n);if(!r(t)){var u=o(n),a=o(n.map(e));t=d(n.map(function(n){return n.substring(u,r(n)-a)}))}return t}(f);(r(T)||r(T=r(u(i=f.map(Date.parse),isNaN))?[]:i))&&(m=function(r,t){var e=T[r],o=T[t],u=isNaN(e),a=isNaN(o);return u&&a?0:u?-n:a?n:e>o?n:e<o?-n:n*(r-t)});var C,L=N.slice();L.sort(m);for(var E=v;E<c;++E)(C=s[E].parentNode).removeChild(s[E]);for(E=v;E<c;++E)C.appendChild(s[v+L[E-v]])})})}}n.addEventListener("DOMContentLoaded",function(){for(var t=n.getElementsByClassName("tg"),e=0;e<r(t);++e)try{v(t[e])}catch(n){}})}(document)</script>

<div class="row">
    <div class="col-10">
        <span class="align-middle">
            Liste des incident <?php get_user_by_id($_SESSION['ID'])['Privilege'] ?>
        </span>
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" <?php if(get_user_by_id($_SESSION['ID'])['Privilege'] == 1){echo'data-bs-target="#Cree_un_trajet"';}else{echo'disabled';} ?>>
            Ajouter un incident
        </button>
        <a type="button" class="btn btn-outline-warning" <?php if(get_user_by_id($_SESSION['ID'])['Privilege'] == 1){echo'href="include/Export/csv.php"';}else{echo'disabled';} ?>>
            Export Data
        </a>
    </div>
</div>

<hr class="text-light">
        
<div class="row">
    <div class="col-1 h3">
        Filtres
    </div>
    <div class="mb-3 col-2">
        <label for="filtre_type" class="form-label">Type</label>
        <select class="form-select" id="filtre_type" onchange="filtre_type()">
            <option value="" selected>-- Selectionner --</option>
        <?php
            $alltype = get_type();
            foreach ($alltype as $onetype) {
                echo '<option value="'.$onetype['Name_Type'].'">'.$onetype['Name_Type'].'</option>';
            }
        ?>
        </select>
    </div>
    <div class="mb-3 col-2">
        <label for="filtre_type_d" class="form-label">Type de détection</label>
        <select class="form-select" id="filtre_type_d" onchange="filtre_type_d()">
            <option value="" selected>-- Selectionner --</option>
        <?php
            $alltype = get_type_detect();
            foreach ($alltype as $onetype) {
                echo '<option value="'.$onetype['Name_Detection'].'">'.$onetype['Name_Detection'].'</option>';
            }
        ?>
        </select>
    </div>
    <div class="mb-3 col-2">
        <label for="result" class="form-label">Résultat de l'attaque</label>
        <select class="form-select" id="result" name="result" onchange="filtre_result()">
            <option value="" selected>-- Selectionner --</option>
        <?php
            $alltype = get_result();
            foreach ($alltype as $onetype) {
                echo '<option value="'.$onetype['Name_Results'].'">'.$onetype['Name_Results'].'</option>';
            }
        ?>
        </select>
    </div>
    <div class="mb-3 col-2">
        <label for="qui/quoi" class="form-label">Qui/Quoi</label>
        <input type="text" class="form-control" id="qui/quoi" onkeyup="filtre_qui_quoi()">
    </div>
    <div class="mb-3 col-2">
        <label for="Description" class="form-label">Description de l'attaque</label>
        <input type="text" class="form-control" id="Description" onkeyup="filtre_description()">
    </div>
</div>

<hr class="text-light">

<table id='tg-EiApK' class="table table-dark table-striped tg small">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Type</th>
        <th scope="col">Type de détection</th>
        <th scope="col" style="width:20rem">Qui/Quoi</th>
        <th scope="col">Résultat de l'attaque</th>
        <th scope="col">Description de l'attaque</th>
        <th scope="col">PPLS</th>
        <th scope="col">Actions prises</th>
        <th scope="col">Opérateur</th>
        <th scope="col">Etat</th>
        <th scope="col">---</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $allincident = get_incident();

            foreach ($allincident as $oneincident) {
                if($oneincident['ID_Etat'] == 1){
                    // Affichage des element Cloturé 
                        echo '<tr>';
                            echo'<th scope="row">'.$oneincident['ID_attaque'].'</th>';
                            echo '<td>'.$oneincident['Att_Date'].'</td>';
                            echo '<td>'.get_type_by_id($oneincident['ID_Type']).'</td>';
                            echo '<td>'.get_type_detect_by_id($oneincident['ID_Detection']).'</td>';
                            echo '<td>'.$oneincident['Qui_Quoi'].'</td>';

                            switch ($oneincident['ID_Results']) {
                                case 1:
                                    echo '<td class="text-warning">'.get_result_by_id($oneincident['ID_Results']).'</td>';
                                    break;

                                case 2:
                                    echo '<td class="text-success">'.get_result_by_id($oneincident['ID_Results']).'</td>';
                                    break;

                                case 3:
                                    echo '<td class="text-success">'.get_result_by_id($oneincident['ID_Results']).'</td>';
                                    break;

                                case 4:
                                    echo '<td class="text-danger">'.get_result_by_id($oneincident['ID_Results']).'</td>'; 
                                    break;
                            }

                            echo '<td>
                                    <div class="card text-bg-secondary overflow-auto p-1" style="height: 4rem; width: 18rem;">
                                        <p class="card-text">'.$oneincident['Description'].'</p>
                                    </div>    
                                </td>';
                            echo '<td><input type="checkbox" class="form-check-input" id="ppls" name="ppls" disabled ';
                                if($oneincident['PPLS'] == 0){echo '>';} else {echo 'checked>';}
                            echo'</td>';
                            echo '<td>
                                    <div class="card text-bg-secondary overflow-auto p-1" style="height: 2rem; width: 2rem;">
                                        <p class="card-text">'.$oneincident['React'].'</p>
                                    </div>    
                                </td>';
                            echo '<td>';
                                echo get_user_by_id($oneincident['ID_Utilisateur'])['Prenom'];
                            echo '</td>';
                            echo '<td class="text-success">Cloturé</td>';
                            echo '<td class="text-center">';
                                echo '<a href="index.php?page=3&id_att='.$oneincident['ID_attaque'].'" class="btn btn-light btn-sm"><i class="bi bi-lightning-charge-fill"></i></a>';
                            echo '</td>';
                        echo '</tr>';
                } elseif($oneincident['ID_Etat'] == 2) {
                    // Affichage des element En cours
                    echo '<form action="include/action_db/update_incident.php" method="GET">';
                        echo'<input type="hidden" name="Wdo" value="edit">';
                        echo'<input type="hidden" name="ID_attaque" value="'.$oneincident['ID_attaque'].'">';
                        echo '<tr>';
                            echo '<th scope="row">'.$oneincident['ID_attaque'].'</th>';
                            echo '<td>'.$oneincident['Att_Date'].'</td>';
                            echo '<td>'.get_type_by_id($oneincident['ID_Type']).'</td>';
                            echo '<td>'.get_type_detect_by_id($oneincident['ID_Detection']).'</td>';
                            echo '<td><input type="text" class="form-control form-control-sm" id="qui/quoi" name="qui/quoi" value="'.$oneincident['Qui_Quoi'].'"></td>';
                            echo '<td>';
                                echo '<select name="result_a" id="result_a" class="form-select form-select-sm">';
                                $listeresult = get_result();
                                foreach($listeresult as $result){
                                    if($result['ID_Results'] == $oneincident['ID_Results']){
                                        echo '<option value='.$result['ID_Results'].' selected>'.$result['Name_Results'].'</option>';
                                    } else {
                                        echo '<option value='.$result['ID_Results'].'>'.$result['Name_Results'].'</option>';
                                    }
                                }
                                echo '</select>';
                            echo '</td>';
                            echo '<td>
                                    <div class="card text-bg-secondary overflow-auto p-1" style="height: 4rem; width: 18rem;">
                                        <p class="card-text">
                                            <textarea class="form-control form-control-sm" id="description" name="description" rows="2">'.$oneincident['Description'].'</textarea>
                                        </p>
                                    </div>
                                </td>';
                            echo '<td><input type="checkbox" class="form-check-input" id="ppls" name="ppls" ';
                                if($oneincident['PPLS'] == 0){echo '>';} else {echo 'checked>';}
                            echo'</td>';
                            echo '<td>
                                    <div class="card text-bg-secondary overflow-auto p-1" style="height: 2rem; width: 2rem;">
                                        <p class="card-text">
                                            '.$oneincident['React'].'
                                        </p>
                                    </div>
                                </td>';
                            echo '<td>';
                                echo get_user_by_id($oneincident['ID_Utilisateur'])['Prenom'];
                            echo '</td>';
                            echo '<td class="text-warning">Ouvert</td>';
                            echo '<td class="text-center">';
                                echo '<div class="btn-group">';
                                    echo '<a href="index.php?page=3&id_att='.$oneincident['ID_attaque'].'" class="btn btn-light btn-sm"><i class="bi bi-lightning-charge-fill"></i></a>';
                                    echo '<button type="submit" class="btn btn-light btn-sm"><i class="bi bi-arrow-repeat"></i></button>';
                                echo '</div>';
                            echo '</td>';
                        echo '</tr>';  
                    echo '</form>';
                }
                          
            }
        ?>
    </tbody>
</table>




<!-- Fenettre modal -->

    <div class="modal fade" id="Cree_un_trajet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Cree_un_trajet" aria-hidden="true">
        <div class="modal-dialog text-dark modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enregister un incident</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <form action="include/action_db/add_incident.php" method="POST">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="Type" class="form-label">Type</label>
                            <select class="form-select" id="Type" name="Type">
                                <option selected>-- Selectionner --</option>
                                <?php
                                    $alltype = get_type();
                                    foreach ($alltype as $onetype) {
                                        echo '<option value="'.$onetype['ID_Type'].'">'.$onetype['Name_Type'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="detect" class="form-label">Type de detection</label>
                            <select class="form-select" id="detect" name="detect">
                                <option selected>-- Selectionner --</option>
                                <?php
                                    $alltype = get_type_detect();
                                    foreach ($alltype as $onetype) {
                                        echo '<option value="'.$onetype['ID_Detection'].'">'.$onetype['Name_Detection'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="qui_quoi" class="form-label">Qui / Quoi</label>
                            <input type="text" class="form-control" id="qui_quoi" name="qui_quoi">
                        </div>
                        <div class="mb-3 col-6">
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
                    <div class="row">
                        <div class="mb-3">
                            <label for="Description" class="form-label">Description</label>
                            <textarea class="form-control" id="Description" name="Description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="ppls" name="ppls">
                            <label class="form-check-label" for="ppls">Préjudice pour la société</label>
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