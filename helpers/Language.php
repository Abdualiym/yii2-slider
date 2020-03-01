<?php

namespace abdualiym\slider\helpers;


class Language
{
    public static function getAttribute($className, $attributeName, $key = null)
    {
        $key = isset($key) ? $key : \Yii::$app->language;
        
        if(is_string($key)){
            $key = \Yii::$app->params['slider']['languageIds'][$key];
        }
        return $className[$attributeName . '_' . $key];
    }

    public static function get($className, $attributeName, $key)
    {
        return $className[$attributeName . '_' . $key];
    }

    public static function dataKeys()
    {
        return [0, 1, 2, 3];
    }
}
