<?php
declare(strict_types=1);

$sections = [];
$section = [];

if (CModule::IncludeModule('iblock')) {
    $arSelect = ['ID', 'NAME'];
    $arFilter = ['IBLOCK_ID' => '#WEBSTUDIO_IBLOCK_ID#', 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y'];
    $res = CIBlockSection::GetList(['SORT' => 'ASC'], $arFilter, true, $arSelect);
    while ($ob = $res->GetNext()) {
        $section['ID'] = $ob['ID'];
        $section['NAME'] = $ob['NAME'];
        $section['SORT'] = $ob['SORT'];

        $sections[] = $section;
    }
}

usort($sections, function ($a, $b) {
    return ($a['ID'] <=> $b['ID']);
});
usort($sections, function ($a, $b) {
    return ($a['SORT'] <=> $b['SORT']);
});

$arResult['WEBSTUDIO_SECTIONS'] = $sections;
