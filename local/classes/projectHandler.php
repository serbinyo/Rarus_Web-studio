<?php
declare(strict_types=1);

namespace SRB\Handler;

/**
 * Class projectHandler
 *
 * @package SRB\Handler
 */
class projectHandler
{
    /**
     *
     */
    const IBLOCK_ID = 4;
    /**
     *
     */
    const PROP_COLOR_ID = 7;
    /**
     *
     */
    const PROP_NAME_ID = 8;

    /**
     * Функция проверяет валидность введенных пользователем
     * свойств при добавлении проекта инфоблока Вебстудия
     *
     * @param $arFields
     *
     * @return bool
     */
    public static function checkProps($arFields): bool
    {
        $result = true;

        if ((int)$arFields['IBLOCK_ID'] === self::IBLOCK_ID) {
            global $APPLICATION;
            $color = reset($arFields['PROPERTY_VALUES'][self::PROP_COLOR_ID]);
            $propertyColor = $color['VALUE'];
            $name = reset($arFields['PROPERTY_VALUES'][self::PROP_NAME_ID]);
            $propertyName = $name['VALUE'];
            $allowedColors = [
                'project-card--black',
                'project-card--white'
            ];

            $errorMsg = self::checkColor($propertyColor, $allowedColors)
                . self::checkName($propertyName);

            if ($errorMsg !== '') {
                $APPLICATION->ThrowException($errorMsg);
                $result = false;
            }
        }

        return $result;
    }

    /**
     * @param string $propertyColor
     * @param array  $allowedColors
     *
     * @return string
     */
    private static function checkColor($propertyColor, array $allowedColors): string
    {
        $errorMsg = '';

        if (!\in_array($propertyColor, $allowedColors, true)) {
            $errorMsg = 'Имя класса project-card--color должно принимать одно из двух значений: '
                . PHP_EOL . 'project-card--black или project-card--white.';
        }

        return $errorMsg;
    }

    /**
     * @param string $propertyName
     *
     * @return string
     */
    private static function checkName($propertyName): string
    {
        $errorMsg = '';

        if (strpos($propertyName, 'project-card--') === false) {
            $errorMsg = PHP_EOL . 'Имя класса project-card--name должно '
                . 'начинаться с последовательности project-card--';
        }

        return $errorMsg;
    }
}
