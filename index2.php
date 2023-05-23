<?php
    @$keywords=$_GET["keywords"];
    if (empty($keywords)){
        $keywords = "test";
    }
    @$valider=$_GET["valider"];
    if (isset($valider) && !empty(trim($keywords))){
        $words = explode(" ", trim($keywords));
        for($i=0;$i<count($words);$i++){
            $kw[$i]="nom_test like '%".$words[$i]."%'";
        }
        try {
            $bd = new PDO ( "mysql:host=localhost;dbname=thales",
            "root", "" );
            $bd->exec('SET NAMES utf8');
        }
        catch (Exception $e) {
            die ("Erreur: Connexion à la base impossible");
        }
        $res=$bd->prepare("SELECT nom_test, date, test_id FROM test WHERE ".implode(" or ", $kw));
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $tab_recherche = $res->fetchAll();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exemple de page avec deux div</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
    <div id="grid">
        <div class="div11">
            <h3>Historique des 10 derniers Tests</h3> <!--afficher ici les 10 derniers test ainsi qu'une 
                                barre de recherche pour aller chercher un test spécifique dans la BDD-->
            <?php
            try {
                $bd = new PDO ( "mysql:host=localhost;dbname=thales",
                "root", "" );
                $bd->exec('SET NAMES utf8');
            }
            catch (Exception $e) {
                die ("Erreur: Connexion à la base impossible");
            }

            $sql = "SELECT nom_test, date FROM test"; // Stocke le code SQL de la requête
            $req = $bd->prepare ($sql); // Requête préparée
            $req->execute (); // Requête exécutée
            $lesEnreg = $req->fetchall (); // Requête exécutée
            $req->closeCursor (); // Requête détruite

            ?>
            <br>
            <br>
            <?php for($i=0;$i<sizeof($lesEnreg);$i++){ ?>
                <li><?php echo "<a href=resultats.php/>{$lesEnreg[$i]['nom_test']} {$lesEnreg[$i]['date']}</a>"?> </li>
            <?php } ?>
        </div>
        
        <div id="div12">
                <h1> test </h1>
        </div>

        <div class="div13">
            <form name="fo" method="get" action="">
                <input type=text" name="keywords" placeholder="Mots-clés" value="<?php echo $keywords ?>"/>
                <input type="submit" name="valider" value="Rechercher"/>
            </form>

            <div>
                <?php for ($i=0;$i<count($tab_recherche);$i++){?>
                    <?php echo "<a href='#afficher{$i}'>{$tab_recherche[$i]['nom_test']} {$tab_recherche[$i]['date']}  [&darr;]</a> <a href='#'>[&uarr;]</a>";
                    try {
                        $bd = new PDO ( "mysql:host=localhost;dbname=thales",
                        "root", "" );
                        $bd->exec('SET NAMES utf8');
                    }
                    catch (Exception $e) {
                        die ("Erreur: Connexion à la base impossible");
                    }
            
                    $sql = "SELECT id_test, date_exec, exec_id FROM execution 
                    INNER JOIN test ON execution.id_test = test.test_id; "; // Stocke le code SQL de la requête
                    $req = $bd->prepare ($sql); // Requête préparée
                    $req->execute (); // Requête exécutée
                    $LesExecs = $req->fetchall (); // Requête exécutée
                    $req->closeCursor (); // Requête détruite
                    echo "<p id='afficher{$i}'>";
                    for ($w=0;$w<sizeof($LesExecs);$w++){

                        if ($LesExecs[$w]['id_test'] == $tab_recherche[$i]['test_id']){

                            echo "<a href='resultats.php?exec_id={$LesExecs[$w]['exec_id']}&pageid=0'>{$LesExecs[$w]['id_test']} {$LesExecs[$w]['date_exec']}</a>";
                            ?> <br> <?php
                        }
                    }
                    echo "</p>";
                    ?><br>
                <?php } ?>
            </div>
        </div>
    </div>
    </body>
</html>
