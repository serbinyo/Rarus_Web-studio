<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "form_resault",
    [
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "N",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "COMPONENT_TEMPLATE" => "form_resault",
        "EDIT_URL" => "",
        "IGNORE_CUSTOM_TEMPLATE" => "Y",
        "LIST_URL" => "",
        "SEF_MODE" => "N",
        "SUCCESS_URL" => "",
        "AJAX_MODE" => "N",  // режим AJAX
        "AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
        "AJAX_OPTION_STYLE" => "N", // подключать стили
        "AJAX_OPTION_HISTORY" => "N",
        "USE_EXTENDED_ERRORS" => "N",
        "WEB_FORM_ID" => "1",
        "VARIABLE_ALIASES" => [
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        ],
    ],
    false
);
?>

</main>

<footer class="footer grid">
    <div class="footer__block">
        <p class="footer__text text">
            © 1998–2019 «1С-Рарус» ®.
            Все&nbsp;права&nbsp;защищены
        </p>
        <p class="footer__text text">Политика конфиденциальности</p>
    </div>
</footer>

</body>
</html>


<? /* $APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "form_resault",
    [
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "COMPONENT_TEMPLATE" => "form_resault",
        "EDIT_URL" => "",
        "IGNORE_CUSTOM_TEMPLATE" => "Y",
        "LIST_URL" => "",
        "SEF_MODE" => "N",
        "SUCCESS_URL" => "/success.php",
        "USE_EXTENDED_ERRORS" => "N",
        "WEB_FORM_ID" => "1",
        "VARIABLE_ALIASES" => [
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        ],
    ],
    false
); */ ?>
