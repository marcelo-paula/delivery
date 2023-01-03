<?php

class userModel extends Conexao{

    //metodo contrutor do banco de dados
    public function __construct(){
        $this->conn = $this->conectar();
    }

    //inserir o usuario
    public function insert($salvar){
        if ($this->usersExists($salvar['login']) == true){
            echo 'Usuário já existe';
            die;
        }else {
            $query = "INSERT INTO users (login,name,password) VALUES (:login,:name,:password)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':name', $salvar['name']);
            $stmt->bindValue(':login', $salvar['login']);
            $stmt->bindValue(':password', $salvar['password']);
            $stmt->execute();
        }
    }

    //validar se usuário existe
    public function usersExists($login){
        $query = "SELECT * FROM users WHERE login = :login";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':login', $login);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }

    // atualizar o usuario
    public function update($dados){
        $query = "UPDATE users SET login = :login, name = :name, password = :password WHERE idUser = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':name', $dados['name']);
        $stmt->bindValue(':login', $dados['login']);
        $stmt->bindValue(':password', $dados['password']);
        $stmt->bindValue(':id', $dados['id']);
        $stmt->execute();
    }

    //deletar o usuario
    public function delete($id){
        $query = "UPDATE users SET deleted = 1 WHERE idUser = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    //vai trazer todos os usuarios
    public function read(){
        $query = "SELECT * FROM users WHERE deleted = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function validaLogin($login,$password){
        $query = "SELECT * FROM users WHERE login = :login AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($logar){
        if (empty($this->validaLogin($logar['login'], $logar['password']))){
            header('Location: /delivery/users');
            die;
        }else {
            $_SESSION['user'] = $this->validaLogin($logar['login'], $logar['password']);
            echo 'usuário existe, pode logar';
        }
    }
}