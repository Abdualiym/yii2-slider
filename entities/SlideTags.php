<?php

namespace abdualiym\slider\entities;

use abdualiym\slider\validators\SlugValidator;
use abdualiym\slider\Language;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * @property int $slide_id
 * @property int $tag_id
 */
class SlideTags extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'abdualiym_slider_slides_and_tags';
    }

    public function rules()
    {
        return [
            [['tag_id'], 'required'],
            [['tag_id'], 'integer'],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::class, 'targetAttribute' => ['tag_id' => 'id']],

            [['slide_id'], 'required'],
            [['slide_id'], 'integer'],
            [['slide_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slides::class, 'targetAttribute' => ['slide_id' => 'id']],
        ];
    }
}
