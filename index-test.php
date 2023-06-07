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
    <title>Projet Ethernet-Sniffer</title>
    <link rel="stylesheet" type="text/css" href="style2.css" media="screen" />
</head>
<body>
    <header>
        <h1>Sniffer-Ethernet</h1>
        <img class="logo-groupe" src="logo-groupe.jpeg" alt="Logo groupe">
    </header>
    <div class="container">
        <div class="box1">
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

        <div class="box2">
            <h3>détails et infos</h3>
            <form action="index.html" method="POST" id="onglet-parametres">
                <label for="nb_lignes">Nombre d'affichage de lignes :</label>
                <input type="number" id="nb_lignes" name="nb_lignes" min="1" max="1000" value="100">
                <input type="submit" value="Enregistrer">
            </form>
            
            <img class="logo-thales" src="thales-logo.png" alt="Logo Thales">
            <img class="logo-iut" src="logo-iut.png" alt="Logo IUT">
        </div>

        <div class="box3">
            <form name="fo" method="get" action="">
                <input type="text" name="keywords" placeholder="Mots-clés" value="<?php echo $keywords ?>"/>
                <input type="submit" name="valider" value="Rechercher"/>
            </form>

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
</body>
</html>
