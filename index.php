<?php
declare(strict_types=1);

use SRB\Cache\CacheElements;

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php'; ?>

<?php
$APPLICATION->IncludeComponent(
    'bitrix:main.include',
    '',
    [
        'AREA_FILE_SHOW' => 'page',
        'AREA_FILE_SUFFIX' => 'top'
    ]
); ?>

    <div class='bar'>
        <div class='bar__project'>
            <div class='bar__wrap'>
                <div class='bar__project-label'>Новый проект</div>
                <h2 class='bar__project-title'>Магазин для продажи оборудования и ПО 1С</h2>
                <div class='text bar__project-description'>Интернет-магазин, который объединил продажу программ
                    автоматизации и кассового оборудования
                </div>
                <img class='bar__project-logo'
                     src='/local/templates/.default/images/retail--bar.png'
                     alt='Магазин для продажи оборудования и ПО 1С' width='440' height='238'>
            </div>
        </div>
    </div>

    <section class='grid projects'>
        <h2 class='title title--two-level projects__title'>Проекты</h2>

        <div class='projects__container'>

            <?php $APPLICATION->IncludeComponent(
                'bitrix:news.list',
                'list_projects',
                [
                    'SECTIONS' => CacheElements::cache(4),
                    'ACTIVE_DATE_FORMAT' => 'd.m.Y',
                    'AJAX_MODE' => 'Y',
                    'CACHE_GROUPS' => 'N',
                    'CACHE_TIME' => '36000000',
                    'CACHE_TYPE' => 'A',
                    'CHECK_DATES' => 'Y',
                    'DETAIL_URL' => '',
                    'DISPLAY_NAME' => 'Y',
                    'DISPLAY_PICTURE' => 'Y',
                    'DISPLAY_PREVIEW_TEXT' => 'Y',
                    'IBLOCK_ID' => '4',
                    'IBLOCK_TYPE' => 'ws',
                    'NEWS_COUNT' => '6',
                    'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000',
                    'PROPERTY_CODE' => [
                        'PROJECT_CARD_COLOR',
                        'PROJECT_CARD_NAME'
                    ],
                    'SET_STATUS_404' => 'Y',
                    'SHOW_404' => 'N',
                    'SORT_BY1' => 'ACTIVE_FROM',
                    'SORT_BY2' => 'SORT',
                    'SORT_ORDER1' => 'ASC',
                    'SORT_ORDER2' => 'DESC'
                ],
                false,
                [
                    'HIDE_ICONS' => 'Y'
                ]
            ); ?>

        </div>
    </section>

<?php
$APPLICATION->IncludeComponent(
    'bitrix:main.include',
    '',
    [
        'AREA_FILE_SHOW' => 'page',
        'AREA_FILE_SUFFIX' => 'inc'
    ]
); ?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>