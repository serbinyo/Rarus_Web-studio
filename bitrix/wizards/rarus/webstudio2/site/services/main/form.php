<?php
declare(strict_types=1);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$FORM_NAME = 'SIMPLE_FORM_MCART_CALLBACK_'.rand(10,100);
CModule::IncludeModule("form");

$ID = CAllForm::Set(array(
    'NAME' => 'Обратная связь',
    'SID' => $FORM_NAME,
    'C_SORT' => 100,
    'BUTTON' => 'Отправить',
    'USE_CAPTCHA' => 'N',

    'USE_RESTRICTIONS' => 'N',
    'RESTRICT_USER' => 0,
    'RESTRICT_TIME' => 0,
    'arRESTRICT_STATUS' => Array(),
    'STAT_EVENT1' => 'form',
    'arSITE' => Array
    (
        0 => SITE_ID
    ),

    'USE_DEFAULT_TEMPLATE' => 'Y',
    'FORM_TEMPLATE' => '',
    'arMENU' => Array
    (
        'ru' => 'Обратная связь - результаты',
        'en' => 'Callback results'
    ),

    'arGROUP' => Array
    (
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0
    ),

    'VARNAME' => $FORM_NAME

),false, "N");



$FIELD_ID=CFormField::Set(array('FORM_ID' => $ID,
    'ACTIVE' => 'Y' ,
    'TITLE' => 'Детали проекта' ,
    'TITLE_TYPE' => 'text',
    'C_SORT' => '100' ,
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'Y',
    'IN_RESULTS_TABLE' => 'Y' ,
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => 'text' ,
    'COMMENTS' => 'комент',
    'FILTER_TITLE' => 'Детали проекта' ,
    'RESULTS_TABLE_TITLE' => 'Детали проекта',
    'VARNAME' => 'SIMPLE_QUESTION_287',

    'SID' => 'SIMPLE_QUESTION_287' ),
    false,
    'Y',
    'N'
);

$ANSWER_ID = CAllFormAnswer::Set(array('FIELD_ID' => $FIELD_ID,
    'MESSAGE' => ' ',
    'VALUE' => '',
    'C_SORT' => '100',
    'ACTIVE' => 'Y',
    'FIELD_TYPE' => 'textarea',
    'FIELD_WIDTH' => '0',
    'FIELD_HEIGHT' => '0',
    'FIELD_PARAM' => ''  )
);

$FIELD_ID2 =CFormField::Set(array('FORM_ID' => $ID,
    'ACTIVE' => 'Y' ,
    'TITLE' => 'Эл. почта' ,
    'TITLE_TYPE' => 'text',
    'C_SORT' => '200' ,
    'ADDITIONAL' => 'N',
    'REQUIRED' => 'Y',
    'IN_RESULTS_TABLE' => 'Y' ,
    'IN_EXCEL_TABLE' => 'Y',
    'FIELD_TYPE' => 'text' ,
    'COMMENTS' => 'эл комент',
    'FILTER_TITLE' => 'Эл. почта' ,
    'RESULTS_TABLE_TITLE' => 'Эл. почта',
    'VARNAME' => 'SIMPLE_QUESTION_957',

    'SID' => 'SIMPLE_QUESTION_957' ),
    false,
    'Y',
    'N'
);

$ANSWER_ID = CAllFormAnswer::Set(array('FIELD_ID' => $FIELD_ID2,
    'MESSAGE' => ' ',
    'VALUE' => '',
    'C_SORT' => '110',
    'ACTIVE' => 'Y',
    'FIELD_TYPE' => 'text',
    'FIELD_WIDTH' => '0',
    'FIELD_HEIGHT' => '0',
    'FIELD_PARAM' => '' )
);

//===================================================
$arFields_status = array( 'FORM_ID' => $ID,
    'C_SORT' => 100,
    'ACTIVE' => 'Y',
    'TITLE' => 'DEFAULT',
    'DESCRIPTION' => 'DEFAULT',
    'CSS' => 'statusgreen',
    'DEFAULT_VALUE' => 'Y',
    'arPERMISSION_VIEW' => Array
    (
        0 => 0
    ),

    'arPERMISSION_MOVE' => Array
    (
        0 => 0
    ),

    'arPERMISSION_EDIT' => Array
    (
        0 => 0
    ),

    'arPERMISSION_DELETE' => Array
    (
        0 => 0
    ));

$STATUS = CFormStatus::Set($arFields_status, 0);


CWizardUtil::ReplaceMacros($_SERVER['DOCUMENT_ROOT'] . '/bitrix/templates/webstudio_gray/footer.php', ["FEEDBACK_FORM_ID" => $ID]);
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/local/templates/webstudio/footer.php", ["FEEDBACK_FORM_ID" => $ID]);