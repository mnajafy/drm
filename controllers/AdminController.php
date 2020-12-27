<?php
namespace Controllers;
use Core\Core;
use Core\Form;
use Model\Auth;
use Core\BaseObject;
use Core\Controller;

class AdminController extends Controller {
    public function actionIndex() {
        $auth = new Auth();
        if ($email = Core::$app->session->get('name')) {
            $pre = Core::$app->dataBase->query('SELECT * FROM user WHERE email = ?', [$email]);
        }
        $this->render([
            'auth' => $auth,
        ]);
    }
    public function actionNew() {
        $auth = new Auth();
        $form = new Form(['data' => Core::$app->request->post()]);
        if ($form->isSubmitted() && $form->isValid($auth->rules)) {
            $reqMail = Core::$app->dataBase->prepare('SELECT email FROM user WHERE email = ?', [$form->getData('email')]);
            $mailExist = $reqMail->rowCount();
            if ($mailExist == 0) {
                Core::$app->dataBase->prepare('INSERT INTO user (email, password, create_at) VALUES(?, ?, NOW())', $form->data);
                Core::$app->session->set('name', $form->getData('email'));
                $this->redirect(['url' => 'admin/index', 'email' => $form->getData('email')]);
            }
        }
        $this->render([
            'form' => $form,
        ]);
    }
}