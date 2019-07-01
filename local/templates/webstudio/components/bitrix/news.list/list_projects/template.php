<?php
declare(strict_types=1);
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit;
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

<div class="projects__tab-list-wrap swiper-container">
    <ul class="projects__tab-list swiper-wrapper nav" id="nav-tab" role="tablist">
        <?php
        foreach ((array)$arResult['WEBSTUDIO_SECTIONS'] as $sectionNum => $arItem) {
            $active = $sectionNum === 0 ? 'active' : '';
        ?>

            <li class="projects__tab-item swiper-slide">
                <a class="projects__tab  <?= $active ?>" id="home-tab<?= $arItem['ID'] ?>" data-toggle="tab"
                   href="#home<?= $arItem['ID'] ?>" role="tab"
                   aria-controls="home<?= $arItem['ID'] ?>" aria-selected="true"><?= $arItem['NAME'] ?></a>

        <?php
        }
        ?>
    </ul>
</div>

<div class="projects__tab-container" id="nav-tabContent">
    <?php foreach ((array)$arResult['WEBSTUDIO_SECTIONS'] as $ulNum => $section) : ?>
        <?php $active = $ulNum === 0 ? 'active' : ''; ?>

        <ul class="projects__card-list <?= $active ?>" id="home<?= $section['ID'] ?>" role="tabpanel"
            aria-labelledby="home-tab<?= $section['ID'] ?>">

            <?php foreach ($arResult['ITEMS'] as $i => $arItem) : ?>

                <?php
                if (in_array($arItem['ID'], $section['ELEMENTS'], true)) : ?>

                    <?php
                    $isOdd = ($i % 2) === 0;
                    $projectCardSize = $isOdd ? 'project-card--big' : 'project-card--small';
                    ?>

                    <li class="project-card <?= $projectCardSize . ' '
                        . $arItem['PROPERTIES']['PROJECT_CARD_COLOR']['VALUE']
                        . ' ' . $arItem['PROPERTIES']['PROJECT_CARD_NAME']['VALUE'] ?>">

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
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>
