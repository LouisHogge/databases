<!-- fonction qui s'occupe d'afficher les menu déroulant de modification dans la page modification.php et d'envoyer l
    es données de modification à la page modifier_affichage.php -->

<style>
<?php include 'style.css'; ?>
</style>

<?php
    $NOsStatement = $mysqlClient->prepare("SELECT NO, NOM from EMPLOYE");
    $NOsStatement->execute();
    $NOs = $NOsStatement->fetchAll();

    $NOM_DEPARTEMENTsStatement = $mysqlClient->prepare("SELECT NOM from DEPARTEMENT");
    $NOM_DEPARTEMENTsStatement->execute();
    $NOM_DEPARTEMENTs = $NOM_DEPARTEMENTsStatement->fetchAll();

    $NOM_FONCTIONsStatement = $mysqlClient->prepare("SELECT NOM from FONCTION");
    $NOM_FONCTIONsStatement->execute();
    $NOM_FONCTIONs = $NOM_FONCTIONsStatement->fetchAll();
?>

<form action="modifier_affichage.php" method="POST">
    <!--menu déroulant NO-->
    <label for="NO">NO</label>
    <select name="NO" id="NO">
        <option value="NAN" selected> --- Choisissez un no --- </option>
        <?php foreach($NOs as $NO) : ?>
            <option value= <?php echo($NO['NO']) ?> > <?php echo($NO['NO'].' - '.$NO['NOM'])?> </option>
        <?php endforeach ?>
    </select>

    <br>
    <!--menu déroulant NOM_DEPARTEMENT-->
    <label for="NOM_DEPARTEMENT">NOM_DEPARTEMENT</label>
    <select name="NOM_DEPARTEMENT" id="NOM_DEPARTEMENT">
        <option value="NAN" selected> --- Choisisser un département --- </option>
        <?php foreach($NOM_DEPARTEMENTs as $NOM_DEPARTEMENT) : ?>
            <option value= <?php echo($NOM_DEPARTEMENT['NOM']) ?> > <?php echo($NOM_DEPARTEMENT['NOM'])?> </option>
        <?php endforeach ?>
        <option value="NULL"> Supprimer NOM_DEPARTEMENT </option>
    </select>

    <br>
    <!--menu déroulant NOM_FONCTION-->
    <label for="NOM_FONCTION">NOM_FONCTION</label>
    <select name="NOM_FONCTION" id="NOM_FONCTION">
        <option value="NAN" selected> --- Choisisser une fonction --- </option>
        <?php foreach($NOM_FONCTIONs as $NOM_FONCTION) : ?>
            <option value= <?php echo($NOM_FONCTION['NOM']) ?> > <?php echo($NOM_FONCTION['NOM'])?> </option>
        <?php endforeach ?>
        <option value="NULL"> Supprimer NOM_FONCTION </option>
    </select>
    <br>
    <button type="submit">Modifier</button>
</form>
