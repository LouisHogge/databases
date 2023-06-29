<!-- Fonction qui reçoit la table choisie dans le menu déroulant de la page tables.php, qui affiche les options de filtrage dans la page tables.php et qui
    renvoies les entrées options de filtrage à la fonction filtrer_affichage.php -->

<style>
<?php include 'style.css'; ?>
</style>

<?php
    if(isset($retour))
    {
        $option_ajouter = $retour;
    }
    else
    {
        $option_ajouter = $option;
    }
?>


<?php if($option_ajouter == "PROJET"): ?>

    <?php
        $chefsStatement = $mysqlClient->prepare("SELECT NO, NOM from EMPLOYE where NOM_DEPARTEMENT is not NULL and NOM_FONCTION is not NULL");
        $chefsStatement->execute();
        $chefs = $chefsStatement->fetchAll();
    ?>

    <form action="ajouter_affichage.php" method="POST">
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
        <select name="CHEF" id="CHEF">
            <option value="NAN" selected> --- Choisissez un chef --- </option>
            <?php foreach($chefs as $chef) : ?>
                <option value= <?php echo($chef['NO']) ?> > <?php echo($chef['NO'].' - '.$chef['NOM'])?> </option>
            <?php endforeach ?>
        </select>
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
        <input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_ajouter; ?>" >
        <button type="submit">Ajouter : </button>
    </form>
<?php endif; ?>

<?php if($option_ajouter == "FONCTION"): ?>
    <form action="ajouter_affichage.php" method="POST">
        <label for="NOM">NOM : </label>
        <input type="text" id="NOM" name="NOM">
        <br>
        <label for="TAUX_HORAIRE">TAUX_HORAIRE : </label>
        <input type="number" id="TAUX_HORAIRE" name="TAUX_HORAIRE">
        <br>
        <input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_ajouter; ?>" >
        <button type="submit">Ajouter</button>
    </form>
<?php endif; ?>

<?php if($option_ajouter == "EMPLOYE"): ?>
    <form action="ajouter_affichage.php" method="POST">
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
        <input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_ajouter; ?>" >
        <button type="submit">Ajouter</button>
    </form>
<?php endif; ?>