<?php

namespace abdualiym\slider\entities;

use abdualiym\slider\validators\SlugValidator;
use abdualiym\slider\Language;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * @property int $id
 * @property int $sort
 * @property string $slug
 * @property string $title_0
 * @property string $title_1
 * @property string $title_2
 * @property string $title_3
 * @property int $created_at
 * @property int $updated_at
 */
class Tags extends \yii\db\ActiveRecord
{
    private $SliderModule;

    public function __construct($config = [])
    {
        $this->SliderModule = Yii::$app->getModule('slider');
        parent::__construct($config);
    }

    public static function tableName()
    {
        return 'abdualiym_slider_tags';
    }

    public function rules()
    {
        return [
            ['slug', 'required'],
            [['slug'], 'unique'],
            [['slug'], SlugValidator::class],

            [['sort'], 'required'],
            [['sort'], 'integer'],

            ['title_0', 'required', 'when' => function () {
                return in_array(0, Yii::$app->params['slider']['languageIds']);
            }],
            ['title_1', 'required', 'when' => function () {
                return in_array(1, Yii::$app->params['slider']['languageIds']);
            }],
            ['title_2', 'required', 'when' => function () {
                return in_array(2, Yii::$app->params['slider']['languageIds']);
            }],
            ['title_3', 'required', 'when' => function () {
                return in_array(3, Yii::$app->params['slider']['languageIds']);
            }],

            [['title_0', 'title_1', 'title_2', 'title_3', 'slug'], 'string', 'max' => 255],
        ];
    }

    public function getSortValue()
    {
        return $this->isNewRecord ? (self::find()->max('sort') + 1) : $this->sort;
    }

    public function attributeLabels()
    {
        $language0 = Yii::$app->params['slider']['languages2'][0] ?? '';
        $language1 = Yii::$app->params['slider']['languages2'][1] ?? '';
        $language2 = Yii::$app->params['slider']['languages2'][2] ?? '';
        $language3 = Yii::$app->params['slider']['languages2'][3] ?? '';

        return [
            'id' => Yii::t('slider', 'ID'),
            'sort' => Yii::t('slider', 'Sort'),
            'slug' => Yii::t('slider', 'Slug'),
            'title_0' => Yii::t('slider', 'Title') . '(' . $language0 . ')',
            'title_1' => Yii::t('slider', 'Title') . '(' . $language1 . ')',
            'title_2' => Yii::t('slider', 'Title') . '(' . $language2 . ')',
            'title_3' => Yii::t('slider', 'Title') . '(' . $language3 . ')',
            'created_at' => Yii::t('slider', 'Created At'),
            'updated_at' => Yii::t('slider', 'Updated At'),
        ];
    }


    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
}
