<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<?php if ($arResult["isFormNote"] !== "Y") : ?>

    <section class="grid feedback feedback--contacts">
        <h2 class="title title--three-level feedback__title">Расскажите о проекте</h2>

        <?= str_replace('<form', '<form class="feedback__form"', $arResult["FORM_HEADER"]) ?>

        <?php if ($arResult["isFormErrors"] == "Y"): ?><?= $arResult["FORM_ERRORS_TEXT"]; ?><? endif; ?>

        <textarea class="feedback__textaria" name="form_textarea_1" placeholder="Детали проекта"></textarea>
        <label class="feedback__label" for="1">
            <input class="feedback__input" id="1" type="email" name="form_text_2" placeholder="Эл. почта">
        </label>

        <button class="btn btn--md feedback__btn" type="submit"
                name="web_form_submit"
                value="<?= htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"]))
                <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>"
            <?= ((int)$arResult["F_RIGHT"] < 10 ? "disabled=\"disabled\"" : ""); ?>>Отправить
        </button>

        <div class="feedback__legal">Нажимая на «Отправить», вы соглашаетесь на <b>обработку</b> персональных
            данных
        </div>


        <?= $arResult["FORM_FOOTER"] ?>

        <div class="feedback__contacts">
            <div class="feedback__up-text">Или свяжитесь напрямую</div>
            <a class="feedback__contact-link" href="mailto:serbin@rarus.ru">new-project@rarus.ru</a>
            <a class="feedback__contact-link" href="tel:+79786573412">+7 (978) 657 34 12</a>
        </div>
    </section>

    <section class="feedback feedback--success hide-js">
        <h2 class="title title--three-level feedback__title">Спасибо, сообщение отправлено</h2>
        <p class="text feedback__success-message">Мы ответим в течение трех рабочих дней</p>
    </section>

<? else: ?>

    <?= $arResult["FORM_NOTE"] ?>

<? endif; ?>
