<?php

class countryController{
    //vai chamar a view de country
    public function viewCountry(){
        include 'app/view/locations/country.php';
    }

    //vai inserir um novo pais
    public function create(){
        $name = $_POST['name'];
        $sigla = $_POST['sigla'];
        $bacen = $_POST['bacen'];

        if (empty($name) && empty($sigla) && empty($bacen)){
            //caso não algum campo esteja vazio
            echo 'Preencha todos os campos';
            die;
        }else {
            $salvar = [
                'name' => $name,
                'sigla' => $sigla,
                'bacen' => $bacen
            ];
            $countryModel = new countryModel();
            $countryModel->insert($salvar);
        }
    }

    //vai deletar o pais 
    public function delete(){

    }

    //vai atualizar o pais
    public function update(){

    }

    //vai listar 
    public function read(){
        $countryModel = new countryModel();
        return $countryModel->read();
    }
}