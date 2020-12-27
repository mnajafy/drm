<?php
namespace Core;
use Exception;
/**
 * Session
 */
class Session extends BaseObject {
    public function open() {
        if ($this->getIsActive()) {
            return;
        }
        session_start();
    }
    public function close() {
        if ($this->getIsActive()) {
            session_write_close();
        }
    }
    public function set($key, $value) {
        $this->open();
        $_SESSION[$key] = $value;
    }
    public function get($key) {
        $this->open();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public function remove($key) {
        $this->open();
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $value;
        }
        return null;
    }
    public function removeAll() {
        $this->open();
        foreach (array_keys($_SESSION) as $key) {
            unset($_SESSION[$key]);
        }
    }
    public function destroy() {
        $this->removeAll();
        session_destroy();
    }
    //
    public function getIsActive() {
        return session_status() === PHP_SESSION_ACTIVE;
    }
    public function getName() {
        return session_name();
    }
}