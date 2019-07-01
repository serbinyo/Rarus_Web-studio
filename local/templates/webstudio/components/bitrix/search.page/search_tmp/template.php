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
?>

<section>

    <div class='search-page'>
        <form action='' method='get'>

            <input type='text' name='q' value='<?= $arResult['REQUEST']['QUERY'] ?>' size='40'/>

            &nbsp;<input type='submit' value='<?= GetMessage('SEARCH_GO') ?>'/>
            <input type='hidden' name='how' value='<?php echo $arResult['REQUEST']['HOW'] === 'd' ? 'd' : 'r' ?>'/>

        </form>
        <br/>

        <?php if (isset($arResult['REQUEST']['ORIGINAL_QUERY'])): ?>
            <div class='search-language-guess'>
                <?php echo GetMessage('CT_BSP_KEYBOARD_WARNING',
                    [
                        '#query#' => '<a href="' . $arResult['ORIGINAL_QUERY_URL'] . '">'
                            . $arResult['REQUEST']['ORIGINAL_QUERY'] . '</a>'
                    ])
                ?>
            </div><br/>
        <?php endif; ?>

        <?php if ($arResult['REQUEST']['QUERY'] === false && $arResult['REQUEST']['TAGS'] === false): ?>
        <?php elseif ($arResult['ERROR_CODE'] !== 0): ?>
            <p><?= GetMessage('SEARCH_ERROR') ?></p>
            <?php ShowError($arResult['ERROR_TEXT']); ?>
            <p><?= GetMessage('SEARCH_CORRECT_AND_CONTINUE') ?></p>
            <br/><br/>

        <?php elseif (count($arResult['SEARCH']) > 0): ?>
            <?php if ($arParams['DISPLAY_TOP_PAGER'] !== 'N') echo $arResult['NAV_STRING'] ?>

            <!-- PROJECTS_template -->

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

                        <?php foreach ($arResult['SEARCH_RESULT'] as $i => $arItem) : ?>

                            <?php
                            if (in_array($arItem['ID'], $section['ELEMENTS'], true)) : ?>

                                <?php
                                $isOdd = ($i % 2) === 0;
                                $projectCardSize = $isOdd ? 'project-card--big' : 'project-card--small';
                                ?>

                                <li class="project-card <?= $projectCardSize . ' '
                                . $arItem['PROPERTY_PROJECT_CARD_COLOR_VALUE']
                                . ' ' . $arItem['PROPERTY_PROJECT_CARD_NAME_VALUE'] ?>">

                                    <div class="project-card__wrap">
                                        <a class="project-card__link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                                           aria-label="Подробнее">
                                            <img class="project-card__image"
                                                 src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']) ?>"
                                                 alt="<?= $arItem['NAME'] ?>"
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

            <!-- END PROJECTS_template -->

            <?php if ($arParams['DISPLAY_BOTTOM_PAGER'] !== 'N') echo $arResult['NAV_STRING'] ?>
            <br/>

        <?php else: ?>
            <?php ShowNote(GetMessage('SEARCH_NOTHING_TO_FOUND')); ?>
        <?php endif; ?>
    </div>

</section>
