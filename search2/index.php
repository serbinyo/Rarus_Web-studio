<?php
declare(strict_types=1);
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php'; ?>

    <section class='grid projects'>
        <h2 class='title title--two-level projects__title'>Проекты</h2>
        <div class='projects__container'>

            <?php $APPLICATION->IncludeComponent(
                'bitrix:search.form',
                'suggest',
                [
                    'USE_SUGGEST' => 'Y',
                    'PAGE' => '#SITE_DIR#search2/index.php'
                ],
                false,
                [
                    'HIDE_ICONS' => 'Y'
                ]
            ); ?>

            <br>

            <?php
            ob_start();
            $elements = $APPLICATION->IncludeComponent(
                'bitrix:search.page',
                '',
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
                    'FILTER_NAME' => '',
                    'arrFILTER' => ['no'],
                    'SHOW_WHERE' => 'Y',
                    'arrWHERE' => [],
                    'SHOW_WHEN' => 'Y',
                    'PAGE_RESULT_COUNT' => '50',
                    'CACHE_TYPE' => 'A',
                    'CACHE_TIME' => '3600',
                    'PAGER_SHOW_ALWAYS' => 'Y',
                    'AJAX_OPTION_SHADOW' => 'Y',
                    'AJAX_OPTION_STYLE' => 'Y',
                    'DISPLAY_TOP_PAGER' => 'N',
                    'DISPLAY_BOTTOM_PAGER' => 'N'
                ],
                false,
                [
                    'HIDE_ICONS' => 'Y'
                ]
            );
            ob_end_clean();

            if (count((array)$elements) > 0) {
                global $searchFilter;
                $searchFilter = [
                    'ID' => $elements
                ];
            }

            $APPLICATION->IncludeComponent(
                'bitrix:news.list',
                'list_projects',
                [
                    'ACTIVE_DATE_FORMAT' => 'd.m.Y',
                    'AJAX_MODE' => 'Y',
                    'CACHE_GROUPS' => 'N',
                    'CACHE_TIME' => '36000000',
                    'CACHE_TYPE' => 'A',
                    'CHECK_DATES' => 'Y',
                    'DETAIL_URL' => '',
                    'DISPLAY_BOTTOM_PAGER' => 'Y',
                    'DISPLAY_DATE' => 'Y',
                    'DISPLAY_NAME' => 'Y',
                    'DISPLAY_PICTURE' => 'Y',
                    'DISPLAY_PREVIEW_TEXT' => 'Y',
                    'IBLOCK_ID' => '4',
                    'IBLOCK_TYPE' => 'ws',
                    'NEWS_COUNT' => '6',
                    'FILTER_NAME' => 'searchFilter',
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
            );
            ?>

        </div>
    </section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>