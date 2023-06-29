<style>
<?php include 'style.css'; ?>
</style>

<?php
if (isset($_POST['colonne']))
{
	$colonne = $_POST['colonne'];
}
if (isset($_POST['direction']))
{
	$direction = $_POST['direction'];
}
?>

<form action="tab_bord_employes.php" method="POST">
	<select name="colonne" id="colonne">
		<option value="NAN" selected> --- Choisissez une colonne --- </option>
		<option value="NO_EMPLOYE"> NO_EMPLOYE </option>
		<option value="NOM_EMPLOYE"> NOM_EMPLOYE </option>
		<option value="TOTAL_HEURES"> TOTALE_HEURES </option>
		<option value="MOYENNE_HEURES"> MOYENNE_HEURES </option>
		<option value="MIN_HEURES"> MIN_HEURES </option>
		<option value="MAX_HEURES"> MAX_HEURES </option>
		<option value="NB_PROJETS"> NB_PROJETS </option>
	</select>
	<br>
    <label for="croissant">Croissant</label>
    <input type="radio" name="direction" value="croissant" id="croissant" checked/> 
	<br>
    <label for="decroissant">Décroissant</label>
    <input type="radio" name="direction" value="decroissant" id="decroissant" />
    <br>
	<button type="submit"> Trier </button>
</form>
