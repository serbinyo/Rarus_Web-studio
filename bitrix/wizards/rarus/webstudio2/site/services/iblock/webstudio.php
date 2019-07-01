<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!CModule::IncludeModule("iblock")) {
    return;
}

$iblockXMLFile = WIZARD_SERVICE_RELATIVE_PATH . "/xml/" . LANGUAGE_ID . "/webstudio.xml";
$iblockCode = "ws_" . WIZARD_SITE_ID;
$iblockType = "ws";

$rsIBlock = CIBlock::GetList([], ["CODE" => $iblockCode, "TYPE" => $iblockType]);
$iblockID = false;
if ($arIBlock = $rsIBlock->Fetch()) {
    $iblockID = $arIBlock["ID"];
    var_dump(WIZARD_INSTALL_DEMO_DATA);
    if (WIZARD_INSTALL_DEMO_DATA) {
        CIBlock::Delete($arIBlock["ID"]);
        $iblockID = false;
    }
}

if ($iblockID == false) {
    $permissions = [
        "1" => "X",
        "2" => "R",
    ];
    $dbGroup = CGroup::GetList($by = "", $order = "", ["STRING_ID" => "content_editor"]);
    if ($arGroup = $dbGroup->Fetch()) {
        $permissions[$arGroup["ID"]] = 'W';
    };
    $iblockID = WizardServices::ImportIBlockFromXML(
        $iblockXMLFile,
        $iblockCode,
        $iblockType,
        WIZARD_SITE_ID,
        $permissions
    );

    if ($iblockID < 1) {
        return;
    }

    //WizardServices::SetIBlockFormSettings($iblockID, Array ( 'tabs' => GetMessage("W_IB_GROUP_PHOTOG_TAB1").$REAL_PICTURE_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB2").$rating_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB3").$vote_count_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB4").$vote_sum_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB5").$APPROVE_ELEMENT_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB6").$PUBLIC_ELEMENT_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB7"), ));

    //IBlock fields
    $iblock = new CIBlock;
    $arFields = [
        "ACTIVE" => "Y",
        "FIELDS" => [
            'IBLOCK_SECTION' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
            'ACTIVE' => ['IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'Y',],
            'ACTIVE_FROM' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
            'ACTIVE_TO' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
            'SORT' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
            'NAME' => ['IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '',],
            'PREVIEW_PICTURE' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'FROM_DETAIL' => 'N',
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                ],
            ],
            'PREVIEW_TEXT_TYPE' => ['IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',],
            'PREVIEW_TEXT' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
            'DETAIL_PICTURE' => [
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => ['SCALE' => 'N', 'WIDTH' => '', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N',],
            ],
            'DETAIL_TEXT_TYPE' => ['IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',],
            'DETAIL_TEXT' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
            'XML_ID' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
            'CODE' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
            'TAGS' => ['IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',],
        ],
        "CODE" => $iblockCode,
        "XML_ID" => $iblockCode,
        "NAME" => $iblock->GetArrayByID($iblockID, "NAME"),
        //"NAME" => "[".WIZARD_SITE_ID."] ".$iblock->GetArrayByID($iblockID, "NAME")
    ];

    $iblock->Update($iblockID, $arFields);
} else {
    $arSites = [];
    $db_res = CIBlock::GetSite($iblockID);
    while ($res = $db_res->Fetch()) {
        $arSites[] = $res["LID"];
    }
    if (!in_array(WIZARD_SITE_ID, $arSites)) {
        $arSites[] = WIZARD_SITE_ID;
        $iblock = new CIBlock;
        $iblock->Update($iblockID, ["LID" => $arSites]);
    }

}


CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/_index.php", ["WEBSTUDIO_IBLOCK_ID" => $iblockID]);
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/projects/index.php", ["WEBSTUDIO_IBLOCK_ID" => $iblockID]);
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/projects/detail.php", ["WEBSTUDIO_IBLOCK_ID" => $iblockID]);
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/local/templates/.default/components/bitrix/news.list/list_projects/result_modifier.php",
    ["WEBSTUDIO_IBLOCK_ID" => $iblockID]);
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/local/templates/.default/components/bitrix/catalog.section.list/cat_struct/result_modifier.php",
    ["WEBSTUDIO_IBLOCK_ID" => $iblockID]);
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/_index.php", ["WEBSTUDIO_IBLOCK_TYPE" => $iblockType]);
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/projects/index.php", ["WEBSTUDIO_IBLOCK_TYPE" => $iblockType]);
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/projects/detail.php", ["WEBSTUDIO_IBLOCK_TYPE" => $iblockType]);
