<?php

namespace abdualiym\slider\entities;

use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * @property int $id
 * @property int $category_id
 * @property int $active
 * @property int $sort
 * @property string $photo_0
 * @property string $photo_1
 * @property string $photo_2
 * @property string $photo_3
 * @property string $link_0
 * @property string $link_1
 * @property string $link_2
 * @property string $link_3
 * @property string $input_0
 * @property string $input_1
 * @property string $input_2
 * @property string $input_3
 * @property string $title_0
 * @property string $title_1
 * @property string $title_2
 * @property string $title_3
 * @property string $content_0
 * @property string $content_1
 * @property string $content_2
 * @property string $content_3
 * @property string $text_2_0
 * @property string $text_2_1
 * @property string $text_2_2
 * @property string $text_2_3
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Categories $category
 * @property Tags $tags
 */
class Slides extends \yii\db\ActiveRecord
{
    public $tags;

    public static function getBySlug($slug, $count = false)
    {
        $slidesQuery = self::find()->where(['category_id' => (Categories::findOne(['slug' => $slug]))->id]);
        return $count ? $slidesQuery->count() : $slidesQuery->orderBy('sort')->all();
    }

    public static function tableName()
    {
        return 'abdualiym_slider_slides';
    }

    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],

            [['active'], 'boolean'],
            [['active'], 'default', 'value' => true],

            [['sort'], 'required'],
            [['sort'], 'integer'],

            [['photo_0', 'photo_1', 'photo_2', 'photo_3'], 'image', 'extensions' => 'png, jpg'],

//            [['link_0', 'link_1', 'link_2', 'link_3'], 'url', 'defaultScheme' => 'http'],
            [['link_0', 'link_1', 'link_2', 'link_3'], 'string', 'max' => 255],
            [['input_0', 'input_1', 'input_2', 'input_3'], 'string', 'max' => 255],

            [['title_0', 'title_1', 'title_2', 'title_3'], 'string', 'max' => 255],

            [['content_0', 'content_1', 'content_2', 'content_3', 'text_2_0', 'text_2_1', 'text_2_2', 'text_2_3'], 'string'],

            ['tags', 'each', 'rule' => ['integer']]
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
            'category_id' => Yii::t('slider', 'Category'),
            'sort' => Yii::t('slider', 'Sort'),
            'photo_0' => Yii::t('slider', 'Photo') . '(' . $language0 . ')',
            'photo_1' => Yii::t('slider', 'Photo') . '(' . $language1 . ')',
            'photo_2' => Yii::t('slider', 'Photo') . '(' . $language2 . ')',
            'photo_3' => Yii::t('slider', 'Photo') . '(' . $language3 . ')',
            'title_0' => Yii::t('slider', 'Title') . '(' . $language0 . ')',
            'title_1' => Yii::t('slider', 'Title') . '(' . $language1 . ')',
            'title_2' => Yii::t('slider', 'Title') . '(' . $language2 . ')',
            'title_3' => Yii::t('slider', 'Title') . '(' . $language3 . ')',
            'content_0' => Yii::t('slider', 'Content') . '(' . $language0 . ')',
            'content_1' => Yii::t('slider', 'Content') . '(' . $language1 . ')',
            'content_2' => Yii::t('slider', 'Content') . '(' . $language2 . ')',
            'content_3' => Yii::t('slider', 'Content') . '(' . $language3 . ')',
            'created_at' => Yii::t('slider', 'Created At'),
            'updated_at' => Yii::t('slider', 'Updated At'),
        ];
    }

    public function getSortValue($categoryId)
    {
        return $this->isNewRecord ? (self::find()->where(['category_id' => $categoryId])->max('sort') + 1) : $this->sort;
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    public function categoriesList()
    {
        return ArrayHelper::map(Categories::find()->asArray()->all(), 'id', 'title_0');
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            $this->getImageUploadBehaviorConfig('photo_0'),
            $this->getImageUploadBehaviorConfig('photo_1'),
            $this->getImageUploadBehaviorConfig('photo_2'),
            $this->getImageUploadBehaviorConfig('photo_3'),
        ];
    }

    private function getImageUploadBehaviorConfig($attribute)
    {
        $module = Yii::$app->getModule('slider');

        return [
            'class' => ImageUploadBehavior::class,
            'attribute' => $attribute,
            'createThumbsOnRequest' => true,
            'filePath' => $module->storageRoot . '/data/slides/[[attribute_id]]/[[filename]].[[extension]]',
            'fileUrl' => $module->storageHost . '/data/slides/[[attribute_id]]/[[filename]].[[extension]]',
            'thumbPath' => $module->storageRoot . '/cache/slides/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
            'thumbUrl' => $module->storageHost . '/cache/slides/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
            'thumbs' => array_merge($module->thumbs, [
                'sm' => ['width' => 106, 'height' => 60],
                'md' => ['width' => 212, 'height' => 120],
            ])
        ];
    }

    public function getTagsList($ownTags = false)
    {
        $tagsQuery = Tags::find()->select(['title_0', 'id'])->indexBy('id');
        if ($ownTags) {
            $tagIds = SlideTags::find()->where(['slide_id' => $this->id])->select('tag_id')->column();
            $tagsQuery->where(['id' => $tagIds]);
        }

        return $tagsQuery->column();
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        try {
            SlideTags::deleteAll(['slide_id' => $this->id]);

            if (is_array($this->tags)) {
                foreach ($this->tags as $tagId) {
                    $tagsModel = new SlideTags();
                    $tagsModel->tag_id = $tagId;
                    $tagsModel->slide_id = $this->id;
                    $tagsModel->save();
                }
            }
            return true;
        } catch (Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->tags = SlideTags::find()->select('tag_id')->where(['slide_id' => $this->id])->column();
    }
}
