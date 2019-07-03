<?php
Class Users extends Controller {
    public function __construct(){

    }

    public function register(){

        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process Form

            // Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             // Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' =>  trim($_POST['email']),
                'password' =>  trim($_POST['password']),
                'confirmed_password' => trim($_POST['confirmed_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirmed_password_error' => ''
            ];

            // Validate Email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter an email';
            } else {
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
                    $data['email_error'] = "Invalid email address";
            }

            // Validate name
            if(empty($data['name'])){
                $data['name_error'] = 'Please enter a name';
            }

            // Validate password
            if(empty($data['password'])){
                $data['password_error'] = 'Please enter a password';
            } elseif(strlen($data['password']) < 6){
                $data['password_error'] = 'Password must be at least 6 character long';
            }

            if(empty($data['confirmed_password'])) {
                $data['confirmed_password_error'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirmed_password']){
                    $data['confirmed_password_error'] = 'Password do not match';
                }
            }

            // Make sure there is no errors
            if( empty($data['email_error'])     &&
                empty($data['name_error'])      &&
                empty($data['password_error'])  &&
                empty($data['confirmed_password_error'])){
                    // Validated
                    die("SUCCESS");
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }

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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process Form
            // Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             // Init data
            $data = [
                'email' =>  trim($_POST['email']),
                'password' =>  trim($_POST['password']),
                'email_error' => '',
                'password_error' => '',
            ];
             // Validate Email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter an email';
            } else {
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
                    $data['email_error'] = "Invalid email address";
            }
            // Validate password
            if(empty($data['password'])){
                $data['password_error'] = 'Please enter password';
            }

             // Make sure there is no errors
            if( empty($data['email_error'])     &&
                empty($data['password_error'])){
                    // Validated
                    die("SUCCESS");
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

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
