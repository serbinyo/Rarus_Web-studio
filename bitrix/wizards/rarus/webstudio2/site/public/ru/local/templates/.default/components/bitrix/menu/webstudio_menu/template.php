<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

if (empty($arResult["ALL_ITEMS"])) {
    return;
}

//debug($arResult);

?>


<ul class="menu__list">

    <?php foreach ($arResult['ALL_ITEMS'] as $arItem): ?>

        <?php if ($arItem['TEXT'] === 'проекты'): ?>
            <li class="menu__item">
                <a href="<?= $arItem['LINK'] ?>" class="menu__link anchor-link--projects"><?= $arItem['TEXT'] ?></a>
            </li>
        <?php elseif ($arItem['TEXT'] === 'услуги'): ?>
            <li class="menu__item">
                <a href="<?= $arItem['LINK'] ?>" class="menu__link anchor-link--services"><?= $arItem['TEXT'] ?></a>
            </li>
        <?php elseif ($arItem['TEXT'] === 'связаться'): ?>

            <li class="menu__item menu__item--highlight">
                <a href="<?= $arItem['LINK'] ?>" class="menu__link anchor-link--feedback"><?= $arItem['TEXT'] ?></a>
            </li>
        <?php endif; ?>

    <?php endforeach; ?>

</ul>
