<?php

namespace App\Controller;

use App\Model\Categoria;
use App\Model\Fornecedor;
use App\Model\Medicao;
use App\Model\Produto;

class ProdutosController
{
    public function index()
    {
        $produtos = new Produto();
        $produtos = $produtos->getAllProdutos();
        
        $categorias = new Categoria();
        $categorias = $categorias->getAllCategorias();

        $fornecedores = new Fornecedor();
        $fornecedores = $fornecedores->getAllFornecedores();

        $medicoes = new Medicao();
        $medicoes = $medicoes->getAllMedicoes();
        
        require APP . 'View/_templates/header.php';
        require APP . 'View/produtos/index.php';
        require APP . 'View/_templates/footer.php';


    }

    public function add()
    {        
        $produtos = new Produto();
        $produtos->setNome($_POST['nome']);
        $produtos->setPrecodecusto($_POST['precodecusto']);
        $produtos->setPrecodevenda($_POST['precodevenda']);
        $produtos->setFornecedor($_POST['idFornecedor']);
        $produtos->setCategoria($_POST['idCategoria']);
        $produtos->setMedicao($_POST['idMedicao']);

        $produtos->addProdutos();

        header("Location: " . URL . "produtos/index");
    }

    public function edit($id)
    {
        $categorias = new Categoria();
        $categorias = $categorias->getAllCategorias();

        $fornecedores = new Fornecedor();
        $fornecedores = $fornecedores->getAllFornecedores();

        $medicoes = new Medicao();
        $medicoes = $medicoes->getAllMedicoes();

        $produtos = new Produto();
        $dados = $produtos->getUnitProdutos($id);

       // var_dump($dados);exit;
        require APP . 'view/_templates/header.php';
        require APP . 'view/produtos/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function update()
    {
        //var_dump($_POST);exit;
        $produtos = new Produto();

        $produtos->setId($_POST['id']);
        $produtos->setNome($_POST['nome']);
        $produtos->setPrecodecusto($_POST['precodecusto']);
        $produtos->setPrecodevenda($_POST['precodevenda']);
        $produtos->setFornecedor($_POST['idFornecedor']);
        $produtos->setCategoria($_POST['idCategoria']);
        $produtos->setMedicao($_POST['idMedicao']);
       
        //var_dump($produtos);exit;
        $produtos->updateProdutos();

        header("Location: " . URL . "produtos/index");
    }

    public function delete($id)
    {
        $produtos = new Produto();
        $produtos->deleteProdutos($id);

        header("Location: " . URL . "produtos/index");
    }

}