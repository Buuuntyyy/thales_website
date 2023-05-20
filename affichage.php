<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $titrediv1 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9", "Colonne 11", "Colonne 22", "Colonne 33", "Colonne 44", "Colonne 55",
        "Colonne 66", "Colonne 77", "Colonne 88", "Colonne 99", "Colonne 111", "Colonne 222", "Colonne 333", "Colonne 444", "Colonne 555",
        "Colonne 666", "Colonne 777", "Colonne 888", "Colonne 999");
        $donnediv1 = array("Donnée 1-1", "Donnée 1-2", "Donnée 1-3", "Donnée 1-4", "Donnée 1-5", 
        "Donnée 1-6", "Donnée 1-7", "Donnée 1-8", "Donnée 1-9", "Donnée 2-1", "Donnée 2-2", "Donnée 2-3", "Donnée 2-4", "Donnée 2-5", 
        "Donnée 2-6", "Donnée 2-7", "Donnée 2-8", "Donnée 2-9", "Donnée 3-1", "Donnée 3-2", "Donnée 3-3", "Donnée 3-4", "Donnée 3-5", 
        "Donnée 3-6", "Donnée 3-7", "Donnée 3-8", "Donnée 3-9");
        if ($_POST['id'] == "1"){
            unset($_POST["id"]);
            unset($_POST["colonne110"]);
            $cook = $_POST;
            if (!isset($_COOKIE['nom_col1'])){
                echo"okkkkkkkkkkkkkkkk";
                for($i=1;$i<=27;++$i){
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
        $name_col1 = array("field1", "field2", "field3", "field4", "field5", "field6", "field7", "field8", "field9", "field10", "field11", "field12", "field13", "field14", "field15", "field16", "field17", "field18", "field19", "field20", "field21", "field22", "field23", "field24", "field25", "field26", "field27");
        setcookie("nom_col1", serialize($name_col1), (time()+365*24*3600)*10);
    }
    else{
        $titrediv1 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9", "Colonne 11", "Colonne 22", "Colonne 33", "Colonne 44", "Colonne 55",
        "Colonne 66", "Colonne 77", "Colonne 88", "Colonne 99", "Colonne 111", "Colonne 222", "Colonne 333", "Colonne 444", "Colonne 555",
        "Colonne 666", "Colonne 777", "Colonne 888", "Colonne 999");
        $donnediv1 = array("Donnée 1-1", "Donnée 1-2", "Donnée 1-3", "Donnée 1-4", "Donnée 1-5", 
        "Donnée 1-6", "Donnée 1-7", "Donnée 1-8", "Donnée 1-9", "Donnée 2-1", "Donnée 2-2", "Donnée 2-3", "Donnée 2-4", "Donnée 2-5", 
        "Donnée 2-6", "Donnée 2-7", "Donnée 2-8", "Donnée 2-9", "Donnée 3-1", "Donnée 3-2", "Donnée 3-3", "Donnée 3-4", "Donnée 3-5", 
        "Donnée 3-6", "Donnée 3-7", "Donnée 3-8", "Donnée 3-9");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title> test </title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<div class="maDiv" id="div4">
        <table border="1">
            <?php $i = 1; ?>
            <form name="test" action="#", method="post">
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
    <button onclick="selectionnerDiv(1)">Sélectionner Div 1</button>
    <script>
        // Fonction pour sélectionner une div
        function selectionnerDiv(divId) {
            // Masquer toutes les divs

            // Afficher la div sélectionnée
            var divSelectionnee = document.getElementById("div" + divId);
            divSelectionnee.style.display = "block";
        }
    </script>
</body>
</html>