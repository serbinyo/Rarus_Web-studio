<?php
declare(strict_types=1);

$arResult['PROPERTIES']['IMG_MOBILE']['SRC'] = CFile::GetPath($arResult['PROPERTIES']['IMG_MOBILE']['VALUE']);
$arResult['PROPERTIES']['IMG_TABLET']['SRC'] = CFile::GetPath($arResult['PROPERTIES']['IMG_TABLET']['VALUE']);

$imageBlock = sprintf("<div class='img-block'>
 <picture>
 <source media='(max-width: 575px)' srcset=%s>
 <source media='(max-width: 991px)' srcset=%s>
 <source media='(min-width: 992px)' srcset=%s>
 <img src=%s class='img-block__image' alt='' width='320' height='336'>
 </picture>
</div>",
    $arResult['PROPERTIES']['IMG_MOBILE']['SRC'],
    $arResult['PROPERTIES']['IMG_TABLET']['SRC'],
    $arResult['DETAIL_PICTURE']['SRC'],
    $arResult['DETAIL_PICTURE']['SRC']);
$arResult['DETAIL_TEXT'] = str_replace('#IMG#', $imageBlock, $arResult['DETAIL_TEXT']);
