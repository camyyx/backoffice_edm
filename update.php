<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Ajout script</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div style='margin-top:20px' class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php include('form.html') ?>
                </div>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
                <!-- <script src="addscriptV2.js"></script> -->
                <!-- <script src="update.js"></script> -->
                
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
                echo '<li class="list-group-item list-group-item-danger">Vous avez quelques erreurs</li>';
                echo array_map(allErrors, json_decode($_POST['errors']));
                echo '</ul>';
                echo '<script>';
                echo 'var errors = ' . json_encode($_POST['errors']) . ';';
                echo 'document.getElementById("superUL").lastChild.remove();';
                echo '</script>';
                echo'</div>';
            }
            if(isset($_POST['json'])){
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

