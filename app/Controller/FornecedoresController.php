<?php

namespace App\Controller;

use App\Model\Fornecedor;

class FornecedoresController
{
    public function index()
    {
        $fornecedores = new Fornecedor();
        $fornecedores = $fornecedores->getAllFornecedores();

        require APP . 'view/_templates/header.php';
        require APP . 'view/fornecedores/index.php';
        require APP . 'view/_templates/footer.php';
        //self::requireViews('index');
    }

    public function add()
    {
        $fornecedores = new Fornecedor();
        $fornecedores->addFornecedores($_POST['nome'], $_POST['email'], $_POST['telefone'] );

        header("Location: " . URL . "fornecedores/index");
    }

    public function edit($id)
    {
        $fornecedores = new Fornecedor();
        $dados = $fornecedores->getUnitFornecedores($id);

        //var_dump($dados);exit;
        require APP . 'view/_templates/header.php';
        require APP . 'view/fornecedores/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function update()
    {
        $fornecedores = new Fornecedor();

        $fornecedores->updateFornecedores($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['telefone']);
        
        header("Location: " . URL . "fornecedores/index");
    }

    public function delete($id)
    {
        $fornecedores = new Fornecedor();
        $fornecedores->deleteFornecedores($id);

        header("Location: " . URL . "fornecedores/index");
    }

}