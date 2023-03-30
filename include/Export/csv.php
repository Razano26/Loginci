<?php

    include '../function.php';

    $allincident = get_incident2();

    $tabincident = [];
    $tabincident[] = ['Date',
                        'Type',
                        'Type de détection',
                        'Qui Quoi',
                        'Résultat de l\'attaque',
                        'Description de l\'attaque',
                        'Prejudice pour la société',
                        'Actions prises',
                        'Opérateur',
                        'Etat'];

    

    foreach($allincident as $export_oneincident){

        if($export_oneincident['PPLS'] == 0){
            $ppls_export = 'Non';
        } else {
            $ppls_export = 'Oui';
        }
        

        if($export_oneincident['ID_Etat'] == 2){
            $etat_export = 'Ouvert';
        } else {
            $etat_export = 'Clôturer';
        }


        $tabincident[] = [$export_oneincident['Att_Date'],
                            get_type_by_id2($export_oneincident['ID_Type']), 
                            get_type_detect_by_id2($export_oneincident['ID_Detection']),
                            $export_oneincident['Qui_Quoi'],
                            get_result_by_id2($export_oneincident['ID_Results']),
                            $export_oneincident['Description'],
                            $ppls_export,
                            $export_oneincident['React'],
                            get_user_by_id2($export_oneincident['ID_Utilisateur'])['Prenom'],
                            $etat_export
                            ];
    }

    //$today = date("d/m/y");

    $Filename = "Export.csv";

    $fichier_csv = fopen($Filename, "w+");
    fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));

    foreach($tabincident as $ligne){
        fputcsv($fichier_csv, $ligne, ";");
    }

    fclose($fichier_csv);

    $header  = "Content-Disposition: attachment; ";
	$header .= "filename=$Filename\n";
	header($header);

    header("Content-Type: x/y\n"); 

    readfile($Filename);