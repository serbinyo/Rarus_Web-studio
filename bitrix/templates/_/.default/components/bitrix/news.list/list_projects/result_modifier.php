<?php
declare(strict_types=1);

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
}
