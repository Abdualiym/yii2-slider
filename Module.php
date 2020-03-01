<?php

namespace abdualiym\slider;

use abdualiym\slider\helpers\Language;

/**
 * Class Module
 * @package abdualiym\slider
 * @property string $storageRoot
 * @property string $storageHost
 * @property array $thumbs
 * @property array $languages
 * @property array $menuActions
 */
class Module extends \yii\base\Module
{

    public $storageRoot;
    public $storageHost;
    public $thumbs;
    public $languages;

    public function init()
    {
        parent::init();
        $this->registerAppParams();
        $this->validateLanguages();
    }

    private function registerAppParams()
    {
        $languageIds = [];
        foreach ($this->languages as $prefix => $language) {
            \Yii::$app->params['slider']['languageIds'][$prefix] = $language['id'];
            \Yii::$app->params['slider']['languages'][$prefix] = $language['name'];
            \Yii::$app->params['slider']['languages2'][$language['id']] = $language['name'];
        }
    }

    private function validateLanguages()
    {
        if (count(array_diff(\Yii::$app->params['slider']['languageIds'], Language::dataKeys()))) {
            throw new \RuntimeException('Language key is invalid. Current support keys range is ' . json_encode(Language::dataKeys()));
        }
    }
}
