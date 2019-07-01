<?php
declare(strict_types=1);
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php'; ?>

    <section class='grid projects'>
        <h2 class='title title--two-level projects__title'>Проекты</h2>
        <div class='projects__container'>

            <?php $APPLICATION->IncludeComponent(
                'bitrix:search.page',
                'search_tmp',
                [
                    'TAGS_SORT' => 'NAME',
                    'TAGS_PAGE_ELEMENTS' => '150',
                    'TAGS_PERIOD' => '30',
                    'TAGS_URL_SEARCH' => '/search/index.php',
                    'TAGS_INHERIT' => 'Y',
                    'WIDTH' => '100%',
                    'USE_SUGGEST' => 'Y',
                    'RESTART' => 'Y',
                    'USE_LANGUAGE_GUESS' => 'Y',
                    'CHECK_DATES' => 'Y',
                    'USE_TITLE_RANK' => 'Y',
                    'DEFAULT_SORT' => 'rank',
                    'arrFILTER' => ['iblock_ws'],
                    'arrFILTER_iblock_ws' => ['4'],
                    'SHOW_WHEN' => 'Y',
                    'PAGE_RESULT_COUNT' => '50',
                    'CACHE_TYPE' => 'A',
                    'CACHE_TIME' => '3600',
                    'PAGER_SHOW_ALWAYS' => 'N',
                    'AJAX_OPTION_SHADOW' => 'Y',
                    'AJAX_OPTION_STYLE' => 'Y'
                ],
                false,
                [
                    'HIDE_ICONS' => 'Y'
                ]
            ); ?>

        </div>
    </section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>