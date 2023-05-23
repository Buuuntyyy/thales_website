<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $titrediv1 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9", "Colonne 11", "Colonne 22", "Colonne 33", "Colonne 44", "Colonne 55",
        "Colonne 66", "Colonne 77", "Colonne 88", "Colonne 99", "Colonne 111", "Colonne 222", "Colonne 333", "Colonne 444", "Colonne 555",
        "Colonne 666", "Colonne 777", "Colonne 888", "Colonne 999");
        try {
            $bd = new PDO ( "mysql:host=localhost;dbname=thales",
            "root", "" );
            $bd->exec('SET NAMES utf8');
            echo "bdddddddddddddddddddddddd";
        }
        catch (Exception $e) {
            die ("Erreur: Connexion à la base impossible");
        }
        $res=$bd->prepare("SELECT * FROM udp1 INNER JOIN execution ON udp1.id_exec = execution.exec_id");
        $res->execute();
        $data_tab = $res->fetchAll();
        echo "okokokokok";
        if ($_POST['id'] == "1"){
            unset($_POST["id"]);
            unset($_POST["colonne110"]);
            $cook = $_POST;
            if (!isset($_COOKIE['nom_col1'])){
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
        else{
            echo "";
        }
    }
    else if (!isset($_COOKIE['nom_col1'])){
        $name_col1 = array("field1", "field2", "field3", "field4", "field5", "field6", "field7", "field8", "field9", "field10", "field11", "field12", "field13", "field14", "field15", "field16", "field17", "field18", "field19", "field20", "field21", "field22", "field23", "field24", "field25", "field26", "field27");
        setcookie("nom_col1", serialize($name_col1), (time()+365*24*3600)*10);
        echo "fuck";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title> test </title>
    <link rel="stylesheet" type="text/css" href="style_affichage.css" media="screen" />
</head>
<body>
<div class="maDivTable">
        <table border="1">
            <?php $i = 1; ?>
            <form name="test" action="#", method="post">
                <input type="hidden" name="id" value="1">
                <tr>
                    <td> Numero Ligne </td>
                <?php foreach (unserialize($_COOKIE['nom_col1']) as $ligne): ?>
                    <td><input type="text" name=<?php echo"colonne1{$i}";?> /> <?php echo $ligne; ?></td>
                    <?php $i = $i + 1;?>
                <?php endforeach; ?>
                <td><input type="submit" value="enregistrer div1" /></td>
                </tr>
                </form>
                <?php 
                    if (!isset($_GET['max'])){
                        $max_val = 100;
                    }
                    else{
                        $max_val = $_GET['max'];
                    }
                    $seuil = $max_val - 100;
                    for($i=$seuil;$i<=$max_val;$i++){
                        echo "<tr>";
                        echo "<td> {$i} </td>";
                        for($n=0;$n<27;$n++){
                            echo "<td> {$data_tab[$i][$n]} </td>";
                        }
                        echo "</tr>";
                    } ?>
        </table>
    </div>
    <div class="choixPage">
        <?php
            if(!isset($_GET['pageid'])){
                $before = $_GET['pageid'];
                $url = substr($_SERVER['REQUEST_URI'], 0, - strlen(strval($_GET['pageid'])));
                $urlb = $url . strval($before);
            }
            else if (!isset($_GET['max'])){
                $max = 100;
                $next = $_GET['pageid'] + 1;
                $url = substr($_SERVER['REQUEST_URI'], 0, - strlen(strval($_GET['pageid'])));
                $urln = $url . strval($next) . "&max={$max}";
            }
            else{
                $before = $_GET['pageid'] - 1;
                if ($before <= 0){
                    $before = 0;
                }
                $taille_param =  strlen(strval($_GET['pageid'])) + 5 + strlen(strval($_GET['max']));
                $url = substr($_SERVER['REQUEST_URI'], 0, - $taille_param);
                ?><br><?php
                $max_avant = $i - 100;
                if ($max_avant < 100){
                    $max_avant = 100;
                }
                $urlb = $url . strval($before) . "&max={$max_avant}";
                $max = $i + 100;
                $next = $_GET['pageid'] + 1;
                $taille_param =  strlen(strval($_GET['pageid'])) + 5 + strlen(strval($_GET['max']));
                $url = substr($_SERVER['REQUEST_URI'], 0, - $taille_param);
                $urln = $url . strval($next) . "&max={$max}";
            }
        ?>
        <?php echo "<p> <a href='{$urlb}'>&lt;</a> Test bas de page <a href='{$urln}'>&gt;</a> </p>"; ?>
    </div>