<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Entrée du script</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="./watchInputFile.js"  crossorigin="anonymous"></script>
    </head>
    <body></body>
        <h1 style="margin: 0.5em">Ajoutez un fichier d'histoire</h1>        
        <h5 style="margin: 0.5em">N'ajouter que des fichiers en <code>.json</code></h5>
        <form style="margin: 0.5em" enctype="multipart/form-data" action="update.php" method="post">
            <!-- <textarea name="json" id="json" cols="30" rows="10"></textarea> -->
            <!-- <input style="margin: 0.5em" class="" onchange="watch(this)" type="file" name="json" id="json">
            <input style="margin: 0.5em" class="btn btn-primary" disabled="true" id="input" type="submit"> -->
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <input class="btn btn-primary" type="submit" disabled="true" id="input" value="Envoyer">
                </div>
                <div class="custom-file">
                    <input accept="json" type="file" onchange="watch(this)" name="json" style="margin: 0.5em" class="custom-file-input" id="json" lang="fr">
                    <label id="label" class="custom-file-label" for="json">Choisissez une histoire</label>
                </div>
            </div>


        </form>
        <form action = "addscriptV2.php" method = "get">
            <input type="submit" value="Nouveau script">
        </form>
        <button onclick="afficherManuel()">Ajout manuel</button>
        <form id = "manualForm" style="display:none" action="validate.php" method="post">
            <!-- <input type="text" name="json" /> -->
            <textarea name = "json"></textarea>
            <input type="submit" value = "Valider"/>
        </form>
    </body>
</html>
<!-- <?php 
    // function get_scripts() {
    //     // Get all scripts available on the folder
    //     $files = glob(SCRIPTS_PATH . '/*.json');
    //     $output = array();

    //     foreach($files as $script) {
    //         try {
    //             $filename = pathinfo($script, PATHINFO_FILENAME);
    //             $Script = new Script($filename);

    //             if(!$not_usable) {
    //                 $validator = $Script->validate_script();

    //                 if($validator['usable'])
    //                     $output[$filename] = $Script->get_header();
    //             } else
    //                 $output[$filename] = $Script->get_header();
    //         } catch(Exception $e) {
    //             echo $e;
    //         }
    //     }

    //     return $output;
    // }
?> -->
<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    input:hover{
        cursor: pointer;
    }
    button:hover{
        cursor: pointer;
    }
</style>