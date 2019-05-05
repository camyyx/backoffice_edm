<?php

//The name of the folder.
$folder = './draft';

//Get a list of all of the file names in the folder.
$files = glob($folder . '/*');

//Loop through the file list.
foreach($files as $file){
    //Make sure that this is a file and not a directory.
    if(is_file($file)){
        echo $file;
        //Use the unlink function to delete the file.
        unlink($file);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Ajout script</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="./static/dist/css/app.css">

        <script src="./static/dist/js/app.js" ></script>

    </head>
    <body>
        <div style='margin-top:2em; margin-bottom: 2em' class="container">
        <div class="row">
                <div class="col-lg-6 col-md-8">
                    <?php include('form.html') ?>
                </div>

                <?php
            // echo '<script>';
            // include('allFunctions.js');
            // echo '</script>';

            function allErrors($err){
                echo "<button onclick='func(this.innerText)' class='list-group-item'>$err</button>";
            }

            if(isset($_POST['errors'])){
                echo '<div class="col-lg-6 col-md-4">';
                echo '<ul id="superUL" class="list-group">';
                echo '<li style="text" class="list-group-item list-group-item-danger">Vous avez quelques erreurs</li>';
                echo array_map(allErrors, json_decode($_POST['errors']));
                echo '</ul>';
                echo '<script>';
                echo 'var errors = ' . json_encode($_POST['errors']) . ';';
                echo 'document.getElementById("superUL").lastChild.remove();';
                echo '</script>';
                echo'</div>';
            }
            if(isset($_FILES['json'])){
                echo '<script>';
                echo 'var jsonstring = ' . file_get_contents($_FILES['json']['tmp_name']) . ';';
                include('update.js');
                echo '</script>';
            }
            if(isset($_POST['json'])){
                echo '<script>';
                echo 'var jsonstring = ' . json_encode($_POST['json']) . ';';
                include('update.js');
                echo '</script>';
                }
            if(isset($_GET['newScript'])){
                echo '<script>';
                echo 'const jsonstring = {
                    "script_name": "",
                    "summary": "",
                    "script_background": "",
                    "version": 2.0,
                    "initial_step": "",
                    "steps": {
                        "you_first_step": {
                            "question": "",
                            "answers": [
                                {
                                    "answer": "",
                                    "return_message": null,
                                    "actions": [
                                        { "action": "add_points", "value": 0 }
                                    ],
                                    "next_step": null
                                },
                                {
                                    "answer": "",
                                    "return_message": "",
                                    "actions": [
                                        { "action": "add_points", "value": 0 }
                                    ],
                                    "next_step": null
                                }
                            ],
                            "options": {}
                        }
                    }
                };' ;
                include('update.js');
                echo '</script>';
            }
            ?>
            </div>
        </div>
    </body>
</html>
