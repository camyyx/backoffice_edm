<?php
    require_once "Script.php";

    if( isset($_POST['json'])){
        $json = $_POST['json'];
        $script = new \Core\Script($json);
        $output = $script->validate_script();
        var_dump($output);
    }else{
        echo "nonon";
    }
?>