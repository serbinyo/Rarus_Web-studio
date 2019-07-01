<?php
declare(strict_types=1);

$sections = [];
$section = [];

if (array_key_exists('SECTION_ID', $_GET)) {
    $section_id = $_GET['SECTION_ID'];
}

if (CModule::IncludeModule('iblock')) {
    $arSelect = ['ID', 'NAME'];
    $arFilter = ['IBLOCK_ID' => 4, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y'];
    $res = CIBlockSection::GetList(['SORT' => 'ASC'], $arFilter, true, $arSelect);
    while ($ob = $res->GetNext()) {
        $section['ID'] = $ob['ID'];
        $section['NAME'] = $ob['NAME'];
        if (isset($section_id) && ($section['ID'] === $section_id)) {
            $section['ACTIVE'] = 'Y';
        } else {
            $section['ACTIVE'] = 'N';
        }
        $sections[] = $section;
    }
}

usort($sections, function ($a, $b) {
    return ($a['ID'] <=> $b['ID']);
});

$arResult['WEBSTUDIO_SECTIONS'] = $sections;
