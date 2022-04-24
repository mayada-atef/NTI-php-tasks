<?php

namespace app\helper;

class errorHandler
{
    public static function getKeyErrors($array, $errorKey)
    {
        if (isset($array['errors'][$errorKey])) {
            foreach ($array['errors'][$errorKey] as  $value) {
                return errorHandler::template($value);
            }
        }
        return null;
    }
    public static function template($value)
    {
        return "<div class='text-danger'>{$value}</div> ";
    }
}
