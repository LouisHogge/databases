<?php session_start(); ?>

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

            <!-- Variables -->
            <?php include_once('variables.php'); ?>

            <div id="bloc_content">
                <!-- Formulaire de connexion -->
                <?php include_once('login.php'); ?>

                <?php if(isset($loggedUser)): ?>
                    
                    <h1>Menu Principal</h1>
                    
                    <ul>
                        <li>  <a href="tables.php">Affichage tables</a> </li>
                        <li>  <a href="projets.php">Affichage projets</a> </li>
                        <li>  <a href="ajouts.php">Ajouts fonctions/employés/projets</a> </li>
                        <li>  <a href="modification.php">Modifications informations employés</a> </li>
                        <li>  <a href="creation.php">Création tâches</a> </li>
                        <li>  <a href="employes_mois.php">Employés du mois</a> </li>
                        <li>  <a href="tab_bord_projets.php">Tableau de bord projets</a> </li>
                        <li>  <a href="tab_bord_employes.php">Tableau de bord employés</a> </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>