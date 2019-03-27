<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Entrée du script</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="./watchInputFile.js"  crossorigin="anonymous"></script>

    </head>
    <body>
        <h1 style="margin: 0.5em">Ajoutez un fichier d'histoire</h1>        
        <h5 style="margin: 0.5em">N'ajouter que des fichiers en <code>.json</code></h5>
        <form style="margin: 0.5em" enctype="multipart/form-data" action="update.php" method="post">
            <!-- <textarea name="json" id="json" cols="30" rows="10"></textarea> -->
            <!-- <input style="margin: 0.5em" class="" onchange="watch(this)" type="file" name="json" id="json">
            <input style="margin: 0.5em" class="btn btn-primary" disabled="true" id="input" type="submit"> -->
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <button class="btn btn-primary" type="button"  disabled="true" id="input">Envoyer</button>
                </div>
                <div class="custom-file">
                    <input accept="json" type="file" onchange="watch(this)" name="json" style="margin: 0.5em" class="custom-file-input" id="json" lang="fr">
                    <label id="label" class="custom-file-label" for="json">Choisissez une histoire</label>
                </div>
            </div>


        </form>
    </body>
</html>

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