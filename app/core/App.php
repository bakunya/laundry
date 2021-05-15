<?php

class App {
    private $controller = "Home";
    private $method = "index";
    private $params = [];

    public function __construct() {
        $url = $this->parseURL();
        // set controller
        $url = $this->setController($url);

        // set method
        $url = $this->setMethod($url);

        // set params
        $this->setParams($url);

        // run controller & method, and send the params if exists
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // method for instance controller class and set to controller object
    private function setController($url) {
        if (isset($url[0])) {
            if (file_exists("../app/controllers/" . ucfirst($url[0]) . ".php")) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            }
        }

        // instance controller class and set to controller object
        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        return $url;
    }

    // method for set method object
    private function setMethod($url) {
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        return $url;
    }

    // method for set params object
    private function setParams($url) {
        if (!empty($url)) {
            $this->params = array_values($url);
        }
    }

    private function parseURL() {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, "/");
            $url = str_replace('\/', ' ', filter_var(str_replace(' ', '\/', $url), FILTER_SANITIZE_URL));
            $url = explode("/", $url);
            return $url;
        }
    }
}