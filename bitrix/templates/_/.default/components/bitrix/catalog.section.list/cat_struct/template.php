<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
?>

<div class="projects__tab-list-wrap swiper-container">
    <ul class="projects__tab-list swiper-wrapper nav" id="nav-tab" role="tablist">

        <?php
        $i = 1;

        foreach ($arResult['WEBSTUDIO_SECTIONS'] as $arItem) {

            if (array_key_exists('SECTION_ID', $_GET)) {
                $active = $arItem['ACTIVE'] === 'Y' ? 'active' : '';
            } else {
                $active = $i === 1 ? 'active' : '';
            }
        ?>

        <li class="projects__tab-item swiper-slide">
            <a class="projects__tab <?= $active ?>" id="home-tab<?= $i ?>" data-toggle="tab"
               href="index.php?SECTION_ID=<?= $arItem['ID'] ?>" role="tab"
               aria-controls="home<?= $i ?>" aria-selected="true"><?= $arItem['NAME'] ?></a>
            <?php
            $i++;
        }
        ?>
    </ul>
</div>
