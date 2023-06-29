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
                    <nav>
                        <a href="index.php">Menu Principal</a>
                    </nav>
                </header>
                    
                <h1>Employés du mois</h1>
                <?php
                    $query = [
                    "DROP TABLE IF EXISTS corr;",
                    "DROP TABLE IF EXISTS job;",
                    "DROP TABLE IF EXISTS employepartout;",
                    "create /*temporary*/ TABLE job (place varchar(50));",
                    "insert into job values('tâche'),('chef'),('expert');",
                    "create /*temporary*/ TABLE corr (employe int, projet varchar(50), place varchar(50)) as ((select P.CHEF as employe, P.NOM as projet, j.place from PROJET P, job j where j.place = 'chef') UNION all (select T.EMPLOYE as employe, T.PROJET as projet, j.place from TACHE T, job j where j.place = 'tâche') UNION all (select E.EXPERT as employe, E.PROJET as projet, j.place from EVALUATION E, job j where j.place = 'expert'));",
                    "create /*temporary*/ TABLE employepartout (num int) as( SELECT E.NO as num FROM EMPLOYE E, corr c WHERE E.NO IN (SELECT employe FROM corr) GROUP BY E.NO HAVING (SELECT COUNT(DISTINCT c.projet)from corr c where c.employe = E.NO ) = (SELECT COUNT(DISTINCT NOM) FROM PROJET));"
                    ];

                    foreach ($query as $q) {
                        $tableStatement = $bdd->prepare($q);
                        $tableStatement->execute();
                        //$table = $tableStatement->fetchAll();
                    }

                    $query = "
                    select E.NOM, E.NOM_FONCTION, c.projet, c.place from employepartout e join EMPLOYE as E on E.NO = e.num join corr as c on c.employe = e.num ";
                    afficherTable($mysqlClient, $query);

                    $query = [
                    "DROP TABLE IF EXISTS corr;",
                    "DROP TABLE IF EXISTS job;",
                    "DROP TABLE IF EXISTS employepartout;"
                    ];

                    foreach ($query as $q) {
                        $tableStatement = $bdd->prepare($q);
                        $tableStatement->execute();
                        //$table = $tableStatement->fetchAll();
                    }

                ?>
                
            </div>
        </div>
    </body>
</html>