<?php
/*
 * Base controller
 * Loads the models and views
 */

class Controller{
    // Load model
    public function model($model){
        // Require model file
        require_once '../app/models/' . $model . '.php';
        // instantiate the model
        return new $model();
    }

    // Load View
    public function view($view, $data = []){
        // Check for view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            // Stop the app
            die('view does not exist');
        }
    }
}