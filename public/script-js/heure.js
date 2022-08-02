function date_time(id) {//Fonction qui affiche l'heure
    date = new Date;//On crée une nouvelle date
    year = date.getFullYear();//On récupère l'année
    month = date.getMonth();//On récupère le mois
    months = new Array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');//On crée un tableau contenant les mois
    d = date.getDate();//On récupère le jour
    day = date.getDay();//On récupère le jour de la semaine
    days = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');//On crée un tableau contenant les jours
    h = date.getHours();//On récupère l'heure
    if (h < 10) {//Si l'heure est inférieur à 10
            h = "0" + h;//On ajoute un 0 devant
    }
    m = date.getMinutes();//On récupère les minutes
    if (m < 10) {//Si les minutes sont inférieur à 10
            m = "0" + m;//On ajoute un 0 devant
    }//On affiche l'heure
    s = date.getSeconds();//On récupère les secondes
    if (s < 10) {//Si les secondes sont inférieur à 10
            s = "0" + s;//On ajoute un 0 devant
    }//
    resultat = 'Nous sommes le ' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' il est ' + h + ':' + m + ':' + s;//On affiche le résultat
    document.getElementById(id).innerHTML = resultat;//On affiche le résultat dans la div id
    setTimeout('date_time("' + id + '");', '1000');//On relance la fonction toute les secondes
    return true;//On retourne vrai
}
