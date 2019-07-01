<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>

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
                "IBLOCK_ID" => "4",
                "IBLOCK_TYPE" => "ws",
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

        <div class="projects__tab-container" id="nav-tabContent">
            <ul class="projects__card-list active" id="home1" role="tabpanel" aria-labelledby="home-tab1">
                <?php

                $i = 0;
                foreach ($arResult["ITEMS"] as $arItem) : ?>

                    <?php
                    $isOdd = ($i % 2) === 0;
                    $projectCardSize = $isOdd ? 'project-card--big' : 'project-card--small';
                    ?>

                    <?php ?>

                    <li class="project-card <?= $projectCardSize . ' ' . $arItem['CARD_COLOR']
                    . ' ' . $arItem['CARD_NAME'] ?>">
                        <div class="project-card__wrap">
                            <a class="project-card__link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                               aria-label="Подробнее">
                                <img class="project-card__image"
                                     src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                     alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>"
                                     width="272"
                                     height="448">
                                <svg class="project-card__icon" width="24" height="24" role="presentation"
                                     aria-hidden="true">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                                <h3 class="project-card__title"><?= $arItem['NAME'] ?></h3>

                                <?php if ($projectCardSize === 'project-card--big') : ?>
                                    <p class="project-card__description"><?= $arItem['PREVIEW_TEXT'] ?></p>
                                <?php endif; ?>
                            </a>
                        </div>
                    </li>

                    <?php
                    $i++;
                endforeach; ?>

            </ul>
        </div>
    </div>
</section>
