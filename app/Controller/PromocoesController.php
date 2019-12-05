<?php

namespace App\Controller;

use App\Model\Promocao;
use App\Model\Produto;

class PromocoesController
{
    public function index()
    {
        $promocoes = new Promocao();
        $promocoes = $promocoes->getAllPromocoes();

        $produtos = new Produto();
        $produtos = $produtos->getAllProdutos();
                
        //var_dump($promocoes); exit;

        require APP . 'View/_templates/header.php';
        require APP . 'View/promocoes/index.php';
        require APP . 'View/_templates/footer.php';


    }

    public function add()
    {        
        $promocoes = new Promocao();
        $promocoes->setNome($_POST['nome']);
        $promocoes->setPorcentagem($_POST['porcentagem']);        
        $promocoes->setProduto($_POST['idProduto']);

        $promocoes->addPromocoes();
        //var_dump($promocoes);exit;
        header("Location: " . URL . "promocoes/index");
    }

    public function edit($id)
    {

        $produtos = new Produto();
        $relacaoProdutos = $produtos->getOnlyProdutos();

        //var_dump($relacaoProdutos);exit;
        $promocoes = new Promocao();
        $umaPromocao = $promocoes->getUnitPromocoes($id);

        
        require APP . 'view/_templates/header.php';
        require APP . 'view/promocoes/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function update()
    {
        var_dump($_POST);exit;
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
        $promocoes = new Promocao();
        $promocoes->deletePromocoes($id);

        header("Location: " . URL . "promocoes/index");
    }

}