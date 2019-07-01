<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
?>

<div class="projects__tab-list-wrap swiper-container">
    <ul class="projects__tab-list swiper-wrapper nav" id="nav-tab" role="tablist">

        <?php
        $sectionNum = 1;

        foreach ($arResult['WEBSTUDIO_SECTIONS'] as $arItem) {

        $active = $sectionNum === 1 ? 'active' : '';

        ?>

        <li class="projects__tab-item swiper-slide">
            <a class="projects__tab  <?= $active ?>" id="home-tab<?= $arItem['ID'] ?>" data-toggle="tab"
               href="#home<?= $arItem['ID'] ?>" role="tab"
               aria-controls="home<?= $arItem['ID'] ?>" aria-selected="true"><?= $arItem['NAME'] ?></a>

            <?php
            $sectionNum++;
            }
            ?>
    </ul>
</div>
