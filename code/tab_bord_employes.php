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
                    
                <h1>Tableau de bord des employés</h1>

                <?php include_once('tab_bord_employes_choix.php'); ?>

                <?php if(isset($colonne) && $colonne != "NAN" && isset($direction)): ?>

                    <!-- ordre croissant -->
                    <?php if($direction == "croissant"): ?>

                        <?php $query = "SELECT T.EMPLOYE AS NO_EMPLOYE, E.NOM AS NOM_EMPLOYE, SUM(IFNULL(T.NOMBRE_HEURES, 0)) AS TOTAL_HEURES, ROUND(AVG(IFNULL(T.NOMBRE_HEURES, 0))) AS MOYENNE_HEURES, MIN(IFNULL(T.NOMBRE_HEURES, 0)) AS MIN_HEURES, MAX(IFNULL(T.NOMBRE_HEURES, 0)) AS MAX_HEURES, COUNT(*) as NB_PROJETS from TACHE T JOIN EMPLOYE E on E.NO = T.EMPLOYE GROUP BY T.EMPLOYE ORDER BY $colonne" ?>
                        <?php afficherTable($mysqlClient, $query); ?>

                    <!-- ordre décroissant -->
                    <?php else: ?>

                        <?php $query = "SELECT T.EMPLOYE AS NO_EMPLOYE, E.NOM AS NOM_EMPLOYE, SUM(IFNULL(T.NOMBRE_HEURES, 0)) AS TOTAL_HEURES, ROUND(AVG(IFNULL(T.NOMBRE_HEURES, 0))) AS MOYENNE_HEURES, MIN(IFNULL(T.NOMBRE_HEURES, 0)) AS MIN_HEURES, MAX(IFNULL(T.NOMBRE_HEURES, 0)) AS MAX_HEURES, COUNT(*) as NB_PROJETS from TACHE T JOIN EMPLOYE E on E.NO = T.EMPLOYE GROUP BY T.EMPLOYE ORDER BY $colonne DESC" ?>
                        <?php afficherTable($mysqlClient, $query); ?>

                    <?php endif; ?>

                <!-- affichage par défaut -->
                <?php else: ?>

                    <?php $query = "SELECT T.EMPLOYE AS NO_EMPLOYE, E.NOM AS NOM_EMPLOYE, SUM(IFNULL(T.NOMBRE_HEURES, 0)) AS TOTAL_HEURES, ROUND(AVG(IFNULL(T.NOMBRE_HEURES, 0))) AS MOYENNE_HEURES, MIN(IFNULL(T.NOMBRE_HEURES, 0)) AS MIN_HEURES, MAX(IFNULL(T.NOMBRE_HEURES, 0)) AS MAX_HEURES, COUNT(*) as NB_PROJETS from TACHE T JOIN EMPLOYE E on E.NO = T.EMPLOYE GROUP BY T.EMPLOYE ORDER BY NO_EMPLOYE" ?>
                    <?php afficherTable($mysqlClient, $query); ?>

                <?php endif; ?>
                
            </div>
        </div>
    </body>
</html>
