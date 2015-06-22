<?php
require_once (__DIR__) . '/psr4.php';

$psr4AutoLoader = new Psr4AutoloaderClass();
$psr4AutoLoader->addNamespace('LolAPI', (__DIR__.'/../../../src/LolAPI'));
$psr4AutoLoader->register();

set_error_handler(function($errNo, $errStr, $errFile, $errLine) {
    throw new Exception(sprintf("[PHP ERROR] [%s:%d] %s", $errFile, $errLine, $errStr), $errNo);
});

function getConfig()
{
    return include __DIR__ . '/config.php';
}

function getApiKey()
{
    $config = include __DIR__ . '/config.php';

    return $config['apiKey'];
}

function println($message, $intend = 0) {
    while($intend > 0) {
        echo '  ';
        $intend--;
    }

    echo $message, "\n";
}