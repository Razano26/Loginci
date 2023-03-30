<?php 

    include "../function.php";

    $server = "";
    $user = "";
    $psw = "";
    $dn = "";
    $search = "";



    $ds=ldap_connect($server)
        or die("Cette LDAP-URI n'a pas été analysable");

    $r=ldap_bind($ds, $user , $psw)
        or die("User pas bon");

    $sr=ldap_search($ds, $dn, $search);
    $data = ldap_get_entries($ds, $sr) or die();
    
    for ($i=0; $i<$data["count"]; $i++) {
        if (isset($data[$i]["givenname"][0]) & isset($data[$i]["sn"][0]) & isset($data[$i]["mail"][0]) & isset($data[$i]["samaccountname"][0])){
        
            if (isset($data[$i]["memberof"][0])){
                if(in_array('',$data[$i]["memberof"])){
                    $admin = 1;} else {$admin = 0;}
                } else {$admin = 0;}
            
            synchroAD(utf8_encode($data[$i]["samaccountname"][0]),utf8_encode($data[$i]["sn"][0]),utf8_encode($data[$i]["givenname"][0]),utf8_encode($data[$i]["mail"][0]),$admin);
        }
    }

    ldap_close($ds);

    header('Location: ../../index.php');
    exit();
