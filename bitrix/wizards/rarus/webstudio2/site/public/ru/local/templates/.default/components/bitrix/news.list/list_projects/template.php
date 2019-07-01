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

<div class="projects__tab-container" id="nav-tabContent">
    <?php $cardNum = 0 ?>
    <?php foreach ($arResult['WEBSTUDIO_SECTIONS'] as $section) : ?>
        <?php $active = $cardNum === 0 ? 'active' : ''; ?>

        <ul class="projects__card-list <?= $active ?>" id="home<?= $section['ID'] ?>" role="tabpanel"
            aria-labelledby="home-tab<?= $section['ID'] ?>">

            <?php $i = 0 ?>
            <?php foreach ($arResult["ITEMS"] as $arItem) : ?>

                <?
                if (in_array($section['NAME'], $arItem['ARR_SECTIONS']['NAME'])) : ?>

                    <?php
                    $isOdd = ($i % 2) === 0;
                    $projectCardSize = $isOdd ? 'project-card--big' : 'project-card--small';
                    ?>

                    <li class="project-card <?= $projectCardSize . ' ' . $arItem['CARD_COLOR']
                    . ' ' . $arItem['CARD_NAME'] ?>">


                        <? if ($cardNum === 0) : ?>
                        <?php
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                            CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                            CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'));
                        ?>
                        <div class="project-card__wrap" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                            <? else: ?>
                            <div class="project-card__wrap">
                                <? endif; ?>

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

                <?php $i++;
            endforeach; ?>

        </ul>
        <?php $cardNum++;
    endforeach; ?>
</div>
