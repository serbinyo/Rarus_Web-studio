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

<section class="grid introduction">
    <h1 class="title title--one-level introduction__title"><?= $arResult['NAME'] ?></h1>
    <div class="introduction__block">
        <div class="introduction__label"><?= $arResult['PROPERTIES']['SROK']['NAME'] ?></div>
        <div class="introduction__description"><?= $arResult['PROPERTIES']['SROK']['VALUE'] ?></div>
    </div>
    <div class="introduction__block">
        <div class="introduction__label"><?= $arResult['PROPERTIES']['CLIENT']['NAME'] ?></div>
        <div class="introduction__description"><?= $arResult['PROPERTIES']['CLIENT']['VALUE'] ?></div>
    </div>
    <div class="introduction__block">
        <div class="introduction__label"><?= $arResult['PROPERTIES']['SERVICES']['NAME'] ?></div>
        <div class="introduction__description"><?= $arResult['PROPERTIES']['SERVICES']['VALUE'] ?></div>
    </div>
    <div class="introduction__block">
        <div class="introduction__label"><?= $arResult['PROPERTIES']['SITE']['NAME'] ?></div>
        <div class="introduction__description">
            <a class="introduction__link" href="https://<?= $arResult['PROPERTIES']['SITE']['VALUE'] ?>">
                <?= $arResult['PROPERTIES']['SITE']['VALUE'] ?>
            </a>
        </div>
    </div>
    <div class="introduction__block introduction__block--description">
        <div class="introduction__label introduction__label--goal"><?= $arResult['PROPERTIES']['ZADACHA']['NAME'] ?></div>
        <div class="introduction__description"><?= $arResult['PROPERTIES']['ZADACHA']['VALUE'] ?></div>
    </div>
</section>

<?php if ($arParams['DISPLAY_PICTURE'] !== 'N' && is_array($arResult['DETAIL_PICTURE'])): ?>
    <div class="img-block">
        <picture>
            <source media="(max-width: 575px)"
                    srcset="<?= $arResult['PROPERTIES']['IMG_MOBILE']['SRC'] ?>">
            <source media="(max-width: 991px)"
                    srcset="<?= $arResult['PROPERTIES']['IMG_TABLET']['SRC'] ?>">
            <source media="(min-width: 992px)" srcset="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>">
            <img class="img-block__image" width="320" height="336"
                 src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" alt="">
        </picture>
    </div>
<?php endif ?>

<?= $arResult['DETAIL_TEXT'] ?>






