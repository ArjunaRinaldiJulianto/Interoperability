<?php
    class Users extends Controller{
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register(){
            //cek POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Proses Form

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                //Memastikan tidak ada field yang kosong
                //validasi email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Silahkan isi Email!';
                } else {
                    //Cek Email yang ada
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email telah ada!';
                    }
                }

                //validasi Nama
                if(empty($data['name'])) {
                    $data['name_err'] = 'Silahkan isi nama!';
                }

                //validasi password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Silahkan isi password!';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password harus lebih dari 6 karakter!';
                }

                //validasi confirm password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Silahkan isi kembali password!';
                } else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Password tidak sama!';
                    }
                }

                //Setelah melakukan semua validasi, pastikan tidak ada error yang terjadi
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    
                    //Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User - Redirect otomatis setelah register
                    if($this->userModel->register($data)){
                        flash('register_success', 'Akun anda telah dibuat!');
                        redirect('users/login');
                    } else {
                        die('Ada yang salah! Silahkan coba lagi!');
                    }
                } else {
                    //Load View dengan error
                    $this->view('users/register', $data);
                }



            } else {
                //init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Load Views
                $this->view('users/register', $data);
            }
        }

        public function login(){
            //cek POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Proses Form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];
                //Memastikan Email dan Password tidak kosong
                //validasi email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Silahkan isi Email!';
                }
                //validasi password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Silahkan isi password!';
                }

                //Cek adanya email
                if($this->userModel->findUserByEmail($data['email'])){
                    //Email ditemukan

                } else {
                    //Email tidak ditemukan
                    $data['email_err'] = 'Email tidak ada!';
                }

                //Setelah melakukan semua validasi, pastikan tidak ada error yang terjadi
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    
                    $logInUser = $this->userModel->login($data['email'], $data['password']);
                    if($logInUser){
                        //Membuat Session
                        $this->createUserSession($logInUser);
                    } else {
                        $data['password_err'] = 'Password Salah!';
                        $this->view('users/login', $data);
                    }
                } else {
                    //Load View dengan error
                    $this->view('users/login', $data);
                }
                
            } else {
                //init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                //Load Views
                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('posts');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);

            session_destroy();
            redirect('users/login');
        }

        
    }