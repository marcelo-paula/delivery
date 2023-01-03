<?php

class stateModel extends Conexao{
    //metodo contrutor do banco de dados
    public function __construct(){
        $this->conn = $this->conectar();
    }

    //inserir dados
    public function insert($dados){
        if ($this->validar($dados)){
            header('Location: '.BASE_URL.'state?msg_error=Estado já cadastrado!!');
            die;
        }else {
            $sql = "INSERT INTO estado (nome, uf, ibge, pais, ddd) VALUES (:nome, :uf, :ibge, :pais, :ddd)";
            $sql = $this->conn->prepare($sql);
            $sql->bindValue(':nome', $dados['name']);
            $sql->bindValue(':uf', $dados['uf']);
            $sql->bindValue(':ibge', $dados['ibge']);
            $sql->bindValue(':pais', $dados['pais']);
            $sql->bindValue(':ddd', $dados['ddd']);
            $sql->execute();
            header('Location: '.BASE_URL.'state?msg_sucess=Cadastrado com sucesso!!');
        }
    }

    //validar dados para ver se já existe cadastrado
    public function validar($dados){
        $sql = "SELECT * FROM estado WHERE nome = :nome";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(':nome', $dados['name']);
        $sql->execute();
        if ($sql->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }

    //atualizar dados
    public function update($dados){
        $sql = "UPDATE estado SET nome = :nome, uf = :uf, ibge = :ibge, pais = :pais, ddd = :ddd WHERE id = :id";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(':nome', $dados['name']);
        $sql->bindValue(':uf', $dados['uf']);
        $sql->bindValue(':ibge', $dados['ibge']);
        $sql->bindValue(':pais', $dados['pais']);
        $sql->bindValue(':ddd', $dados['ddd']);
        $sql->bindValue(':id', $dados['id']);
    }

    //deletar dados
    public function delete($id){
        $sql = "DELETE FROM estado WHERE id = :id";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    //listar todos os dados
    public function read(){
        $sql = "SELECT * FROM estado";
        $sql = $this->conn->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}