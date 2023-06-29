<style>
<?php include 'style.css'; ?>
</style>

<?php
    if(isset($retour))
    {
        $option_creer = $retour;
    }
    else
    {
        $option_creer = $option;
    }

    $NOsStatement = $mysqlClient->prepare("SELECT NO, NOM from EMPLOYE");
    $NOsStatement->execute();
    $NOs = $NOsStatement->fetchAll();
?>

<div id="bloc_proj_non_fini">
    <div id="section_proj_non_fini">
        <p>
            Ajouter un nombre d'heures à la tâche d'un employé :
            <form action="creer_heure.php" method="POST">
                <!--menu déroulant NO-->
                <label for="NO">NO : </label>
                <select name="NO" id="NO">
                    <option value="NAN" selected> --- Choisissez un no --- </option>
                    <?php foreach($NOs as $NO) : ?>
                        <option value= <?php echo($NO['NO']) ?> > <?php echo($NO['NO'].' - '.$NO['NOM'])?> </option>
                    <?php endforeach ?>
                </select>
                <br>
                <!-- champ heures -->
                <label for="heures">Heures : </label>
                <input type="number" id="heures" name="heures">
                <br>
                <input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_creer; ?>" >
                <button type="submit">Ajouter</button>
            </form>
        </p>
    </div>

    <div id="section_proj_non_fini">
        <p>
            Ajouter un employé au projet :
            <form action="creer_employe.php" method="POST">
                <!--menu déroulant NO-->
                <label for="NO">NO : </label>
                <select name="NO" id="NO">
                    <option value="NAN" selected> --- Choisissez un no --- </option>
                    <?php foreach($NOs as $NO) : ?>
                        <option value= <?php echo($NO['NO']) ?> > <?php echo($NO['NO'].' - '.$NO['NOM'])?> </option>
                    <?php endforeach ?>
                </select>
                <br>
                <input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_creer; ?>" >
                <button type="submit">Ajouter</button>
            </form>
        </p>
    </div>

    <div id="section_proj_non_fini">
        <p>
            Terminer le projet :
            <form action="creer_termine.php" method="POST">
                <!--menu déroulant NO-->
                <label for="NO">NO : </label>
                <select name="NO" id="NO">
                    <option value="NAN" selected> --- Choisissez un no --- </option>
                    <?php foreach($NOs as $NO) : ?>
                        <option value= <?php echo($NO['NO']) ?> > <?php echo($NO['NO'].' - '.$NO['NOM'])?> </option>
                    <?php endforeach ?>
                </select>
                <br>
                <!-- champ commentaires -->
                <label for="commentaires">Commentaires : </label>
                <input type="text" id="commentaires" name="commentaires">
                <br>
                <label for="date_fin">Date de fin : </label>
                <input type="date" id="date_fin" name="date_fin">
                <br>
                <!-- bouton succès ou échec -->
                <label for="succes">Succès : </label>
                <input type="radio" name="avis" value="succes" id="avis" /> 
                <br>
                <label for="echec">Echec : </label>
                <input type="radio" name="avis" value="echec" id="avis" />
                <br>
                <input type="hidden" id="option_memoire" name="option_memoire" value="<?php echo $option_creer; ?>" >
                <button type="submit">Terminer Projet</button>
            </form>
        </p>
    </div>
</div>
