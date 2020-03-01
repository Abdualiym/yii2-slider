<?php

namespace abdualiym\slider;

use yii\base\BootstrapInterface;


class Bootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {
        if (!isset($app->i18n->translations['slider']) && !isset($app->i18n->translations['slider*'])) {
            $app->i18n->translations['slider'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__ . '/messages',
                'sourceLanguage' => 'en',
                'forceTranslation' => true,
            ];
        }
    }
}
