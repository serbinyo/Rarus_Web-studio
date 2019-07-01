<?php
declare(strict_types=1);

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<?php if ($arResult['isFormNote'] !== 'Y') : ?>

    <section class="grid feedback feedback--contacts">
        <h2 class="title title--three-level feedback__title">Расскажите о проекте</h2>

        <?= str_replace('<form', '<form class="feedback__form"', $arResult['FORM_HEADER']) ?>

        <?php if ($arResult['isFormErrors'] === 'Y'): ?><?= $arResult['FORM_ERRORS_TEXT'] ?><?php endif; ?>

        <textarea class="feedback__textaria" name="form_textarea_<?= $arResult['arQuestionsId'][0] ?>"
                  placeholder="Детали проекта"></textarea>
        <label class="feedback__label" for="1">
            <input class="feedback__input" id="1" type="email" name="form_text_<?= $arResult['arQuestionsId'][1] ?>"
                   placeholder="Эл. почта">
        </label>

        <input type="hidden" name="web_form_submit" value="Отправить">

        <button class="btn btn--md feedback__btn" type="submit"
                name="web_form_submit"
                value="<?= $arResult['BUTTON'] ?>">Отправить
        </button>

        <div class="feedback__legal">Нажимая на «Отправить», вы соглашаетесь на <b>обработку</b> персональных
            данных
        </div>

        <?= $arResult['FORM_FOOTER'] ?>

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

<?php else: ?>


    <section class="feedback feedback--success">
        <h2 class="title title--three-level feedback__title">Спасибо, сообщение отправлено</h2>
        <p class="text feedback__success-message">Мы ответим в течение трех рабочих дней</p>
    </section>';

<?php endif; ?>
