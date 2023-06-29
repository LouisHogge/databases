<!-- fonction qui applique et affiche lesmodifications des infos de l'employé -->

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
 
					<!-- les 3 champs doivent être assigné à une valeur sinon pas de modification -->
				    <?php if (isset($_POST['NO']) && isset($_POST['NOM_DEPARTEMENT']) && isset($_POST['NOM_FONCTION']) && $_POST['NO'] != 'NAN' && $_POST['NOM_DEPARTEMENT'] != 'NAN' && $_POST['NOM_FONCTION'] != 'NAN'): ?>
				    	<?php
					        $NO = $_POST['NO'];
							$NOM_DEPARTEMENT = $_POST['NOM_DEPARTEMENT'];
							$NOM_FONCTION = $_POST['NOM_FONCTION'];
						?>
				    <?php else: ?>
				    
				    	<?php echo("\nLes 3 menus déroulants doivent être assignés à une valeur sinon pas de modification.\n\n"); ?>

				    	<!-- bouton retour en arrière -->
						<form action="modification.php">
						    <input type="submit" value="Retour à la page de modification" />
						</form>

				   <?php endif; ?>

                <!-- modification infos -->
                <?php modifierEmploye($mysqlClient, $NOM_DEPARTEMENT, $NOM_FONCTION, $NO); ?>

                <form action="modification.php">
				    <input type="submit" value="Retour à la page de modification" />
				</form>
						
				</form>
			</div>
		</div>
	</body>
</html>
