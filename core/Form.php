<?php
namespace Core;
class Form extends BaseObject {
    public $data;
    public $errMsg = [];
    public $validMsg = [];
    public function isSubmitted() {
        if(isset($this->data['submit'])) {
            unset($this->data['submit']);
            return $this->data;
        }
        return null;
    }
    public function isValid($rules = []) {
        $this->data = array_map('htmlspecialchars', $this->data);
        foreach ($this->data as $key => $value) {
            if (isset($rules[$key]) AND in_array('require', $rules[$key])) {
                if (empty($this->data[$key])) {
                    $this->setErrMsg($key, 'champ obligatoire ('.$key.')');
                    return null;
                }
            }
            if (isset($rules[$key]) AND in_array('email', $rules[$key])) {
                if (!filter_var($this->data[$key], FILTER_VALIDATE_EMAIL)) {
                    $this->setErrMsg($key, 'Adresse mail n\'est pas valide ! ('.$key.')');
                    return null;
                }
            }
            if (isset($rules[$key]['min'])) {
                if (strlen($this->data[$key]) < $rules[$key]['min']) {
                    $this->setErrMsg($key, 'minimum '.$rules[$key]['min'].' caracthérs ! ('.$key.')');
                    return null;
                }
            }
            if (isset($rules[$key]['max'])) {
                if (strlen($this->data[$key]) > $rules[$key]['max']) {
                    $this->setErrMsg($key, 'maximum '.$rules[$key]['max'].' caracthérs ! ('.$key.')');
                    return null;
                }
            }
            if (isset($rules[$key]) AND in_array('crypt', $rules[$key])) {
                $this->data[$key] = crypt($this->data[$key], '$6$rounds=5000$usesomesillystringforsalt$');
            }
        }
        return $this->data;
    }
    //
    public function setErrMsg($key, $value) {
        $this->errMsg[$key] = $value;
    }
    public function setValidMsg($key, $value) {
        $this->validMsg[$key] = $value;
    }
    public function getErrMsg() {
        return !empty($this->errMsg) ? '<div class="alert alert-danger" role="alert">' . implode($this->errMsg) . '</div>' : null;
    }
    public function getValidMsg() {
        return !empty($this->validMsg) ? '<div class="alert alert-success" role="alert">' . implode($this->validMsg) . '</div>' : null;
    }
    public function htmlValue($name) {
        return $this->data[$name] ? 'value="'.$this->data[$name].'"' : null;
    }
    public function getData($name = null, $defaultValue = null) {
        if ($name === null) {
            return $this->data;
        }
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return $defaultValue;
    }
}