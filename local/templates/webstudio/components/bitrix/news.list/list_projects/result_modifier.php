<?php
declare(strict_types=1);

$sections = [];
if (count($arParams['SECTIONS']) > 0) {
    $sections = $arParams['SECTIONS'];
}

if (count($GLOBALS['elements']) > 0) {

# Формирование списка разделов на основании результатов поиска
    $foundSections = [];
    foreach ($sections as $section) {
        foreach ((array)$GLOBALS['elements'] as $result) {
            if (!in_array($section, $foundSections, true) &&
                in_array($result['ID'], $section['ELEMENTS'], true)) {
                $foundSections[] = $section;
            }
        }
    }
    $arResult['WEBSTUDIO_SECTIONS'] = $foundSections;
} else {
    $arResult['WEBSTUDIO_SECTIONS'] = $sections;
}
