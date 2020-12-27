<?php
require 'core/Autoloader.php';
$config = require 'config/config.php';
(new \Core\App($config))->run();
?>