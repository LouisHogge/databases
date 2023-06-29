<!-- fonction qui s'occupe d'afficher le menu déroulant de choix de tables dans la page tables.php -->

<style>
<?php include 'style.css'; ?>
</style>

<?php
if (isset($_POST['table']))
{
	$option = $_POST['table'];
}

$tablesStatement = $mysqlClient->prepare("SELECT table_name FROM information_schema.tables WHERE table_schema = 'group22'");
$tablesStatement->execute();
$tables = $tablesStatement->fetchAll();

?>

<!-- menu déroulant choix tables-->
<form action="tables.php" method="POST">
	<select name="table" id="table">
		<option value="NAN" selected> --- Choisissez une table --- </option>
		<?php foreach($tables as $table) : ?>
			<option value= <?php echo($table['TABLE_NAME']) ?> > <?php echo($table['TABLE_NAME'])?> </option>
		<?php endforeach ?>
	</select>
	<button type="submit"> Rechercher </button>
</form>
