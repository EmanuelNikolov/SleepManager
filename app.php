<?php
declare(strict_types=1);
session_start();

spl_autoload_register(function ($class) {
    require_once "{$class}.php";
});

$db = new \Adapter\PDODatabase(
  \Config\DBConfig::DB_HOST,
  Config\DBConfig::DB_NAME,
  \Config\DBConfig::DB_USER,
  \Config\DBConfig::DB_PASS
);

$encryptionService = new \Services\Encryption\BCryptEncryption();

$app = new \Core\App();