<?php
    //Base Controller (Load Model dan View)
    class Controller {
        // Load model
        public function model($model) {
            // Require model file
            require_once '../app/models/' . $model . '.php';

            // inisiasi model
            return new $model();
        }
        // Load Views
        public function view($view, $data = []){
            // cek view file
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else {
                //views tidak ada
                die('Views tidak ada');
            }
        }
    }