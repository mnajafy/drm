<?php
namespace Core;
use Core\Core;
use Exception;
/**
 * Controller
 */
class Controller extends BaseObject {
    public $title;
    public $layout = 'main';
    private $route;
    private $_baseUrl;
    public $breadcrumb;
    public function render($_params_ = null) {
        ob_start();
        ob_implicit_flush(false);
        if ($_params_) {
            extract($_params_, EXTR_OVERWRITE);
        }
        require $this->getViewFile();
        $content = ob_get_clean();
        require $this->getLayoutFile();
    }
    public function getViewFile() {
        $file = 'views' . DIRECTORY_SEPARATOR . $this->route . '.php';
        $viewFile = realpath($file);
        if ($viewFile === false) {
            throw new Exception("View File { {$file} } Not Found");
        }
        return $viewFile;
    }
    public function getLayoutFile() {
        $file = 'layout' . DIRECTORY_SEPARATOR . $this->layout . '.php';
        $layoutFile = realpath($file);
        if ($layoutFile === false) {
            throw new Exception("Layout File { {$file} } Not Found");
        }
        return $layoutFile;
    }
    public function setRoute($value) {
        $this->route = str_replace('/', '\\', $value);
    }
    //
    public function to($params = []) {
        $url = isset($params['url']) ? $params['url'] : 'home/index';
        unset($params['url']);
        $anchor = isset($params['#']) ? '#' . $params['#'] : '';
        unset($params['#']);
        $exist = false;
        $route = null;
        $urlManager = Core::$app->getUrlManager()->getRules();
        foreach ($urlManager as $key => $value) {
            if ($url == $value) {
                $exist = true;
                $route = trim($key, '/');
                break;
            }
        }
        if ($exist == false) {
            throw new Exception("File : <b> {$url} </b> Not fond ");
        }
        $query = http_build_query($params);
        return $this->getBaseUrl() . (!empty($route) ? '/' . $route : '') . $anchor . (!empty($query) ? '?' . $query : '');
    }
    public function getBaseUrl() {
        if ($this->_baseUrl === null) {
            $this->_baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\\/');
        }
        return $this->_baseUrl;
    }
    public function breadcrumb() {
        if (isset($this->breadcrumb) && is_array($this->breadcrumb)) {
            $lis = [];
            foreach ($this->breadcrumb as $value) {
                if (is_array($value)) {
                    $lis[] = '<li class="breadcrumb-item"><a href="' . Url::to([$value['url']]) . '">' . $value['label'] . '</a></li>';
                }
                elseif (is_string($value)) {
                    $lis[] = '<li class="breadcrumb-item">' . $value . '</li>';
                }
            }
            return '<ol class="breadcrumb">' . implode($lis) . '</ol>';
        }
    }
    public function redirect($url = []) {
        header("Location:".$this->to($url));
        exit;
    }
    public function isConected() {
        return Core::$app->getSession()->get('name');
    }
    public function btnConn() {
        if ($this->isConected())
            return '<a class="nav-link" href="'. $this->to(['url' => 'admin/disconnect']). '">disconnect</a>';
        return '<a class="nav-link" href="'. $this->to(['url' => 'admin/connect']). '">connecxion</a>';
    }
}