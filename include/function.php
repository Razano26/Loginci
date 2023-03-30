<?php

// Fonction d'extract
    function get_etat(){

        include 'include/pdo_connect.php';

        $sqlQuery = "select 
                        ID_Etat,
                        Name_Etat
                    From 
                        Etat";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_etat_by_id($id){

        include 'include/pdo_connect.php';

        $sqlQuery = "select 
                        ID_Etat,
                        Name_Etat
                    From 
                        Etat
                    Where 
                        ID_Etat = ".$id;

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['Name_Etat']);
    }
    function get_type(){

        include 'include/pdo_connect.php';

        $sqlQuery = "select 
                        ID_Type,
                        Name_Type
                    From 
                        Type";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_type_by_id($id){

        include 'include/pdo_connect.php';

        $sqlQuery = "select 
                        ID_Type,
                        Name_Type
                    From 
                        Type
                    where
                        ID_Type = ".$id;

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['Name_Type']);
    }
    function get_type_detect(){

        include 'include/pdo_connect.php';

        $sqlQuery = "select 
                        ID_Detection,
                        Name_Detection
                    From 
                        Detection";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_type_detect_by_id($id){

        include 'include/pdo_connect.php';

        $sqlQuery = "select 
                        ID_Detection,
                        Name_Detection
                    From 
                        Detection
                    Where
                        ID_Detection = ".$id;

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['Name_Detection']);
    }
    function get_result(){

        include 'include/pdo_connect.php';

        $sqlQuery = "select 
                        ID_Results,
                        Name_Results
                    From 
                        Results";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_result_by_id($id){

        include 'include/pdo_connect.php';

        $sqlQuery = "select 
                        ID_Results,
                        Name_Results
                    From 
                        Results
                    Where ID_Results = ".$id;

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['Name_Results']);
    }
    function get_actions_by_id_att($ID){

        include 'include/pdo_connect.php';

        $sqlQuery = "SELECT 
                        *
                    from 
                        React
                    WHERE
                        ID_attaque = ".$ID."
                    ORDER BY 
                        react_date DESC ";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_file_by_id_att($ID){

        include 'include/pdo_connect.php';

        $sqlQuery = "SELECT 
                        *
                    from 
                        Files
                    WHERE
                        ID_attaque = ".$ID;

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_incident(){

        include 'include/pdo_connect.php';

        $sqlQuery = "SELECT 
                        att.ID_attaque,
                        att.Att_Date,
                        att.Description,
                        att.PPLS,
                        count(rc.ID_react) as React,
                        att.ID_Results,
                        att.ID_Etat,
                        att.ID_Detection,
                        att.ID_Utilisateur,
                        att.ID_Type,
                        CASE 
                            WHEN DATEDIFF(att.Att_Date,NOW())>-(SELECT Data_Value FROM Value_ref WHERE Name_Value='Dellai_anno') THEN att.Qui_Quoi
                            ELSE 'Anonymised'
                        END as Qui_Quoi
                    from 
                        Attaque as att
                            LEFT JOIN React as rc
                            ON rc.ID_attaque = att.ID_attaque
                    GROUP BY
                        ID_attaque
                    ORDER BY 
                        ID_attaque DESC ";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_incident_by_id($ID){

        include 'include/pdo_connect.php';

        $sqlQuery = "SELECT 
                        att.ID_attaque,
                        att.Att_Date,
                        att.Description,
                        att.PPLS,
                        count(rc.ID_react) as React,
                        att.ID_Results,
                        att.ID_Etat,
                        att.ID_Detection,
                        att.ID_Utilisateur,
                        att.ID_Type,
                        CASE 
                            WHEN DATEDIFF(att.Att_Date,NOW())>-(SELECT Data_Value FROM Value_ref WHERE Name_Value='Dellai_anno') THEN att.Qui_Quoi
                            ELSE 'Anonymised'
                        END as Qui_Quoi
                    from 
                        Attaque as att
                            LEFT JOIN React as rc
                            ON rc.ID_attaque = att.ID_attaque
                    WHERE
                        att.ID_attaque = ".$ID."
                    GROUP BY
                        ID_attaque
                    ORDER BY 
                        ID_attaque DESC ";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes);
    }
    function get_list_annee(){

        include 'include/pdo_connect.php';

        $sqlQuery = "SELECT year(Att_Date)as list from Attaque group by list";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_nb_user(){

        include 'include/pdo_connect.php';

        $sqlQuery = 'Select
                        count(Users.ID_Utilisateur) as nb
                    From 
                        Users';
                        
        //echo $sqlQuery;

        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['nb']);
    }
    function get_user($Name_Account){

        include 'include/pdo_connect.php';

        $sqlQuery = 'SELECT * From Users Where Name_Account = "'.$Name_Account.'"';
                        
        //echo $sqlQuery;

        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return $recipes;
    }
    function get_user_by_id($id){

        include 'include/pdo_connect.php';

        $sqlQuery = 'SELECT * From Users Where ID_Utilisateur = "'.$id.'"';
                        
        //echo $sqlQuery;

        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return $recipes;
    }
    function get_dellai_anonymisation(){

        include 'include/pdo_connect.php';

        $sqlQuery = "SELECT Data_Value FROM Value_ref WHERE Name_Value='Dellai_anno'";
                        
        //echo $sqlQuery;

        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['Data_Value']);
    }
    

