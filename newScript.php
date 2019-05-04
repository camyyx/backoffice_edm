<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau JSON</title>
    <link rel="stylesheet" href="./static/dist/css/app.css">
</head>
<body>
    <div style="display:flex; flex-direction:column; justify-content:center; align-items:center; margin-top:10%">
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; margin-bottom: 30px">
            <h1>Nouveau JSON</h1>
            <a style="margin-left:100px" class="btn btn-outline-secondary" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M16 9l-3-3V2h-2v2L8 1 0 9h2l1 5c0 .55.45 1 1 1h8c.55 0 1-.45 1-1l1-5h2zm-4 5H9v-4H7v4H4L2.81 7.69 8 2.5l5.19 5.19L12 14z"/></svg>
            </a>
        </div>
        <form style="display:flex; flex-direction:column; justify-content:center; align-items:center" id="manualForm" action="validate.php" method="post">
            <textarea rows="10" cols="50" require class="form-control" name="json"></textarea>
            <input style='margin-top:20px' class="btn btn-primary" type="submit" value = "Valider"/>
        </form>
    </div>
</body>
</html>