<?php
declare(strict_types=1);

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

foreach ($arResult["ITEMS"] as &$arItem) {
    $res = CIBlockElement::GetProperty(
        $arItem['IBLOCK_ID'],
        $arItem['ID']);
    while ($res_arr = $res->Fetch()) {
        if ($res_arr['CODE'] === 'PROJECT_CARD_COLOR') {
            $arItem['CARD_COLOR'] = $res_arr['VALUE'];
        }
        if ($res_arr['CODE'] === 'PROJECT_CARD_NAME') {
            $arItem['CARD_NAME'] = $res_arr['VALUE'];
        }
    }
    $db_old_groups = CIBlockElement::GetElementGroups($arItem['ID']);
    while ($ar_group = $db_old_groups->Fetch()) {
        $arItem['ARR_SECTIONS']['ID'][] = $ar_group['ID'];
        $arItem['ARR_SECTIONS']['NAME'][] = $ar_group['NAME'];
    }
}
