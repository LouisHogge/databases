<!-- fonction qui affiche la table filtrée-->

<?php 
	$termine = array_slice($_POST, 0, -1);

	$option_memory = end($_POST);
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
                    
                <!-- Affichage -->
                <h1>Tables</h1>

				<h3><?php echo($option_memory) ?></h3>

				<!-- creation -->
				<?php terminerProjet($mysqlClient, $option_memory, $termine['date_fin'], $termine['NO'], $termine['commentaires'], $termine['avis']); ?>

				<!-- bouton retour en arrière -->
				<form action="creation.php" method="POST">
					<input type="hidden" id="retour" name="retour" value="<?php echo $option_memory; ?>">
					<button type="submit">Retour à la page de création</button>
				</form>
			</div>
		</div>
	</body>
</html>
