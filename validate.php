<?php

require_once "Script.php";

    if( isset($_POST['json'])){
        $json = $_POST['json'];
        $script = new \Core\Script($json);
        $output = $script->validate_script();
        
        if ($output['usable']){
            // echo "Le script est valide il sera ajouté au jeu !";
            echo $_POST['json'];
            $filename =  $json['script_name'] . ".json";
            $file = fopen($filename, 'w');
            fwrite($file, $json);
            fclose($file);
            require ('config.php');
            // $config = require_once('config.php');
            // $path = $config['script_path'];
            file_put_contents($path, $file);
        }else{
            ?>
            <form id = "send" action = "update.php" method = "post">
                <input type="text" name="json" value="<?= htmlspecialchars($json); ?>" />
                <input type="text" name="errors" value="<?= htmlspecialchars(json_encode($output['errors'])) ;?>" />
            </form>
            <script>
                document.getElementById('send').submit();
            </script>
            <?php
        }
    }else{
        echo "Il semble y avoir un probleme";
    }
?>
