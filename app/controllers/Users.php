<?php
Class Users extends Controller {
    public function __construct(){

    }

    public function register(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST]'){
            // Process Form
        } else {
            // Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirmed_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirmed_password_error' => ''
            ];

            // Load View
            $this->view('users/register', $data);
        }
    }

    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST]'){
            // Process Form
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => '',
            ];
            // Load View
            $this->view('users/login', $data);
        }
    }
}
