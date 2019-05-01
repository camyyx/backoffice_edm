<?php

namespace Core;
require('EDMException.php');


class Script {
    private $file_name = '';
    private $filepath = '';
    private $script_content = [];

    /**
     * Script constructor
     * Give some useful tools for working with game scripts
     *
     * @param $script_name script name on assets/scripts folder
     */
    // public function __construct($script_name) {
    //     // Open the JSON file
    //     if(!preg_match('/.json/', $script_name)) $this->file_name = $script_name . '.json';
    //     else $this->file_name = $script_name;

    //     $this->filepath = SCRIPTS_PATH . '/' . $this->file_name;

    //     if(!file_exists($this->filepath))
    //         throw new EDMException('Specified script not found.');

    //     $file = file_get_contents($this->filepath);

    //     // Try to decode JSON
    //     $this->script_content = json_decode($file, true);
    // }
    public function __construct($json){
        $this->script_content = json_decode($json, true);
        $this->file_name = $script_content['script'] . ".json";
        $this->filepath = SCRIPTS_PATH . '/' . $this->file_name;
    }


    /**
     * Obtain the header from the script
     *
     * @return String the header of the script
     */
    public function get_header() {
        $banned_keys = [ 'steps' ];
        $output = array();

        foreach($this->script_content as $key => $value) {
            if(!in_array($key, $banned_keys))
                $output[$key] = $value;
        }

        return $output;
    }


    /**
     * Return step content
     */
    public function get_step($step_name) {
        $step = $this->script_content['steps'][$step_name];

        if(isset($step))
            return $step;
        else
            throw new EDMException('The step not exists.');
    }


    // /**
    //  * Return availables scripts
    //  * @param not_usable Returns all scripts even those that are not usable
    //  */
    // public static function get_scripts($not_usable = false) {
    //     // Get all scripts available on the folder
    //     $files = glob(SCRIPTS_PATH . '/*.json');
    //     $output = array();

    //     foreach($files as $script) {
    //         try {
    //             $filename = pathinfo($script, PATHINFO_FILENAME);
    //             $Script = new Script($filename);
    //                 $output[$filename] = $Script->get_header();
    //         } catch(Exception $e) {
    //             echo $e;
    //         }
    //     }

    //     return $output;
    // }

    /**
     * Validate_script
     * Check if the script is valid and return if the script is usable and the list of errors.
     *
     * @return array return the status and the list of errors
     */
    public function validate_script() {
        $output = array(
            'usable' => false,
            'errors' => array()
        );

        // Try to decode JSON
        if(is_null($this->script_content)) {
            array_push($output['errors'], "Impossible de lire l'histoire " . $file_name . " parce que ce n'est pas un schéma JSON valide.");
            return $output;
        }

        // Check the header
        $header_keys = [ 'script_name', 'summary', 'script_background', 'version', 'initial_step', 'steps' ];

        foreach($this->script_content as $key => $value) {
            if(in_array($key, $header_keys)) {
                $pos = array_search($key, $header_keys);
                unset($header_keys[$pos]);
            }

            if(empty($value))
                array_push($output['errors'], "'{$key}' existe mais est vide.");
        }

        // Generate error for every missed key
        foreach($header_keys as $key) {
            array_push($output['errors'], "'{$key}' la clé dans l'en-tête est requise mais introuvable.");
        }

        // Check steps
        $step_keys = [ 'question', 'answers' ];

        foreach($this->script_content['steps'] as $step_key => $step_content) {
            $local_steps = $step_keys;

            foreach($step_content as $key => $value) {
                if(in_array($key, $local_steps)) {
                    $pos = array_search($key, $local_steps);
                    unset($local_steps[$pos]);
                }

                if($key != 'options' && empty($value))
                    array_push($output['errors'], "Dans '{$step_key}' l'étape '{$key}' existe mais est vide.");
            }

            // Generate error for every missed key
            foreach($local_steps as $key) {
                var_dump($key);
                array_push($output['errors'], "L'étape {$key}' dans '{$step_key}' est requise mais n'est pas trouvée.");
            }

            // Go to next step if remain keys in $local_steps
            if(count($local_steps) > 0) continue;

            // Check the content of answers
            $answer_it = 1; // Counter for returning the position of the faulty answer when an error is detected

            foreach($step_content['answers'] as $answer) {
                // Check if the answer key exists and if is not empty
                if(!array_key_exists('answer', $answer))
                    array_push($output['errors'], "Dans l'étape '{$step_key}', la question 'question{$answer_it}' est requise mais pas trouvée.");
                else if(empty($answer['answer']) || is_null($answer['answer']))
                    array_push($output['errors'], "Dans l'étape '{$step_key}', la réponse 'answer{$answer_it}' existe mais n'est pas trouvée.");

                // Check options parameters
                if(array_key_exists('actions', $answer) && is_array($answer['actions'])) {
                    $action_it = 0;

                    foreach($answer['actions'] as $option) {
                        if(!array_key_exists('action', $option) || empty($option['action']) || is_null($option['action']))
                            array_push($output['errors'], "L'action n°{$action_it} dans la réponse n°{$answer_it}, de l'étape '{$step_key}', n'a pas d' 'action' définie.");

                        if(!array_key_exists('value', $option))
                            array_push($output['errors'], "L'action n°{$action_it} dans la réponse n°{$answer_it}, de l'étape '{$step_key}', n'a pas d' 'value' définie.");

                        $action_it++;
                    }
                } else if(!is_array($answer['actions']))
                    array_push($output['errors'], "L'action dans l'étape '{$step_key}', de la réponse n°{$answer_it} n'est pas un tableau.");

                // Check if next_step is present and check if the step not block the game
                if(!array_key_exists('next_step', $answer) || empty($answer['next_step']) || is_null($answer['next_step'])) {
                    $static_steps = [ 'end_game' ]; // List of all actions which redirect to static step
                    $find_action = false;

                    if(isset($action_it) && $action_it > 0) {
                        foreach($answer['actions'] as $action) {
                            if(in_array($action['action'], $static_steps)) {
                                $find_action = true;
                                continue;
                            }
                        }
                        if(!$find_action)
                            array_push($output['errors'], "La réponse n°{$answer_it} dans l'étape '{$step_key}' n'as pas d'action 'next_step{$answer_it}'. Le jeu s'arrêtera à cette étape.");
                    } else
                        array_push($output['errors'], "La réponse n°{$answer_it} dans l'étape '{$step_key}' n'a pas d'action 'next_step{$answer_it}'. Le jeu s'arrêtera à cette étape.");
                } else {
                    if($answer['next_step'] == $step_key)
                        array_push($output['errors'], "Dans l'étape '{$step_key}' le 'next_step{$answer_it}' dans la réponse n°{$answer_it}  s'appelle elle-même.");
                    else if(!array_key_exists($answer['next_step'], $this->script_content['steps']))
                        array_push($output['errors'], "Dans l'étape '{$step_key}' le 'next_step{$answer_it}' dans la réponse n°{$answer_it} appelle une étape inconnue.");
                }

                $answer_it++;
            }
        }

        // Determine if the script is usable or not and return the array
        if(count($output['errors']) > 0)
            return $output;
        else
            $output['usable'] = true;
            return $output;
    }

}
?>