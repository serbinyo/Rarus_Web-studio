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

if (empty($arResult)) {
    return;
}

?>

<ul class="menu__list">
    <?php foreach ($arResult as $key => $item): ?>

        <li class="menu__item <?= $item['PARAMS']['HIGHLIGHT'] ?>">
            <a href="<?= $item['LINK'] ?>"
               class="menu__link <?= $item['PARAMS']['CLASSNAME'] ?>"><?= $item['TEXT'] ?></a>
        </li>

    <?php endforeach; ?>
</ul>
