<?php

    if(isset($_POST('json'))){
        $jsonString = $_POST('json');
        $json = json_decode($jsonString);
        $filename =  $json['script_name'] . ".json";
        $file = fopen($filename, 'w');
        fwrite($file, $jsonString);
        fclose($file);
        require ('config.php');
        file_put_contents($path, $file);
    }
?>