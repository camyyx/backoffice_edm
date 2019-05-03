<?php
    /**
     * Return availables scripts
     * @param not_usable Returns all scripts even those that are not usable
     */
    function get_scripts() {
        // Get all scripts available on the folder
        $config = require_once('config.php');
        $path = $config['script_path'];
        $files = scandir($path); //glob(SCRIPTS_PATH . '/*.json');
        $output = array();
        foreach($files as $script) {
            try {
                    $filepath = $path . '/' . $script;
                    if(!file_exists($filepath))
                        throw new Exception('Specified script not found.');
                    $file = file_get_contents($filepath);
                    $json = json_decode($file, true);
                    if (!is_null($json)){
                        $output[$script] = $json;
                    }
            } catch(Exception $e) {
                echo $e;
            }
        }
        return $output;
    }

    $list = get_scripts();
    echo "<ul class='list-group'>";
    echo "<li class='list-group-item active'>Une histoire du serveur</li>";
    foreach($list as $key => $value){
        echo "<li class='list-group-item'>";
        echo "<div style='display:flex; flex-direction:row'>";
        echo "<form id='json' action='update.php' method='post'>";
        echo "<input type = 'hidden' id = 'json' name = 'json' value=\"" . htmlspecialchars(json_encode($value)) . "\"/>";
        echo "<div style='display:flex; flex-direction: row'>";
        echo "<label class='lead' style='margin-right: 10px' for=\"" .$key. "\">". $key ."</label>";
        echo "<input style='margin-right: 20px' class='btn btn-outline-primary btn-sm' type = 'submit' value = 'Modifier'/>";
        echo "</div>";
        echo "</form>";
        echo "<button onclick=(deleteFunction('".$key."')) data-toggle='modal' data-target='#deleteModal' class='btn btn-outline-danger btn-sm' type = 'submit' name='Supprimer'>Supprimer</button>";
        echo "</div>";
        echo "</li>";
    }
    echo "</ul>";
    // echo "<button onclick= 'jsonChoice()'>Modifier</button>"
?>

<script>
    const getName = (nameWithExtension) => {
        return nameWithExtension.toUpperCase()
    }
    const deleteFunction = (name) => {
        document.querySelector('#delete').value = name
        document.querySelector('#codeFileName').textContent = name
    }
</script>
    <!-- <script> var choiceList = <?php echo $list ;?>;</script>
    <form id = 'submitJson' action = 'update.php' method = 'post'  >
        <input type = 'hidden' id = 'json' name = 'json'/>
    </form> -->
