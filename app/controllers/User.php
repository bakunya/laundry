<?php 

class User extends Controller {
    public function index() {
       header("Location: " . BASEURL . "/errorpage/notfound");
    }
}