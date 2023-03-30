function filtre_qui_quoi(){

    var filtre, cellule, text, tableau, ligne, i

    filtre = document.getElementById("qui/quoi").value.toUpperCase();
    tableau = document.getElementById("tg-EiApK");
    ligne = tableau.getElementsByTagName("tr");

    for(i=0; i < ligne.length; i++){
        cellule = ligne[i].getElementsByTagName("td")[3];

        if(cellule){
            text = cellule.innerText;

            if(text.toUpperCase().indexOf(filtre) > -1){
                ligne[i].style.display = "";
            } else {
                ligne[i].style.display = "none";
            }
        }
    }

}

function filtre_description(){

    var filtre, cellule, text, tableau, ligne, i

    filtre = document.getElementById("Description").value.toUpperCase();
    tableau = document.getElementById("tg-EiApK");
    ligne = tableau.getElementsByTagName("tr");

    for(i=0; i < ligne.length; i++){
        cellule = ligne[i].getElementsByTagName("td")[5];

        if(cellule){
            console.log(cellule.innerText)
            text = cellule.innerText;

            if(text.toUpperCase().indexOf(filtre) > -1){
                ligne[i].style.display = "";
            } else {
                ligne[i].style.display = "none";
            }
        }
    }

}

function filtre_type(){

    var filtre, cellule, text, tableau, ligne, i

    filtre = document.getElementById("filtre_type").value.toUpperCase();
    tableau = document.getElementById("tg-EiApK");
    ligne = tableau.getElementsByTagName("tr");

    for(i=0; i < ligne.length; i++){
        cellule = ligne[i].getElementsByTagName("td")[1];

        if(cellule){
            console.log(cellule.innerText)
            text = cellule.innerText;

            if(text.toUpperCase().indexOf(filtre) > -1){
                ligne[i].style.display = "";
            } else {
                ligne[i].style.display = "none";
            }
        }
    }

}

function filtre_type_d(){

    var filtre, cellule, text, tableau, ligne, i

    filtre = document.getElementById("filtre_type_d").value.toUpperCase();
    tableau = document.getElementById("tg-EiApK");
    ligne = tableau.getElementsByTagName("tr");

    for(i=0; i < ligne.length; i++){
        cellule = ligne[i].getElementsByTagName("td")[2];

        if(cellule){
            console.log(cellule.innerText)
            text = cellule.innerText;

            if(text.toUpperCase().indexOf(filtre) > -1){
                ligne[i].style.display = "";
            } else {
                ligne[i].style.display = "none";
            }
        }
    }

}

function filtre_result(){

    var filtre, cellule, text, tableau, ligne, i

    filtre = document.getElementById("result").value.toUpperCase();
    tableau = document.getElementById("tg-EiApK");
    ligne = tableau.getElementsByTagName("tr");

    for(i=0; i < ligne.length; i++){
        cellule = ligne[i].getElementsByTagName("td")[4];

        if(cellule){
            console.log(cellule.innerText)
            text = cellule.innerText;

            if(text.toUpperCase().indexOf(filtre) > -1){
                ligne[i].style.display = "";
            } else {
                ligne[i].style.display = "none";
            }
        }
    }

}