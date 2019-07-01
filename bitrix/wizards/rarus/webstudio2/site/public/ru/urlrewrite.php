<?php
$arUrlRewrite=array (
  0 =>
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  1 =>
  array (
    'CONDITION' => '#/projects/(.*)#',
    'RULE' => 'project=$1',
    'ID' => 'bitrix:webstudio',
    'PATH' => '/projects/detail.php',
    'SORT' => 100,
  ),
);
