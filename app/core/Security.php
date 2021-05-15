<?php

class Security {
    public static function isLogin() {
        if (!isset($_SESSION['user-information'])) {
            Flasher::setFlash("Tolong login terlebih dahulu.", "Login", "error");
            header("Location: " . BASEURL . "/auth/login");   
            exit;
        }
        return;
    }
    
    public static function checkRole($roles = array()) {
        $allowed = static::checkingRoles($roles);
        static::checkingAuthorization($allowed);
    }

    public static function checkCookie() {
        if (isset($_COOKIE['id'])) {
            $db = new Database;
            $query = "SELECT * FROM user WHERE id = :id";
            $db->query($query);
            $db->bind("id", $_COOKIE['id']);
            return $db->result();
        } else {
            return false;
        }
    }

    public static function checkAuthorization($id) {
        $allowed = false;
        $role = static::checkingRoles(array("admin", "kasir"));
        if ($id == $_SESSION['user-information']['id'] || $role) {
            $allowed = true;
        }
        static::checkingAuthorization($allowed);
    }

    public static function checkingRoles($roles = array()) {
        $allowed = false;
        foreach ($roles as $role) {
            if ($role == $_SESSION['user-information']['role']) {
                $allowed = true;
                break;
            }
        }
        return $allowed;
    }

    public static function checkingAuthorization($allowed) {
        if ($allowed == false) {
            header("Location: " . BASEURL . "/errorpage/unauthorized");
            exit;
        }
    }
}