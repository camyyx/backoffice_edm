<?php

require_once "Script.php";
$config = require_once("config.php");


    if( isset($_POST['json'])){
        $json = $_POST['json'];
        $script = new \Core\Script($json);
        $output = $script->validate_script();

        if ($output['usable']){
                // echo "Le script est valide il sera ajouté au jeu !";
                $json = $_POST['json'];

                $filename = str_replace(" ", "-", $_POST['step_name']) . ".json";
                $filename = $config["scripts_path"] . "/" . $filename;

                $file = fopen($filename, 'w');
                fwrite($file, $json);
                fclose($file);
                require ('config.php');
                file_put_contents($path, $file); ?>
            <form id="goHome" action="/">
        </form>
        <script>
            document.getElementById('goHome').submit()
            </script>

            <?php
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
    } else if(isset($_POST['draft'])){
        $draft = $_POST['draft'];
        $script = new \Core\Script($draft);
        $output = $script->validate_script();

     if($output['usable']) {

        echo $_POST['draft'];
        $draft = $_POST['draft'];

        $filename = str_replace(" ", "-", $_POST['step_name']) . ".json";
        $filename = $config["drafts_path"] . "/" . $filename;

        $file = fopen($filename, 'w');
        fwrite($file, $draft);
        fclose($file);
        require ('config.php');
        file_put_contents($path, $file);
        echo "<a id='dl' href='/draft/" . $_POST['step_name'] . ".json'" . "download>Bonsoir</a>";
        ?>
        <form action="./delete.php" id="goHome" method="POST">
          <?php  echo "<input type='hidden' name='deleteDraft' value='".$_POST['step_name']."'>" ?>
          <?php echo $_POST['step_name'] ?>
        </form>
        <script>
            document.getElementById('dl').click()
            document.getElementById('goHome').submit()
        </script>
        <?php
    }else{
        ?>
        <form id = "send" action = "update.php" method = "post">
            <input type="text" name="json" value="<?= htmlspecialchars($draft); ?>" />
            <input type="text" name="errors" value="<?= htmlspecialchars(json_encode($output['errors'])) ;?>" />
        </form>
        <script>
            document.getElementById('send').submit();
        </script>
        <?php
    }
}
    else{
        echo "Il semble y avoir un probleme";
    }
?>
