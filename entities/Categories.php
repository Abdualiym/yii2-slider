<?php

namespace abdualiym\slider\entities;

use abdualiym\slider\validators\SlugValidator;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * @property int $id
 * @property bool $use_tags
 * @property string $slug
 * @property string $title_0
 * @property string $title_1
 * @property string $title_2
 * @property string $title_3
 * @property string $description_0
 * @property string $description_1
 * @property string $description_2
 * @property string $description_3
 * @property int $created_at
 * @property int $updated_at

 * @property bool $common_image

 * @property bool $use_checkbox
 * @property string $checkbox_label

 * @property bool $use_link
 * @property bool $common_link
 * @property string $link_label

 * @property bool $use_input
 * @property string $input_label
 * @property bool $common_input

 * @property bool $common_text
 * @property bool $use_editor

 * @property bool $use_text_2
 * @property string $text_2_label
 * @property bool $common_text_2
 * @property bool $use_editor_2

 */
class Categories extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'abdualiym_slider_categories';
    }

    public function rules()
    {
        return [
            [['common_image', 'common_link', 'common_text', 'common_input', 'use_tags', 'use_editor', 'use_link', 'use_input', 'use_text_2', 'use_editor_2', 'common_text_2', 'use_checkbox'], 'required'],
            [['common_image', 'common_link', 'common_text', 'common_input', 'use_tags', 'use_editor', 'use_link', 'use_input', 'use_text_2', 'use_editor_2', 'common_text_2', 'use_checkbox'], 'boolean'],

            ['slug', 'required'],
            [['slug'], 'unique'],
            [['slug'], SlugValidator::class],

            ['title_0', 'required', 'when' => function () {
                return in_array(0, Yii::$app->params['cms']['languageIds']);
            }],
            ['title_1', 'required', 'when' => function () {
                return in_array(1, Yii::$app->params['cms']['languageIds']);
            }],
            ['title_2', 'required', 'when' => function () {
                return in_array(2, Yii::$app->params['cms']['languageIds']);
            }],
            ['title_3', 'required', 'when' => function () {
                return in_array(3, Yii::$app->params['cms']['languageIds']);
            }],

//            [['link_label', 'input_label', 'text_2_label'], 'required'],
            [['title_0', 'title_1', 'title_2', 'title_3', 'slug', 'link_label', 'input_label', 'text_2_label', 'checkbox_label'], 'string', 'max' => 255],

            [['description_0', 'description_1', 'description_2', 'description_3'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $language0 = Yii::$app->params['cms']['languages2'][0] ?? '';
        $language1 = Yii::$app->params['cms']['languages2'][1] ?? '';
        $language2 = Yii::$app->params['cms']['languages2'][2] ?? '';
        $language3 = Yii::$app->params['cms']['languages2'][3] ?? '';

        return [
            'id' => Yii::t('slider', 'ID'),
            'use_tags' => Yii::t('slider', 'Use tags'),
            'slug' => Yii::t('slider', 'Slug'),
            'title_0' => Yii::t('slider', 'Title') . '(' . $language0 . ')',
            'title_1' => Yii::t('slider', 'Title') . '(' . $language1 . ')',
            'title_2' => Yii::t('slider', 'Title') . '(' . $language2 . ')',
            'title_3' => Yii::t('slider', 'Title') . '(' . $language3 . ')',
            'description_0' => Yii::t('slider', 'Description') . '(' . $language0 . ')',
            'description_1' => Yii::t('slider', 'Description') . '(' . $language1 . ')',
            'description_2' => Yii::t('slider', 'Description') . '(' . $language2 . ')',
            'description_3' => Yii::t('slider', 'Description') . '(' . $language3 . ')',
            'created_at' => Yii::t('slider', 'Created At'),
            'updated_at' => Yii::t('slider', 'Updated At'),

            'common_image' => Yii::t('slider', 'Common image'),

            'use_checkbox' => Yii::t('slider', 'Use checkbox'),
            'checkbox_label' => Yii::t('slider', 'Checkbox label'),

            'common_text' => Yii::t('slider', 'Common text'),
            'use_editor' => Yii::t('slider', 'Use editor'),

            'use_text_2' => Yii::t('slider', 'Use text 2'),
            'text_2_label' => Yii::t('slider', 'Text 2 label'),
            'common_text_2' => Yii::t('slider', 'Common text 2'),
            'use_editor_2' => Yii::t('slider', 'Use editor 2'),

            'use_link' => Yii::t('slider', 'Use link'),
            'common_link' => Yii::t('slider', 'Common link'),
            'link_label' => Yii::t('slider', 'Link label'),

            'use_input' => Yii::t('slider', 'Use input'),
            'common_input' => Yii::t('slider', 'Common input'),
            'input_label' => Yii::t('slider', 'Input label'),
        ];
    }


    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
}
