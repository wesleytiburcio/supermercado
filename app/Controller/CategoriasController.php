<?php


namespace App\Controller;

use App\Model\Categoria;

class CategoriasController
{
    public function index()
    {
        $categorias = new Categoria();
        $categorias = $categorias->getAllCategorias();
        //var_dump($categorias);exit;

        require APP . 'view/_templates/header.php';
        require APP . 'view/categorias/index.php';
        require APP . 'view/_templates/footer.php';

    }

    public function add()
    {
        $categorias = new Categoria();
        $categorias->addCategorias($_POST['nome']);

        header("Location: " . URL . "categorias/index");
    }

    public function edit($id)
    {
        $categorias = new Categoria();
        $dados = $categorias->getUnitCategorias($id);

        //var_dump($dados);exit;
        require APP . 'view/_templates/header.php';
        require APP . 'view/categorias/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function update()
    {
        $categorias = new Categoria();

        $categorias->updateCategorias($_POST['id'], $_POST['nome']);

        header("Location: " . URL . "categorias/index");
    }

    public function delete($id)
    {
        $categorias = new Categoria();
        $categorias->deleteCategorias($id);

        header("Location: " . URL . "categorias/index");
    }

    protected function requireViews($page)
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/categorias/'. $page .'.php';
        require APP . 'view/_templates/footer.php';
    }

}