<!-- page permettant de modifier les informations d'un employé -->

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
                    
                <!-- Affichage -->
                <h1>Modification informations employés</h1>

                <!-- Formulaire de modification -->
                <?php include_once('modifier.php'); ?>

                <?php $query = "SELECT * FROM EMPLOYE"; ?>
                <?php afficherTable($mysqlClient, $query); ?> 
                
            </div>
        </div>
    </body>
</html>