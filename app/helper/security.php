<?php

class Security{
    
    public function logout(){
        session_destroy();
        header('Location: '.BASE_URL);
    }

    public function verificationLogin(){
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASE_URL);
        }
    }
}