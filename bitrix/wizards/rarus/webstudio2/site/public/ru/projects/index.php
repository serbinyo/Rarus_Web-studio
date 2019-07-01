<?php
declare(strict_types=1);
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php'; ?>


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
    <section class='grid lead'>
        <h1 class='title title--one-level lead__title'><?php $APPLICATION->ShowTitle(false);
            $APPLICATION->SetPageProperty('title', 'Список проектов'); ?>Запускаем качественные <span>веб-проекты</span>
        </h1>
        <p class='text lead__description'>Мы 12 лет разрабатываем сайты, внедряем корпоративные продукты,
            интегрируем с 1С и настраиваем Битрикс 24</p>
        <a class='lead__link btn btn--lg anchor-link--feedback' href='#'>Обсудить задачу</a>
        <div class='lead__project'>
            <svg class='lead__project-logo' width='168' height='90' role='presentation' aria-hidden='true'>
                <use xlink:href='#logo--retail'></use>
            </svg>
            <div class='lead__project-title'>Новый проект</div>
            <a class='text lead__project-link' href='#'>
                Сервис бронирования тренировок для спортивного бренда Adidas
            </a>
        </div>
        <button class='lead__anchor' type='button'>
            <svg class='lead__project-link-icon lead__project-link-icon--anchor' width='24' height='24'
                 role='presentation' aria-hidden='true'>
                <use xlink:href='#arrow'></use>
            </svg>
            к проектам
        </button>
    </section>

    <!--ПРОЕКТЫ-->

    <section class="grid projects">
        <h2 class="title title--two-level projects__title">Проекты</h2>

        <div class="projects__container">

            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog.section.list",
                "cat_struct",
                [
                    "ADD_SECTIONS_CHAIN" => "N",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "COUNT_ELEMENTS" => "Y",
                    "FILTER_NAME" => "sectionsFilter",
                    'IBLOCK_ID' => '#WEBSTUDIO_IBLOCK_ID#',
                    'IBLOCK_TYPE' => '#WEBSTUDIO_IBLOCK_TYPE#',
                    "SECTION_CODE" => "",
                    "SECTION_FIELDS" => ["", ""],
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_URL" => "",
                    "SECTION_USER_FIELDS" => ["", ""],
                    "SHOW_PARENT_NAME" => "Y",
                    "TOP_DEPTH" => "1",
                    "VIEW_MODE" => "TEXT",
                ]
            ); ?>

            <?php $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "list_projects",
                [
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "#SITE_DIR#projects/#CODE#",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => [
                        0 => "",
                        1 => "",
                    ],
                    "FILTER_NAME" => "arrFilter",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    'IBLOCK_ID' => '#WEBSTUDIO_IBLOCK_ID#',
                    'IBLOCK_TYPE' => '#WEBSTUDIO_IBLOCK_TYPE#',
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "6",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => [
                        0 => "",
                        1 => "",
                    ],
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "Y",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "DESC",
                    "STRICT_SECTION_CHECK" => "N",
                    "COMPONENT_TEMPLATE" => "list_projects",
                ],
                false
            ); ?>

        </div>
    </section>

    <section class='grid services'>
        <h2 class='title title--two-level services__title'>Услуги</h2>
        <ul class='services__list'>
            <li class='services__item'>
                <h3 class='title title--three-level services__sub-title'>Разработка сайтов</h3>
                <ul class='services__sub-list'>
                    <li class='services__sub-item'>исследуем бизнес и выдвигаем гипотезы</li>
                    <li class='services__sub-item'>согласовываем структуру и дизайн</li>
                    <li class='services__sub-item'>пишем код и полируем решения</li>
                    <li class='services__sub-item'>отдаем проект, работающий на всём</li>
                </ul>
                <a class='services__link' href='#'>5 проектов</a>
            </li>
            <li class='services__item'>
                <h3 class='title title--three-level services__sub-title'>Корпоративные внедрния</h3>
                <ul class='services__sub-list'>
                    <li class='services__sub-item'>исследуем бизнес и выдвигаем гипотезы</li>
                    <li class='services__sub-item'>согласовываем структуру и дизайн</li>
                    <li class='services__sub-item'>пишем код и полируем решения</li>
                    <li class='services__sub-item'>отдаем проект, работающий на всём</li>
                </ul>
                <a class='services__link' href='#'>5 проектов</a>
            </li>
            <li class='services__item'>
                <h3 class='title title--three-level services__sub-title'>SSL-сертификаты</h3>
                <ul class='services__sub-list'>
                    <li class='services__sub-item'>исследуем бизнес и выдвигаем гипотезы</li>
                    <li class='services__sub-item'>согласовываем структуру и дизайн</li>
                    <li class='services__sub-item'>пишем код и полируем решения</li>
                    <li class='services__sub-item'>отдаем проект, работающий на&nbsp;всём</li>
                </ul>
                <a class='services__link' href='#'>5 проектов</a>
            </li>
            <li class='services__item'>
                <h3 class='title title--three-level services__sub-title'>Композитные сайты</h3>
                <ul class='services__sub-list'>
                    <li class='services__sub-item'>исследуем бизнес и выдвигаем гипотезы</li>
                    <li class='services__sub-item'>согласовываем структуру и дизайн</li>
                    <li class='services__sub-item'>пишем код и полируем решения</li>
                    <li class='services__sub-item'>отдаем проект, работающий на всём</li>
                </ul>
                <a class='services__link' href='#'>5 проектов</a>
            </li>
            <li class='services__item'>
                <h3 class='title title--three-level services__sub-title'>Техническая поддержка</h3>
                <ul class='services__sub-list'>
                    <li class='services__sub-item'>исследуем бизнес и выдвигаем гипотезы</li>
                    <li class='services__sub-item'>согласовываем структуру и дизайн</li>
                    <li class='services__sub-item'>пишем код и полируем решения</li>
                    <li class='services__sub-item'>отдаем проект, работающий на всём</li>
                </ul>
                <a class='services__link' href='#'>5 проектов</a>
            </li>
            <li class='services__item'>
                <h3 class='title title--three-level services__sub-title'>Интеграция с 1С</h3>
                <ul class='services__sub-list'>
                    <li class='services__sub-item'>исследуем бизнес и выдвигаем гипотезы</li>
                    <li class='services__sub-item'>согласовываем структуру и дизайн</li>
                    <li class='services__sub-item'>пишем код и полируем решения</li>
                    <li class='services__sub-item'>отдаем проект, работающий на всём</li>
                </ul>
                <a class='services__link' href='#'>5 проектов</a>
            </li>
        </ul>
    </section>


<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>