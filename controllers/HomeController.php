<?php
namespace Controllers;
use Core\Core;
use Core\Controller;

class HomeController extends Controller {
    public function actionIndex() {
        return $this->render();
    }
}
?>