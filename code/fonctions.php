<style>
<?php include 'style.css'; ?>
</style>

<?php 
    function afficherTable($bdd, $query){
        $tableStatement = $bdd->prepare($query);
        $tableStatement->execute();
        $table = $tableStatement->fetchAll();
        
        $col = $table[0];
        $columns = array();
        echo "<pre>";
        foreach($col AS $key=>$value) {
            if(is_string($key)){
                $columns[] = $key;
            }
        }
        echo "<table border=1>";
        foreach($columns as $value) {
            echo "<th>$value</th> ";
        } 
        for($i=0; $i < count($table); $i++){
            echo "<tr>";
            for ($j=0; $j < count($columns); $j++) { 
                echo "<td id=\"bloc_td\">".$table[$i][$j]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";                       
    }
    
    function afficherTableVert($bdd, $query){
        $tableStatement = $bdd->prepare($query);
        $tableStatement->execute();
        $table = $tableStatement->fetchAll();
        
        $col = $table[0];
        $columns = array();
        echo "<pre>";
        foreach($col AS $key=>$value) {
            if(is_string($key)){
                $columns[] = $key;
            }
        }
        echo "<table border=1>";
        foreach($columns as $value) {
            echo "<th>$value</th> ";
        } 
        for($i=0; $i < count($table); $i++){
            echo "<tr>";
            for ($j=0; $j < count($columns); $j++) { 
                echo "<td id=\"bloc_green\">".$table[$i][$j]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";                       
    }

    function afficherTableOrange($bdd, $query){
        $tableStatement = $bdd->prepare($query);
        $tableStatement->execute();
        $table = $tableStatement->fetchAll();
        
        $col = $table[0];
        $columns = array();
        echo "<pre>";
        foreach($col AS $key=>$value) {
            if(is_string($key)){
                $columns[] = $key;
            }
        }
        echo "<table border=1>";
        foreach($columns as $value) {
            echo "<th>$value</th> ";
        } 
        for($i=0; $i < count($table); $i++){
            echo "<tr>";
            for ($j=0; $j < count($columns); $j++) { 
                echo "<td id=\"bloc_orange\">".$table[$i][$j]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";                       
    }

    function afficherTableRouge($bdd, $query){
        $tableStatement = $bdd->prepare($query);
        $tableStatement->execute();
        $table = $tableStatement->fetchAll();
        
        $col = $table[0];
        $columns = array();
        echo "<pre>";
        foreach($col AS $key=>$value) {
            if(is_string($key)){
                $columns[] = $key;
            }
        }
        echo "<table border=1>";
        foreach($columns as $value) {
            echo "<th>$value</th> ";
        } 
        for($i=0; $i < count($table); $i++){
            echo "<tr>";
            for ($j=0; $j < count($columns); $j++) { 
                echo "<td id=\"bloc_red\">".$table[$i][$j]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";                       
    }

    function afficherProjetFiniVert($bdd, $query){
        $tableStatement = $bdd->prepare($query);
        $tableStatement->execute();
        $table = $tableStatement->fetchAll();
        
        $col = $table[0];
        $columns = array();
        echo "<pre id=\"bloc_green\">";
        foreach($col AS $key=>$value) {
            if(is_string($key)){
                $columns[] = $key;
            }
        }
        echo "<table border=1 id=\"bloc_green\">";
        foreach($columns as $value) {
            echo "<th id=\"bloc_green\">$value</th> ";
        } 
        for($i=0; $i < count($table); $i++){
            echo "<tr id=\"bloc_green\">";
            for ($j=0; $j < count($columns); $j++) { 
                echo "<td id=\"bloc_td\" id=\"bloc_green\">".$table[$i][$j]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";                       
    }



    // $table: c'est la table à filtrer
    // $filtre: ce sont les valeurs rentrées par l'utilisateur
    
    function filtre($table, $filtre, $bdd){
        $query = "SELECT * ";
        $query = $query."FROM ".$table;
        $first = false;
        $i = 0;
        $colNames = array_keys($filtre);
        foreach($filtre as $value){
            if($value != null){

                if(!$first){ // ça sert juste a ne pas mettre AND au début
                    $first = true;
                    $query = $query." WHERE ";
                } else{
                    $query = $query." OR ";
                }
        
                if(is_numeric($value)){                    
                    $query = $query.$colNames[$i]." = ".$value;
                } else{
                    $query = $query.$colNames[$i]." REGEXP '".$value."' ";
                }
            }
            $i++;
        }
        afficherTable($bdd, $query);
    }

    function modifierEmploye($bdd, $NOM_DEPARTEMENT, $NOM_FONCTION, $NO){

        if ($NOM_DEPARTEMENT == 'NULL' && $NOM_FONCTION != 'NULL' ){
            $query = "UPDATE EMPLOYE SET NOM_DEPARTEMENT = NULL, NOM_FONCTION = '$NOM_FONCTION' WHERE NO = $NO";
            $exe = $bdd->prepare($query);
            $exe->execute();
            $query = "SELECT * FROM EMPLOYE";
            afficherTable($bdd, $query);
            return;
        }
        if ($NOM_FONCTION == 'NULL' && $NOM_DEPARTEMENT != 'NULL'){
            $query = "UPDATE EMPLOYE SET NOM_FONCTION = NULL, NOM_DEPARTEMENT = '$NOM_DEPARTEMENT' WHERE NO = $NO";
            $exe = $bdd->prepare($query);
            $exe->execute();
            $query = "SELECT * FROM EMPLOYE";
            afficherTable($bdd, $query);
            return;
        }
        if ($NOM_FONCTION == 'NULL' && $NOM_DEPARTEMENT == 'NULL'){
            $query = "UPDATE EMPLOYE SET NOM_DEPARTEMENT = NULL , NOM_FONCTION = NULL WHERE NO = $NO";
            $exe = $bdd->prepare($query);
            $exe->execute();
            $query = "SELECT * FROM EMPLOYE";
            afficherTable($bdd, $query);
            return;
        }

        $query = "UPDATE EMPLOYE SET NOM_DEPARTEMENT = '$NOM_DEPARTEMENT' , NOM_FONCTION = '$NOM_FONCTION' WHERE NO = $NO";
        $exe = $bdd->prepare($query);
        $exe->execute();
        $query = "SELECT * FROM EMPLOYE";
        afficherTable($bdd, $query);
    }

    function ajouter($bdd, $table, $element){
        $query = "INSERT INTO $table ( ";
        $colNames = array_keys($element);
        $first = false;
        foreach($colNames as $col ){
            if(!$first){
                $first = true;
                $query = $query.$col;
            } else{
                $query = $query." , ".$col;
            }
        }
        $query = $query." ) VALUES ( ";

        $first = false;

        foreach($element as $value ){
            if(!$first){
                $first = true;
            } else{
                $query = $query." , ";
            }

            if(is_numeric($value)){                    
                $query = $query.$value;
            } elseif ($value == 'NULL'){
                $query = $query."NULL";
            } else {
                $query = $query."'".$value."'";
            }
        }
        $query = $query." );";
        try{
            $exe = $bdd->prepare($query);
            $exe->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $query = "SELECT * FROM $table";
        afficherTable($bdd, $query); 
    }

    
    function ajouterHeuresEmploye($bdd, $nomProjet, $noEmploye, $nbHeures){
        $query = "UPDATE TACHE SET NOMBRE_HEURES =  IFNULL(NOMBRE_HEURES+$nbHeures, $nbHeures) WHERE EMPLOYE = $noEmploye AND PROJET = '$nomProjet'";
        $exe = $bdd->prepare($query);
        $exe->execute();

        $query = "SELECT * FROM TACHE";
        afficherTable($bdd, $query);
    }

    function ajouterEmployeProjet($bdd, $nomProjet, $noEmploye){
        $query = "INSERT INTO TACHE (EMPLOYE, PROJET, NOMBRE_HEURES) VALUES($noEmploye, '$nomProjet', 0)";
        $exe = $bdd->prepare($query);
        $exe->execute();

        $query = "SELECT * FROM TACHE";
        afficherTable($bdd, $query);
    }

    function terminerProjet($bdd, $nomProjet, $dateFin, $noExpert, $commentaires, $succes){
        
        // on retire projet de la table tache
        $query = "DELETE FROM TACHE WHERE PROJET = '$nomProjet']";
        $exe = $bdd->prepare($query);
        $exe->execute();

        // on calcule le cout
        $query = "SELECT SUM(IFNULL(F.TAUX_HORAIRE* T.NOMBRE_HEURES, 0)) as COUT FROM PROJET P JOIN TACHE T on T.PROJET = P.NOM JOIN EMPLOYE E on E.NO = T.EMPLOYE JOIN FONCTION F on F.NOM = E.NOM_FONCTION WHERE P.NOM = '$nomProjet' GROUP BY P.NOM ";
        $exe = $bdd->prepare($query);
        $exe->execute();
        $cout = $exe->fetchAll();
        
        // on termine le projet en ajoutant une date de fin et le cout
        $query = "UPDATE PROJET SET COUT = $cout[0], DATE_FIN = $dateFin";
        $exe = $bdd->prepare($query);
        $exe->execute();

        // on ajoute une evaluation
        if($succes == true){
            $query = "INSERT INTO TACHE (PROJET, EXPERT, COMMENTAIRES, AVIS) VALUES ('$nomProjet', $noExpert, '$commentaires', 'SUCCES')";
        } else{
            $query = "INSERT INTO TACHE (PROJET, EXPERT, COMMENTAIRES, AVIS) VALUES ('$nomProjet', $noExpert, '$commentaires', 'ECHEC')";
        }
        $exe = $bdd->prepare($query);
        $exe->execute();

        $query = " SELECT * FROM PROJET";
        afficherTable($bdd, $query);
    }
?>