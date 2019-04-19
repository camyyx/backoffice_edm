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
    
    foreach($list as $key => $value){
        echo "<form id='json' action='update.php' method='post'>";
        echo "<input type = 'hidden' id = 'json' name = 'json' value=\"" . htmlspecialchars(json_encode($value)) . "\"/>"; 
        echo "<label for=\"" .$key. "\">". $key ."</label>";
        echo "<input type = 'submit' value = 'Modifier'/>";
        echo "</form>";
    }
    // echo "<button onclick= 'jsonChoice()'>Modifier</button>"
?>
    <!-- <script> var choiceList = <?php echo $list ;?>;</script>
    <form id = 'submitJson' action = 'update.php' method = 'post'  >
        <input type = 'hidden' id = 'json' name = 'json'/> 
    </form> -->
   