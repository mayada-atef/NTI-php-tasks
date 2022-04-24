<?php
// function such as built in bs ana elly htba el code bt3ha
use app\helper\errorHandler;

function displayError($array, $key)
{
    return errorHandler::getKeyErrors($array, $key) ?? null;
}
function getOldValues($key)
{
    return $_SESSION['old'][$key] ?? null;
}
