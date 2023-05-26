<?php
    if (!isset($_COOKIE['nom_col']))
    {
        #echo"putain";
        $name_col = array("field1", "field2", "field3", "field4", "field5", "field6", "field7", "field8", "field9", "field10", "field11", "field12", "field13", "field14", "field15", "field16", "field17", "field18", "field19", "field20", "field21", "field22", "field23", "field24", "field25", "field26", "field27");
        setcookie("nom_col", serialize($name_col), (time()+365*24*3600)*10);
        #echo "oh noooooooooooooooo";
        $init=0;
    }
    else{
        $init = 1;
        if (isset($_POST)){
            #print_r($_POST);
            $cook = $_POST;
            print_r($cook);
            for($i=1;$i<=27;++$i){ #ajouter un bout de code pour prendre en compte les anciens titre de div
                if ($cook['colonne'.$i] == ""){
                    $cook['colonne'.$i] = "field";
                    #print_r($cook);
                }
            }
            setcookie("nom_col", serialize($cook), (time()+365*24*3600)*10);
        }
    }
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
                <tr>
                    <td> Numero Ligne </td>
                <?php #il faut vérifier que le cookie soit initialisé, sinon afficher les valeurs par défaut : ?>
                <?php if ($init == 0){
                    foreach($name_col as $ligne){ ?>
                        <td><input type='text' name=<?php echo "colonne{$i}" ;?> /> <?php echo $ligne; ?></td>
                        <?php $i = $i + 1; ?>
                    <?php }
                }
                else{
                    foreach(unserialize($_COOKIE['nom_col']) as $ligne){ ?>
                        <?php echo $i; ?>
                        <td><input type="text" name=<?php echo"colonne{$i}";?> /> <?php echo $ligne; ?></td>
                        <?php $i = $i + 1;
                    }
                } ?>
                <td><input type="submit" value="enregistrer" /></td>
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