<?php
declare(strict_types=1);

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit;
}

$arResult['PROPERTIES']['IMG_MOBILE']['SRC'] = CFile::GetPath($arResult['PROPERTIES']['IMG_MOBILE']['VALUE']);
$arResult['PROPERTIES']['IMG_TABLET']['SRC'] = CFile::GetPath($arResult['PROPERTIES']['IMG_TABLET']['VALUE']);
