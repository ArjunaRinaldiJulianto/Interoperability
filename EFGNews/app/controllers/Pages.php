<?php
    class Pages extends Controller {
        public function __construct(){

            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        public function index(){
            if(isLoggedIn()){
                redirect('posts');
            }
            $post = $this->postModel->getPosts();
            $data = [
                'title' => 'EFG News',
                'description' => 'Simple Webpages Network built on the EFG News Framework',
                'post' => $post
            ];

            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'title' => 'About Us',
                'description' => 'App to Share News'
            ];
            $this->view('pages/about', $data);
        }
    }