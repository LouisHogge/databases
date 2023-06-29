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
                    <!-- Navigation + fonctions + base de donnée-->
                    <?php include_once('header.php'); ?>
                </header>
                    
                <h1>Projets</h1>

                <!-- Formulaire -->
                <?php include_once('projets_choix.php'); ?>

                <?php if(isset($option) && $option != "NAN"): ?>
                    <!-- query personnalisée de la page -->
                    <?php $query = "SELECT E.NO, E.NOM, F.NOM AS FONCTION, F.TAUX_HORAIRE, T.NOMBRE_HEURES, F.TAUX_HORAIRE * T.NOMBRE_HEURES AS COUT fROM TACHE T jOIN EMPLOYE AS E ON E.NO = T.EMPLOYE JOIN FONCTION AS F ON F.NOM = E.NOM_FONCTION WHERE T.PROJET = '".$option."'"; ?>

                    <h3><?php echo($option) ?></h3>
                    <?php afficherTable($mysqlClient, $query); ?>
                
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>
