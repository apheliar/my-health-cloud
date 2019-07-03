<?php


class Pages extends Controller {

    public function __construct(){
    }

    public function index(){

        $data = [
            'title' => 'My Healthy Cloud',
            'description' => 'This cloud will let you upload
                              and download document, while keeping the medical secrecy between you and your patient.
                             '
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About',
            'description' => 'App to share document between medical staff and client'
        ];
        $this->view('pages/about', $data);
    }
}