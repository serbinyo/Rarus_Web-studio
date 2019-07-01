<?php
/**
 * @var CMain $APPLICATION
 */
declare(strict_types=1);
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->IncludeComponent(
    'bitrix:news.detail',
    'news_detail',
    [
        'ACTIVE_DATE_FORMAT' => 'd.m.Y',
        'ADD_ELEMENT_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'Y',
        'AJAX_MODE' => 'N',
        'AJAX_OPTION_ADDITIONAL' => '',
        'AJAX_OPTION_HISTORY' => 'N',
        'AJAX_OPTION_JUMP' => 'N',
        'AJAX_OPTION_STYLE' => 'Y',
        'BROWSER_TITLE' => '-',
        'CACHE_GROUPS' => 'Y',
        'CACHE_TIME' => '36000000',
        'CACHE_TYPE' => 'A',
        'CHECK_DATES' => 'Y',
        'COMPONENT_TEMPLATE' => 'news_detail',
        'DETAIL_URL' => '',
        'DISPLAY_BOTTOM_PAGER' => 'Y',
        'DISPLAY_DATE' => 'Y',
        'DISPLAY_NAME' => 'Y',
        'DISPLAY_PICTURE' => 'Y',
        'DISPLAY_PREVIEW_TEXT' => 'Y',
        'DISPLAY_TOP_PAGER' => 'N',
        'ELEMENT_CODE' => $_REQUEST['project'],
        'ELEMENT_ID' => '',
        'IBLOCK_ID' => '4',
        'IBLOCK_TYPE' => 'ws',
        'IBLOCK_URL' => '',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'Y',
        'MESSAGE_404' => '',
        'META_DESCRIPTION' => '-',
        'META_KEYWORDS' => '-',
        'PAGER_BASE_LINK_ENABLE' => 'N',
        'PAGER_SHOW_ALL' => 'N',
        'PAGER_TEMPLATE' => '.default',
        'PAGER_TITLE' => 'Страница',
        'PROPERTY_CODE' => [
            0 => 'ZADACHA',
            1 => 'PROJECT_CARD_COLOR',
            2 => 'PROJECT_CARD_NAME',
            3 => 'CLIENT',
            4 => 'SITE',
            5 => 'SERVICES',
            6 => 'SROK'
        ],
        'SET_BROWSER_TITLE' => 'Y',
        'SET_CANONICAL_URL' => 'N',
        'SET_LAST_MODIFIED' => 'N',
        'SET_META_DESCRIPTION' => 'Y',
        'SET_META_KEYWORDS' => 'Y',
        'SET_STATUS_404' => 'Y',
        'SET_TITLE' => 'Y',
        'SHOW_404' => 'N',
        'STRICT_SECTION_CHECK' => 'N',
        'USE_PERMISSIONS' => 'N',
        'USE_SHARE' => 'N'
    ],
    false,
    [
        'HIDE_ICONS' => 'Y'
    ]
);
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
