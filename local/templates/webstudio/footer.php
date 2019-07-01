<?php
declare(strict_types=1);

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$APPLICATION->IncludeComponent(
    'bitrix:form.result.new',
    'form_resault',
    [
        'CACHE_TIME' => '3600',
        'CACHE_TYPE' => 'N',
        'CHAIN_ITEM_LINK' => '',
        'CHAIN_ITEM_TEXT' => '',
        'COMPONENT_TEMPLATE' => 'form_resault',
        'EDIT_URL' => '',
        'IGNORE_CUSTOM_TEMPLATE' => 'Y',
        'LIST_URL' => '',
        'SEF_MODE' => 'N',
        'SUCCESS_URL' => '',
        'AJAX_MODE' => 'N',
        'AJAX_OPTION_JUMP' => 'N',
        'AJAX_OPTION_STYLE' => 'N',
        'AJAX_OPTION_HISTORY' => 'N',
        'USE_EXTENDED_ERRORS' => 'Y',
        'WEB_FORM_ID' => '1',
        'VARIABLE_ALIASES' => [
            'WEB_FORM_ID' => 'WEB_FORM_ID',
            'RESULT_ID' => 'RESULT_ID'
        ]
    ],
    false,
    ['HIDE_ICONS' => 'Y']
);
?>

</main>

<footer class='footer grid'>
    <div class='footer__block'>
        <p class='footer__text text'>
            © 1998–<?= date('Y') ?> «1С-Рарус» ®.
            Все&nbsp;права&nbsp;защищены
        </p>
        <p class='footer__text text'>Политика конфиденциальности</p>
    </div>
</footer>

</body>
</html>
