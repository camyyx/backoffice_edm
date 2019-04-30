<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Ajout script</title>
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jsquery.min.js"></script>
    <script src="./dist/js/ugly_app.js"></script>
</head>

<body>
    <div style='margin-top:2em; margin-bottom: 2em' class="container">
        <div class="row">
            <div class="col-md-6">
                <?php include('form.html') ?>
            </div>
            <!-- Latest compiled and minified JavaScript -->
            <!-- <script src="addscriptV2.js"></script> -->
            <!-- <script src="update.js"></script> -->

            <?php

            function allErrors($err)
            {
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
            if (isset($_FILES['json'])) {
                echo '<script>';
                echo 'var jsonstring = ' . file_get_contents($_FILES['json']['tmp_name']) . ';';
                echo 'update(jsonstring)';
                echo '</script>';
            }
            if (isset($_POST['json'])) {
                echo '<script>';
                echo 'var jsonstring = ' . json_encode($_POST['json']) . ';';
                echo 'update(jsonstring)';
                echo '</script>';
            }
            if (isset($_GET['newScript'])) {
                var_dump('gneugneu');
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
                };';
                echo 'update(jsonstring)';
                echo '</script>';
            }
                ?>
            </div>
        </div>
    </body>

    </html>