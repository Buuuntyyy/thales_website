<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $titrediv1 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9");
        $donnediv1 = array("Donnée 1-1", "Donnée 1-2", "Donnée 1-3", "Donnée 1-4", "Donnée 1-5", 
        "Donnée 1-6", "Donnée 1-7", "Donnée 1-8", "Donnée 1-9");
        $titrediv2 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9");
        $donnediv2 = array("Donnée 2-1", "Donnée 2-2", "Donnée 2-3", "Donnée 2-4", "Donnée 2-5", 
        "Donnée 2-6", "Donnée 2-7", "Donnée 2-8", "Donnée 2-9");
        $titrediv3 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9");
        $donnediv3 = array("Donnée 3-1", "Donnée 3-2", "Donnée 3-3", "Donnée 3-4", "Donnée 3-5", 
        "Donnée 3-6", "Donnée 3-7", "Donnée 3-8", "Donnée 3-9");
        if ($_POST['id'] == "1"){
            unset($_POST["id"]);
            unset($_POST["colonne110"]);
            $cook = $_POST;
            if (!isset($_COOKIE['nom_col1'])){
                echo"okkkkkkkkkkkkkkkk";
                for($i=1;$i<=9;++$i){
                    if ($cook['colonne1'.$i] == ""){
                        $cook['colonne1'.$i] = $titrediv1[$i-1];
                    }
                }
            }
            else{
                $temp = unserialize($_COOKIE['nom_col1']);
                setcookie("nom_col1", serialize($cook), (time()+365*24*3600)*10);
            }
        }
        elseif ($_POST['id'] == "2"){
            unset($_POST["id"]);
            unset($_POST["colonne210"]);
            $cook = $_POST;
            if (!isset($_COOKIE['nom_col2'])){
                echo"okkkkkkkkkkkkkkkk";
                for($i=1;$i<=9;++$i){
                    if ($cook['colonne2'.$i] == ""){
                        $cook['colonne2'.$i] = $titrediv1[$i-1];
                    }
                }
            }
            else{
                $temp = unserialize($_COOKIE['nom_col2']);
                setcookie("nom_col2", serialize($cook), (time()+365*24*3600)*10);
            }
        }
        elseif (($_POST['id'] == "3")){
            unset($_POST["id"]);
            unset($_POST["colonne310"]);
            $cook = $_POST;
            if (!isset($_COOKIE['nom_col3'])){
                echo"okkkkkkkkkkkkkkkk";
                for($i=1;$i<=9;++$i){
                    if ($cook['colonne3'.$i] == ""){
                        $cook['colonne3'.$i] = $titrediv1[$i-1];
                    }
                }
            }
            else{
                $temp = unserialize($_COOKIE['nom_col3']);
                setcookie("nom_col3", serialize($cook), (time()+365*24*3600)*10);
            }
        }
    }
    elseif (!isset($_COOKIE['nom_col1'])){
        $name_col1 = array("field1", "field2", "field3", "field4", "field5", "field6", "field7", "field8", "field9");
        setcookie("nom_col1", serialize($name_col1), (time()+365*24*3600)*10);
    }
    elseif (!isset($_COOKIE['nom_col2'])){
        $name_col2 = array("field10", "field11", "field12", "field13", "field14", "field15", "field16", "field17", "field18");
        setcookie("nom_col2", serialize($name_col2), (time()+365*24*3600)*10);
        $titrediv2 = array(array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
            "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9"));
        $donnediv2 = array(array("Donnée 2-1", "Donnée 2-2", "Donnée 2-3", "Donnée 2-4", "Donnée 2-5", 
        "Donnée 2-6", "Donnée 2-7", "Donnée 2-8", "Donnée 2-9"));
    }
    elseif (!isset($_COOKIE['nom_col3'])){
        echo"okkkkkkkkkkkkk";
        $name_col3 = array("field19", "field20", "field21", "field22", "field23", "field24", "field25", "field26", "field27");
        setcookie("nom_col3", serialize($name_col3), (time()+365*24*3600)*10);
    }
    else{
        $titrediv1 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9");
        $donnediv1 = array("Donnée 1-1", "Donnée 1-2", "Donnée 1-3", "Donnée 1-4", "Donnée 1-5", 
        "Donnée 1-6", "Donnée 1-7", "Donnée 1-8", "Donnée 1-9");
        $titrediv2 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9");
        $donnediv2 = array("Donnée 2-1", "Donnée 2-2", "Donnée 2-3", "Donnée 2-4", "Donnée 2-5", 
        "Donnée 2-6", "Donnée 2-7", "Donnée 2-8", "Donnée 2-9");
        $titrediv3 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9");
        $donnediv3 = array("Donnée 3-1", "Donnée 3-2", "Donnée 3-3", "Donnée 3-4", "Donnée 3-5", 
        "Donnée 3-6", "Donnée 3-7", "Donnée 3-8", "Donnée 3-9");
    }

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
        $res=$bd->prepare("SELECT nom_test, date FROM test WHERE ".implode(" or ", $kw));
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $tab_recherche = $res->fetchAll();

    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exemple de page avec deux div</title>
    <style>

        .maDiv {
            width: 100%;
            height: 100%;
            border: 1px solid #ccc;
            position: relative left;
            margin-bottom: 10px;
            background-color: white;
            display: none; /* Masquer les divs par défaut */
        }
        
        /* Style pour les deux div */
        .div1 {
            width: 25%;
            height: 250px;
            float: right;
            background-color: black;
            padding: 10px;
        }

        .div11{
            width: 75%;
            height: 400px;
            float: bottom;
            background-color: #B3B3B3;
            padding: 10px;
            overflow-y: scroll;
        }
        .div12{
            width: 20%;
            height: 400px;
            position: relative;
            left: 78%;
            top: -420px;
            background-color: white;
            padding: 10px;
            overflow-y: scroll;
        }

        .div2 {
            width: 75%;
            height: 200px;
            float: left;
            background-color: black;
            padding: 20px;
            float: left;
            border: 1px solid black;
            overflow: auto;
        }

        button{
            position: center;
        }
    </style>
