<!-- Fonction qui reçoit la table choisie dans le menu déroulant de la page tables.php, qui affiche les options de filtrage dans la page tables.php et qui
	renvoies les entrées options de filtrage à la fonction filtrer_affichage.php -->

<style>
<?php include 'style.css'; ?>
</style>

<?php
	if(isset($retour))
	{
		$option_filtrer = $retour;
	}
	else
	{
		$option_filtrer = $option;
	}
?>

<?php if($option_filtrer == "DEPARTEMENT"): ?>
	<form action="filtrer_affichage.php" method="POST">
		<label for="NOM">NOM : </label>
		<input type="text" id="NOM" name="NOM">
		<br>
		<label for="BUDGET">BUDGET : </label>
		<input type="number" id="BUDGET" name="BUDGET">
		<br>
		<input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_filtrer; ?>" >
		<button type="submit">Filtrer</button>
	</form>
	<?php
	?>
<?php endif; ?>

<?php if($option_filtrer == "EMPLOYE"): ?>
	<form action="filtrer_affichage.php" method="POST">
		<label for="NO">NO : </label>
		<input type="number" id="NO" name="NO">
		<br>
		<label for="NOM">NOM : </label>
		<input type="text" id="NOM" name="NOM">
		<br>
		<label for="NOM_DEPARTEMENT">NOM_DEPARTEMENT : </label>
		<input type="text" id="NOM_DEPARTEMENT" name="NOM_DEPARTEMENT">
		<br>
		<label for="NOM_FONCTION">NOM_FONCTION : </label>
		<input type="text" id="NOM_FONCTION" name="NOM_FONCTION">
		<br>
		<input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_filtrer; ?>" >
		<button type="submit">Filtrer</button>
	</form>
<?php endif; ?>

<?php if($option_filtrer == "EVALUATION"): ?>
	<form action="filtrer_affichage.php" method="POST">
		<label for="PROJET">PROJET : </label>
		<input type="text" id="PROJET" name="PROJET">
		<br>
		<label for="EXPERT">EXPERT : </label>
		<input type="text" id="EXPERT" name="EXPERT">
		<br>
		<label for="COMMENTAIRES">COMMENTAIRES : </label>
		<input type="text" id="COMMENTAIRES" name="COMMENTAIRES">
		<br>
		<label for="AVIS">AVIS : </label>
		<input type="text" id="AVIS" name="AVIS">
		<br>
		<input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_filtrer; ?>" >
		<button type="submit">Filtrer</button>
	</form>
<?php endif; ?>

<?php if($option_filtrer == "FONCTION"): ?>
	<form action="filtrer_affichage.php" method="POST">
		<label for="NOM">NOM : </label>
		<input type="text" id="NOM" name="NOM">
		<br>
		<label for="TAUX_HORAIRE">TAUX_HORAIRE : </label>
		<input type="number" id="TAUX_HORAIRE" name="TAUX_HORAIRE">
		<br>
		<input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_filtrer; ?>" >
		<button type="submit">Filtrer</button>
	</form>
<?php endif; ?>

<?php if($option_filtrer == "MOTS_CLES"): ?>
	<form action="filtrer_affichage.php" method="POST">
		<label for="RAPPORT">RAPPORT : </label>
		<input type="text" id="RAPPORT" name="RAPPORT">
		<br>
		<label for="MOTS_CLE">MOT_CLE : </label>
		<input type="text" id="MOT_CLE" name="MOT_CLE">
		<br>
		<input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_filtrer; ?>" >
		<button type="submit">Filtrer</button>
	</form>
<?php endif; ?>

<?php if($option_filtrer == "PROJET"): ?>
	<form action="filtrer_affichage.php" method="POST">
		<label for="NOM">NOM : </label>
		<input type="text" id="NOM" name="NOM">
		<br>
		<label for="DEPARTEMENT">DEPARTEMENT : </label>
		<input type="text" id="DEPARTEMENT" name="DEPARTEMENT">
		<br>
		<label for="DATE_DEBUT">DATE_DEBUT : </label>
		<input type="date" id="DATE_DEBUT" name="DATE_DEBUT">
		<br>
		<label for="CHEF">CHEF : </label>
		<input type="text" id="CHEF" name="CHEF">
		<br>
		<label for="BUDGET">BUDGET : </label>
		<input type="number" id="BUDGET" name="BUDGET">
		<br>
		<label for="COUT">COUT : </label>
		<input type="number" id="COUT" name="COUT">
		<br>
		<label for="DATE_FIN">DATE_FIN : </label>
		<input type="date" id="DATE_FIN" name="DATE_FIN">
		<br>
		<input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_filtrer; ?>" >
		<button type="submit">Filtrer</button>
	</form>
<?php endif; ?>

<?php if($option_filtrer == "RAPPORT"): ?>
	<form action="filtrer_affichage.php" method="POST">
		<label for="EMPLOYE">EMPLOYE : </label>
		<input type="text" id="EMPLOYE" name="EMPLOYE">
		<br>
		<label for="PROJET">PROJET : </label>
		<input type="text" id="PROJET" name="PROJET">
		<br>
		<label for="TITRE">TITRE : </label>
		<input type="text" id="TITRE" name="TITRE">
		<br>
		<input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_filtrer; ?>" >
		<button type="submit">Filtrer</button>
	</form>
<?php endif; ?>

<?php if($option_filtrer == "TACHE"): ?>
	<form action="filtrer_affichage.php" method="POST">
		<label for="EMPLOYE">EMPLOYE : </label>
		<input type="text" id="EMPLOYE" name="EMPLOYE">
		<br>
		<label for="PROJET">PROJET : </label>
		<input type="text" id="PROJET" name="PROJET">
		<br>
		<label for="NB_HEURES">NB_HEURES : </label>
		<input type="number" id="NB_HEURES" name="NB_HEURES">
		<br>
		<input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_filtrer; ?>" >
		<button type="submit">Filtrer</button>
	</form>
<?php endif; ?>
