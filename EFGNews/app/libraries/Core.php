<?php
    //App Core class (Membuat URL dan core controllers)
    //Contoh URL - /controller/methods/params

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            //$this->getUrl();
            $url = $this->getUrl();

            //index 0 digunakan untuk mencari nama file controllers
            if(isset($url[0])){
                if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                    //jika ada, maka diset sebagai controller
                    $this->currentController = ucwords($url[0]);
                    //unset index 0
                    unset($url[0]);
                }
            }

            //Controller Require
            require_once '../app/controllers/' . $this->currentController . '.php';

            //inisiasi class controller
            $this->currentController = new $this->currentController;

            //Cek bagian kedua URL
            if(isset($url[1])){
                //Cek apakah ada method dengan nama yang sama
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    //unset index 1
                    unset($url[1]);
                }
            }
            
            // Mendapatkan Params
            $this->params = $url ? array_values($url) : [];

            // membuat satuan array menjadi parameter
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }