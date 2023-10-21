<?php
    class Posts extends Controller {
        public function __construct() {
            //Jika belum login, halaman posts tidak bisa dilihat
            if(!isLoggedIn()){ //fungsi berada di Session helper
                redirect('users/login');
            }


            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
            
        }
        public function index(){
            //Get Posts
            $posts = $this->postModel->getPosts();
            $data = [
                'posts' => $posts

            ];
            $this->view('posts/index', $data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //Validasi data
                if(empty($data['title'])){
                    $data['title_err'] = 'Mohon masukkan judul!';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Mohon masukkan isi teks!';
                }

                //memastikan tidak ada error
                if(empty($data['title_err']) && empty($data['body_err'])){
                    if($this->postModel->addPost($data)){
                        flash('post_message', 'Post Ditambahkan');
                        redirect('posts');
                    }else{
                        die('Ada yang salah! Silahkan coba lagi!');
                    }
                } else {
                    $this->view('posts/add', $data);
                }
            }else{
                $data = [
                    'title' => '',
                    'body' => ''
    
                ];
                $this->view('posts/add', $data);
            }
        }
        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //Validasi data
                if(empty($data['title'])){
                    $data['title_err'] = 'Mohon masukkan judul!';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Mohon masukkan isi teks!';
                }

                //memastikan tidak ada error
                if(empty($data['title_err']) && empty($data['body_err'])){
                    if($this->postModel->updatePost($data)){
                        flash('post_message', 'Post Diedit!');
                        redirect('posts');
                    }else{
                        die('Ada yang salah! Silahkan coba lagi!');
                    }
                } else {
                    $this->view('posts/edit', $data);
                }
            }else{
                //cek post
                $post = $this->postModel->getPostById($id);
                //cek user
                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }
                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body
    
                ];
                $this->view('posts/edit', $data);
            }
        }

        public function show($id){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);
            $currentURL = $this->getCurrentPageURL();
            $data = [
                'post' => $post,
                'user' => $user,
                'currentURL' => $currentURL
            ];
            $this->view('posts/show', $data);
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //cek post
                $post = $this->postModel->getPostById($id);
                //cek user
                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }
                
                if($this->postModel->deletePost($id)){
                    flash('post_message', 'Post dihapus!');
                    redirect('posts');
                } else {
                    die('Ada yang salah! silahkan coba lagi!');
                }
            } else {
                redirect('posts');
            }
        }
        // Fungsi untuk mendapatkan URL halaman saat ini
        function getCurrentPageURL() {
            $pageURL = 'http';
            // if ($_SERVER["HTTPS"] == "on") {
            //     $pageURL .= "s";
            // }
            $pageURL .= "://";
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            }
            return $pageURL;
        }
    }