<?php
/**
     * Script constructor
     * Give some useful tools for working with game scripts
     * 
     * @param $script_name script name on assets/scripts folder
     */
    function __construct($script_name) {
        // Open the JSON file
        if(!preg_match('/.json/', $script_name)) $this->file_name = $script_name . '.json';
        else $this->file_name = $script_name;

        $this->filepath = SCRIPTS_PATH . '/' . $this->file_name;

        if(!file_exists($this->filepath))
            throw new Exception('Specified script not found.');

        $file = file_get_contents($this->filepath);

        // Try to decode JSON
        $this->script_content = json_decode($file, true);
    }

/**
     * Return availables scripts
     * @param not_usable Returns all scripts even those that are not usable
     */
    function get_scripts($not_usable = false) {
        // Get all scripts available on the folder
        $files = glob(SCRIPTS_PATH . '/*.json');
        $output = array();

        foreach($files as $script) {
            try {
                $filename = pathinfo($script, PATHINFO_FILENAME);
                $Script = new listFiles($filename);
                    $output[$filename] = $Script->get_header();
            } catch(Exception $e) {
                echo $e;
            }
        }

        return $output;
    }
?>