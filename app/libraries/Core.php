<?php
/*
 * Core Class :
 * What does it do?
 *  - Creates URL
 *  - Loads core controller
 *  - Format URL -> /controller/method/params
 */

Class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        # print_r($this->getUrl());
        # get url into $url
        $url = $this->getUrl();
        # look in controllers for first folder in url
        if(file_exists('../app/controllers/'. ucwords($url[0]). '.php')){
            # if it exist, set $currentController to the first param
            $this->currentController = ucwords($url[0]);
            # then, unset the first path into url
            unset($url[0]);
        }

        # require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        # instantiate controller class
        $this->currentController = new $this->currentController;

        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        # Get parameters
        $this->params = $url ? array_values($url) : [];
        #  Call a callback with an array of parameters
        call_user_func_array([$this->currentController,
            $this->currentMethod], $this->params);


    }

    // return an array with each part of the requested url
    public function getUrl(){
        if(isset($_GET['url'])){
            // remove last / from the url
            $url = rtrim($_GET['url'],'/');
            // The FILTER_SANITIZE_URL filter removes all illegal URL characters from a string.
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // transform url into an array
            $url = explode('/', $url);
            return $url;
        }
    }
}
