<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Ajout script</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div style='margin-top:2em; margin-bottom: 2em' class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php include('form.html') ?>
                </div>
                <!-- Latest compiled and minified JavaScript -->
                <!-- <script src="addscriptV2.js"></script> -->                
                
                <?php
            echo '<script>';
            include('allFunctions.js');
            echo '</script>';

            function allErrors($err){
                echo "<button onclick='func(this.innerText)' class='list-group-item'>$err</button>";
            }
            
            if(isset($_POST['errors'])){
                echo '<div class="col-md-6">';
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
            if(isset($_POST['newScript'])){
                echo '<script>';
                echo 'var jsonstring = ' . json_encode($_POST['json']) . ';';
                include('update.js');
                echo '</script>';
            }
            ?>
            </div>
        </div>
    </body>
</html>