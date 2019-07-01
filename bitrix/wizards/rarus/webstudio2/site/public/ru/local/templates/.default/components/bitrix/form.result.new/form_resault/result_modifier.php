<?php
declare(strict_types=1);

$arResult["FORM_NOTE"] = '<section class="feedback feedback--success">
    <h2 class="title title--three-level feedback__title">Спасибо, сообщение отправлено</h2>
    <p class="text feedback__success-message">Мы ответим в течение трех рабочих дней</p>
</section>';

foreach ($arResult['arQuestions'] as $question){
    $arResult['arQuestionsId'][] = $question['ID'];
}
