<?php
declare(strict_types=1);

foreach ($arResult['arQuestions'] as $question){
    $arResult['arQuestionsId'][] = $question['ID'];
}

$arResult['BUTTON'] = htmlspecialcharsbx(strlen(trim($arResult['arForm']['BUTTON']))
<= 0 ? GetMessage('FORM_ADD') : $arResult['arForm']['BUTTON']);