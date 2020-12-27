<?php
namespace Core;
use PDO;
/**
 * Database
 */
class DataBase extends BaseObject {
    public $pdo;
    public function init() {
        if ($this->pdo === null) {
            $this->pdo = new PDO($this->dsn . ';charset=' . $this->charset, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    public function prepare($stat, $values = []) {
        $prexe = $this->pdo->prepare($stat);
        $prexe->execute(array_values($values));
        return $prexe;
    }
    public function query($stat, $class_name) {
        $query = $this->pdo->query($stat);
        return $query->fetchAll(PDO::FETCH_CLASS, $class_name);
    }
}