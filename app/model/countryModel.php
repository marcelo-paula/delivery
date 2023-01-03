<?php

class countryModel extends Conexao{
    //metodo contrutor do banco de dados
    public function __construct(){
        $this->conn = $this->conectar();
    } 

    //inserir o pais
    public function insert($salvar){
        if ($this->countryExists($salvar['name']) == true){
            echo 'País já existe';
            die;
        }else {
            $query = "INSERT INTO pais (nome_pt,sigla,bacen) VALUES (:nome_pt,:sigla,:bacen)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nome_pt', $salvar['name']);
            $stmt->bindValue(':sigla', $salvar['sigla']);
            $stmt->bindValue(':bacen', $salvar['bacen']);
            $stmt->execute();
        }
    }

    //validar se o país existe
    public function countryExists($name){
        $query = "SELECT * FROM pais WHERE nome_pt = :nome_pt";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nome_pt', $name);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }

    //deletar o país
    public function delete($id){
        $query = "DELETE FROM pais WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    //vai trazer todos os países
    public function read(){
        $query = "SELECT * FROM pais";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}