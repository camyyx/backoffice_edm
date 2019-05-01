<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Entrée du script</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="./css/bootstrap.min.css">

        <script src="./watchInputFile.js"></script>
    </head>
    <body style="text-align:center">
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
                    <label style="text-align: left" id="label" class="custom-file-label" for="json">Choisissez une histoire</label>
                </div>
            </div>
        </form>
        <?php include_once ('listFiles.php')?>
        <div style="display:flex; flex-direction:column">
            <form style="margin: 10px" action = "update.php" method = "get">
                <input name="newScript" class="btn btn-info" type="submit" value="Nouveau Script">
            </form>
            <div style="display:flex; flex-direction:column">
            <button style="margin: 10px; transition: width 0.5s" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Ajout manuel
            </button>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form id="manualForm" action="validate.php" method="post">
                        <textarea class="form-control" name="json"></textarea>
                        <input style="margin:10px" class="btn btn-primary" type="submit" value = "Valider"/>
                    </form>
                </div>
            </div>
            </div>
        </div>
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