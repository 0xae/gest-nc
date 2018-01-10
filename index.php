<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
ini_set('display_startup_erros', 1);

#abaixo, criamos uma variavel que terá como conteúdo o endereço para onde haverá o redirecionamento:
$redirect = "http://asdis.org.cv/web/app.php/site/home";

#abaixo, chamamos a função header() com o atributo location: apontando para a variavel $redirect, que por
#sua vez aponta para o endereço de onde ocorrerá o redirecionamento
header("location:$redirect");

//require_once __DIR__ . '/web/app_dev.php';
