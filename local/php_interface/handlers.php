<?php
declare(strict_types=1);

use Bitrix\Main\EventManager;
use SRB\Handler\projectHandler;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit;
}

# добавляем обработчики

$eventManager = EventManager::getInstance();

$handlers = [
    [
        # example
        'module' => 'main',
        'handler' => 'OnBuildGlobalMenu',
        'method' => '\Site\Rights::addMenu'
    ],
    [
        # валидация свойств при добавлении проекта
        'module' => 'iblock',
        'handler' => 'OnBeforeIBlockElementAdd',
        'method' => [
            projectHandler::class,
            'checkProps'
        ]
    ],
    [
        # валидация свойств при обновлении проекта
        'module' => 'iblock',
        'handler' => 'OnBeforeIBlockElementUpdate',
        'method' => [
            projectHandler::class,
            'checkProps'
        ]
    ]
];

foreach ($handlers as $handler) {
    $eventManager->addEventHandler(
        $handler['module'],
        $handler['handler'],
        $handler['method'],
        false,
        $handler['sort'] ?? 100
    );
}