// Fonction d'insertion
    function add_incident($att,$qui,$desc,$ppls,$result,$detec,$type,$user){

        include 'pdo_connect.php';

        $sqlQuery = "INSERT INTO Attaque (
                        Att_date,
                        Qui_Quoi,
                        Description,
                        PPLS,
                        ID_Results,
                        ID_Etat,
                        ID_Detection,
                        ID_Utilisateur,
                        ID_Type
                    )
                    VALUES (
                        ".$att.",
                        '".$qui."',
                        '".$desc."',
                        ".$ppls.",
                        ".$result.",
                        2,
                        ".$detec.",
                        ".$user.",
                        ".$type."
                        )
                    ;";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }

    function add_type_d($name){
        include 'pdo_connect.php';

        $sqlQuery = "INSERT INTO Detection (
                        Name_Detection
                    )
                    VALUES (
                        '".$name."'
                        )
                    ;";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }

    function add_action($ID_att,$ID_user,$React){
        include 'pdo_connect.php';

        $sqlQuery = "INSERT INTO React (
                        ID_attaque,
                        ID_Utilisateur,
                        Reaction,
                        react_date
                    )
                    VALUES (
                        ".$ID_att.",
                        ".$ID_user.",
                        '".$React."',
                        NOW()
                        )
                    ;";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }

    function add_type_a($name){
        include 'pdo_connect.php';

        $sqlQuery = "INSERT INTO Type (
                        Name_Type
                    )
                    VALUES (
                        '".$name."'
                        )
                    ;";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }
    function add_result_a($name){
        include 'pdo_connect.php';

        $sqlQuery = "INSERT INTO Results (
                        Name_Results
                    )
                    VALUES (
                        '".$name."'
                        )
                    ;";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }
    function add_file($name,$id_att){
        include 'pdo_connect.php';

        $sqlQuery = "INSERT INTO Files (
                        ID_attaque,
                        file_path
                    )
                    VALUES (
                        ".$id_att.",
                        '".$name."'
                        )
                    ;";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }

// Function d'update
    function open_incident($id){
        include 'pdo_connect.php';

        $sqlQuery = "UPDATE Attaque SET ID_Etat = 2 WHERE ID_attaque = ".$id.";";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }
    function close_incident($id,$results){
        include 'pdo_connect.php';

        $sqlQuery = "UPDATE Attaque SET ID_Etat = 1,ID_Results = '".$results."'  WHERE ID_attaque = ".$id.";";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }

    function update_anonymisation($value){
        include 'pdo_connect.php';

        $sqlQuery = "UPDATE Value_ref SET Data_Value = ".$value." WHERE Name_Value = 'Dellai_anno';";

        //echo $sqlQuery;
                        
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }

    function update_incident($qui,$result,$desc,$ppls,$id){
        include 'pdo_connect.php';

        $sqlQuery = "UPDATE 
                        Attaque 
                    SET 
                        Qui_Quoi = '".$qui."',
                        ID_Results = ".$result.",
                        Description = '".$desc."',
                        PPLS = ".$ppls."

                    WHERE
                        ID_attaque = ".$id.";";

        echo $sqlQuery;       
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }
    
    function del_file($id){
        include '../pdo_connect.php';

        $sqlQuery = "DELETE FROM Files WHERE ID_file =".$id;

        echo $sqlQuery;
        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
    }

