<?php

namespace App\Controller;

use App\Model\Venda;

class VendasController
{

    public function index()
    {
        $vendas = new Venda();
        $vendas = $vendas->getAllVendas();
        
        //var_dump($vendas);exit;
        require APP . 'View/_templates/header.php';
        require APP . 'View/vendas/index.php';
        require APP . 'View/_templates/footer.php'; 

    }

    public function add()
    {
        $vendas = new Venda();
      
        $vendas->setData($_POST['data']);
        $vendas->setTotal($_POST['total']);
        $vendas->setValorpago($_POST['valorpago']);
        $valorTotal = $_POST['total'];
        $valorValorPago = $_POST['valorpago'];
        $troco = $valorTotal - $valorValorPago;
        $vendas->setTroco($troco);
        //$vendas->setTroco($_POST['troco']);
        
        $vendas->addVendas();
                
        header("Location: " . URL . "vendas/index");
    }

    public function edit($id)
    {
        $vendas = new Venda();
        $vendas = $vendas->getUnitVendas($id);
     
        require APP . 'View/_templates/header.php';
        require APP . 'View/vendas/edit.php';
        require APP . 'View/_templates/footer.php';
    }

    public function update()
    {
        $vendas = new Venda();
        $vendas->setId($_POST['id']);
        $vendas->setData($_POST['data']);
        $vendas->setTotal($_POST['total']);
        $vendas->setValorpago($_POST['valorpago']);
        
        $valorTotal = $_POST['total'];
        $valorValorPago = $_POST['valorpago'];
        $troco = $valorTotal - $valorValorPago;
        $vendas->setTroco($troco);
        
        //$vendas->setTroco($_POST['troco']);

        //var_dump($vendas);exit;
        $vendas = $vendas->updateVendas();
        header("Location: " . URL . "vendas/index");
    }

    public function delete($id)
    {
        $vendas = new Venda();
        $vendas->delete($id);

        header ("Location: " . URL . "vendas/index");
    }

}


?>