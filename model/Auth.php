<?php
namespace Model;
use PDO;
use Core\Core;
use Core\Model;

class Auth extends Model {
    public $email;
    public $password;
    public $rules;
    public function init() {
        $this->rules = [
            'email' => ['require', 'email'],
            'password' => ['require', 'crypt', 'min' => 4],
        ];
    }
}