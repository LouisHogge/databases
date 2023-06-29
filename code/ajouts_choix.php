<style>
<?php include 'style.css'; ?>
</style>

<?php
if (isset($_POST['ajout']))
{
    $option = $_POST['ajout'];
}

$ajoutsStatement = $mysqlClient->prepare("SELECT table_name FROM information_schema.tables WHERE table_schema = 'group22' and table_name = 'PROJET' or table_name = 'FONCTION' or table_name = 'EMPLOYE'");
$ajoutsStatement->execute();
$ajouts = $ajoutsStatement->fetchAll();

?>

<form action="ajouts.php" method="POST">
    <select name="ajout" id="ajout">
        <option value="NAN" selected> --- Choisissez une table --- </option>
        <?php foreach($ajouts as $ajout) : ?>
            <option value= <?php echo($ajout['TABLE_NAME']) ?> > <?php echo($ajout['TABLE_NAME'])?> </option>
        <?php endforeach ?>
    </select>
    <button type="submit"> Rechercher </button>
</form>
