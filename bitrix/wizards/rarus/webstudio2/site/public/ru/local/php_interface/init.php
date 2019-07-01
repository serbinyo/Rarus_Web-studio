<?php

define('DEFAULT_TEMPLATE_PATH', '/local/templates/.default');

function debug($toDebug)
{
    echo '<pre>';
    print_r($toDebug);
    echo '</pre>';
}