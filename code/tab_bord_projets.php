<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Système de gestion de projet</title>
    </head>

    <body>
        <div id="bloc_page">
            <div id="lisere"></div>

            <div id="bloc_content">

                <header>
                    <!-- Navigation -->
                    <?php include_once('header.php'); ?>
                </header>
                    
                <h1>Tableau de bord des projets</h1>

                <?php 
                    $query = 'SELECT P.NOM, P.DATE_DEBUT,
                    if(ISNULL(P.BUDGET),"en attente", if(ISNULL(P.DATE_FIN)," en cours de route", "terminé")) as STATUS, P.BUDGET, if(ISNULL(P.DATE_FIN),SUM(IFNULL(F.TAUX_HORAIRE* T.NOMBRE_HEURES, 0)), P.COUT) as COUT, SUM(IFNULL(T.NOMBRE_HEURES, 0)) AS TOTALE_HEURES FROM PROJET P JOIN TACHE T on T.PROJET = P.NOM JOIN EMPLOYE E on E.NO = T.EMPLOYE JOIN FONCTION F on F.NOM = E.NOM_FONCTION GROUP BY P.NOM ORDER BY DATE_DEBUT, NOM';
                    afficherTable($mysqlClient, $query);
                ?>
                
            </div>
        </div>
    </body>
</html>