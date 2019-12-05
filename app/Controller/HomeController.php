<?php 

namespace App\Controller;

class HomeController
{
	public function index()
    {
        require APP . 'View/_templates/header.php';
        require APP . 'View/home/index.php';
        require APP . 'View/_templates/footer.php';
    }

}

