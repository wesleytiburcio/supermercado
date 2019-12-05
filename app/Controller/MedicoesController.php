<?php

namespace App\Controller;

use App\Model\Medicao;

class MedicoesController
{
    public function index()
    {
        $medicoes = new Medicao();
        $medicoes = $medicoes->getAllMedicoes();

        require APP . 'view/_templates/header.php';
        require APP . 'view/medicoes/index.php';
        require APP . 'view/_templates/footer.php';
        //self::requireViews('index');
    }

    public function add()
    {
        $medicoes = new Medicao();
        $medicoes->addMedicoes(strtoupper($_POST['sigla']) , $_POST['descricao']);

        header("Location: " . URL . "medicoes/index");
    }

    public function edit($id)
    {
        $medicoes = new Medicao();
        $dados = $medicoes->getUnitMedicoes($id);
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/medicoes/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function update()
    {
        //var_dump($_POST);exit;
        $medicoes = new Medicao();
        $medicoes->updateMedicoes($_POST['id'], strtoupper($_POST['sigla']), $_POST['descricao']);
//var_dump($_POST);exit;
        header("Location: " . URL . "medicoes/index");
    }

    public function delete($id)
    {
        $medicoes = new Medicao();
        $medicoes->deleteMedicoes($id);

        header("Location: " . URL . "medicoes/index");
    }

}