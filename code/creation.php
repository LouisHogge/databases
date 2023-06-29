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
                    
                <h1>Création de tâches</h1>

                <!-- Formulaire -->
                <?php include_once('creation_choix.php'); ?>

                <?php if(isset($option) && $option != "NAN"): ?>
                    <?php
                        $finStatement = $mysqlClient->prepare("SELECT DATE_FIN from PROJET where NOM = '".$option."' ");
                        $finStatement->execute();
                        $fin = $finStatement->fetchAll();
                        $fin1 = $fin[0];
                        $fin2 = $fin1['DATE_FIN'];

                    ?>

                    <?php if($fin2 != null): ?>
                    
                        <?php
                            $budgetStatement = $mysqlClient->prepare("SELECT BUDGET from PROJET where NOM = '".$option."' ");
                            $budgetStatement->execute();
                            $budget = $budgetStatement->fetchAll(); 

                            $coutStatement = $mysqlClient->prepare("SELECT COUT from PROJET where NOM = '".$option."' ");
                            $coutStatement->execute();
                            $cout = $coutStatement->fetchAll(); 

                            $greenStatement = $mysqlClient->prepare("SELECT if(@cout <= @budget, 1, 0)");
                            $greenStatement->execute();
                            $green = $greenStatement->fetchAll(); 

                            $orangeStatement = $mysqlClient->prepare("SELECT if(@cout <= @budget + 10/100*@cout and @cout > @budget, 1, 0)");
                            $orangeStatement->execute();
                            $orange = $orangeStatement->fetchAll(); 

                            $redStatement = $mysqlClient->prepare("SELECT if(@green = 0 and @orange = 0, 1, 0)");
                            $redStatement->execute();
                            $red = $redStatement->fetchAll(); 
                        ?>

                        <h3> <?php echo($option); ?> </h3>

                        <?php $query = "SELECT * from PROJET where NOM = '".$option."'"; ?>

                        <?php afficherTable($mysqlClient, $query);//afficherProjetFiniVert($mysqlClient, $query); ?>
                        <!-- fonction qui affiche de la table avec la couleur qui vaut 1 avec couleur € {green, orange, red} -->
                    
                    <?php else: ?>
                    

                        <h3> <?php echo($option); ?> </h3>

                        <?php
                            $query1 = "SELECT * from PROJET where NOM = '".$option."'";


                            $query2 = "SELECT E.NO, E.NOM, F.NOM AS FONCTION, F.TAUX_HORAIRE, T.NOMBRE_HEURES, F.TAUX_HORAIRE * T.NOMBRE_HEURES AS COUT fROM TACHE T jOIN EMPLOYE AS E ON E.NO = T.EMPLOYE JOIN FONCTION AS F ON F.NOM = E.NOM_FONCTION WHERE T.PROJET = '".$option."'";

                            include_once('creer.php');

                            afficherTable($mysqlClient, $query1);
                            afficherTable($mysqlClient, $query2);
                        ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>