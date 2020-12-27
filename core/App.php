<?php
namespace Core;
use Exception;
/**
 * App
 */
class App extends BaseObject {
    private $urlManager;
    private $session;
    private $dataBase;
    public function __construct($config = []) {
        Core::$app = $this;
        parent::__construct($config);
    }
    public function run() {
        $route = Core::$app->getUrlManager()->getRoute();
        list($class, $action) = explode('/', $route, 2);
        $class = 'controllers\\'.ucfirst($class).'Controller';
        if (!class_exists($class)) {
            throw new Exception($class.' Not exist !');
        }
        $action = 'action'.str_replace(' ', '', ucwords(str_replace('-', ' ', $action)));
        if (!is_callable(array($class,$action))) {
            throw new Exception($action.' Not exist !');
        }
        $class = BaseObject::createObject(['class' => $class, 'route' => $route]);
        $class->$action();
    }
    public function setUrlManager($value) {
        $this->urlManager = BaseObject::createObject($value);
    }
    public function getUrlManager() {
        return $this->urlManager;
    }
    public function setSession($value) {
        $this->session = BaseObject::createObject($value);
    }
    public function getSession() {
        return $this->session;
    }
    public function setDataBase($value) {
        $this->dataBase = BaseObject::createObject($value);
    }
    public function getDataBase() {
        return $this->dataBase;
    }
    public function setRequest($value) {
        $this->request = BaseObject::createObject($value);
    }
    public function getRequest() {
        return $this->request;
    }
}