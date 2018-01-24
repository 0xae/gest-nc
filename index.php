<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
ini_set('display_startup_erros', 1);

$branch = exec("git branch |grep '*'");

require_once __DIR__ . '/web/app_dev.php';
