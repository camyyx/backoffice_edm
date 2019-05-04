<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Entrée du script</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="./static/dist/css/app.css">

        <script src="./static/dist/js/app.js"></script>
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
    </head>
    <body style="text-align:center">
            <div style="margin:20px;">
        <h1 style="margin: 0.5em">Become BackOffice</h1>
        <div class="card">
            <div class="card-body" style="display:flex; flex-direction:column; justify-content:center; align-items:center">
                <h5 class="card-title">Créer</h5>
                <div style="display:flex; flex-direction:row">
                    <form style="margin: 10px" action = "update.php" method = "get">
                        <input name="newScript" class="btn btn-info" type="submit" value="Nouvelle histoire">
                    </form>
                    <form style="margin:10px" action="newScript.php" method="get">
                        <input class="btn btn-info" type="submit" value="Nouveau JSON">
                    </form>
                </div>
            </div>
        </div>

<div style="margin-top:20px" class="card">
  <div class="card-body">
    <h5 class="card-title">Modifier</h5>
    <ul style="margin-bottom:10px" class="list-group">
    <li class="list-group-item active">Un brouillon de votre machine</li>
                <li class="list-group-item">
        <form style="margin: 0.5em" enctype="multipart/form-data" action="update.php" method="post">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                 <input class="btn btn-primary" type="submit" disabled="true" id="input" value="Ouvrir">
                </div>
                <div class="custom-file">
                    <input accept="json" type="file" onchange="watch(this)" name="json" style="margin: 0.5em" class="custom-file-input" id="json" lang="fr">
                    <label style="text-align: left" id="label" class="custom-file-label" for="json">Selectionner un fichier (.json)</label>

                </div>
            </div>
        </form>
                </li>
        </ul>
        <?php include_once ('listFiles.php')?>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Voulez vous vraiment supprimer ce fichier ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 30px">
                <div
                    style="display: flex; flex-direction: column; text-align: center; align-content: center; align-items: center">
                    <code id="codeFileName" style="margin-bottom: 20px"></code>
                    <div class="modal-footer">
                        <form method="POST" action="/delete.php">
                            <button type="submit" style="margin-right: 10px" class="btn btn-outline-success">Valider</button>
                            <input id='delete' type="hidden" name="delete">
                        </form>
                            <button style="margin-left: 10px" class="btn btn-outline-danger" data-dismiss="modal">Refuser</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>
    </body>
</html>