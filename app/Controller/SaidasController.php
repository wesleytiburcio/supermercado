<?php

namespace App\Controller;

use App\Model\Saida;
use App\Model\Produto;
use App\Model\Venda;

class SaidasController
{
    public function index()
    {
        $saidas = new Saida();
        $saidas = $saidas->getAllSaidas();

        $produtos = new Produto();
        $produtos = $produtos->getAllProdutos();
        $vendas = new Venda();
        $vendas = $vendas->getAllVendas();
                
        //var_dump($vendas); exit;

        require APP . 'View/_templates/header.php';
        require APP . 'View/saidas/index.php';
        require APP . 'View/_templates/footer.php';
    }

    public function add()
    {        
        $saidas = new Saida();
                
        $saidas->setProduto($_POST['idProduto']);
        $saidas->setVenda($_POST['idVenda']);
        $saidas->setValorvenda($_POST['valorvenda']);
        $saidas->setQuantidade($_POST['quantidade']);
        $saidas->setData($_POST['data']);

        $saidas->addSaidas();
        //var_dump($promocoes);exit;
        header("Location: " . URL . "saidas/index");
    }

    public function edit($id)
    {
        $produtos = new Produto();
        $relacaoProdutos = $produtos->getOnlyProdutos();
        //var_dump($relacaoProdutos);exit;
        $vendas = new Venda();
        $relacaoVendas = $vendas->getAllVendas();

        $saidas = new Saida();
        $saidas = $saidas->getUnitSaidas($id);

        require APP . 'view/_templates/header.php';
        require APP . 'view/saidas/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function update()
    {
        //var_dump($_POST);exit;
        $saidas = new Saida();

        $saidas->setId($_POST['id']);        
        $saidas->setProduto($_POST['idProduto']);
        $saidas->setVenda($_POST['idVenda']);
        
        $saidas->setValorvenda($_POST['valorvenda']);
        $saidas->setQuantidade($_POST['quantidade']);
        $saidas->setData($_POST['data']);

        //var_dump($saidas);exit;
        $saidas->updateSaidas();

        header("Location: " . URL . "saidas/index");
    }

    public function delete($id)
    {
        $saidas = new Saida();
        $saidas->deleteSaidas($id);

        header("Location: " . URL . "saidas/index");
    }

}