</head>
<body>
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
        <?php for($i=0;$i<10;$i++){ ?>
            <li><?php echo "<a href=affichage.php/>{$lesEnreg[$i]['nom_test']} {$lesEnreg[$i]['date']}</a>"?> </li>
        <?php } ?>
    </div>

    <div class="div12">
        <form name="fo" method="get" action="">
            <input type=text" name="keywords" placeholder="Mots-clés" value="<?php echo $keywords ?>"/>
            <input type="submit" name="valider" value="Rechercher"/>
        </form>

        <div>
            <?php for ($i=0;$i<count($tab_recherche);$i++){?>
                <li><?php echo "<a href=affichage.php/>{$tab_recherche[$i]['nom_test']} {$tab_recherche[$i]['date']}</a>"?> </li>
            <?php } ?>
        </div>
    </div>

    <button onclick="selectionnerDiv(1)">Sélectionner Div 1</button>
    <button onclick="selectionnerDiv(2)">Sélectionner Div 2</button>
    <button onclick="selectionnerDiv(3)">Sélectionner Div 3</button>

    <!-- Divs à sélectionner -->
    <div class="maDiv" id="div1">
        <table border="1">
            <?php $i = 1; ?>
            <form name="test" action="index2.php", method="post">
                <input type="hidden" name="id" value="1">
                <tr>
                <?php foreach (unserialize($_COOKIE['nom_col1']) as $ligne): ?>
                    <td><input type="text" name=<?php echo"colonne1{$i}";?> /> <?php echo $ligne; ?></td>
                    <?php $i = $i + 1;?>
                <?php endforeach; ?>
                <td><input type="submit" value="enregistrer div1" /></td>
                </tr>
            </form>

            <tr>
                <?php foreach ($donnediv1 as $donnes): ?>
                    <td><?php echo $donnes; ?></td>
                <?php endforeach; ?>
            </tr>
            
        </table>
    </div>
    <div class="maDiv" id="div2">
        <table border="1">
            <?php $i = 1; ?>
            <form name="test" action="index2.php", method="post">
                <input type="hidden" name="id" value="2">
                <tr>
                <?php foreach (unserialize($_COOKIE['nom_col2']) as $ligne): ?>
                    <td><input type="text" name=<?php echo"colonne2{$i}";?> /> <?php echo $ligne; ?></td>
                    <?php $i = $i + 1;?>
                <?php endforeach; ?>
                <td><input type="submit" value="enregistrer div2" /></td>
                </tr>
            </form>

            <tr>
                <?php foreach ($donnediv2 as $donnes): ?>
                    <td><?php echo $donnes; ?></td>
                <?php endforeach; ?>
            </tr>
            
        </table>
    </div>
    <div class="maDiv" id="div3">
        <table border="1">
                <?php $i = 1; ?>
                <form name="test" action="index2.php", method="post">
                    <input type="hidden" name="id" value="3">
                    <tr>
                    <?php foreach (unserialize($_COOKIE['nom_col3']) as $ligne): ?>
                        <td><input type="text" name=<?php echo"colonne3{$i}";?> /> <?php echo $ligne; ?></td>
                        <?php $i = $i + 1;?>
                    <?php endforeach; ?>
                    <td><input type="submit" value="enregistrer div3" /></td>
                    </tr>
                </form>

                <tr>
                    <?php foreach ($donnediv3 as $donnes): ?>
                        <td><?php echo $donnes; ?></td>
                    <?php endforeach; ?>
                </tr>
                
        </table>
    </div>

    <script>
        // Fonction pour sélectionner une div
        function selectionnerDiv(divId) {
            // Masquer toutes les divs
            var divs = document.getElementsByClassName("maDiv");
            for (var i = 0; i < divs.length; i++) {
                divs[i].style.display = "none";
                divs[i].classList.remove("selectionnee"); // Supprimer la classe de sélection
            }

            // Afficher la div sélectionnée
            var divSelectionnee = document.getElementById("div" + divId);
            divSelectionnee.style.display = "block";
            divSelectionnee.style.position = "relative";
            divSelectionnee.classList.add("selectionnee"); // Ajouter la classe de sélection
        }
    </script>
    </div>
    </body>
</html>
