<!-- fonction qui affiche le menu déroulant de choix de projet dans la page creation.php -->

<style>
<?php include 'style.css'; ?>
</style>

<?php
if (isset($_POST['projet']))
{
	$option = $_POST['projet'];
}

$projetsStatement = $mysqlClient->prepare("SELECT NOM FROM PROJET");
$projetsStatement->execute();
$projets = $projetsStatement->fetchAll();
?>

<form action="creation.php" method="POST">
	<select name="projet" id="projet">
		<option value="NAN" selected> --- Choisissez un projet --- </option>
		<?php foreach($projets as $projet) : ?>
			<option value= <?php echo($projet['NOM']) ?> > <?php echo($projet['NOM'])?> </option>
		<?php endforeach ?>
	</select>
	<button type="submit"> Rechercher </button>
</form>
