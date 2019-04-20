<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Entrée du script</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="./watchInputFile.js"  crossorigin="anonymous"></script>
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
            <form style="margin: 10px" action = "addscriptV2.php" method = "get">
                <input class="btn btn-info" type="submit" value="Nouveau script">
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