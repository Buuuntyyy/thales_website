<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        echo "gettttt";
        $titrediv1 = array("Colonne 1", "Colonne 2", "Colonne 3", "Colonne 4", "Colonne 5",
        "Colonne 6", "Colonne 7", "Colonne 8", "Colonne 9", "Colonne 11", "Colonne 22", "Colonne 33", "Colonne 44", "Colonne 55",
        "Colonne 66", "Colonne 77", "Colonne 88", "Colonne 99", "Colonne 111", "Colonne 222", "Colonne 333", "Colonne 444", "Colonne 555",
        "Colonne 666", "Colonne 777", "Colonne 888", "Colonne 999");

        try {
            $bd = new PDO ( "mysql:host=localhost;dbname=thales",
            "root", "" );
            $bd->exec('SET NAMES utf8');
            echo "okk";
        }
        catch (Exception $e) {
            die ("Erreur: Connexion à la base impossible");
        }
    
        $res=$bd->prepare("SELECT * FROM udp1 INNER JOIN execution ON udp1.id_exec = execution.exec_id");
        $res->execute();
        $data_tab = $res->fetchAll();

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
    }
    else if (!isset($_COOKIE['nom_col1'])){
        $name_col1 = array("field1", "field2", "field3", "field4", "field5", "field6", "field7", "field8", "field9", "field10", "field11", "field12", "field13", "field14", "field15", "field16", "field17", "field18", "field19", "field20", "field21", "field22", "field23", "field24", "field25", "field26", "field27");
        setcookie("nom_col1", serialize($name_col1), (time()+365*24*3600)*10);
    }
    else{
        echo "pas ok";
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
            <?php for($i=0;$i<sizeof($data_tab);$i++){
                for($n=0;$n<sizeof($data_tab);$n++){
                    print_r($data_tab[$i][$n]);
                    ?><br><?php
                }
            }?>
            </tr>
            
        </table>
    </div>