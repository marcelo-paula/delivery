<?php

class userController{

    //chamar tela de login
    public function login(){
        include 'app/view/users/login.php';
    }

    //chamar a tela de registro de usuário
    public function register(){
        include 'app/view/users/register.php';
    }

    //cadastrar usuario no banco de dados
    public function createUser(){

        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($password != $confirmPassword){
            //caso senhas forem diferentes
            echo 'Senhas não conferem';
            die;
        }else if (empty($name) && empty($login) && empty($password) && empty($confirmPassword)){
            //caso algum dos campos não for preenchido da mensagem de erro ao usuário
            echo 'Preencha todos os campos';
            die;
        }else {
            //todos os campos foram preenchidos, vai gravar no banco de dados
            $user = new userModel();
            $salvar = [
                'name' => $_POST['name'],
                'login' => $_POST['login'],
                'password' => $_POST['password'],
                'confirmPassword' => $_POST['confirmPassword']
            ];
            $user->insert($salvar);
            $this->login();
        }
    }

    //fazer login com usuario caso ele axista
    public function loginUser(){
        //Vai fazer login com usuario caso ele axista vai para o painel adm'
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (empty($login) && empty($password)){
            //caso algum dos campos não for preenchido da mensagem de erro ao usuário
            echo 'Preencha todos os campos';
            die;
        }else {
            //todos os campos foram preenchidos, se usuário existir faz login
            $user = new userModel();
            $logar = [
                'login' => $_POST['login'],
                'password' => $_POST['password']
            ];
            $user->login($logar);
        }
    }
}