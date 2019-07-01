<?php
declare(strict_types=1);

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use SRB\Cache\CacheElements;
use SRB\Handler\projectHandler;

/**
 * Печатает переменные в читабельном виде
 *
 * @param $toDebug
 */
function debug($toDebug)
{
    echo '<pre>';
    print_r($toDebug);
    echo '</pre>';
}

# Добавление автозагрузчика классов
try {
    Loader::registerAutoLoadClasses(
        null, // null если классы не являются часть какого-либо модуля
        [
            // ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
            CacheElements::class => '/local/classes/CacheElements.php',
            projectHandler::class => '/local/classes/projectHandler.php'
        ]
    );
} catch (LoaderException $e) {
    exit($e);
}

# Добавление обработчиков событий
if (file_exists(__DIR__ . '/handlers.php')) {
    include_once __DIR__ . '/handlers.php';
}
