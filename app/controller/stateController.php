<?php

class stateController{
    //chamar tela de cidades
    public function viewState(){
        $country = new countryController();
        $listCountry = $country->read();
        include 'app/view/locations/state.php';
    }

    //chama função de criação
    public function create(){
        $name = $_POST['name'];
        $uf = $_POST['uf'];
        $ibge = $_POST['ibge'];
        $pais = $_POST['pais'];
        $ddd = $_POST['ddd'];

        if (empty($name) && empty($uf) && empty($ibge) && empty($pais) && empty($ddd)){
            //caso não algum campo esteja vazio
            echo 'Preencha todos os campos';
            die;
        }else {
            $salvar = [
                'name' => $name,
                'uf' => $uf,
                'ibge' => $ibge,
                'pais' => $pais,
                'ddd' => $ddd
            ];
            $stateModel = new stateModel();
            $stateModel->insert($salvar);
        }
    }

    //chama função de deletar
    public function delete(){

    }

    //chama função de atualizar
    public function update(){

    }

    //chama função de listar
    public function read(){

    }
}