// Fonction des graph
    function graph_type($date){

        include 'include/pdo_connect.php';

        $sqlQuery = "select
                        Type.Name_type,
                        count(att.ID_attaque) as nb                     
                    from 
                        Attaque as att
                            join Type
                                on att.ID_Type = Type.ID_type
                    WHERE year(att.Att_Date) = ".$date."
                    Group by Name_type
                    Order by nb DESC";

        //echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }

    function graph_type_detect($date){

        include 'include/pdo_connect.php';

        $sqlQuery = "select
                        Detection.Name_Detection,
                        count(att.ID_attaque) as nb                     
                    from 
                        Attaque as att
                            join Detection
                                on att.ID_Detection = Detection.ID_Detection
                    WHERE year(att.Att_Date) = ".$date."
                    Group by Name_Detection
                    Order by nb DESC";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }

    function graph_result($date){

        include 'include/pdo_connect.php';

        $sqlQuery = "select
                        Results.Name_Results,
                        count(att.ID_attaque) as nb                     
                    from 
                        Attaque as att
                            join Results
                                on att.ID_Results = Results.ID_Results
                    WHERE year(att.Att_Date) = ".$date."
                    Group by Name_Results
                    Order by nb DESC";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }

    function graph_type_p($date){

        include '../pdo_connect.php';

        $sqlQuery = "select
                        Type.Name_type,
                        count(att.ID_attaque) as nb                     
                    from 
                        Attaque as att
                            join Type
                                on att.ID_Type = Type.ID_type
                    WHERE year(att.Att_Date) = ".$date."
                    Group by Name_type
                    Order by nb DESC";

        //echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }

    function graph_type_detect_p($date){

        include '../pdo_connect.php';

        $sqlQuery = "select
                        Detection.Name_Detection,
                        count(att.ID_attaque) as nb                     
                    from 
                        Attaque as att
                            join Detection
                                on att.ID_Detection = Detection.ID_Detection
                    WHERE year(att.Att_Date) = ".$date."
                    Group by Name_Detection
                    Order by nb DESC";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }

    function graph_result_p($date){

        include '../pdo_connect.php';

        $sqlQuery = "select
                        Results.Name_Results,
                        count(att.ID_attaque) as nb                     
                    from 
                        Attaque as att
                            join Results
                                on att.ID_Results = Results.ID_Results
                    WHERE year(att.Att_Date) = ".$date."
                    Group by Name_Results
                    Order by nb DESC";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }

// synchroAD
    function synchroAD($userid,$nom,$prenom,$email,$Privilege){

        include 'pdo_connect.php';

        $sqlQuery = "INSERT INTO Users (
                        Name_Account,
                        Nom,
                        Prenom,
                        Email,
                        Privilege
                        )
                    VALUES (
                        '".$userid."',
                        '".$nom."',
                        '".$prenom."',
                        '".$email."',
                        '".$Privilege."')";

        //echo $sqlQuery."</br></br>";
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute() or die(print_r($recipesStatement->errorInfo(), TRUE));
    }
// Function export
    function get_incident2(){

        include '../pdo_connect.php';

        $sqlQuery = "SELECT 
                        att.ID_attaque,
                        att.Att_Date,
                        att.Description,
                        att.PPLS,
                        count(rc.ID_react) as React,
                        att.ID_Results,
                        att.ID_Etat,
                        att.ID_Detection,
                        att.ID_Utilisateur,
                        att.ID_Type,
                        CASE 
                            WHEN DATEDIFF(att.Att_Date,NOW())>-(SELECT Data_Value FROM Value_ref WHERE Name_Value='Dellai_anno') THEN att.Qui_Quoi
                            ELSE 'Anonymised'
                        END as Qui_Quoi
                    from 
                        Attaque as att
                            LEFT JOIN React as rc
                            ON rc.ID_attaque = att.ID_attaque
                    GROUP BY
                        ID_attaque
                    ORDER BY 
                        ID_attaque DESC ";

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();

        return($recipes);
    }
    function get_type_by_id2($id){

        include '../pdo_connect.php';

        $sqlQuery = "select 
                        ID_Type,
                        Name_Type
                    From 
                        Type
                    where
                        ID_Type = ".$id;

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['Name_Type']);
    }
    function get_type_detect_by_id2($id){

        include '../pdo_connect.php';

        $sqlQuery = "select 
                        ID_Detection,
                        Name_Detection
                    From 
                        Detection
                    Where
                        ID_Detection = ".$id;

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['Name_Detection']);
    }
    function get_result_by_id2($id){

        include '../pdo_connect.php';

        $sqlQuery = "select 
                        ID_Results,
                        Name_Results
                    From 
                        Results
                    Where ID_Results = ".$id;

        // echo $sqlQuery;
                        
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return($recipes['Name_Results']);
    }
    function get_user_by_id2($id){

        include '../pdo_connect.php';

        $sqlQuery = 'SELECT * From Users Where ID_Utilisateur = "'.$id.'"';
                        
        //echo $sqlQuery;

        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        return $recipes;
    }