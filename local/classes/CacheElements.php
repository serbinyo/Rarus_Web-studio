<?php
declare(strict_types=1);

namespace SRB\Cache;

use Bitrix\Main\Application;
use Bitrix\Main\Data\Cache;
use Bitrix\Main\Loader;
use CIBlockElement;
use CIBlockSection;

/**
 * Class CacheElements
 *
 * @package SRB\Cache
 */
class CacheElements
{
    public static function cache($iblockId)
    {
        if (Loader::includeModule('iblock')) {
            $sections = [];

            # Получение списка разделов инфоблока
            $arFilter = ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y'];
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
            $cache = Application::getInstance()->getManagedCache();

            if ($cache->read(3600, 'elementsCatch')) {
                $sections = $cache->get('elementsCatch'); // достаем переменные из кеша
            } else {
                foreach ($sections as $key => $section) {
                    $arFilter = ['SECTION_ID' => $section['ID']];
                    $res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter);
                    $arItem = $res->Fetch();

                    while ($arItem !== false) {
                        $sections[$key]['ELEMENTS'][] = $arItem['ID'];
                        $arItem = $res->Fetch();
                    }
                }
                $cache->set('elementsCatch', $sections); // записываем в кеш
            }
            return $sections;
        }
        return [];
    }

    public static function cacheNotControlled($iblockId)
    {
        if (Loader::includeModule('iblock')) {
            $sections = [];

            # Получение списка разделов инфоблока
            $arFilter = ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y'];
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
            $cache = Cache::createInstance();

            if ($cache->initCache(3600, 'elementsCatch')) {
                $sections = $cache->getVars(); // достаем переменные из кеша
            } elseif ($cache->startDataCache()) {
                foreach ($sections as $key => $section) {
                    $arFilter = ['SECTION_ID' => $section['ID']];
                    $res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter);
                    $arItem = $res->Fetch();

                    while ($arItem !== false) {
                        $sections[$key]['ELEMENTS'][] = $arItem['ID'];
                        $arItem = $res->Fetch();
                    }
                }
                $cache->endDataCache($sections); // записываем в кеш
            }
            return $sections;
        }
        return [];
    }
}