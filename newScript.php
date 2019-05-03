<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau JSON</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.css" >
</head>
<body>
    <div style="display:flex; flex-direction:column; justify-content:center; align-items:center; margin-top:10%">
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; margin-bottom: 30px">
            <h1>Nouveau JSON</h1>
            <a style="margin-left:100px" href="/"><button class="fas fa-home btn btn-outline-secondary"></button></a>
        </div>
        <form style="display:flex; flex-direction:column; justify-content:center; align-items:center" id="manualForm" action="validate.php" method="post">
            <textarea rows="10" cols="50" require class="form-control" name="json"></textarea>
            <input style='margin-top:20px' class="btn btn-primary" type="submit" value = "Valider"/>
        </form>
    </div>
</body>
</html>