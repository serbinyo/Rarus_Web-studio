<?php
declare(strict_types=1);

use Bitrix\Main\Loader;

if (Loader::includeModule('iblock')) {

    # Получение проектов по результатам поиска
    if (count($arResult['SEARCH']) > 0) {
        $arSelect = [
            'IBLOCK_ID',
            'ID',
            'NAME',
            'PREVIEW_PICTURE',
            'DETAIL_PAGE_URL',
            'PROPERTY_PROJECT_CARD_COLOR',
            'PROPERTY_PROJECT_CARD_NAME',
            'PREVIEW_TEXT'
        ];

        foreach ($arResult['SEARCH'] as $item) {
            $searched[] = $item['TITLE'];
            $arFilter = ['NAME' => $item['TITLE']];
            $res = CIBlockElement::GetList(
                [
                    'SORT' => 'ASC'
                ],
                $arFilter,
                false,
                [
                    'nTopCount' => 6
                ],
                $arSelect
            );
            $arItem = $res->GetNext(false, false);
            while ($arItem !== false) {
                $arResult['SEARCH_RESULT'][] = $arItem;
                $arItem = $res->Fetch();
            }
        }
    }

    # Получение списка разделов инфоблока
    $arFilter = ['IBLOCK_ID' => $arResult['ID']];
    $res = CIBlockSection::GetList(['SORT' => 'ASC'], $arFilter);
    $row = $res->Fetch();
    while ($row) {
        $section['ID'] = $row['ID'];
        $section['NAME'] = $row['NAME'];
        $section['SORT'] = $row['SORT'];

        $sections[] = $section;
        $row = $res->Fetch();
    }

    # Получение списка элементов для каждого из разделов инфоблока
    foreach ($sections as $key => $section) {
        $arFilter = ['SECTION_ID' => $section['ID']];
        $res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter);
        $arItem = $res->Fetch();
        while ($arItem !== false) {
            $sections[$key]['ELEMENTS'][] = $arItem['ID'];
            $arItem = $res->Fetch();
        }
    }
}

# Формирование списка разделов на основании результатов поиска
$foundSections = [];
foreach ($sections as $section) {
    foreach ((array)$arResult['SEARCH_RESULT'] as $result) {
        if (!in_array($section, $foundSections, true) &&
            in_array($result['ID'], $section['ELEMENTS'], true)) {
            $foundSections[] = $section;
        }
    }
}

$arResult['WEBSTUDIO_SECTIONS'] = $foundSections;
