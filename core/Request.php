<?php
namespace Core;
use Exception;
/**
 * Request
 */
class Request extends BaseObject {
    private $_get;
    private $_post;
    private $_files;
    public function init() {
        $this->_get            = $_GET;
        $this->_post           = $_POST;
        $this->_files          = $_FILES;
    }
    public function get($name = null, $defaultValue = null) {
        if ($name === null) {
            return $this->_get;
        }
        if (isset($this->_get[$name])) {
            return $this->_get[$name];
        }
        return $defaultValue;
    }
    public function post($name = null, $defaultValue = null) {
        if ($name === null) {
            return $this->_post;
        }
        if (isset($this->_post[$name])) {
            return $this->_post[$name];
        }
        return $defaultValue;
    }
    public function files($name = null, $defaultValue = null) {
        if ($name === null) {
            return $this->_files;
        }
        if (isset($this->_files[$name])) {
            return $this->_files[$name];
        }
        return $defaultValue;
    }
    public function remove($method, $key) {
        $method = '_'.$method;
        if (isset($this->$method[$key])) {
            $value = $this->$method[$key];
            unset($this->$method[$key]);
            return $value;
        }
        return null;
    }
}