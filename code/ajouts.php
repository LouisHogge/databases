<!-- page permettant d'ajouter des fonctions, employés et projets -->

<?php 
    $retour = reset($_POST);
?>

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
                    
                <h1>Ajouts</h1>

                <!-- Formulaire -->
                <?php include_once('ajouts_choix.php'); ?>

                <?php if(isset($option) && $option != "NAN"): ?>

                    <h3><?php echo($option) ?></h3>

                    <?php include_once('ajouter.php'); ?>

                    <!-- query personnalisée de la page -->
                    <?php $query = "SELECT * FROM ".$option." "; ?>
                    <?php afficherTable($mysqlClient, $query); ?> 
                
                <?php endif; ?>

                <!-- Retour sur affichage via bouton Retour -->
                <?php if(!isset($option) && $retour != null): ?>

                    <h3><?php echo($retour) ?></h3>

                    <?php 
                        // formulaire options de filtrage
                        include_once('ajouter.php');

                        $query = "SELECT * FROM $retour";

                        afficherTable($mysqlClient, $query);
                    ?>

                <?php endif; ?>

            </div>
        </div>
    </body>
</html>