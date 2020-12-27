<?php
namespace Core;
use Exception;
/**
 * UrlManager
 */
class UrlManager extends BaseObject {
    private $_pathInfo;
    private $_rules;
    public function init() {
        if ($this->_pathInfo == null) {
            $this->_pathInfo = $this->pathInfo();
        }
    }
    public function getRoute() {
        foreach ($this->_rules as $key => $value) {
            if ($key == $this->_pathInfo) {
                return $value;
            }
        }
        throw new Exception($this->_pathInfo.' Not exist !');
    }
    public function pathInfo() {
        $pathInfo = substr($_SERVER['REQUEST_URI'], strlen(dirname($_SERVER['SCRIPT_NAME'])));
        if (($pos      = strpos($pathInfo, '?')) !== false) {
            $pathInfo = substr($pathInfo, 0, $pos);
        }
        return trim($pathInfo, '/') == null ? '/' : trim($pathInfo, '/');
    }
    public function getPathInfo() {
        return $this->_pathInfo;
    }
    public function setRules($value) {
        $this->_rules = $value;
    }
    public function getRules() {
        return $this->_rules;
    }
}